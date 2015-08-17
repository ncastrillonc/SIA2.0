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
           $docente = Auth::user()->id
                
        ];
        
        DB::table('solicitud')->insert($solicitud);
        
        
    }
    public function getCrear(){
        
        $curso = Curso::all();
        
        return View::make('profesor.solicitud')
                ->with("cursos", $curso);
    }
    
    public function postCurso(){
        
        $curso = Curso::where('codigo',Input::get('codigo'))->first();
       
        $data =  [
            'nombre' =>  $curso->nombre            
        ];
        
        return Response::json($data);  
    }

}
    