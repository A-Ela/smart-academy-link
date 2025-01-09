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
            $table->foreignId('student_id')->constrained()->onDelete('cascade');
            $table->text('feedback');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('student_feedback');
    }
}

