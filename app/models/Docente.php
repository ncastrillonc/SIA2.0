<?php

class Docente extends Eloquent{
    //put your code here
    protected $table = 'docente';
    
    public function solicitudes(){
        return $this->hasMany('Solicitud','id');
    }
  public function persona(){
        return $this->hasOne('Persona', 'id');
    }
}

