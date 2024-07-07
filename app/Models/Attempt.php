<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Attempt extends Pivot
{
    protected $fillable = ['exam_id', 'student_id', 'start', 'finish', 'grade','order_of_questions',];
    protected $table = "attempts";

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }

    public function grade()
    {
        $questions = Question::whereExamId($this->exam_id)->get();
        $mark = 0 ;
        foreach($questions as $question){
            $answer = Answer::whereStudentId($this->student_id)->whereQuestionId($question->id)->whereAnswers($question->answers)->first();
            if($answer){
                $mark = $mark + $question->mark;
            }
        }

        return $mark;

    }
}
