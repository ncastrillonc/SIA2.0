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
    
       public function __construct() {
        $this->beforeFilter(function() {
            if (Session::get('tipo') !== 'Administrador') {
                Return Redirect::to('/');
            }
        });

        $this->beforeFilter('auth');
    }

    public function getAsignarCitacion($id=null){
        
        if($id){
            $estudiante = Estudiante::where('identificacion',$id)->get();
            if(empty($estudiante[0])){
                 return Redirect::to('/administrador/asignar-citacion');
            }else{
            return View::make('administrador.form_asignarcitacion')->with('estudiante',$estudiante[0]);
            }
        }else{
        $estudiantes = Estudiante::all();
        return View::make('administrador.asignarcitacion')
                ->with('estudiantes',$estudiantes);
        }
    }
    
    Public function postAsignarCitacion(){
        
      
    }
    
    public function getAgregarCurso(){
        $solicitudes = Solicitud::estado()->get();
        return View::make('administrador.agregarcurso')->with('solicitudes',$solicitudes);
    }
    
    public function getAgregarCitacion(){
        
        return View::make('administrador.agregarcitacion');
        
    }
    public function postAgregarCitacion(){
        
        
        $campos = Input::all();
        $campos['hora_n'] = date("H:i", strtotime(Input::get('hora')));

        $rule = [
            'fecha' => 'required|date_format:Y/m/d|after:tomorrow',
            'hora_n' => 'required|date_format:H:i',
            'duracion' => 'required|numeric'
        ];

        $messages = [
            'fecha.required' => 'La fecha es obligatoria',
            'fecha.date_format' => 'La fecha es incorrecta',
            'fecha.after' => 'La fecha tiene que ser despues de mañana',
            'hora_n' => 'La hora es obligatoria',
            'hora_n' => 'El formato de hora es incorrecto',
            'duracion.required' => 'La duración es obligatoria',
            'duracion.numeric' => 'La duración debe ser numerica',
        ];

        $validator = Validator::make($campos, $rule, $messages);

        if ($validator->passes()) {
            $citacion = [
                'fecha' => Input::get('fecha'),
                'horaInicio' => $campos['hora_n'],
                'duracion' => Input::get('duracion'),
                'administrador' => Auth::user()->id
            ];

            Citacion::insert($citacion);

            return Redirect::to('/administrador/agregar-citacion')->with('state', 'ok');
            
        } else {
            return Redirect::back()->withInput()->withErrors($validator);
        }
    }
    
    public function getPrueba(){
        return View::make('prueba')->with('a','holi');
    }

}
