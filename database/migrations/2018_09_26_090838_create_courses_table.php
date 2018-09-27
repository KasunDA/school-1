<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('school_id');
            $table->unsignedBigInteger('term_id');
            $table->unsignedBigInteger('teacher_id');
            $table->unsignedBigInteger('lesson_id');
            $table->unsignedBigInteger('classroom_id');
            $table->text('detail')->nullable();
            $table->string('days_times')->nullable();
            $table->string('exam_place')->nullable();
            $table->date('exam_date')->nullable();
            $table->timestamps();
            $table->foreign('school_id')->references('id')->on('schools');
            $table->foreign('term_id')->references('id')->on('terms');
            $table->foreign('teacher_id')->references('id')->on('teachers');
            $table->foreign('classroom_id')->references('id')->on('classrooms');
            $table->foreign('lesson_id')->references('id')->on('lessons');
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
}
