<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Movie as Movie;

class usuarioController extends Controller
{


	public function  create(Request $request){
		//dd($request['json']); die();
		return view('userGroup.usuario');
	}

	public function store(Request $request){
		//$error[]='';
		$request = json_decode(file_get_contents('php://input'), true);
		$nombre=isset($request['form']['nombre'])?$request['form']['nombre']:'';
		$cedula=isset($request['form']['cedula'])?$request['form']['cedula']:'';
		$apellido=isset($request['form']['apellido'])?$request['form']['apellido']:'';
		$telefono_celular=isset($request['form']['telefono_celular'])?$request['form']['telefono_celular']:'';
		$telefono_fijo=isset($request['form']['telefono_fijo'])?$request['form']['telefono_fijo']:'';
		$estado=isset($request['form']['estado'])?$request['form']['estado']:'';
		$email=isset($request['form']['correo'])?$request['form']['correo']:'';
		$grupo=isset($request['form']['grupo'])?$request['form']['grupo']:'';
		$usuario=isset($request['form']['usuario'])?$request['form']['usuario']:'';
		$clave=isset($request['form']['clave'])?$request['form']['clave']:'';
		$repetir_clave=isset($request['form']['repetir_clave'])?$request['form']['repetir_clave']:'';
		$estatus=isset($request['form']['estatus'])?$request['form']['estatus']:'';
		if($nombre==''){
			$error['name']="El nombre no debe ser vacio";
		}else if(preg_match("/^[a-zA-Z ]*$/",$nombre)==false){
			$error['name']="El nombre debe contener solo letras";
		}elseif(strlen($nombre)<=3){
			$error['name']="El nombre debe contener al menos 4 letras";
		}
		if($apellido==''){
			$error['apellido']="El apellido no debe ser vacio";
		}elseif(preg_match("/^[a-zA-Z ]*$/",$apellido)==false){
			$error['apellido']="El apellido debe contener solo letras";
		}elseif(strlen($apellido)<=3){
			$error['apellido']="El apellido debe contener al menos 4 letras";
		}
		
		if($email==''){
			$error['correo']="El email no debe ser vacio";
		}elseif(preg_match("/^([a-zA-Z0-9_\.\-]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/",$email)==false){
		$error['correo']="Debe ingresar un correo valido";
		}
		if($clave==''){
			$error['clave']="La clave no debe ser vacia";
		}
		if($repetir_clave==''){
			$error['repetir_clave']="La clave repetida no debe ser vacia";
		}
		if($clave!==$repetir_clave){
			$error['repetir_clave']="Las claves no coinciden";
		}
		if($cedula==''){
			$error['cedula']="La cédula no debe ser vacia";
		}elseif(preg_match("/^[a-zA-Z ]*$/",$cedula)==true){
			$error['cedula']="La cedula debe contener solo numeros";
		}
		if($usuario==''){
			$error['usuario']="El usuario no debe ser vacio";
		}
		if($grupo==''){
			$error['grupo']="El grupo no debe ser vacio";
		}
		if($estado==''){
			$error['estado']="El estado no debe ser vacio";
		}
		if($estatus==''){
			$error['estatus']="El estatus no debe ser vacio";
		}
		if($telefono_celular==''){
			$error['telefono_celular']="El telefono celular no debe ser vacio";
		}
		if($telefono_fijo==''){
			$error['telefono_fijo']="El telefono fijo no debe ser vacio";
		}

      	if(isset($error)){
      		$error=$error;
      		$statusCode['mensaje']=false;
      		//$statusCode['exito']="error";
      	}else{
      		$statusCode['mensaje']="El registro se ha guardado de forma exitosa";
      		$error=false;
      		
      	}
      	return response()->json(['error'=>$error,'statusCode'=>$statusCode]);
      	
	}
    //
}
