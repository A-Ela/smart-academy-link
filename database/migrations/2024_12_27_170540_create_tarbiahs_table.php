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
    Schema::create('tarbiahs', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('studentID');
        $table->integer('cukup_solat')->nullable();
        $table->integer('amali_solat')->nullable();
        $table->integer('tilawah_al_quran')->nullable();
        $table->integer('mathurat')->nullable();
        $table->text('feedback')->nullable();
        $table->timestamps();

        // Foreign key constraint to link to the students table
        $table->foreign('studentID')->references('studentID')->on('students')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarbiahs');
    }
};
