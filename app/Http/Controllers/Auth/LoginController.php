<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm(){
        return view('auth.login');
    }

    public function login(Request $request){
        
        $this->validateLogin($request);      
 
         if (Auth::attempt(['identificacion' => $request->usuario, 'password' => $request->password, 'estado'=>'1'])){           
           $nom=auth()->user()->nombres.' '.auth()->user()->apellidos;
             return response()->json(['success'=> $nom ]);
         }
         return response()->json(['warning'=>'Error al iniciar sesión. Intente Nuevamente']);


         
     }

     protected function validateLogin(Request $request){
        $this->validate($request,[
            'usuario' => 'required|integer|min:6',
            'password' => 'required|string'
        ]);

    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        return redirect('/');
    }

}
