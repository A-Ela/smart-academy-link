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
        Schema::table('homeworks', function (Blueprint $table) {
            // Only add the column if it doesn't exist
            if (!Schema::hasColumn('homeworks', 'title')) {
                $table->string('title');
            }
    
            if (!Schema::hasColumn('homeworks', 'description')) {
                $table->text('description');
            }
    
            if (!Schema::hasColumn('homeworks', 'due_date')) {
                $table->date('due_date');
            }
        });
    }
    


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
