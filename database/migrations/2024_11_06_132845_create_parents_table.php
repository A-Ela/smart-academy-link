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
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('name');
            $table->timestamps();
        });

         //Create a pivot table for the many-to-many relationship between parents and students
         Schema::create('parent_student', function (Blueprint $table) {
            $table->id(); // Optional, only if you want an ID for this table
            $table->unsignedBigInteger('parentID');
            $table->unsignedBigInteger('studentID');
            $table->timestamps();
    
            // Foreign key constraints
            $table->foreign('parentID')->references('parentID')->on('parents')->onDelete('cascade');
            $table->foreign('studentID')->references('studentID')->on('students')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('parent_student');
        Schema::dropIfExists('parents');
    }
};
