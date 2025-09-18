<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('producto', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique();
            $table->text('descripcion')->nullable();
            $table->decimal('precio', 10, 2);
            $table->integer('stock')->default(0);
            $table->string('path')->nullable(); // ruta de la imagen

            // Relaciones
            $table->foreignId('categoria_producto_id')
                  ->constrained('categorias_producto')
                  ->onDelete('cascade'); // si borras la categoría, se eliminan producto

            $table->foreignId('marca_producto_id')
                  ->nullable()
                  ->constrained('marcas_producto')
                  ->onDelete('set null'); // si borras la marca, el producto queda sin marca

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('producto');
    }
};
