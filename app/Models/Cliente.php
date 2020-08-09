<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';

    protected $fillable = [
        'apellidos', 'nombres', 'identificacion', 'direccion', 'telefono', 
         'estado'
    ];


    public function prestamos()
    {
        return $this->hasMany('App\Models\Prestamo');
    }
    

   
 
}
