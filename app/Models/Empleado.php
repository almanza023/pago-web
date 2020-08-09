<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table = 'empleados';

    protected $fillable = [
        'apellidos', 'nombres', 'identificacion', 'direccion', 'telefono', 
         'estado'
    ];
}
