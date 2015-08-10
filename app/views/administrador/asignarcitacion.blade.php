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
            <div class="modal fade" id="citacion">
              <div class="modal-dialog">
                <div class="modal-content">
                  
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div>
            <div class="box-body table-responsive no-padding">
                
                <table class="table table-hover">
                    <tr>
                        <th style="width: 10px">ID</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Citaciones</th>
                        <th style="width: 40px">&nbsp;</th>

                    </tr>
                   
                        @foreach($estudiantes as $estudiante)
                         <tr>
                        <td>{{$estudiante->persona->identificacion}}</td>
                        <td>{{$estudiante->persona->nombre}}</td>
                        <td>{{$estudiante->persona->apellidos}}</td>
                        <td><span class="badge">{{$estudiante->citaciones->count()}}</span></td>
                        <td><a href="{{URL::to('/administrador/prueba')}}"  class="btn btn-sm btn-primary"  data-toggle="modal" data-target="#citacion"><i class="fa fa-pencil-square-o fa-lg"></i> Asignar</a></td>
                         
                         </tr>
                        @endforeach
                   
                </table>
            </div>
        </div>
    </div>
</div>
@stop
