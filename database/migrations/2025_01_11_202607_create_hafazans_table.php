<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHafazansTable extends Migration
{
    public function up()
    {
        Schema::create('hafazans', function (Blueprint $table) {
            $table->id();  // Primary key
            $table->unsignedBigInteger('student_id');  // Foreign key to students table
            $table->string('surah_name');  // Surah name field
            $table->integer('ayah_number');  // Ayah number field
            $table->date('recite_date');  // Date for reciting field
            $table->timestamps();  // Created at and updated at fields

            // Add foreign key constraint
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('hafazans');
    }
}
