<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Prestamo extends Model
{
    protected $table = 'prestamos';

    protected $fillable = [
        'cliente_id', 'empleado_id', 'forma_pago_id', 'fecha', 'monto', 
        'interes', 'numero_cuotas','valor_cuotas', 'ganancia', 'total',    'estado'
    ];

    
    
    public function cliente()
    {
        return $this->belongsTo('App\Models\Cliente');
    }

    public function forma_pago()
    {
        return $this->belongsTo('App\Models\FormaPago');
    }
    
    public function pagos()
    {
        return $this->hasMany('App\Models\Pago');
    }

    public static function estado($id){
        return DB::select("SELECT pre.id, pre.total, SUM(p.valor) AS abonos,  (pre.total - SUM(p.valor)) AS restante FROM pagos p 
        INNER JOIN prestamos pre ON p.prestamo_id=pre.id
        WHERE pre.id=?", [$id]);
    }
    
}
