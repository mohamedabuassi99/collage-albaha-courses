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
        Schema::create('change_student_information', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id')->default(null);
            $table->foreign('student_id')->on('students')->references('id')->cascadeOnDelete();
            $table->string('name')->nullable();
            $table->string('name_en')->nullable();
            $table->string('email')->nullable();
            $table->string('id_number')->nullable();
            $table->string('nationality')->nullable();
            $table->string('nationality_en')->nullable();
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
        Schema::dropIfExists('change_student_information');
    }
};
