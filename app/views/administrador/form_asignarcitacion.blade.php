@extends('layouts.master')

@section('titulo')
    Asignar Citación
@stop

@section('styles')

    {{HTML::style('./master/plugins/timepicker/bootstrap-timepicker.min.css')}}
    {{HTML::style('./assets/css/style.css')}}
@stop

@section('scripts')
     {{HTML::script('./master/plugins/timepicker/bootstrap-timepicker.min.js')}}
     {{HTML::script('./master/plugins/datepicker/locales/bootstrap-datepicker.es.js')}}
     <script>
         $('.datepicker').datepicker({
                  language: "es",
                orientation: "top auto"
         });
           $('.timepicker').timepicker({
                 showInputs: false
            });
     </script>
@stop

@section('content')

<div class="row ">
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
                    <dd><span><b>IDENTIFICACIÓN: </b>{{$estudiante->identificacion}}</span><dd>
                    <dd><span><b>NOMBRE: </b>       {{$estudiante->nombre}}</span><dd>
                    <dd><span><b>APELLIDOs: </b>     {{$estudiante->apellidos}}</span></dd>
                </dl>
            </div>
        </div>

    </div>
    <div class="col-md-6">
        <div class="box box-default">
            <div class="box box-header">
                <h3 class="box-title"><i class="fa fa-calendar-o"></i> Citación</h3>
            </div>

            {{Form::open(array('url'=>'/administrador/asignar-citacion','method'=>'POST','class'=>'form-horizontal'))}}
            <div class="box-body">
                <div class="form-group">
                    <label class="col-sm-10 text-red">{{$errors->first('identificacion')}}</label>
                </div>
                <div class="form-group">
                    <label for="e" class="col-sm-2 control-label">Fecha: </label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" placeholder="Fecha" value="{{Input::old('fecha')}}" class="datepicker form-control pull-right" name="fecha"  data-date-format="yyyy/mm/dd" />
                        </div>
                    </div>
                      
                </div>                
                <div class="form-group">
                    <label class="col-sm-10 text-red">{{$errors->first('fecha')}}</label>
                </div>
                <div class="bootstrap-timepicker">
                    <div class="form-group">
                        <label for="e" class="col-sm-2 control-label">Hora: </label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                                <input type="text" value="{{Input::old('hora')}}" placeholder="Hora" class="form-control pull-right timepicker" name="hora" />
                            </div>
                        </div>

                    </div>   
                </div>
                <div class="form-group">
                    <label class="col-sm-10 text-red">{{$errors->first('hora')}}</label>
                </div>
                <div class="form-group">
                    <label for="e" class="col-sm-2 control-label">Duracion: </label>
                    <div class="col-sm-2">
                        
                        <input type="number"  value="{{Input::old('duracion')}}" placeholder="0" class="form-control pull-right col-sm-2" name="duracion" />
                        
                    </div>

                </div>   
                <div class="form-group">
                    <label class="col-sm-10 text-red">{{$errors->first('duracion')}}</label>
                </div>
            </div>
             {{Form::hidden('identificacion',$estudiante->identificacion)}}
             
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Asignar</button>
            </div>
            
            {{Form::close()}}

        </div>
    </div>
</div>

@stop