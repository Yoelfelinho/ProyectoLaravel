<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Devolucion extends Model
{
    protected $table = 'devolucion';
    protected $primaryKey = 'cod_devolucion';
    public $timestamps = false;

    protected $fillable = [
        'cod_detallefactura',
        'Motivo',
        'Fecha_devolucion',
        'cantidad'
    ];

    public function detalle()
    {
        return $this->belongsTo(DetalleFactura::class, 'cod_detallefactura', 'cod_detallefactura');
    }
}
