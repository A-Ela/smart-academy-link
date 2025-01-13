<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('message');
            $table->date('date');
            $table->timestamps(); // created_at and updated_at columns
        });
    }

    public function down(): void {
        Schema::dropIfExists('notifications');
    }
};
