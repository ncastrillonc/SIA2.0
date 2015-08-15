@extends('layouts.master')

@section('titulo')
    Inscribir en línea
@stop 

@section('content')
    
    <div class="box box-info">
        <div class="box-header">
            <h3 class="box-title">Realizar inscripción</h3>
        </div>
        
        <div class="box-body">
            
            <!-- Color Picker -->
            <div class="form-group">
                <label>Carrera</label>
                <select class="form-control select2" style="width: 100%;">
                    <option selected="selected">Alabama</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
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
                <label>Componente de Libre Elección</label>
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
        </div><!-- /.box-body -->
    </div><!-- /.box -->
@stop 

