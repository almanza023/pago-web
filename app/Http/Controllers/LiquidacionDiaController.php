<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\LiquidacionDia;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LiquidacionDiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::where('estado', '1')->get();
        $liquidaciones=LiquidacionDia::all( );             

        if (request()->ajax()) {
            $liquidaciones=LiquidacionDia::all();       

            /*si los campos estan vacios mostrar mj de error, sino retornar vista. */
            if (count($liquidaciones) == 0) {
                return response()->json(['warning' => 'Sin Datos en la Consulta']);
            } else {
                return response()->view('tablas.tb-liquidaciones', compact('liquidaciones'));
            }
        }
        return view('liquidaciones.index', compact('liquidaciones', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $date = Carbon::now();
        $date = $date->format('Y-m-d');
        $validar=LiquidacionDia::where('fecha', $date)->where('user_id', $request->user_id)->count();
        if($validar>0){
            return response()->json(['warning' => 'YA EXISTE UNA APERTURA DE DÍA']);
        }
    
        $liquid= new LiquidacionDia();
        $liquid->user_id=$request->user_id;
        $liquid->base=$request->base;
        $liquid->fecha=$request->fecha;
        $liquid->save();

            if($liquid){
                return response()->json(['success' => 'APERTURA DE DÍA REGISTRADA EXITOSAMENTE']);
                
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $liquidacion=LiquidacionDia::find($id);
        return response()->view('ajax.detalles-liquidacion-dia', compact('liquidacion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
        if (request()->ajax()) {
            $liquid= LiquidacionDia::find($request->id);
            $liquid->user_id=$request->user_id;
            $liquid->base=$request->base;
            $liquid->prestamos=$request->prestamos;
            $liquid->gastos=$request->gastos;
            $liquid->pagos=$request->pagos;
            $liquid->interes=$request->interes;
            $liquid->ingreso=$request->ingreso;
            $liquid->egreso=$request->egreso;
            $liquid->fecha=$request->fecha;
            $liquid->save();
            if($liquid){
                return response()->json(['success' => 'DATOS ACTUALIZADOS CORRECTAMENTE']);
            }
            
        }
    }

    public function updateBase(Request $request, $id)
    {
       
        if (request()->ajax()) {
            $liquid= LiquidacionDia::find($request->id);
            $liquid->user_id=$request->user_id;
            $liquid->base=$request->base;            
            $liquid->fecha=$request->fecha;
            $liquid->save();
            if($liquid){
                return response()->json(['success' => 'APERTURA DE DÍA ACTUALIZADA']);
            }
            
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }



    public function change($id)
    {
        $Cliente = Cliente::findOrFail($id);

        if ($Cliente->estado==1) {
            $Cliente->update(['estado' => 0]);
        } else {
            $Cliente->update(['estado' => 1]);
        }
        return response()->json(['success' => 'ESTADO  ACTUALIZADO CON EXITO!']);
    }
}
