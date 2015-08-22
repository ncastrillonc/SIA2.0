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
            date_default_timezone_set("America/Bogota");
            
            $serverDate = date('Y-m-d');     
            $serverHour = date("H:i:s");
            
            $startDate = $cita->fecha;
            $startHour = $cita->horaInicio;
            
            $endHour = strtotime ('+30 minute' , strtotime ($startHour)) ;
            $endHour = date ('H:i:s' , $endHour);
            
            // Si es el día de la inscripción y está dentro del rango horario
            
            // echo "&& (".$serverHour." >= ".$startHour." && ".$serverHour." <= ".$endHour.")";
            if($startDate == $serverDate && ($serverHour >= $startHour && $serverHour <= $endHour)){
                
                $careers = Carrera::select('codigo', 'nombre')->get();
                
                return View::make('estudiante.inscribironline')
                        ->with('careers', $careers);
                
            } else{
                return View::make('estudiante.index');
            }
            
        }        
    }
    
    public function postBuscar(){
        
        $carrera = Carrera::where('codigo',Input::get('codigo'))->first();
        $cursos = Curso::all();

        $data =  [
            'nombre' =>  $carrera->nombre,
            'cursos' =>  $cursos
        ];
        
        return Response::json($data); 
    }
    
    public function getLogout() {
        Auth::logout();
        return Redirect::to("/");
    }  
    
}
