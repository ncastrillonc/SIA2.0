<?php

class EstudianteController extends BaseController{
    
    public function getVerHistoria($id=11282){
        
        if($id){
            $periodos = Matricula::where('estudiante',$id)->lists('periodo');
            $periodos = array_unique($periodos);
            sort($periodos);
            
            $semestres = array();
            
            for($i=0; $i<count($periodos); $i++){
                $matriculas = Matricula::where('estudiante',$id)
                        ->where('periodo',$periodos[$i])
                        ->join('curso', 'matricula.curso', '=', 'curso.codigo')
                        ->get();
                array_push($semestres, $matriculas);
            }
            
            return View::make('estudiante.verhistoria')
                    ->with('semestres',$semestres);
        }else{
            return View::make('estudiante.index');
        }
    }
    
    public function getLogout() {
        Auth::logout();
        return Redirect::to("/");
    }    
}
