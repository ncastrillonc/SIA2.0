@extends('layouts.master')

@section('titulo')
    Inscribir en línea
@stop 



@section('content')
    <?php echo Session::get('fecha').'<br/>'; ?>
    <?php echo Session::get('hora'); ?>
@stop 

