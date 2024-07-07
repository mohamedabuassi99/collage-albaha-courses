<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['exam_id','q_type','question','options','answers','mark',];

    protected $casts = ['options'=>'array'];

    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }

    public function all_answers()
    {
        return $this->hasMany(Answer::class);
    }

}
