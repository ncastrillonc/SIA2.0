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
            <div class="modal fade" id="curso">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Asignar Citación</h4>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-6 ">
                                        <div class="box box-primary">
                                            <div class="box-header with-border">
                                                <h3 class="box-title"><i class="fa fa-user "></i>  Datos del estudiante</h3>
                                                <div class="box-tools pull-right">
                                                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                                                </div>
                                            </div>
                                            <div class="box-body">
                                                <dl>
                                                    <dd><span><b>IDENTIFICACIÓN: </b></span><span id="id_estu"></span><dd>
                                                    <dd><span><b>NOMBRE: </b></span><span id="n_estu"></span><dd>
                                                    <dd><span><b>APELLIDOs: </b></span><span id="ap_estu"></span></dd>
                                                </dl>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="box box-primary">
                                            <div class="box-header with-border">
                                                <h3  class="box-title">Citación</h3>
                                            </div>
                                            <div class="box-body">
                                                <select id="citas">
                                                    <option>Seleccione una cita</option>
                                                    
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                            <button onclick="ms.save()" type="button" class="btn btn-primary">Guardar</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div>
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
                       <td>{{$solicitud->cursos->nombre}}</td>
                       <td>{{$solicitud->solicitante->persona->nombre}} {{$solicitud->solicitante->persona->apellidos}}</td>
                        <td>{{$solicitud->descripcion}}</td>                     
                       <td><a  class="btn btn-sm btn-primary" data-toggle="modal" data-target="#curso"><i class="fa fa-plus-square-o fa-lg"></i>  Aceptar</a></td>
                   </tr>
                   
                   @endforeach
                       
                   
                </table>
            </div>
        </div>
    </div>
</div>
@stop