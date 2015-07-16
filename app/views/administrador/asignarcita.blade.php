<html>
    <head>
        <title>Asignar Cita</title>
        {{HTML::style('./libs/pickadate/lib/themes/default.css')}}
        {{HTML::style('./libs/pickadate/lib/themes/default.date.css')}}
    </head>
    <body>
        <b>Nombre: </b> {{$estudiante->nombre}}<br>
        <b>Apellidos: </b> {{$estudiante->apellidos}}<br>
        <b>Citacion: </b>
        
        
        
        


        {{Form::open(array('url'=>'/administrador/asignar-citacion','method'=>'POST'))}}
           
                           
                <input
                    id="input_01"
                    class="datepicker"
                    name="fecha"
                    type="text"
                    value="{{ Input::old('fecha_submit')}}"
                    autofocuss
                    data-valuee="2014-08-08">
                <div class="bg-danger">
                {{$errors->first('fecha_submit')}}
                 </div>
                <br>
                <input
                    id="input_from"
                    class="timepicker"
                    type="time"
                    name="time"
                    value="{{ Input::old('time')}}"
                    autofocuss>
                <div class="bg-danger">
                {{$errors->first('time')}}
                </div>
                <br>
                {{Form::text('duracion','1')}}
                <div class="bg-danger">
                {{$errors->first('duracion')}}
                </div>
                <br>
                {{Form::hidden('identificacion',$estudiante->identificacion)}}
            
                <input type="submit" value="Guardar">
             
        

      {{Form::close()}}

        <div id="container"></div>

     

 
        
        {{HTML::script('//code.jquery.com/jquery-1.11.3.min.js')}}
        {{HTML::script('./libs/pickadate/lib/picker.js')}}
        {{HTML::script('./libs/pickadate/lib/picker.date.js')}}
        {{HTML::script('./libs/pickadate/lib/picker.time.js')}}
        {{HTML::script('./libs/pickadate/lib/legacy.js')}}
        <script type="text/javascript">

        var $input = $( '.datepicker' ).pickadate({
            formatSubmit: 'yyyy/mm/dd',
            // min: [2015, 7, 14],
            container: '#container',
            // editable: true,
            closeOnSelect: true,
            closeOnClear: false,
        });

        var picker = $input.pickadate('picker')
        
          var $input = $( '.timepicker' ).pickatime({
              formatSubmit: 'HH:i',
            hiddenName: true
           });
        var picker = $input.pickatime('picker');
        $('.timepicker').pickatime({
            formatSubmit: 'HH:i',
            hiddenName: true
          });
       
        // picker.set('select', '14 October, 2014')
        // picker.open()

        // $('button').on('click', function() {
        //     picker.set('disable', true);
        // });

    </script>
    </body>
</html>
