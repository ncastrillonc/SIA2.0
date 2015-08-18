
var managerScreen = managerScreen || {};
managerScreen = {
   datos_est: function(id){
        $('#id_estu').text("");
        $('#n_estu').text("");
        $('#ap_estu').text("");
        $.ajax({
            url: baseUrl + '/estudiante/datos',
            method: 'POST',
            async: true,
            data: {
                identificacion: id
            },
            success: function (response) {

                $('#id_estu').text(response.estudiante.id);
                $('#n_estu').text(response.estudiante.nombre);
                $('#ap_estu').text(response.estudiante.apellidos);

            }
          
      });
   },
   save: function(){     
              
               $.ajax({
                   url: baseUrl + '/administrador/guardar-citacion',
                   method: 'post',
                   async: true,
                   data: {
                       cita:  $('#citas option:selected').val(),
                       estudiante: $('#id_estu').text()
                   },
                   suscces: function(response){
                       
                       alert(response);
                       $('#citacion').modal('hide');
                       
                   }
                   
                   
               });
      
   }
    
 
};

var ms = managerScreen;

  

  




