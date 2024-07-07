<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DesignCertificate extends Model
{
    protected $fillable = ['course_id', 'type', 'image', 'image_corner_top_right', 'image_corner_top_left',
        'image_corner_bottom_right', 'image_corner_bottom_left', 'title_ar', 'title_en', 'before_student_name_ar',
        'before_student_name_en', 'before_course_name_ar', 'before_course_name_en', 'describe_hour_ar',
        'describe_hour_en', 'describe_name_instructor', 'describe_name_jaha', 'name_jaha',
        'start_date_ar', 'start_date_en', 'end_date_ar', 'end_date_en', 'descripe_certificate_id_ar',
        'descripe_certificate_id_en', 'note_ar', 'note_en', 'describe_qr',];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
