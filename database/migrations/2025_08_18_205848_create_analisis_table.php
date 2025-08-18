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
        Schema::create('analisis', function (Blueprint $table) {
            $table->id();

            // Relaciones muchos a uno
            $table->foreignId('idCliente')
                  ->constrained('clientes')
                  ->cascadeOnDelete();

            $table->foreignId('idDoctor')
                  ->constrained('doctores')
                  ->cascadeOnDelete();

            $table->foreignId('idTipoAnalisis')
                  ->constrained('tipo_analisis')
                  ->cascadeOnDelete();

            $table->foreignId('idTipoMetodo')
                  ->constrained('tipo_metodos')
                  ->cascadeOnDelete();

            $table->foreignId('idTipoMuestra')
                  ->constrained('tipo_muestras')
                  ->cascadeOnDelete();

            $table->foreignId('idUsuarioCreacion')
                  ->constrained('users') // apunta a la tabla default de User
                  ->cascadeOnDelete();

            $table->text('nota')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('analisis');
    }
};
