<?php

class ProfileController extends BaseController{
    
    public function getIndex(){
       
  
              
        
            $est = Estudiante::where('id', Auth::user()->id)->first();
            $doc = Docente::where('id', Auth::user()->id)->first();
            $adm = Administrador::where('id', Auth::user()->id)->first();
            
            $tipo = 'X';
            
            if(is_object($est)){
                $tipo = 'Estudiante';                      
            } else if(is_object($doc)){
                $tipo = 'Docente';    
            } else if(is_object($adm)){
                $tipo = 'Administrador';    
            }
            
            Session::put('tipo',$tipo) ;
            
            return View::make('layouts.master');
    }
}
