<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lecture;
use App\Models\Registration;
use App\Models\Student;
use Illuminate\Http\Request;

class CalendarController extends Controller
{

    public function index()
    {
        $student = auth('student')->user();

//        exam
//        lectures
        $courses_id = Registration::whereStudentId(auth('student')->id())->pluck('course_id');
        $exams = Course::with('exam')->whereHas('exam')->whereIn('id',$courses_id)->get();
        $lectures = Lecture::with('course')->whereIn('course_id',$courses_id)->get();
        return view('front.student.calender.index',compact('exams','lectures'));
    }
}
