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
            $table->string('plaka');   // Matrikula
            $table->string('beraz');   // Marka (zure ariketak "Beraz" dio, baina "Marka" litzateke logikoena)
            $table->string('modeloa');
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
