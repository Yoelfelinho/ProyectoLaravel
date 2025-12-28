<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table = 'proveedor';
    protected $primaryKey = 'No_documento';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'No_documento',
        'cod_tipo_documento',
        'Nombre',
        'Apellido',
        'nombre_comercial',
        'direccion',
        'cod_ciudad',
        'Telefono'
    ];

    // Para rutas
    public function getRouteKeyName()
    {
        return 'No_documento';
    }

    public function ciudad()
    {
        return $this->belongsTo(Ciudad::class, 'cod_ciudad', 'Codigo_ciudad');
    }

    public function tipodocumento()
    {
        return $this->belongsTo(TipoDocumento::class, 'cod_tipo_documento', 'id_tipo_documento');
    }
}
