<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Analisis extends Model
{
    use HasFactory;

    protected $table = 'analisis';

    protected $fillable = [
        'idCliente',
        'idDoctor',
        'idTipoAnalisis',
        'idTipoMetodo',
        'idTipoMuestra',
        'idUsuarioCreacion',
        'nota',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'idCliente');
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'idDoctor');
    }

    public function tipoAnalisis()
    {
        return $this->belongsTo(TipoAnalisis::class, 'idTipoAnalisis');
    }

    public function tipoMetodo()
    {
        return $this->belongsTo(TipoMetodo::class, 'idTipoMetodo');
    }

    public function tipoMuestra()
    {
        return $this->belongsTo(TipoMuestra::class, 'idTipoMuestra');
    }

    public function usuarioCreacion()
    {
        return $this->belongsTo(User::class, 'idUsuarioCreacion');
    }
}
