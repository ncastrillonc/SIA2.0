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