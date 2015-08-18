<?php
class Curso extends Eloquent{
    //put your code here
    protected $table = 'curso';
   public $timestamps = false;
   
   public function solicitudes(){
       return $this->hasMany('Solicitud','codigo', 'curso');
   }
}

