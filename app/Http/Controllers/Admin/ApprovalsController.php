<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ChangeStudentInformation;
use App\Models\Course;
use App\Models\Registration;
use App\Models\Student;
use Illuminate\Http\Request;

class ApprovalsController extends Controller
{
    //
    public function approval_courses_list()
    {
        $courses = Course::with(['user', 'students', 'category',])->whereStatus(0)->get();
        return view('admin.approval.courses', compact('courses'));
    }

    public function approval_students_list()
    {
        $students = Student::with('courses')->whereStatus(0)->get();
        return view('admin.approval.students', compact('students'));
    }

    public function approval_registrations_list()
    {
        $registrations = Registration::with(['student', 'course'])->whereStatus(0)->get();
        return view('admin.approval.registrations', compact('registrations'));
    }

    public function approval_change_students_information()
    {
        $students = ChangeStudentInformation::with(['student'])->get();
        return view('admin.approval.change-student-information', compact('students'));
    }


    //____________________________________________________________________________

    public function approval_students_accept(Student $student)
    {
        $student->update(['status' => 1]);
        return back()->with('success', 'تم الاعتماد بنجاح');
    }

    public function approval_courses_accept(Course $course)
    {
        $course->update(['status' => 1]);
        return back()->with('success', 'تم الاعتماد بنجاح');
    }

    public function approval_registrations_accept(Registration $registration)
    {
        $registration->update(['status' => 1]);
        return back()->with('success', 'تم الاعتماد بنجاح');
    }

    public function approval_registrations_accept_all()
    {
        Registration::whereStatus(0)->update(['status' => 1]);
        return back()->with('success', 'تم الاعتماد بنجاح');
    }

    public function approval_change_students_information_accept(ChangeStudentInformation $changeStudentInformation)
    {

        $student = Student::find($changeStudentInformation->student_id)->update([
            'name' => $changeStudentInformation->name,
            'name_en' => $changeStudentInformation->name_en,
            'email' => $changeStudentInformation->email,
            'id_number' => $changeStudentInformation->id_number,
            'nationality' => $changeStudentInformation->nationality,
            'nationality_en' => $changeStudentInformation->nationality_en,
        ]);
        $changeStudentInformation->delete();
        return back()->with('success', 'تم اعتماد تغيير بيانات الطالب ');

    }

    public function approval_change_students_information_unaccept(ChangeStudentInformation $changeStudentInformation)
    {
        $changeStudentInformation->delete();
        return back()->with('failed', 'تم رفض تغيير بيانات الطالب ');
    }

    public function approval_change_students_information_accept_all()
    {
        $studentsInfo = ChangeStudentInformation::all();
        foreach ($studentsInfo as $info) {
            Student::find($info->student_id)->update([
                'name' => $info->name,
                'name_en' => $info->name_en,
                'email' => $info->email,
                'id_number' => $info->id_number,
                'nationality' => $info->nationality,
                'nationality_en' => $info->nationality_en,
            ]);
            $info->delete();
        }
        return back()->with('success', 'تم اعتماد تغيير بيانات الطلاب ');

    }
}
