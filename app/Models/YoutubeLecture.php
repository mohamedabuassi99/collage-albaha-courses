<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class YoutubeLecture extends Model
{
    protected $fillable = ['course_id','video_id', 'thumbnails','title','channel_title','numbering',];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function views()
    {
        return $this->hasMany(YoutubeLectureView::class,'youtube_lecture_id');
    }
}
