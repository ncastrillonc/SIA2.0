<?php

class EstudianteController extends BaseController{
    
    public function getVerHistoria($id=11282){
        
        if($id){
            $matriculas = Matricula::where('estudiante',$id)->get();
            
            return View::make('estudiante.verhistoria')
                    ->with('matriculas',$matriculas);
        }else{
            return View::make('estudiante.index');
            }
    }
    
    
}
