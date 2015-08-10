<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	//return View::make('layouts.master');
       if(Auth::check()){
           return Redirect::to('/profile');
       }else{
            return View::make('login.login');
       }
});

Route::post('/loguear', function(){
    
    $us = Input::get('usuario');
    $psd = Input::get('contrasena');
    
    if(Auth::attempt(array('usuario' => $us, 'password' => $psd))){
        return Redirect::to("/profile");
                
    }else{
        echo "El usuario no está logueado";
    }
});

Route::controller('/administrador','AdministradorController');

Route::controller('/estudiante','EstudianteController');

Route::controller('/solicitud','SolicitudController');

Route::controller('/profile','ProfileController');