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
//        Schema::create('codes', function (Blueprint $table) {
//            $table->id();
//            $table->integer('code');
//            $table->unsignedBigInteger('student_id');
//            $table->foreign('student_id')->references('id')->on('students')->cascadeOnDelete();
//            $table->boolean('status')->default(0);
//            $table->timestamps();
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('codes');
    }
};
