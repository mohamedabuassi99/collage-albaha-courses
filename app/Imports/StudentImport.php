<?php

namespace App\Imports;

use App\Models\Registration;
use App\Models\Student;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;

class StudentImport implements ToModel
{
    protected $course;


    public function __construct($course)
    {
        $this->course = $course;
    }

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {

        // if (filter_var($row[2], FILTER_VALIDATE_EMAIL)) {
            // valid address

            $student = Student::whereEmail($row[2])->orWhere('id_number',$row[4])->first();

            if ($student) {
//                $register = Registration::where(['student_id' => $student->id], [
//                    'course_id' => $this->course->id])->first();
                $registration = Registration::whereStudentId($student->id)->whereCourseId($this->course->id)->first();
                if (empty($registration)) {
                    $registration = Registration::create([
                        'student_id' => $student->id,
                        'course_id' => $this->course->id,
                        'confirm_certificate' => Str::random(30),
                    ]);
                }
                if (auth()->user()->hasRole('admin')) {
                    $student->update(['status' => 1]);
                    $registration->update(['status' => 1]);
                }
                return $student;
            }

            $student = Student::create([
                'name' => $row[0],
                'name_en' => $row[1],
                'email' => $row[2]?? $row[4].'@mktraingate.com',
                'phone' => $row[3],
                'id_number' => $row[4],
                'nationality' => $row[5],
                'nationality_en' => $row[6],
                'status' => 1,
            ]);
            $registration = Registration::firstOrCreate([
                'student_id' => $student->id,
                'course_id' => $this->course->id,
                'confirm_certificate' => Str::random(30),
            ]);
            if (auth()->user()->hasRole('admin')) {
                $student->update(['status' => 1]);
                $registration->update(['status' => 1]);
            }
            return $student;
        // }

    }
}
