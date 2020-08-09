<?php

namespace App\Http\Controllers;


use App\Models\Empleado;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleados=User::all();       
        

        if (request()->ajax()) {
            $empleados=User::all();

            /*si los campos estan vacios mostrar mj de error, sino retornar vista. */
            if (count($empleados) == 0) {
                return response()->json(['warning' => 'Error en el servidor']);
            } else {
                return response()->view('tablas.tb-usuarios', compact('empleados'));
            }
        }
        return view('usuarios.index', compact('empleados'));
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
    
       $user= new User();
       $user->nombres=$request->nombres;
       $user->apellidos=$request->apellidos;
       $user->identificacion=$request->identificacion;
       $user->direccion=$request->direccion;
       $user->telefono=$request->telefono;
       $user->email=$request->email;
       $user->password=Hash::make($request->password);
       $user->save();
        if($user){
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
            $exito=User::findOrFail($request->id)->update($request->all());
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
        $emppleado = User::findOrFail($id);

        if ($emppleado->estado==1) {
            $emppleado->update(['estado' => 0]);
        } else {
            $emppleado->update(['estado' => 1]);
        }
        return response()->json(['success' => 'ESTADO  ACTUALIZADO CON EXITO!']);
    }
}
