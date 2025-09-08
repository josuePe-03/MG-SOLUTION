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
        Schema::create('analisis_hemograma', function (Blueprint $table) {
            $table->id();

            $table->foreignId('idAnalisis')
                ->constrained('analisis')
                ->cascadeOnDelete();

            $table->foreignId('idHemograma')
                ->constrained('hemograma_completo')
                ->cascadeOnDelete();

            $table->string('resultado', 100)->nullable();

            $table->timestamps();

            // Evita duplicados del mismo hemograma dentro del mismo análisis
            $table->unique(['idAnalisis', 'idHemograma']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('analisis_hemograma');
    }
};
