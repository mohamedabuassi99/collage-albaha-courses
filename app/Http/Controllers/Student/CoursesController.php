<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Attempt;
use App\Models\Course;
use App\Models\Rating;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CoursesController extends Controller
{
    //

    public function index()
    {
        $student = Student::with(['courses' => function ($query) {
            $query->orderBy('id', 'desc');
        }])->find(auth('student')->id());
        return view('front.student.courses.index', compact('student'));
    }

    public function show(Course $course)
    {
        $student = Student::with(['courses' => function ($query) {
            $query->where('course_id', request()->course->id);
        },])->find(auth('student')->id());
        $rating = Rating::where('registration_id',$student->courses->first()->pivot->id)->first();
        $course = Course::with(['user', 'category', 'lectures', 'exam',
            'exam.students' => function ($query) {
                if (Carbon::parse(now())->greaterThanOrEqualTo(@request()->course->exam->to)) {
                    $query->whereStudentId(auth('student')->id())->whereExamId(request()->course->exam->id)->each(function ($item) {
                        if ($item->pivot->grade == null || $item->pivot->finish == null) {
                            $attempt = Attempt::where(['exam_id' => request()->course->exam->id,
                                'student_id' => $item->pivot->student_id])->orderByDesc('id')->first();
                            if (!$item->pivot->grade) {
                                $attempt->update([
                                    'grade' => $attempt->grade(),
                                ]);
                            }
                            if (!$item->pivot->finish) {
                                $attempt->update([
                                    'finish' => $attempt->exam->to,
                                ]);
                            }
                        }
                    });
                } else {
                    $query->whereStudentId(auth('student')->id())->whereExamId(request()->course->exam->id);
                }
            }])->findOrFail($course->id);


        return view('front.student.courses.show', compact('course','rating', 'student'));
    }
}
