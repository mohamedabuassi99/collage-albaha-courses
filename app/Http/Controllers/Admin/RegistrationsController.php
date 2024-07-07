<?php

namespace App\Http\Controllers\Admin;

use App\Exports\StudentsExports;
use App\Http\Controllers\Controller;
use App\Imports\StudentImport;
use App\Models\Registration;
use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use File;


class RegistrationsController extends Controller
{

    public function store(Request $request, Course $course)
    {
        $student = Student::whereEmail($request->email)->first();
        $request->validate([
            'name' => 'nullable|min:2',
            'name_en' => 'nullable|min:2',
            'email' => 'required|unique:students,email,' . @$student->id,
            'id_number' => 'numeric',
            'nationality' => 'nullable',
            'nationality_en' => 'nullable',
            'phone' => 'nullable|numeric|digits_between:8,14',
        ]);
        if (!$student) {
            $student = Student::create([
                'name' => $request->name,
                'name_en' => $request->name_en,
                'email' => $request->email,
                'phone' => $request->phone,
                'id_number' => $request->id_number,
                'nationality' => $request->nationality,
                'nationality_en' => $request->nationality_en,
                'status' => false,
            ]);
        }
        $registration = Registration::whereStudentId($student->id)->whereCourseId($course->id)->first();
        if (empty($registration)) {
            $registration = Registration::create([
                'student_id' => $student->id,
                'course_id' => $course->id,
                'confirm_certificate' => Str::random(30),
            ]);
        } else {
            return back()->with('failed', 'الطالب ' . $student->name . ' مضاف مسبقا ');
        }
        if (auth()->user()->hasRole('admin')) {
            $student->update(['status' => 1]);
            $registration->update(['status' => 1]);
        }
        return back()->with('success', 'تم اضافة الطالب بنجاح');
    }

    public function store_excel(Request $request, Course $course)
    {
        try {
            Excel::import(new StudentImport($course), request()->file('file'));
        } catch (\Exception $exception) {
            return back()->with('failed', 'حدث خطأ ما');
        }
        return back()->with('success', 'تم الاضافة بنجاح');
    }

    public function destroy(Student $student, Course $course)
    {
        Registration::whereStudentId($student->id)->whereCourseId($course->id)->delete();
        return back()->with('failed', 'تم حذف تسجيل الطالب بنجاح');
    }

    public function excel_export(Course $course)
    {
        return Excel::download(new StudentsExports($course), ($course->name . '.xlsx'));
    }

    public function pdf_certification(Course $course, Student $student)
    {
//        $course = Course::with(['students', 'design'])->find($course->id);
//        $data = [
//            'course' => $course
//        ];
        $register = Registration::with(['course', 'student', 'course.design'])->whereStudentId($student->id)
            ->whereCourseId($course->id)->first();
        $data = [
            'register' => $register
        ];

        $pdf = PDF::loadView('admin.courses.pdf.students-certifictaion', $data, [], [
            'default_font' => 'freeserif',
            'orientation' => 'L',
            'margin_left' => 0,
            'margin_right' => 0,
            'margin_top' => 0,
            'margin_bottom' => 0,
            'format' => [146, 210.7],
        ]);
        return $pdf->stream(($register->student->name ?? $register->student->name_en) . ' - ' . ($register->course->name ?? $register->course->name_en) . '.' . 'pdf');
    }

    public function pdf_certification_export_all(Course $course)
    {

        $registers = Registration::with(['course', 'student', 'course.design'])
            ->whereCourseId($course->id)->get();
        foreach ($registers as $register) {
            $data = [
                'register' => $register
            ];
            $pdf = PDF::loadView('admin.courses.pdf.students-certifictaion', $data, [], [
                'default_font' => 'freeserif',
                'orientation' => 'L',
                'margin_left' => 0,
                'margin_right' => 0,
                'margin_top' => 0,
                'margin_bottom' => 0,
                'format' => [146, 210.7],
            ]);

            $fileName = 'certification/courses/' . $course->id . '/' . ($register->student->name ?? $register->student->name_en) . ' - ' . ($register->course->name ?? $register->course->name_en) . '.' . 'pdf';

            // Save PDF on your public storage
            Storage::disk('public')->put($fileName, $pdf->Output($fileName, "S"));

        }


        $zip_file = $course->name . '.zip';
        $zip = new \ZipArchive();
        $zip->open($zip_file, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);

        $path = storage_path('app/public/certification/courses/' . $course->id . '/');
        $files = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($path));
        foreach ($files as $name => $file) {
            // We're skipping all subfolders
            if (!$file->isDir()) {
                $filePath = $file->getRealPath();

                $relativePath =  $course->name.'/' . $file->getFilename();

                $zip->addFile($filePath, $relativePath);
            }
        }
        $zip->close();
        return response()->download($zip_file);

        return back()->with('success', 'تم استخراج شهادات الجميع بنجاح');
    }

}
