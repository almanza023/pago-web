<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    protected $table = 'prestamos';

    protected $fillable = [
        'cliente_id', 'empleado_id', 'forma_pago_id', 'fecha', 'monto', 
        'interes', 'numero_cuotas','valor_cuotas', 'ganancia', 'total',    'estado'
    ];
}
