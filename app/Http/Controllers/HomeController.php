<?php

namespace App\Http\Controllers;

use App\Models\Institucion;
use App\Models\Menu;
use App\Models\Producto;
use App\User;
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
        $productos=Producto::where('estado', '1')->count();
        $menus=Menu::where('estado', '1')->count();
        $instituciones=Institucion::where('estado', '1')->count();
        $usuarios=User::count();
        return view('home', compact('productos', 'instituciones', 'menus', 'usuarios'));
        
    }
}
