<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChangeStudentInformation extends Model
{
    protected $fillable = ['student_id', 'name', 'name_en', 'email', 'id_number', 'nationality', 'nationality_en',];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

}
