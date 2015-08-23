@extends('layouts.master')

@section('titulo')
    Inscribir en línea
@stop 

@section('styles')
    <!-- Select2 -->
    {{HTML::style("./master/plugins/select2/select2.min.css")}}
    <!-- Theme style -->
    {{HTML::style("./master/dist/css/AdminLTE.min.css")}}
    
    {{HTML::style("./assets/css/checkdesign.css")}}
@stop

@section('content')

    {{Form::open(array('url'=>'estudiante/inscribir-online','method'=>'POST'))}}
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title">Realizar inscripción</h3> <br />
                <p id="prueba">Holi</p>
            </div>

            <div class="box-body">

                <!-- Color Picker -->
                <div class="form-group">
                    <label>Carrera</label>
                    <select id="carreras" class="form-control select2" style="width: 100%;">
                        <option value=0>- Seleccione una carrera -</option>
                        @foreach($careers as $c)
                            <option value="{{$c->codigo}}">{{$c->codigo}} - {{$c->nombre}}</option>
                        @endforeach
                    </select>
                </div><!-- /.form group -->

                <!-- checkbox -->
                <div class="form-group">
                    <label>Componente Disciplinar</label><br />
                    <div id="global">
                        <div id="mensajes1" class="mensajes">
                        </div>
                    </div>
                </div>
                
                <hr />
                
                <!-- checkbox -->
                <div class="form-group">
                    <label>Componente de Fundamentación</label><br />
                    <div id="global">
                        <div id="mensajes2" class="mensajes">
                        </div>
                    </div>
                </div>
                
                <hr />

                <!-- checkbox -->
                <div class="form-group">
                    <label>Componente de Libre Elección</label><br />
                    <div id="global">
                        <div id="mensajes3" class="mensajes">
                        </div>
                    </div>
                </div>
                
                <!-- botón -->
                <div class="form-group">
                    <input type="submit" name="boton" value="Siguiente"/>
                </div>
                
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    
    {{Form::close()}}
@stop 

@section('scripts')

    <!-- jQuery 2.1.4 -->
    {{HTML::script('./master/plugins/jQuery/jQuery-2.1.4.min.js')}}
    <!-- Select2 -->
    {{HTML::script('./master/plugins/select2/select2.full.js')}}   
    
    <script type="text/javascript">
        $(function () {
            //Initialize Select2 Elements
            $(".select2").select2();
        });
        
        var bandera = 1;
    </script>
@stop