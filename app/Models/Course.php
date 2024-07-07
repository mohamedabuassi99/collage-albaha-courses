<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'name_en', 'instructor', 'instructor_en', 'days', 'hours', 'from', 'to',
        'cover', 'user_id', 'category_id', 'price', 'description', 'status', 'show', 'temporary', 'publishdate'];

    public function getCover()
    {
        return asset('storage/' . $this->cover);
    }

    //who create the course
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, Registration::class)->withPivot(['id', 'status', 'confirm_certificate',]);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function design()
    {
        return $this->hasOne(DesignCertificate::class);
    }

    public function exam()
    {
        return $this->hasOne(Exam::class);
    }

    public function lectures()
    {
        return $this->hasMany(Lecture::class);
    }

    public function videos()
    {
        return $this->hasMany(YoutubeLecture::class);
    }

    public function ratings()
    {
        $registrations = Registration::where('course_id', $this->id)->pluck('id')->toArray();
        return Rating::with(['registration','registration.student'])->whereIn('registration_id', $registrations)->get();
    }
}
