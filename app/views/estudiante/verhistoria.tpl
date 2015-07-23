<html>
    <head>
        <title>Historia Academica</title>
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    </head>
    <body>
        
        <br />
        
        ESTUDIANTE
        
        <br /><br /><br />
        
        <div class="panel panel-info">
            
            <div class="panel-heading">Periodo</div>

            <table class="table">
                <th>Codigo</th>
                <th>Nota</th>
                
                {foreach from=$matriculas item=matricula}
                    <tr>
                        <td>{$matricula->curso}</td>
                        <td>{$matricula->nota}</td>
                    </tr>
                {/foreach}
            </table>
        </div>
    </body>
</html>
