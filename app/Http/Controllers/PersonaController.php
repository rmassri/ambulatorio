<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Persona;
use App\User;

class PersonaController extends Controller
{
		public function index($id){
			$vaiable=['nombre'=>'Richard','apellido'=>'Massri'];
			//dd($vaiable); die();
			return view('persona.view',['vaiable'=>$vaiable]);
		}

		public function create(){
			return view('persona.crear_persona');
		}
}
