<html>
    <head>
        <title>Solicitud</title>
    </head>
    <body>
        {{Form::open('url'=>'solicitud/crear')}}
        
        
        <input required name="codigo_curso" placeholder="Codigo del curso">
            <textarea required name="publicacion" placeholder="¿Qué estás pensando?" rows="3" class="col-sm-12"></textarea>
            <input type='hidden' name='receptor' value='{$usuario->id}'> 
   
            <button type="submit" class="btn pull-right btn-success">Publicar</button>
        {{Form::close()}}
    </body>    
</html>