<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permiso;

class PermisoDefaultSeeder extends Seeder
{
    public function run(): void
    {
        if (!Permiso::where('nombre', 'Administrador')->exists()) {
            Permiso::create([
                'nombre' => 'Administrador',
                'descripcion' => 'Permiso del sistema',
            ]);
        }
    }
}
