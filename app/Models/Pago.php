<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    protected $table = 'pagos';

    protected $fillable = [
        'prestamo_id', 'empleado_id', 'fecha', 'valor', 'adelantado',
         'estado'
    ];
}
