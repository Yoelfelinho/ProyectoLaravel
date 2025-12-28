<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    protected $table = 'articulo';
    protected $primaryKey = 'id_articulo';
    public $timestamps = false;

    protected $fillable = [
        'descripcion',
        'precio_venta',
        'precio_costo',
        'stock',
        'cod_tipo_articulo',
        'cod_proveedor',
        'fecha_ingreso'
    ];

    // Relación con TipoArticulo
    public function tipo()
    {
        return $this->belongsTo(TipoArticulo::class, 'cod_tipo_articulo', 'id_tipoarticulo');
    }

    // Relación con Proveedor
    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'cod_proveedor', 'No_documento');
    }
}
