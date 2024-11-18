<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('classNames', function (Blueprint $table) {
            $table->id('classID'); // Primary key
            $table->string('classname');
            $table->string('year');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('class_teacher');
        Schema::dropIfExists('classNames');
    }
};
