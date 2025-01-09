<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeTitleNullableInHomeworksTable extends Migration
{
    public function up()
    {
        Schema::table('homeworks', function (Blueprint $table) {
            // Make the 'title' column nullable
            $table->string('title')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('homeworks', function (Blueprint $table) {
            // Revert 'title' to be non-nullable
            $table->string('title')->nullable(false)->change();
        });
    }
}
