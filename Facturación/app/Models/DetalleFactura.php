<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Articulo;

class DetalleFactura extends Model
{
    protected $table = 'detalle_factura';
    public $timestamps = false;

    protected $fillable = [
        'cod_factura',   // CORRECTO
        'cod_articulo',
        'cantidad',
        'total'
    ];

    public function articulo()
    {
        return $this->belongsTo(Articulo::class, 'cod_articulo', 'cod_articulo');
    }
}
