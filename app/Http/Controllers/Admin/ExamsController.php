<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Exam;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ExamsController extends Controller
{
    public function create(Course $course)
    {
        return view('admin.courses.exams.create', compact('course'));
    }

    public function store(Request $request, Course $course)
    {
        $exam = Exam::whereCourseId($course->id)->first();
        if (!$exam) {
            $request->validate([
                'title' => '',
                'final_mark' => 'required|integer|between:0,100',
                'pass_mark' => 'required|integer|between:0,100',
                'from' => 'required|date_format:Y-m-d H:i|',
                'to' => 'required|date_format:Y-m-d H:i|after:from',
                'per_page' => 'nullable|numeric',
            ]);

            $exam = Exam::create([
                'course_id' => $course->id,
                'title' => $request->title,
                'final_mark' => $request->final_mark,
                'pass_mark' => $request->pass_mark,
                'from' => $request->from,
                'to' => $request->to,
                'review' => $request->review ?? false,
                'per_page' => $request->per_page ?? 10,
            ]);
            return back()->with('success', 'تم انشاء الاختبار بنجاح, بانتظار ملئ الاسئلة.');
        } else {
            $request->validate([
                'title' => '',
                'final_mark' => 'required|integer|between:0,100',
                'pass_mark' => 'required|integer|between:0,100',
                'from' => 'required|date_format:Y-m-d H:i|',
                'to' => 'required|date_format:Y-m-d H:i|after:from',
                'per_page' => 'nullable|numeric',
            ]);
            $exam->update([
                'course_id' => $course->id,
                'title' => $request->title,
                'final_mark' => $request->final_mark,
                'pass_mark' => $request->pass_mark,
                'from' => $request->from,
                'to' => $request->to,
                'review' => $request->review ?? false,
                'per_page' => $request->per_page ?? 10,
            ]);;
            return back()->with('success', 'تم تحديث بيانات الاختبار بنجاح, بانتظار ملئ الاسئلة.');
        }
    }

    public function show(Course $course)
    {

    }

    public function destroy(Exam $exam)
    {
        $exam->delete();
        return back()->with('success','تم حذف الامتحان بنجاح');
    }
}
