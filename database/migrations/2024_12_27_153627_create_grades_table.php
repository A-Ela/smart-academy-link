<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGradesTable extends Migration
{
    public function up()
    {
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('studentID');
            $table->foreignId('subject_id')->constrained()->onDelete('cascade');
            $table->string('grade');
            $table->timestamps();

            //
            $table->foreign('studentID')->references('studentID')->on('students')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('grades');
    }
}

