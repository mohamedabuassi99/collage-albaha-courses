<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class YoutubeLectureView extends Model
{
    protected $fillable = ['youtube_lecture_id','student_id',];

    public function video()
    {
        return $this->belongsTo(YoutubeLecture::class,'youtube_lecture_id');
    }
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
