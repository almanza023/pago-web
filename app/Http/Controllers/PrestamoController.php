<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Empleado;
use App\Models\FormaPago;
use App\Models\Prestamo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laravel\Ui\Presets\Preset;

class PrestamoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes=Cliente::where('estado', '1')->get();
        
        return view('prestamos.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $formas=FormaPago::where('estado', '1')->get();
        return view('prestamos.create', compact('formas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        DB::beginTransaction();
        try {
            //Creacion del Cliente
            $cliente= new Cliente();
            $cliente->nombres=$request->nombres;
            $cliente->apellidos=$request->apellidos;
            $cliente->identificacion=$request->identificacion;
            $cliente->direccion=$request->direccion;
            $cliente->telefono=$request->telefono;
            $cliente->save();

            //Creacion de Prestamo
            $prestamo= new Prestamo();
            $prestamo->cliente_id=$cliente->id;
            $prestamo->empleado_id=1;
            $prestamo->forma_pago_id=$request->forma_pago_id;
            $prestamo->fecha=$request->fecha;
            $prestamo->monto=$request->monto;
            $prestamo->interes=$request->interes;
            $prestamo->numero_cuotas=$request->numero_cuotas;
            $prestamo->valor_cuotas=$request->valor_cuotas;
            $prestamo->ganancia=$request->v_entrega;
            $prestamo->total=$request->monto_total;
            $prestamo->save();
            DB::commit();
            return response()->json(['success' => 'DATOS REGISTRADOS EXTIOSAMENTE.']);
        } catch (\Exception $ex) {
            DB::rollback();
            return response()->json(['warning' => $ex->getMessage()]);
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
        //
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
            $exito=Empleado::findOrFail($request->id)->update($request->all());
            if($exito){
                return response()->json(['success' => 'DATOS ACTUALIZADOS CORRECTAMENTE']);
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
        $emppleado = Empleado::findOrFail($id);

        if ($emppleado->estado==1) {
            $emppleado->update(['estado' => 0]);
        } else {
            $emppleado->update(['estado' => 1]);
        }
        return response()->json(['success' => 'ESTADO  ACTUALIZADO CON EXITO!']);
    }
}
