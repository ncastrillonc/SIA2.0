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
class CitaXestudiante extends Eloquent {
    protected $table = 'cita_x_estudiante';
    public $timestamps = false;
    
    public function citaciones()
    {
        return $this->belongsTo('Citacion', 'citacion','codigo');
    }
}
