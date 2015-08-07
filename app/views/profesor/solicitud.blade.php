@extends('layouts.master')

@section('titulo')
Solicitar curso
@stop 


@section('content')
        {{Form::open(array('url'=>'solicitud/crear','method'=>'POST'))}}
            
        <div class="box-header">
            <h3 class="box-title">Esto es una página seria</h3><br>

        </div><br>
                <div class="row">
                    <div class="col-xs-6">
                        <b>Código curso: </b><input required class="box box-input input-box" name="codigo_curso" placeholder="Codigo del curso"><br>
                        <b>Horario curso: </b><input required class="box box-input input-box" name="horario_curso" placeholder="Horario del curso"><br>
                        <b>Salón: </b><input required class="box box-input input-box" name="salon" placeholder="Salon"><br>
                        <b>Créditos: </b><input required class="box box-input input-box" name="creditos_curso" placeholder="Creditos del curso"><br>
                    </div>
                    <div class="col-xs-6">
                        <b>Nombre: </b><input required class="box box-input input-box" name="nombre_curso" placeholder="Nombre del curso"><br>
                        <b>Número de estudiantes: </b><input required class="box box-input input-box" name="capacidad_salon" placeholder="Capacidad del salon"><br>
                        <b>Tipología:</b><input required class="box box-input input-box" name="tipologia_curso" placeholder="Tipologia"><br><br><br>                    </div>
                </div>
                <br>
                <br>
                <div class="row div">
                    <b>Descripción: </b><br>
                    <textarea required class="text" name="descripcion" rows="10" cols="50"></textarea><br>
                    
                </div>
                
                <div class="row pad">
                    <button type="submit" class="btn pull-right btn-success">Publicar</button>
                </div>    
            </div>                

                        {{Form::close()}}

                </div>

        </div>
@stop
