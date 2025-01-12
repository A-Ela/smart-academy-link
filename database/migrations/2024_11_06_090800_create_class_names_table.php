<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::dropIfExists('classNames');

        Schema::create('classNames', function (Blueprint $table) {
            $table->id('classID'); // Primary key
            $table->string('classname');
            $table->string('year');
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }

    public function down()
    {
        // Drop foreign key constraints
        //Schema::table('students', function (Blueprint $table) {
          //  $table->dropForeign(['classID']);
        //});

        Schema::table('class_teacher', function (Blueprint $table) {
            $table->dropForeign(['classID']);
        });

        // Drop the table
        Schema::dropIfExists('classNames');
    }
};

