<?php

namespace App\Imports;

use App\Models\Course;
use App\Models\Student;
use App\Models\Registration;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;

class TestImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $student = Student::whereEmail($row[3])->first();
        if ($student) {
//                $register = Registration::where(['student_id' => $student->id], [
//                    'course_id' => $this->course->id])->first();
            $register = Registration::whereStudentId($student->id)->whereCourseId($row[5])->first();
            if (empty($register)) {
                $course = Course::find($row[5]);
                Registration::create([
                    'student_id' => $student->id,
                    'course_id' => $row[5],
                    'confirm_certificate' => Str::random(30),
                    'status' => 1,
                ]);
            }
            return $student;
        }
        $student = Student::firstOrCreate([
            'id' => $row[0],
            'name' => $row[1],
            'name_en' => $row[2],
            'email' => $row[3],
            'id_number' => $row[4],
            'nationality' => $row[6],
            'nationality_en' => $row[7],
            'created_at' => $row[8],
            'updated_at' => $row[9],
        ]);
        $course = Course::find($row[5]);

        Registration::firstOrCreate([
            'student_id' => $student->id,
            'course_id' => $course->id,
            'confirm_certificate' => Str::random(30),
            'status' => 1,
        ]);
        return $student;

    }
}
