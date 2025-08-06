<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class PermisoPerfilAdminSeeder extends Seeder
{
    public function run(): void
    {
        $existe = DB::table('perfil_permiso')
            ->where('permiso_id', 1)
            ->where('perfil_id', 1)
            ->exists();

        if (!$existe) {
            DB::table('perfil_permiso')->insert([
                'permiso_id' => 1,
                'perfil_id' => 1,
            ]);
        }
    }
}
