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
                                                    @foreach($citas as $cita)
                                                    <option value="{{$cita->id}}">{{$cita->fecha}}||{{date("g:i a", strtotime($cita->horaInicio))}}</option>
                                                    @endforeach
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
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Citaciones</th>
                        <th style="width: 40px">&nbsp;</th>

                    </tr>
                   
                        @foreach($estudiantes as $estudiante)
                         <tr>
                        <td>{{$estudiante->id}}</td>
                        <td>{{$estudiante->persona->nombre}}</td>
                        <td>{{$estudiante->persona->apellidos}}</td>
                        <td><span class="badge">{{$estudiante->citaciones->count()}}</span></td>
                        <td><a onclick="ms.datos_est({{$estudiante->id}})"  class="btn btn-sm btn-primary"  data-toggle="modal" data-target="#citacion"><i class="fa fa-pencil-square-o fa-lg"></i> Asignar</a></td>
                         
                         </tr>
                        @endforeach
                   
                </table>
            </div>
        </div>
    </div>
</div>
@stop
