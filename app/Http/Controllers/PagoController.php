<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Pago;
use App\Models\Prestamo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prestamos=Prestamo::where('estado', '1')->get();       
        

        if (request()->ajax()) {
            $prestamos=Prestamo::where('estado', '1')->get();       


            /*si los campos estan vacios mostrar mj de error, sino retornar vista. */
            if (count($prestamos) == 0) {
                return response()->json(['warning' => 'Error en el servidor']);
            } else {
                return response()->view('tablas.tb-prestamos-activos', compact('prestamos'));
            }
        }
        return view('pagos.index', compact('prestamos'));
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
        $usuario_id=auth()->user()->id;
        $estado=Prestamo::estado($request->prestamo_id);
        if($request->liquidar==0){
            if($request->valor<=$estado[0]->restante || empty($estado[0]->restante)){
                $pago = new Pago();
                $pago->prestamo_id=$request->prestamo_id;
                $pago->user_id=$usuario_id;
                $pago->valor=$request->valor;
                $pago->fecha=$request->fecha;
                $pago->adelanto=2;
                $pago->save();

               
                 $saldo=Prestamo::estado($request->prestamo_id);

                if($saldo[0]->abonos === $saldo[0]->total){
                    Prestamo::find($request->prestamo_id)->update(['estado'=>'2']);
                    return response()->json(['success' => 'LIQUIDACION DE PRESTAMO EXITO!']);
                }

                return response()->json(['success' => 'DATOS REGISTRADOS CON EXITO!']);
               
            }else{
                return response()->json(['warning' => 'EL VALOR  INGRESADO SUPERA AL SALDO RESTANTE ']);
            }
        }else {
            if($request->valor==$estado[0]->restante){
                
        DB::beginTransaction();
        try {
                $pago = new Pago();
                $pago->prestamo_id=$request->prestamo_id;
                $pago->user_id=$usuario_id;
                $pago->valor=$request->valor;
                $pago->fecha=$request->fecha;
                $pago->adelanto=3;
                $pago->save();

                Prestamo::find($request->prestamo_id)->update(['estado'=>'2']);
                DB::commit();
                return response()->json(['success' => 'LIQUIDACION DE PRESTAMO EXITO!']);
            } catch (\Exception $ex) {
                DB::rollback();
                return response()->json(['warning' => $ex->getMessage()]);
         }   

                
            }else{
                return response()->json(['warning' => 'EL VALOR  INGRESADO DEBE SER IGUAL AL SALDO RESTANTE']);
            }
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
            $pagos=Pago::where('prestamo_id', $id)->get();
            $estado=Prestamo::estado($id);
            return response()->view('ajax.detalles-pagos', compact('pagos', 'estado'));
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
            $exito=Cliente::findOrFail($request->id)->update($request->all());
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
        $Cliente = Cliente::findOrFail($id);

        if ($Cliente->estado==1) {
            $Cliente->update(['estado' => 0]);
        } else {
            $Cliente->update(['estado' => 1]);
        }
        return response()->json(['success' => 'ESTADO  ACTUALIZADO CON EXITO!']);
    }
}
