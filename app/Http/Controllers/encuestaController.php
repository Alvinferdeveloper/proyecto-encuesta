<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Encuestados;
use App\Models\Posibles_respuestas;
use App\Models\Preguntas;
use App\Models\Respuestas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use stdClass;

class encuestaController extends Controller
{
    //

    public function encuestaPage(){
        $preguntas = Preguntas::with('posibles_respuestas')->get('*');
        if(Auth::user()->role == 'ADMIN'){
            return redirect()->intended('dashboard');
        }

        if(Respuestas::where('encuestado_id', Auth::user()->id)->first() != null){
            return View('encuesta')->with('estado','HECHA')->with('usuarioId', Auth::user()->id);
        }
        return View('encuesta')->with('preguntas',$preguntas)->with('estado','PENDIENTE');
    } 

    public function procesarEncuesta(Request $request){
        $preguntas = Preguntas::all();
        $user = Auth::user();
        foreach($preguntas as $pregunta){
            $respuestaDoc = null;
            $posible_respuesta_id = null;
            $posibleRespuesta = Posibles_respuestas::where('id', $request->input('pregunta'.$pregunta->id))->first();
            if($posibleRespuesta) {
                $respuestaDoc = $posibleRespuesta->posible_respuesta;
                $posible_respuesta_id = $posibleRespuesta->id;
            }
            else $respuestaDoc = $request->input('pregunta'.$pregunta->id);
            Respuestas::create([
                'encuestado_id' => $user->id,
                'pregunta_id' => $pregunta->id,
                'respuesta' => $respuestaDoc,
                'posible_respuesta_id' => $posible_respuesta_id
            ]);
        }

        return redirect()->intended('encuesta');
    }

    public function dashboard(){
        $user = Auth::user();
        if($user == null){
            return redirect()->intended('login');
        }
        if($user->role != 'ADMIN'){
            return redirect()->intended('encuesta');
        }
        $preguntas = Preguntas::all();
        
        return view('dashboard')->with('preguntas', $preguntas)->with('user', $user);
    }

    public function preguntaEstadistica($id){
        $porcentajes = [];
        $pregunta = Preguntas::with('respuestas')->where('id', $id)->get("*")->first();
       
        $cantidadRespuestas = count($pregunta->respuestas);

        
       $posibleRespuestas =  Posibles_respuestas::where('pregunta_id', $id)->get("*");

       foreach($posibleRespuestas as $posibleRespuesta){
        $opcionCantidadRespuesta = Respuestas::where('posible_respuesta_id', $posibleRespuesta->id)->count();
        $porcentajes[$posibleRespuesta->id] =($cantidadRespuestas == 0) ? 0: ($opcionCantidadRespuesta/$cantidadRespuestas) * 100;
       }

       $labels = array();
       foreach ($posibleRespuestas as $posibleRespuesta){
        $labels[] = $posibleRespuesta->posible_respuesta;
       }
       
     
        return view('pregunta')->with('pregunta', $pregunta)->with('porcentajes', $porcentajes)->with('posiblesRespuestas',$posibleRespuestas)->with('cantidadRespuestas', $cantidadRespuestas)->with('labels',$labels);
    }

    public function respuestaUsuario($id){
        $encuestado = Encuestados::with(['respuestas.pregunta','facultad'])->where('id', $id)->first();
        return view('respuestaUsuario')->with('encuestado', $encuestado);
    }

    public function usuariosEncuestados(){
        $usuarios = Encuestados::all();
        $usuariosEncuestados = array();
        foreach($usuarios as $usuario){
            if(Respuestas::where('encuestado_id', $usuario->id)->first()){
                $usuariosEncuestados[] = $usuario;
            }
        }

        return view('usuariosEncuestados')->with('usuarios', $usuariosEncuestados);
    }

    public function eliminarRespuesta($id){
        if(Auth::user()->role != 'ADMIN') return redirect()->intended('encuesta');
        Respuestas::where('encuestado_id', $id)->delete();
        return redirect()->back();
    }
}
