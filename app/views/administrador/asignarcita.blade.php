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
        
        
        
        


        <form action="{{URL::to('/asdjaja')}}" method="GET">
           
                <h3><label for="input_01">Pick a date. Go ahead...</label></h3>

              
                <input
                    id="input_01"
                    class="datepicker"
                    name="fecha"
                    type="text"
                    autofocuss
                    value="14 August, 2014"
                    data-valuee="2014-08-08">
            
                <input type="submit" value="enviar">
             
        </form>

      

        <div id="container"></div>

     

 
        
        {{HTML::script('//code.jquery.com/jquery-1.11.3.min.js')}}
        {{HTML::script('./libs/pickadate/lib/picker.js')}}
        {{HTML::script('./libs/pickadate/lib/picker.date.js')}}
        {{HTML::script('./libs/pickadate/lib/legacy.js')}}
            <script type="text/javascript">

        var $input = $( '.datepicker' ).pickadate({
            formatSubmit: 'yyyy/mm/dd',
            // min: [2015, 7, 14],
            container: '#container',
            // editable: true,
            closeOnSelect: true,
            closeOnClear: false,
        })

        var picker = $input.pickadate('picker')
        // picker.set('select', '14 October, 2014')
        // picker.open()

        // $('button').on('click', function() {
        //     picker.set('disable', true);
        // });

    </script>
    </body>
</html>
