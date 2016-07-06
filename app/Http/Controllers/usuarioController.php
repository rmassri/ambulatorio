<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Movie as Movie;

class usuarioController extends Controller
{


	public function  create(Request $request){
		return view('userGroup.usuario');
	}

	public function store(Request $request){
		//$resultado=json_decode($request->input('form'),true);
		//var_dump($resultado); die();
		/*response()->json(["mensaje" => "El usuario es incorrecto",
                    "resultado" => false,
                    "statusCode" => "USUARIO_INCORRECTO"]);*/
		//var_dump($request->input('usuario');); die();
    /*$movie = new Movie;
    $movie->name = $request->name;
    $movie->description = $request->description;
    $movie->save();
    return redirect('movie');
	var_dump("aquii"); die();*/
	}
    //
}
