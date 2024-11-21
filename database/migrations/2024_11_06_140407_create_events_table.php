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
        Schema::create('events', function (Blueprint $table) {
            $table->id('eventID');
            $table->string('eventName');
            $table->string('eventDescription');
            $table->date('startDate');
            $table->date('dueDate');
            $table->timestamps();
        });
        
        // Create a pivot table for events and classes
        Schema::create('class_event', function (Blueprint $table) {
            $table->id();
            $table->foreignId('eventID')->constrained('events','eventID')->onDelete('cascade');
            $table->foreignId('classID')->constrained('classNames','classID')->onDelete('cascade');
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
