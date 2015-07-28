<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SolicitudController
 *
 * @author Andres Bedoya
 */
class SolicitudController extends BaseController{
    
    public function postCrear(){
        $solicitud = [
            'usuario' => 'Nombre profesor',
            'email' => 'email@email.com',
            'codigo_curso' => Input::get('codigo_curso'),
            'nombre_curso' => Input::get('nombre_curso'),
            'horario_curso' => Input::get('horario_curso'),
            'descripcion' => Input::get('descripcion'),
            'salon' => Input::get('salon'),
            'capacidad_salon' => Input::get('capacidad_salon'),
            'creditos_curso' => Input::get('creditos_curso'),
            'tipologia_curso' => Input::get('tipologia_curso')           
        ];
        
        DB::table('solicitud')->insert($solicitud);
        
        return Redirect::to("/solicitud/crear");
        
        
    }
    public function getCrear(){
        return View::make('profesor.solicitud');
    }

}
    