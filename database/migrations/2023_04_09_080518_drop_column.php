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
        Schema::table('product', function (Blueprint $table) {
            $table->dropColumn('color');
            $table->dropColumn('size');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('product', function (Blueprint $table) {
            //
        });
    }
};
