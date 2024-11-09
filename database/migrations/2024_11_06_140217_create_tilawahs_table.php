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
            $table->id('surahID');
            $table->string('surahName');
            $table->integer('ayatStart');
            $table->integer('ayatEnd');
            $table->date('dateStart');
            $table->date('dateEnd');
            $table->string('grade');
            $table->string('HafizRemark');
            $table->foreignId('studentID')->constrained('students')->onDelete('cascade');
            $table->foreignId('classID')->constrained('classes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tilawahs');
    }
};
