<?php

namespace App\Models;

use App\Notifications\StudentResetPasswordNotification;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    use SoftDeletes, Notifiable;

    protected $fillable = ['name', 'name_en', 'email', 'password', 'id_number', 'nationality', 'nationality_en', 'phone', 'status',];

    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new StudentResetPasswordNotification($this->email, $token));
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, Registration::class)->withPivot(['id', 'status', 'confirm_certificate',]);
    }

    public function getName()
    {
        return $this->name ?? $this->name_en;
    }

//    public function isCertified(Course $course)
//    {
//        return Registration::whereCourseId($course->id)->whereStudentId($this->id)->first()->status;
//    }

    public function wantToChange()
    {
        return $this->hasOne(ChangeStudentInformation::class);
    }

    public function hasAttemptExam(Exam $exam)
    {
        $attempt = Attempt::whereExamId($exam->id)->whereStudentId($this->id)->first();
        return @$attempt->finish != null ? true : false;
    }

    public function exams()
    {
        return $this->belongsToMany(Exam::class, Attempt::class)
            ->withPivot(['start', 'finish', 'grade'])->using(Attempt::class);
    }

    public function hasWatchThisVideo($video)
    {
        return YoutubeLectureView::whereStudentId($this->id)->whereYoutubeLectureId($video->id)->exists();
    }

}
