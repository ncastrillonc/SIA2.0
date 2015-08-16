@extends('layouts.master')

@section('titulo')
    Inscribir en línea
@stop 

@section('content')

    {{Form::open(array('url'=>'estudiante/inscribir-online','method'=>'POST'))}}
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title">Realizar inscripción</h3>
            </div>

            <div class="box-body">

                <!-- Color Picker -->
                <div class="form-group">
                    <label>Carrera</label>
                    <select id="carreras" class="form-control select2" style="width: 100%;">
                        @foreach($careers as $c)
                            <option value="{{$c->codigo}}">{{$c->nombre}}</option>
                        @endforeach
                    </select>
                </div><!-- /.form group -->

                <!-- Color Picker -->
                <div class="form-group">
                    <label>Componente Disciplinar</label>
                    <select class="form-control select2" style="width: 100%;">
                        <option selected="selected">Alabama</option>
                        <option>Alaska</option>
                        <option>California</option>
                        <option>Delaware</option>
                        <option>Tennessee</option>
                        <option>Texas</option>
                        <option>Washington</option>
                    </select><!-- /.input group -->
                </div><!-- /.form group -->

                <div class="form-group">
                    <label>Componente de Fundamentación</label>
                        <select class="form-control select2" style="width: 100%;">
                            <option selected="selected">Alabama</option>
                            <option>Alaska</option>
                            <option>California</option>
                            <option>Delaware</option>
                            <option>Tennessee</option>
                            <option>Texas</option>
                            <option>Washington</option>
                        </select><!-- /.input group -->
                </div><!-- /.form group -->

                <div class="form-group">
                    <label>Componente de Libre Elección</label><br />
                    <h3 id="prueba" class="box-title">Esto es una página seria</h3><br>
                </div><!-- /.form group -->
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    
    {{Form::close()}}
@stop 

