<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Perfil;

class PerfilDefaultSeeder extends Seeder
{
    public function run(): void
    {
        if (!Perfil::where('nombre', 'Administrador')->exists()) {
            Perfil::create([
                'nombre' => 'Administrador',
                'descripcion' => 'Perfil con todos los permisos del sistema',
            ]);
        }
    }
}
