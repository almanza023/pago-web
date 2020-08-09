<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gasto extends Model
{
    protected $table = 'gastos';

    protected $fillable = [
        'empleado_id', 'concepto', 'fecha', 'valor', 'ruta', 
         'estado'
    ];
}
