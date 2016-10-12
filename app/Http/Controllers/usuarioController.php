<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use App\Movie as Movie;
use App\User;
use App\Estado;
use App\Grupo;

class usuarioController extends Controller
{


	public function  create(Request $request){
		//dd($request['json']); die();
		//return view('userGroup.usuario');
		return view('layaut.main');
	}

	public function listaUser(){
		$usuario=User::all();
		echo json_encode(['listado'=>$usuario],true);die();

	}

		public function  index(Request $request){
		return view('layaut.main');
	}
	public function listaCampoUser(Request $request){
		$estado = Estado::all();
		//var_dump($estado); die();
		//$grupo = DB::table('grupos')->pluck('id','nombre');
		$grupo =Grupo::all();
		echo json_encode(['estado'=>$estado,'grupo'=>$grupo],true);
		die();

	}

	public function store(Request $request){
		//$error[]='';
		$request = json_decode(file_get_contents('php://input'), true);
		$nombre=isset($request['form']['nombre'])?$request['form']['nombre']:'';
		$cedula=isset($request['form']['cedula'])?$request['form']['cedula']:'';
		$apellido=isset($request['form']['apellido'])?$request['form']['apellido']:'';
		$telefono_celular=isset($request['form']['telefono_celular'])?$request['form']['telefono_celular']:'';
		$telefono_fijo=isset($request['form']['telefono_local'])?$request['form']['telefono_local']:'';
		$estado=isset($request['form']['estado_id'])?$request['form']['estado_id']:'';
		$email=isset($request['form']['correo'])?$request['form']['correo']:'';
		$grupo=isset($request['form']['grupo_id'])?$request['form']['grupo_id']:'';
		$usuario=isset($request['form']['usuario'])?$request['form']['usuario']:'';
		$clave=isset($request['form']['password'])?$request['form']['password']:'';
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
      		//dd($request['form']); die();
      		$usuario= new User($request['form']);
      		$ip = $_SERVER['REMOTE_ADDR'];
      		$usuario->ip=$ip;
      		$usuario->created_at=date('Y-m-d');
      		$usuario->updated_at=date('Y-m-d');
      		$usuario->fecha=date('Y-m-d');
      		$usuario->save();
      		$statusCode['mensaje']="El registro se ha guardado de forma exitosa";
      		$error=false;
      		
      	}
      	return response()->json(['error'=>$error,'statusCode'=>$statusCode]);
      	
	}
    //
}
