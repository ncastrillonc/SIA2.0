@extends('layouts.master')

@section('titulo')
Asignar Citación
@stop 


@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-default">
            <div class="box-header">
                <h3 class="box-title">Estudiantes para asignar citación</h3>

            </div><!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                @if(Session::get('state'))
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4>	<i class="icon fa fa-check"></i> Exito!</h4>
                    La citacion ha sido guardada exitosamente
                  </div>
                @endif
                <table class="table table-hover">
                    <tr>
                        <th style="width: 10px">ID</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th style="width: 40px">&nbsp;</th>

                    </tr>
                   
                        @foreach($estudiantes as $estudiante)
                         <tr>
                        <td>{{$estudiante->identificacion}}</td>
                        <td>{{$estudiante->nombre}}</td>
                        <td>{{$estudiante->apellidos}}</td>
                        <td><a href="{{URL::to('/administrador/asignar-citacion', array($estudiante->identificacion))}}" class="btn btn-sm btn-primary"><i class="fa fa-pencil-square-o fa-lg"></i> Asignar</a></td>
                         </tr>
                        @endforeach
                   
                </table>
            </div>
        </div>
    </div>
</div>
@stop
