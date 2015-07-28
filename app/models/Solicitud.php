<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Solicitud
 *
 * @author Andres Bedoya
 */
class Solicitud extends Eloquent{
    
    protected $table = 'solicitud';
 
    public function scopeEstado($query){
        
        return $query->where('estado','=',0);
        
    }
    
}
