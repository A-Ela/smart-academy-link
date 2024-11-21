<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->foreignId('teacherID')->constrained('teachers')->onDelete('cascade');
            $table->foreignId('classID')->constrained('classNames')->onDelete('cascade');
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }

    public function down()
    {
        Schema::dropIfExists('class_teacher');
        Schema::dropIfExists('teachers');
    }
};
