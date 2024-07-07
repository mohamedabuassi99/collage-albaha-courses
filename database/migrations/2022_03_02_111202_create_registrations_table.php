<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_id')->default(null);
            $table->foreign('course_id')->on('courses')->references('id')->cascadeOnDelete();

            $table->unsignedBigInteger('student_id')->default(null);
            $table->foreign('student_id')->on('students')->references('id')->cascadeOnDelete();

            $table->string('confirm_certificate', 60)->unique();
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('registrations');
    }
};
