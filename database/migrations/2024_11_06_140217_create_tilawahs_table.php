<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tilawah', function (Blueprint $table) {
            $table->id('surahID'); // Primary key
            $table->string('surahName'); // Surah name
            $table->integer('ayatStart'); // Starting Ayat number
            $table->integer('ayatEnd'); // Ending Ayat number
            $table->date('dateStart'); // Start date
            $table->date('dateEnd'); // End date
            $table->string('grade'); // Grade
            $table->string('HafizRemark'); // Remarks
            $table->unsignedBigInteger('studentID'); // Foreign key to students table
            $table->unsignedBigInteger('classID'); // Foreign key to class_names table
            $table->timestamps(); // Created_at and updated_at timestamps

            // Foreign key constraint
            $table->foreign('classID')->references('classID')->on('classNames')->onDelete('cascade');
            $table->foreign('studentID')->references('studentID')->on('students')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tilawah'); // Drops the table
    }
};
