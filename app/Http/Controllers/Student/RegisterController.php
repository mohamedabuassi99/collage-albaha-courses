<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    //

    public function register(Course $course)
    {
        $student = auth('student')->user();
        $register = Registration::whereStudentId($student->id)->whereCourseId($course->id)->first();
        if (empty($register)) {
            if ($course->from >= today()->toDateString()) {
                $registration = Registration::create([
                    'student_id' => $student->id,
                    'course_id' => $course->id,
                    'confirm_certificate' => Str::random(30),
                    'status' => 0,
                ]);
            } else {
                return back()->with('failed', 'انتهى التسجيل.');
            }
        } else {
            return back()->with('failed', 'مسجل مسبقا');
        }
        return redirect()->route('student.courses.index')->with('success', 'تم تسجيل الدورة بنجاح بانتظار الاعتماد.');
    }
}
