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
        Schema::create('hemograma_completo', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);

            // Relación muchos a uno con CategoriaHemogramaCompleto
            $table->foreignId('idCategoriaHemogramaCompleto')
                ->constrained('categoria_hemograma_completo')
                ->cascadeOnDelete();

            // Relación muchos a uno con Unidad
            $table->foreignId('idUnidad')
                ->constrained('unidades')
                ->cascadeOnDelete();

            // Relación muchos a uno con TipoAnalisis
            $table->foreignId('idTipoAnalisis')
                ->constrained('tipo_analisis')
                ->cascadeOnDelete();

            $table->string('referencia', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hemograma_completo');
    }
};
