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
        Schema::table('autoak', function (Blueprint $table) {
            // Erabiltzailearen IDa gordetzeko zutabea
            $table->unsignedBigInteger('erabiltzaile_id')->nullable();
            // Lotura (Foreign Key)
            $table->foreign('erabiltzaile_id')->references('id')->on('erabiltzaileak');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('autoak', function (Blueprint $table) {
            //
        });
    }
};
