<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Estudiante
 *
 * @author Camilo
 */
class Estudiante extends Eloquent{
    //put your code here
    protected $table = 'estudiante';
    public $timestamps = false;
    
    
    public function persona(){
        return $this->hasOne('Persona', 'id');
    }
    public function citaciones(){
        return $this->belongsToMany('Citacion', 'cita_x_estudiante', 'estudiante', 'citacion');
    }
}
