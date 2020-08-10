<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LiquidacionDia extends Model
{
    protected $table = 'liquidacion_dias';

    protected $fillable = [
        'user_id', 'base', 'pagos', 'prestamos', 'interes', 'gastos', 'ingresos', 'egresos', 'total', 'fecha',
         'estado' ];
    
         public function user()
         {
             return $this->belongsTo('App\User');
         }
}
