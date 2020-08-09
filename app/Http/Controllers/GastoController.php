<?php

namespace App\Http\Controllers;

use App\Models\Gasto;
use File;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GastoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gastos=Gasto::all();       
        

        if (request()->ajax()) {
            $gastos=Gasto::all();

            /*si los campos estan vacios mostrar mj de error, sino retornar vista. */
            if (count($gastos) == 0) {
                return response()->json(['warning' => 'Error en el servidor']);
            } else {
                return response()->view('tablas.tb-gastos', compact('gastos'));
            }
        }
        return view('gastos.index', compact('gastos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
       $empleado_id=1;
       $gasto= new Gasto();
       $gasto->empleado_id=$empleado_id;
       $gasto->concepto=$request->concepto;
       $gasto->valor=$request->valor;
       $gasto->fecha=$request->fecha;
       if(!empty($request->file)){
        $exito=$this->storeFile($request, $gasto);
       }
       $exito=$gasto->save();
        if($exito){
            return response()->json(['success' => 'DATOS REGISTRADOS CON EXITO!']);
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
        if(request()->ajax()){
            $gasto=Gasto::find($id);           
            return response()->view('ajax.detalles-gasto', compact('gasto'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
            $gasto=Gasto::find($request->id);
            $gasto->concepto=$request->concepto;
            $gasto->valor=$request->valor;
            $gasto->fecha=$request->fecha;            
            $gasto->save();  
            return response()->json(['success' => 'DATOS ACTUALIZADOS CON EXITO!']);      
        }
    }

    public function storeFile($request, $gasto)
    {
        if ($request->file('file')) {
            $path= public_path() . '/evidencias';           
            $file = $request->file('file');
            $name = time() . $file->getClientOriginalName();
            $file->move($path, $name);
            $gasto->ruta = $name;
            $gasto->save();
            return $gasto;
        }
        return "";
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
        $gasto = Gasto::findOrFail($id);

        if ($gasto->estado==1) {
            $gasto->update(['estado' => 0]);
        } else {
            $gasto->update(['estado' => 1]);
        }
        return response()->json(['success' => 'ESTADO  ACTUALIZADO CON EXITO!']);
    }
}
