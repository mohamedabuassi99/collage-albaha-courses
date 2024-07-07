<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $fillable = ['course_id', 'title', 'final_mark', 'pass_mark', 'from', 'to', 'review','per_page'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, Attempt::class)
            ->withPivot(['start', 'finish', 'grade'])->using(Attempt::class);
    }


}
