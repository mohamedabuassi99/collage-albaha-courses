<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    protected $fillable = ['course_id','meeting_id','topic','start_at','duration','password','start_url','join_url',];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
