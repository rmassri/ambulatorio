<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Movie as Movie;

class usuarioController extends Controller
{


	public function  create(){
		return view('userGroup.usuario');
	}

	public function store(){
  $movie = new Movie;
    $movie->name = $request->name;
    $movie->description = $request->description;
    $movie->save();
    return redirect('movie');
	var_dump("aquii"); die();
	}
    //
}
