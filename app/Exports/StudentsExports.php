<?php

namespace App\Exports;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StudentsExports implements FromCollection, WithHeadings
{

    public $course;

    public function __construct($course)
    {
        $this->course = $course;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        if ($this->course->exam) {
//            $students =  Student::with(['courses','courses.exam','courses.students'])->whereHas('courses', function ($query) {
//                $query->where('course_id', $this->course->id);
//            })
//                ->get(['id', 'name', 'name_en', 'email', 'id_number', 'nationality', 'nationality_en']);


            $students = Course::with(['exam', 'students', 'exam.students'])->find($this->course->id);
            $data = collect();
            foreach ($students->exam->students as $student) {
                $data->push([
                    'id' => $student->id,
                    'name' => $student->name,
                    'name_en' => $student->name_en,
                    'email' => $student->email,
                    'phone' => $student->phone,
                    'id_number' => $student->id_number,
                    'nationality' => $student->nationality,
                    'nationality_en' => $student->nationality_en,
                    'grade' => $student->pivot->grade,
                ]);
            }
            return $data;
        } else {
            return Student::whereHas('courses', function ($query) {
                $query->where('course_id', $this->course->id);
            })->get(['id', 'name', 'name_en', 'email', 'phone', 'id_number', 'nationality', 'nationality_en']);
        }
    }

    public function headings(): array
    {
        if ($this->course->exam) {
            return [
                "id", "الاسم", "الاسم بالانجليزي", "الإيميل","رقم الهاتف", "الهوية", "الجنسية بالعربي", "الجنسية بالانجليزي", "الدرجة"
            ];
        } else {
            return [
                "id", "الاسم", "الاسم بالانجليزي", "الإيميل","رقم الهاتف", "الهوية", "الجنسية بالعربي", "الجنسية بالانجليزي"
            ];
        }
    }
}
