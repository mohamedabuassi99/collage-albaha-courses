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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
//           ,'number','hours','days','user_id','is_deleted','temporary'];


            $table->string('name')->nullable();
            $table->string('name_en')->nullable();
            $table->string('instructor')->nullable();
            $table->string('instructor_en')->nullable();
            $table->string('days')->nullable();
            $table->string('hours')->nullable();
            $table->date('from')->nullable();
            $table->date('to')->nullable();

            //cover for the course
            $table->string('cover')->nullable();
            $table->boolean('show')->default(0);


            //temporary was for old data don't play with it :)
            $table->boolean('temporary')->default(0);


            //creator of the courses
            $table->unsignedBigInteger('user_id')->default(null);
            $table->foreign('user_id')->on('users')->references('id');

            //categories
            $table->unsignedBigInteger('category_id')->default(null);
            $table->foreign('category_id')->on('categories')->references('id');

            $table->float('price')->default(null);
            $table->text('description')->nullable();
            $table->boolean('status')->default(0);

            //publish date for certification
            $table->date('publishdate')->nullable();

            $table->softDeletes();
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
        Schema::dropIfExists('courses');
    }
};
