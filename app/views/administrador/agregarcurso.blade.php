@extends('layouts.master')

@section('titulo')
Agregar Curso
@stop 


@section('content')

<div class="row">
    <div class="col-xs-12">
        <div class="box box-default">
            <div class="box-header">
                <h3 class="box-title">Solicitudes Pendientes</h3>

            </div><!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
               
                <table class="table table-hover">
                    <tr>
                        <th style="width: 10px">ID</th>
                        <th>Curso</th>
                        <th>Profesor</th>                        
                        <th>Descripción</th>  
                        <th style="width: 40px">&nbsp;</th>

                    </tr>
                   @foreach($solicitudes as $solicitud)
                   <tr>
                       <td>{{$solicitud->codigo}}</td>
                       <td>{{$solicitud->curso}}</td>
                       <td>{{$solicitud->solicitante->persona->nombre}} {{$solicitud->solicitante->persona->apellidos}}</td>
                        <td>{{$solicitud->descripcion}}</td>                     
                       <td><a href="{{URL::to('/administrador/agregar-curso', array($solicitud->id))}}" class="btn btn-sm btn-primary"><i class="fa fa-plus-square-o fa-lg"></i>  Agregar</a></td>
                   </tr>
                   
                   @endforeach
                       
                   
                </table>
            </div>
        </div>
    </div>
</div>
@stop