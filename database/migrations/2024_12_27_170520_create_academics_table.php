<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcademicsTable extends Migration
{
    public function up()
    {
        Schema::create('academics', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('studentID');
            $table->integer('bm')->nullable();
            $table->integer('bi')->nullable();
            $table->integer('sains')->nullable();
            $table->integer('matematik')->nullable();
            $table->integer('rbt')->nullable();
            $table->integer('pjk')->nullable();
            $table->integer('psv')->nullable();
            $table->integer('sejarah')->nullable();
            $table->text('feedback')->nullable();
            $table->timestamps();

            //adding constraint
            $table->foreign('studentID')->references('studentID')->on('students')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('academics');
    }
}
