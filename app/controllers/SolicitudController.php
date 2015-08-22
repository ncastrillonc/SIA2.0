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
           'docente' => Auth::user()->id,
            'curso' => Input::get('curso')
                
        ];
        
        DB::table('solicitud')->insert($solicitud);
        return Redirect::to('/solicitud/crear');
        
        
        
    }
    public function getCrear(){
        
        $curso = Curso::all();
        
        return View::make('profesor.solicitud')
                ->with("cursos", $curso);
    }
    
    public function postCurso(){
        
        $curso = Curso::where('codigo',Input::get('curso'))->first();
       
        $data =  [
            'codigo' => $curso->codigo,
            'nombre' =>  $curso->nombre,
            'descripcion' => $curso->descripcion,
            'tipologia' => $curso->tipologia,
            'creditos' => $curso->creditos
        ];
        
        
        //var_dump($curso);
        
        return Response::json($data);
        
        
    }

}
    