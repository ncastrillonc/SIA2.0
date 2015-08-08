<!doctype html>

<html>
    <head>
        <!-- Basics -->

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <title>Login</title>

        <!-- CSS -->

        {{HTML::style("./assets/css/reset.css")}}
        {{HTML::style("./assets/css/animate.css")}}
        {{HTML::style("./assets/css/styles.css")}}

    </head>

        <!-- Main HTML -->

    <body>

        <!-- Begin Page Content -->

        <div id="container">

            {{Form::open(['url'=>'/loguear'])}}

                <label for="usuario">Usuario:</label>

                <input name="usuario" type="name">

                <label for="contrasena">Contraseña:</label>

                <input name="contrasena" type="password">

                <div id="lower">

                    <input type="submit" value="Login">

                </div>

            {{Form::close()}}

        </div>

        <!-- End Page Content -->

    </body>

</html>
	