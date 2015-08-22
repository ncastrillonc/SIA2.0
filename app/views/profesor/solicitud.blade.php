@extends('layouts.master')

@section('titulo')
Solicitar curso
@stop 


@section('content')
        {{Form::open(array('url'=>'solicitud/crear','method'=>'POST'))}}
            
        <div class="box-header">
            <h3 id="prueba" class="box-title">Esto es una página seria</h3><br>

        </div><br>
                <div class="row">
                    <div class="col-xs-6">
                        <b>Código curso: </b>
                            <select id="cursos">
                                @foreach($cursos as $curso)
                                <option value="{{$curso->codigo}}">{{$curso->nombre}}</option>
                                @endforeach
                            </select><br><br>
                            <b>Código: </b><h4 id="codigo" class="box box-input input-box"></h4><br>
                            <b>Tipología: </b><h4 id="tipologia" required class="box box-input input-box" name="salon" placeholder="Salon"></h4><br>
                    </div>
                    <div class="col-xs-6">
                        <b>Créditos: </b><h4 id="creditos" required class="box box-input input-box" name="creditos_curso" placeholder="Creditos del curso"></h4><br>                   
                    </div>
                </div>
                <br>
                <br>
                <div class="row div">
                    <b>Descripción: </b><br>
                    <textarea id="descripcion" required class="text" name="descripcion" rows="10" cols="50"></textarea><br>
                    <input id="curso" type="hidden" name="curso">
                    
                </div>
                
                <div class="row pad">
                    <button type="submit" class="btn pull-right btn-success">Publicar</button>
                </div>    
            </div>                

                        {{Form::close()}}

                </div>

        </div>
@stop
