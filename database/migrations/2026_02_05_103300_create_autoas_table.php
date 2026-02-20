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
        Schema::create('autoak', function (Blueprint $table) {
            $table->id();
            $table->string('matrikula')->unique();
            $table->string('marka');
            $table->string('modeloa');
            $table->integer('urtea');
            $table->foreignId('erabiltzaile_id')->nullable()->constrained('erabiltzaileak')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('autoak');
    }
};
