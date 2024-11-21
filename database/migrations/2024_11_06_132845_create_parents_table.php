<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('parents', function (Blueprint $table) {
            $table->id('parentID'); // Primary key
            $table->string('email')->unique();
            $table->string('password');
            $table->string('name');
            $table->timestamps();
        });

         //Create a pivot table for the many-to-many relationship between parents and students
        Schema::create('parent_student', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parentID')->constrained('parents','parentID')->onDelete('cascade');
            $table->foreignId('studentID')->constrained('students','studentID')->onDelete('cascade');
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }

    public function down()
    {
        Schema::dropIfExists('parent_student');
        Schema::dropIfExists('parents');
    }
};
