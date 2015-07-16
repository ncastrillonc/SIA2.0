<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AdministradorController
 *
 * @author Camilo
 */
class AdministradorController extends BaseController{
    public function getAsignarCitacion($id=null){
        /*$estudiante = [
            'identificacion'=>'1152203887',
            'nombre'=>'Camilo',
            'apellidos'=>'Taborda',
            'usuario'=>'ctabordaz',
            'contrasena'=>'123',
            'carrera'=>'sistemas'
        ];
        Estudiante::insert($estudiante);
         * 
         */
        if($id){
            $estudiante = Estudiante::where('identificacion',$id)->get();
            return View::make('administrador.asignarcita')->with('estudiante',$estudiante[0]);
        }else{
        $estudiantes = Estudiante::whereNull('citacion')->get();
        return View::make('administrador.index')
                ->with('estudiantes',$estudiantes);
        }
    }
    
    Public function postAsignarCitacion(){
        
        $rule = [
            'fecha_submit'=>'required|date_format:Y/m/d|after:tomorrow',
            'time' => 'required|date_format:H:i',
            'duracion'=>'required|numeric',
            'identificacion'=>'required|exists:estudiante'
            
        ];
        
        $messages = [
            'fecha_submit.required'=>'La fecha es obligatoria',
            'fecha_submit.date_format'=>'La fecha es incorrecta',
            'fecha_submit.after' => 'La fecha tiene que ser despues de mañana',
            'time.required'=>'La hora es obligatoria',
            'time.date_format'=>'El formato de hora es incorrecto',
            'duracion.required'=>'La duración es obligatoria',
            'duracion.numeric'=>'La duración debe ser numerica',
            
        ];
        
        $validator = Validator::make(Input::all(),$rule,$messages);
        
        if($validator->passes()){
            $citacion = [
                'fecha' => Input::get('fecha_submit'),
                'horaIncio'=>Input::get('time'),
                'duracion'=>Input::get('duracion')
            ];
            
           $id = Citacion::insertGetId($citacion);
           
             Estudiante::where('identificacion',Input::get('identificacion'))->update(['citacion'=>$id]);
           ;
            
        }else{
            return Redirect::back()->withInput()->withErrors($validator);
        }
    }
   
}
