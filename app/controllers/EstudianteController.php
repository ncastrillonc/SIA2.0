<?php

class EstudianteController extends BaseController{
    
    public function getVerHistoria($id=null){
        
        if($id){
            $estudiante = Estudiante::where('identificacion',$id)->get();
            return View::make('estudiante.verhistoria')
                    ->with('estudiante',$estudiante[0]);
        }else{
            return View::make('estudiante.index');
        }
    }
    
    
}
