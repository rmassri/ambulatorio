<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class usuarioController extends Controller
{


	public function  create(){
		//var_dump("aquiii"); die();
		return view('userGroup.usuario');
	}
    //
}
