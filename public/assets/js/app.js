var sia = {

    buscarcarrera: function(id) {
        var carrera = $("#carrrera-" + id);
        if (carrera.val() != "") {

          $.ajax({
            url: baseUrl + '/estudiante/buscar-carrera',
            type: 'POST',
            async: true,
            data: {
              codigo: id,
              nombre: carrera.val()
            },
            success: function(response) {
                var div = "<div style='margin-bottom: 1px; font-size: 10px; padding: 3px;' class='well well-sm col-sm-7'>";
                $("#carreras-"+id).append(div + response.codigo + "</div>");
                carrera.val(""); 
            }
          });


        } else {
          alert('Este campo es obligatorio');
        }
    }
  
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




