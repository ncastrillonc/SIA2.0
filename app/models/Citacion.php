<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Duracion
 *
 * @author Camilo
 */
class Citacion extends Eloquent {
    protected $table = 'citacion';
    public $timestamps = false;
    
    public function estudiantes(){
        return $this->belongsToMany('Estudiante', 'cita_x_estudiante', 'citacion', 'estudiante');
    }
}
