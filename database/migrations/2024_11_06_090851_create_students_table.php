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
            // Explicitly define the foreign key to match the primary key type
            $table->foreignId('classID')->references('classID')->on('classNames')->onDelete('cascade');
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }

    public function down()
    {
        Schema::dropIfExists('students');
    }
};
