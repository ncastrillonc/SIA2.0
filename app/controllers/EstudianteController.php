<?php

class EstudianteController extends BaseController{
    
    public function __construct() {
        $this->beforeFilter(function() {
            if (Session::get('tipo') !== 'Estudiante') {
                Return Redirect::to('/');
            }
        });

        $this->beforeFilter('auth');
    }
    
    public function getVerHistoria(){
        
        $cedula_id = Session::get('cedula_id');
        
        if($cedula_id){
            $periodos = Matricula::where('estudiante',$cedula_id)->lists('periodo');
            $periodos = array_unique($periodos);
            sort($periodos);
            
            $semestres = array();
            
            for($i=0; $i<count($periodos); $i++){
                $matriculas = Matricula::where('estudiante',$cedula_id)
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
    
    public function getInscribirOnline(){
        // recoge la citacion y la compara con la fecha del sistema
        // estudiante inscribe
        // materias se registran en sus cursos actuales
        
        $cedula_id = Session::get('cedula_id');
        
        $citaciones = CitaXestudiante::where('estudiante',$cedula_id)->lists('citacion');
        $citaciones = array_unique($citaciones);
        sort($citaciones);
        
        for($i=0; $i<count($citaciones); $i++){
            $cita = Citacion::select('fecha', 'horaInicio')->where('id',$citaciones[$i])->first();
            
            $todayF = date('Y-m-d');            
            $todayH = date("H:i:s");
            
            Session::put('fecha',$todayF);
            Session::put('hora',$todayH);
            
            // verificar cómo sumar 30 min a una hora
            if($cita->fecha == $todayF && ($cita->horaInicio >= $todayH && $cita->horaInicio <= $todayH + 30)){
                // se abre la citacion
                // se cambia el estado de la citacion
            } else{
                // vista que indique que no está autorizado a inscribir
            }
            
        }
        
        // quitar esto
        return View::make('estudiante.inscribironline');
    }
    
    public function getLogout() {
        Auth::logout();
        return Redirect::to("/");
    }    
}
