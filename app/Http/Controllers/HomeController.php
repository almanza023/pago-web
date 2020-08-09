<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Cuota;
use App\Models\Institucion;
use App\Models\Menu;
use App\Models\Pago;
use App\Models\Prestamo;
use App\Models\Producto;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $date = Carbon::now();
        $date = $date->format('Y-m-d');
        $clientes=Cliente::where('estado', '1')->count();
        $prestamos=Prestamo::where('estado', '1')->count();       
        $usuarios=User::count();
        $pagosDia=Pago::where('fecha', $date)->sum('valor');
        $meta=Cuota::where('fecha', $date)->sum('valor');
        return view('home', compact('clientes', 'prestamos', 'usuarios', 'usuarios', 'pagosDia', 'meta'));
        
    }
}
