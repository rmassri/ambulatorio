<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::get('/', function () {
        return view('welcome');
    });
    /*Route::get('persona	/{nombre}', function($nombre){
   echo "El nombre que has introducido es:". $nombre;
    });*/
    /*Route::group(['prefix' => 'persona'],function(){
	Route::get	('view/{nombre?}',function($nombre="vacio"){
	echo "El nombre que usted ha introducido es:". $nombre;
});
});*/


   /* Route::group(['prefix' => 'persona'],function(){
	Route::get('view/{id}',[
       'uses'=>'personaController@index',
       'as' =>'personaView'
		]);
});*/

  Route::group(['prefix' => 'admin'],function(){
    Route::resource('persona', 'PersonaController');
});

  Route::group(['prefix' => 'admin'],function(){
    Route::resource('usuario', 'usuarioController');
});


  //login de usuario
  Route::group(['prefix' => 'login'],function(){
  Route::get('main',[
       'uses'=>'loginController@index',
       //'uses'=>'loginController@consulta',
       'as' =>'loginMain'
    ]);
    Route::post('principal',[
       'uses'=>'loginController@postConsulta',
       //'uses'=>'loginController@consulta',
       'as' =>'consultaLogin'
    ]);
});

    });