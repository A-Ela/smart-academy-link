<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('diniyyahs', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('student_id');
        $table->integer('akhlak')->nullable();
        $table->integer('aqidah')->nullable();
        $table->integer('sirah')->nullable();
        $table->integer('fiqh')->nullable();
        $table->integer('bahasa_arab')->nullable();
        $table->integer('tulisan_jawi')->nullable();
        $table->text('feedback')->nullable();
        $table->timestamps();

        // Foreign key constraint to link to the students table
        $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diniyyahs');
    }
};
