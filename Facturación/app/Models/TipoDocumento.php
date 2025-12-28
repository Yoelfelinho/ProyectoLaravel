<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model
{
    // ✅ NOMBRE REAL DE LA TABLA EN MYSQL
    protected $table = 'tipo_de_documento';

    protected $primaryKey = 'id_tipo_documento';

    public $timestamps = false;

    protected $fillable = [
        'Descripcion' // ⚠️ respeta mayúsculas si así está en la BD
    ];
}
