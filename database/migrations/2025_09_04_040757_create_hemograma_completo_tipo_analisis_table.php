<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('hemograma_completo_tipo_analisis', function (Blueprint $table) {
            $table->id();

            // Columnas y llaves foráneas
            $table->foreignId('hemograma_completo_id')
                  ->constrained('hemograma_completo')
                  ->cascadeOnDelete();

            $table->foreignId('tipo_analisis_id')
                  ->constrained('tipo_analisis')
                  ->cascadeOnDelete();

            $table->timestamps();

            // Índice único para evitar duplicados
            $table->unique(['hemograma_completo_id', 'tipo_analisis_id'], 'hc_tipo_unique');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hemograma_completo_tipo_analisis');
    }
};
