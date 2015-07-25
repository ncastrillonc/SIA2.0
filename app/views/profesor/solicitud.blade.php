<html>
    <head>
        <title>Solicitud</title>
    </head>
    <body>
        {{Form::open(array('url'=>'solicitud/crear','method'=>'POST'))}}
        
        
        <input required name="codigo_curso" placeholder="Codigo del curso"><br><br>
        <input required name="nombre_curso" placeholder="Nombre del curso"><br><br>
        <input required name="horario_curso" placeholder="Horario del curso"><br><br>
        <textarea required name="descripcion" placeholder="Descripcion"></textarea><br><br>
        <input required name="salon" placeholder="Salon"><br><br>
        <input required name="capacidad_salon" placeholder="Capacidad del salon"><br><br>
        <input required name="creditos_curso" placeholder="Creditos del curso"><br><br>
        <input required name="tipologia_curso" placeholder="Tipologia"><br><br>
        
   
            <button type="submit" class="btn pull-right btn-success">Publicar</button>
        {{Form::close()}}
    </body>    
</html>