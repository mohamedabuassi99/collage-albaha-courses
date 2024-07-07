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
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Course::class)->constrained()->cascadeOnDelete();
            $table->string('title')->nullable();
            $table->unsignedTinyInteger('final_mark')->default(0);
            $table->unsignedTinyInteger('pass_mark')->default(0);

            $table->dateTime('from');
            $table->dateTime('to');

            $table->boolean('review')->default(false);
            $table->unsignedTinyInteger('per_page')->default(10);

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
        Schema::dropIfExists('exams');
    }
};
