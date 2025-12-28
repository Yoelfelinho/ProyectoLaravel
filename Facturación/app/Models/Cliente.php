<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'cliente';
    protected $primaryKey = 'documento';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'documento',
        'cod_tipo_documento',
        'nombres',
        'apellidos',
        'direccion',
        'cod_ciudad',
        'telefono'
    ];

    // Relación con Ciudad
    public function ciudad()
    {
        return $this->belongsTo(Ciudad::class, 'cod_ciudad', 'codigo_ciudad');
    }

    // Relación con TipoDocumento
    public function tipoDocumento()
    {
        return $this->belongsTo(TipoDocumento::class, 'cod_tipo_documento', 'id_tipo_documento');
    }
}
