var sia = {
  
};

$("#cursos").change(function(){
        $("#cursos option:selected").each(function(){
            var curso = $(this).val();
            alert(curso);
            $.ajax({
                url: baseUrl+'/solicitud/curso',
                type: 'POST',
                async: true,
                data: {
                    curso: curso
                },
                success: function (response) {
                   $('#prueba').text(response.nombre);
                }
            });
        });

}).trigger("change");

$("#carreras").change(function(){
    
    $("#carreras option:selected").each(function(){
        var carrera = $(this).val();

        $.ajax({
            url: baseUrl+'/estudiante/buscar-carrera',
            type: 'POST',
            async: true,
            data: {
                carrera: carrera
            },
            success: function (response) {
                $('#prueba').text(response.eleccion);
            }
        });
    });

}).trigger("change");




