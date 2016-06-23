<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class loginController extends Controller
{
	public function index(){
		//dd("aqui estamos");die();
		return view('layaut.login');
	}
	public function postConsulta(Request $request){
		//dd("aqui"); die();
		$usuario_set="richard";
		$clave_set="1234";
		    $usuario = $request->input('usuario');
            //$usuario = Input::get('usuario');
            $clave = $request->get('clave');
            if ((is_null($usuario) || empty($usuario)) || (is_null($clave) || empty($clave))){
            	return response()->json(["mensaje" => "Los campos: usuario y clave son requeridos",
                    "resultado" => false,
                    "statusCode" => "ERROR_CAMPOS_VACIOS"]);
            }elseif($usuario_set!=$usuario and $clave_set!=$clave){
 	         return response()->json(["mensaje" => "El usuario y la clave son incorrecta",
                    "resultado" => false,
                    "statusCode" => "USUARIO_CLAVE_INCORRECTA"]);
                $response = [];
                return Response::json($response);
            }elseif($usuario_set!=$usuario){
            	return response()->json(["mensaje" => "El usuario es incorrecto",
                    "resultado" => false,
                    "statusCode" => "USUARIO_INCORRECTO"]);
                $response = [];
                return Response::json($response);
            }elseif($clave_set!=$clave){
return response()->json(["mensaje" => "La clave es incorrecta",
                    "resultado" => false,
                    "statusCode" => "CLAVE_INCORRECTA"]);
                $response = [];
                return Response::json($response);
            }else{
                   return response()->json(["mensaje" => "El usuario se ha logeado de forma correcta",
                    "resultado" => false,
                    "statusCode" => "LOGEO_EXITOSO"]);
                $response = [];
         //return redirect('login/main');

                return Response::json($response);
            }

    }
	}
