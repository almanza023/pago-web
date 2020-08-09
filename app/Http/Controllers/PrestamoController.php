<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Empleado;
use App\Models\FormaPago;
use App\Models\Prestamo;
use App\Models\Cuota;
use App\Models\Pago;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PrestamoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prestamos=Prestamo::all();       
        

        if (request()->ajax()) {
            $prestamos=Prestamo::all();

            /*si los campos estan vacios mostrar mj de error, sino retornar vista. */
            if (count($prestamos) == 0) {
                return response()->json(['warning' => 'Error en el servidor']);
            } else {
                return response()->view('tablas.tb-prestamos', compact('prestamos'));
            }
        }
        return view('prestamos.index', compact('prestamos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $formas=FormaPago::where('estado', '1')->get();
        $clientes=Cliente::where('estado', '1')->get();
        return view('prestamos.create', compact('formas', 'clientes'));
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
            $prestamo->empleado_id=$empleado_id;
            $prestamo->forma_pago_id=$request->forma_pago_id;
            $prestamo->fecha=$request->fecha;
            $prestamo->monto=$request->monto;
            $prestamo->interes=$request->interes;
            $prestamo->numero_cuotas=$request->numero_cuotas;
            $prestamo->valor_cuotas=$request->valor_cuotas;
            $prestamo->ganancia=$request->v_entrega;
            $prestamo->total=$request->monto_total;
            $prestamo->save();

          
            //Creacion de Cronograma de cuotas
            for ($i=0; $i <$request->numero_cuotas; $i++) { 
            $fecha=date("Y-m-d",strtotime($request->fecha."+".$i." days"));
            $cuota=new Cuota();
            $cuota->prestamo_id=$prestamo->id;
            $cuota->numero=$i+1;
            $cuota->fecha=$fecha;
            $cuota->valor=$request->valor_cuotas;
            $cuota->save();
            }

            //Registrar Adelanto   
            if($request->descontar==1){               
            $pago = new Pago();
            $pago->prestamo_id=$prestamo->id;
            $pago->empleado_id=$empleado_id;
            $pago->valor=$request->v_descuento;
            $pago->fecha=$request->fecha;
            $pago->adelanto=$request->descontar;
            $pago->save();
            }



           
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
        $cuotas=Cuota::where('prestamo_id', $id)->get();
        $estado=Prestamo::estado($id);
        return response()->view('ajax.detalles-cuotas', compact('cuotas', 'estado'));
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
        DB::beginTransaction();
        try {
            Pago::where('prestamo_id', $id)->delete();
            Cuota::where('prestamo_id', $id)->delete();
            Prestamo::where('id', $id)->delete();
            return response()->json(['success' => 'DATOS ELIMINADOS EXITO!']);
        } catch (\Exception $ex) {
            DB::rollback();
            return response()->json(['warning' => $ex->getMessage()]);
     }   

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
