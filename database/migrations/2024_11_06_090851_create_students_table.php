<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id('studentID'); // Primary key
            $table->string('name');
            $table->integer('year');
            $table->string('classname');
            $table->unsignedBigInteger('classID'); // Add 'classID' column
            $table->string('ic_no')->nullable();
            $table->timestamps();
            $table->engine = 'InnoDB';

            // Foreign key constraint
            $table->foreign('classID')->references('classID')->on('classNames')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('students');
    }
};
