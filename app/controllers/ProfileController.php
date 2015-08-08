<?php

class ProfileController extends BaseController{
    
    public function getIndex(){
        
        $u = Session::get('usuario');
        $p = Session::get('password');
        
        $user = Persona::where('usuario', $u)->first();
        
        $completo = $user->nombre;
        $completo = $completo." ";
        $completo = $completo.$user->apellidos;     
        
        if(Hash::check($p, $user->password)){
            $est = Estudiante::where('id', $user->id)->first();
            $doc = Docente::where('id', $user->id)->first();
            $adm = Administrador::where('id', $user->id)->first();
            
            $tipo = 'X';
            
            if(is_object($est)){
                $tipo = 'Estudiante';                      
            } else if(is_object($doc)){
                $tipo = 'Docente';    
            } else if(is_object($adm)){
                $tipo = 'Administrador';    
            }
            
            return View::make('layouts.master')
                ->with('nombre',$completo)
                ->with('tipo',$tipo);
        }
    }
}
