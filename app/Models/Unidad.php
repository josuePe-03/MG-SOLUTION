<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unidad extends Model
{
    protected $table = 'unidades'; // o 'unidades' si así se llama tu tabla real

    protected $fillable = ['nombre', 'fechaCreacion', 'fechaActualizacion'];

    public $timestamps = false; // porque tú gestionas manualmente las fechas
}