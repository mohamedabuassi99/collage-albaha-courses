<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class LecturesController extends Controller
{
    //

    public function index(Course $course)
    {
        $course = Course::with('lectures')->findOrFail($course->id);
        return view('front.student.courses.lectures.index',compact('course'));
    }
}
