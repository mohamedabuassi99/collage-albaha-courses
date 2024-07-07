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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Exam::class)->constrained()->cascadeOnDelete();
            $table->tinyInteger('q_type')->default(0)->comment('0: mcq; 1: True/False;');
            $table->text('question');
            $table->json('options');
            $table->string('answers');
            $table->unsignedTinyInteger('mark')->default(1);
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
        Schema::dropIfExists('questions');
    }
};
