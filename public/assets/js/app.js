var sia = {
    
};
$("#cursos").change(function(){
        $("#cursos option:selected").each(function(){
            var curso = $(this).val();
            //alert(curso);
            $.ajax({
            url: baseUrl+'/solicitud/curso',
            type: 'POST',
            async: true,
            data: {
                curso: curso
            },
            success: function (response) {
               $('#nombre').text(response.nombre);
               $('#codigo').text(response.codigo);
               $('#descripcion').text(response.descripcion);
               $('#tipologia').text(response.tipologia);
               $('#creditos').text(response.creditos);
               $('#curso').val(response.codigo);
            }

        });
        });

}).trigger("change");




