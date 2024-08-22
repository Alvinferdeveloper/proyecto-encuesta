<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Encuestados;
use App\Models\Facultades;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class authController extends Controller
{
    //
    public function registerPage(){
        $facultades = Facultades::all();
        return View('register')->with('facultades', $facultades);
    }

    public function loginPage(){
        return View('login');
    } 

    public function login(Request $request){
        if (Auth::attempt([
            'correo' => $request->input('email'),
            'password' => $request->input('password'),
        ])) {
            $request->session()->regenerate();
            if(Auth::user()->role == 'USER')
            return redirect()->intended('encuesta');
            else
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas no son correctas.',
        ]);
    }

    public function register(Request $request){
        $nombre = $request->input('nombre');
        $apellido = $request->input('apellido');
        $sexo = $request->input('sexo');
        $carnet = $request->input('carnet');
        $email = $request->input('email');
        $password = $request->input('password');
        $facultad = $request->input('facultad');
        $carrera = $request->input('carrera');
        $anio = $request->input('anio');

        $userExist = Encuestados::where('carnet', $carnet)->first();

        if($userExist != null){
            return redirect()->back()->with('userExist', 'El usuario con este carnet ya existe');
        }
        $userExist = Encuestados::where('correo',$email)->first();
        if($userExist){
            return redirect()->back()->with('userExist', 'El usuario con este correo ya existe');
        }
            $user = Encuestados::create([
                'nombres' => $nombre,
                'apellidos' => $apellido,
                'sexo' => $sexo,
                'carnet' => $carnet,
                'correo' => $email,
                'contrasena' => Hash::make($password),
                'facultad_id' => $facultad,
                'carrera' => $carrera,
                'anio' => $anio,
                'role'=>'USER',
            ]);


            Auth::login($user);

            // Regenerar la sesión para evitar secuestro de sesión
            $request->session()->regenerate();
    

            return redirect()->action([ encuestaController::class,'encuestaPage']);
    }

   

    public function logOut(){
        Auth::logout();
        return redirect()->intended('login');


    }
}
