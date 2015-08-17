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
        // carrera = # de codigo de la carrera seleccionada
        var carrera = new Number($(this).val());

        if(carrera != 0){
            $('#disc').removeAttr("disabled");
        } else{            
            $('#disc').prop('disabled', true);
        }
        $('#prueba').text(carrera);
    });

}).trigger("change");

$(function(){
    alert("entra");
    box = $("#select2-carreras-container");
    
    if(box.attr("title", "- Seleccione una carrera -")) {
        alert("nada");
    } else{
        alert("sipi");
    }
});


