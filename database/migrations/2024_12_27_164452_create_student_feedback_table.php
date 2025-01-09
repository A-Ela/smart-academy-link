<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentFeedbackTable extends Migration
{
    public function up()
    {
        Schema::create('student_feedback', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('studentID');
            $table->text('feedback');
            $table->timestamps();

            //add constraint
            $table->foreign('studentID')->references('studentID')->on('students')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('student_feedback');
    }
}

