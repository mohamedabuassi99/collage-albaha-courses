<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Attempt;
use App\Models\Course;
use App\Models\Registration;
use Illuminate\Http\Request;
use PDF;

class PdfController extends Controller
{
    public function print(Course $course)
    {
        $course->with('modelsReadyDesignCertificate');
//        return view('front.student.pdf.ready_design',compact('course'));
        $register = Registration::with(['course', 'student', 'course.design'])->whereStudentId(auth('student')->id())
            ->whereCourseId($course->id)->first();

        $data = [
            'register' => $register
        ];

        if ($course->exam) {
            $attempt = Attempt::where(['exam_id' => $course->exam->id,
                'student_id' => auth('student')->id()])->orderByDesc('id')->first();
            if ((int)$attempt->grade < (int)$course->exam->pass_mark) {
            abort(404);
            }
        }
        if ($register->course->id > 160 || $register->course->design) {
            $pdf = PDF::loadView('front.student.pdf.ready_design', $data, [], [
                'default_font' => 'freeserif',
                'orientation' => 'L',
                'margin_left' => 0,
                'margin_right' => 0,
                'margin_top' => 0,
                'margin_bottom' => 0,
                'format' => [146, 210.7],
            ]);
            return $pdf->stream($register->course->name . '.pdf');
        } else {
            if ($register->course->temporary == 1) {

                $pdf = PDF::loadView('front/student/old_system/certificates/print_temporary', $data, [], [
                    'default_font' => 'freeserif',
                    'orientation' => 'L',
                    'margin_left' => -2,
                    'margin_right' => -2,
                    'margin_top' => 0,
                    'margin_bottom' => -2,
                    'default_font_size' => '11',
                ]);
                return $pdf->stream('document.pdf');
            } elseif ($register->course->id == 96) {


                $pdf = PDF::loadView('front/student/old_system/certificates/print_franchise_industry', $data, [], [
                    'default_font' => 'freeserif',
                    'orientation' => 'L',
                    'margin_left' => -2,
                    'margin_right' => -2,
                    'margin_top' => 0,
                    'margin_bottom' => -2,
                    'default_font_size' => '11',
                ]);
                return $pdf->stream('document.pdf');


            } elseif ($register->course->id == 103) {


                $pdf = PDF::loadView('front/student/old_system/certificates/print_estshrafi', $data, [], [
                    'default_font' => 'freeserif',
                    'orientation' => 'L',
                    'margin_left' => -2,
                    'margin_right' => -2,
                    'margin_top' => 0,
                    'margin_bottom' => -2,
                    'default_font_size' => '11',
                ]);
                return $pdf->stream($register->course->name . '.pdf');


            } elseif ($register->course->id == 104) {


                $pdf = PDF::loadView('front/student/old_system/certificates/print_mogeza', $data, [], [
                    'default_font' => 'freeserif',
                    'orientation' => 'L',
                    'margin_left' => -2,
                    'margin_right' => -2,
                    'margin_top' => 0,
                    'margin_bottom' => -2,
                    'default_font_size' => '11',
                ]);
                return $pdf->stream($register->course->name . '.pdf');


            } elseif ($register->course->id == 105) {


                $pdf = PDF::loadView('front/student/old_system/certificates/print_reeada', $data, [], [
                    'default_font' => 'freeserif',
                    'orientation' => 'L',
                    'margin_left' => -2,
                    'margin_right' => -2,
                    'margin_top' => 0,
                    'margin_bottom' => -2,
                    'default_font_size' => '11',
                ]);
                return $pdf->stream($register->course->name . '.pdf');


            } elseif ($register->course->id == 106) {


                $pdf = PDF::loadView('front/student/old_system/certificates/print_tools', $data, [], [
                    'default_font' => 'freeserif',
                    'orientation' => 'L',
                    'margin_left' => -2,
                    'margin_right' => -2,
                    'margin_top' => 0,
                    'margin_bottom' => -2,
                    'default_font_size' => '11',
                ]);
                return $pdf->stream($register->course->name . '.pdf');


            } elseif ($register->course->id == 107) {


                $pdf = PDF::loadView('front/student/old_system/certificates/print_franshiz', $data, [], [
                    'default_font' => 'freeserif',
                    'orientation' => 'L',
                    'margin_left' => -2,
                    'margin_right' => -2,
                    'margin_top' => 0,
                    'margin_bottom' => -2,
                    'default_font_size' => '11',
                ]);
                return $pdf->stream($register->course->name . '.pdf');


            } elseif ($register->course->id == 110) {


                $pdf = PDF::loadView('front/student/old_system/certificates/print_rowwad', $data, [], [
                    'default_font' => 'freeserif',
                    'orientation' => 'L',
                    'margin_left' => -2,
                    'margin_right' => -2,
                    'margin_top' => 0,
                    'margin_bottom' => -2,
                    'default_font_size' => '11',
                ]);
                return $pdf->stream($register->course->name . '.pdf');


            } elseif ($register->course->id == 112) {


                $pdf = PDF::loadView('front/student/old_system/certificates/print_robot', $data, [], [
                    'default_font' => 'freeserif',
                    'orientation' => 'L',
                    'margin_left' => -2,
                    'margin_right' => -2,
                    'margin_top' => 0,
                    'margin_bottom' => -2,
                    'default_font_size' => '11',
                ]);
                return $pdf->stream($register->course->name . '.pdf');


            } else {
                if ($register->course->name_en == null) {
                    $pdf = PDF::loadView('front/student/old_system/certificates/print', $data, [], [
                        'default_font' => 'freeserif',
                        'orientation' => 'L',
                        'margin_left' => -2,
                        'margin_right' => -2,
                        'margin_top' => 0,
                        'margin_bottom' => -2,
                        'default_font_size' => '11',
                    ]);
                    return $pdf->stream('document.pdf');
                } else {

                    $pdf = PDF::loadView('front/student/old_system/certificates/print-ar-en', $data, [], [
                        'default_font' => 'freeserif',
                        'orientation' => 'L',
                        'margin_left' => -2,
                        'margin_right' => -2,
                        'margin_top' => 0,
                        'margin_bottom' => -2,
                        'default_font_size' => '11',
                    ]);
                    return $pdf->stream('document.pdf');

                }
            }
        }
    }
}
