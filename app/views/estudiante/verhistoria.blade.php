@extends('layouts.master')

@section('titulo')
    Ver Historia Académica
@stop 



@section('content')

    <br /><br /><br />
     
    @foreach($semestres as $semestre)
    <div class="panel panel-info">
        
            <div class="panel-heading">Periodo {{$semestre[0]->periodo}}</div>

            <table class="table">
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Créditos</th>
                <th>Nota</th>

                    @foreach($semestre as $matricula)
                        <tr>
                            <td>{{$matricula->grupoCurso}}</td>
                            <td>{{$matricula->nombre}}</td>
                            <td>{{$matricula->creditos}}</td>
                            <td>{{$matricula->nota}}</td>
                        </tr>
                    @endforeach

            </table>
    </div>
    <br />
    @endforeach
@stop 

