<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cuota extends Model
{
    protected $table = 'cuotas';

    protected $fillable = [
        'prestamo_id', 'numero', 'fecha', 'valor', 
         'estado'
    ];
}
