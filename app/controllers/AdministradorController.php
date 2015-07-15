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
   
}
