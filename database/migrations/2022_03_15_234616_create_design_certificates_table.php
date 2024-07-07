<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('design_certificates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_id');
            $table->foreign('course_id')->references('id')->on('courses')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('type')->nullable();
            $table->string('image')->nullable();
            $table->string('image_corner_top_right')->nullable();
            $table->string('image_corner_top_left')->nullable();
            $table->string('image_corner_bottom_right')->nullable();
            $table->string('image_corner_bottom_left')->nullable();
            $table->string('title_ar')->nullable();
            $table->string('title_en')->nullable();
            $table->text('before_student_name_ar')->nullable();
            $table->text('before_student_name_en')->nullable();
            $table->text('before_course_name_ar')->nullable();
            $table->text('before_course_name_en')->nullable();
            $table->string('describe_hour_ar')->nullable();
            $table->string('describe_hour_en')->nullable();
            $table->string('describe_name_instructor')->nullable();
            $table->string('describe_name_jaha')->nullable();
            $table->string('name_jaha')->nullable();
            $table->string('start_date_ar')->nullable();
            $table->string('start_date_en')->nullable();
            $table->string('end_date_ar')->nullable();
            $table->string('end_date_en')->nullable();
            $table->string('descripe_certificate_id_ar')->nullable();
            $table->string('descripe_certificate_id_en')->nullable();
            $table->text('note_ar')->nullable();
            $table->text('note_en')->nullable();
            $table->string('describe_qr')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('design_certificates');
    }
};
