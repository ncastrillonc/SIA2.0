<html>
    <head>
        <title>Administrador</title>
    </head>
    <body>
        <h1>Bienvendo</h1>
        @foreach($estudiantes as $estudiante)
    <li>{{$estudiante->nombre}} - <a href="{{URL::to('/administrador/asignar-citacion', array($estudiante->identificacion))}}">Asignar Cita</a></li>
        @endforeach
    </body>
</html>
