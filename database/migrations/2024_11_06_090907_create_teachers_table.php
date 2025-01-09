<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id('teacherID'); // Primary key
            $table->string('teacherName');
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamps();
            $table->engine = 'InnoDB';
        });

        // Create a pivot table for the many-to-many relationship
        Schema::create('class_teacher', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('teacherID');
            $table->unsignedBigInteger('classID');
            $table->timestamps();
            $table->engine = 'InnoDB';

            // Foreign key constraints
            $table->foreign('teacherID')->references('teacherID')->on('teachers')->onDelete('cascade');
            $table->foreign('classID')->references('classID')->on('classNames')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('class_teacher');
        Schema::dropIfExists('teachers');
    }
};
