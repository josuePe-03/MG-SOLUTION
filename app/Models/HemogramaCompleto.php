<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HemogramaCompleto extends Model
{
    use HasFactory;

    protected $table = 'hemograma_completo';

    protected $fillable = [
        'nombre',
        'idCategoriaHemogramaCompleto',
        'idUnidad',
        'idTipoAnalisis',
        'referencia',
    ];

    public function categoria()
    {
        return $this->belongsTo(CategoriaHemogramaCompleto::class, 'idCategoriaHemogramaCompleto');
    }

    public function unidad()
    {
        return $this->belongsTo(Unidad::class, 'idUnidad');
    }

    public function tipoAnalisis()
    {
        return $this->belongsTo(TipoAnalisis::class, 'idTipoAnalisis');
    }
}
