<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Factura;

class FormaDePago extends Model
{
    protected $table = 'forma_de_pago';
    protected $primaryKey = 'id_formapago';
    public $timestamps = false;

    protected $fillable = [
        'Descripcion_formapago'
    ];

    // 🔗 Relación con Factura
    public function facturas()
    {
        return $this->hasMany(
            Factura::class,
            'cod_formapago',   // FK en factura
            'id_formapago'     // PK en forma_de_pago
        );
    }
}
