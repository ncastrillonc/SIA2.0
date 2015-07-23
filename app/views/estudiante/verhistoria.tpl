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
            {$i = 0}
            {foreach from=$semestres item=semestre}
                <div class="panel-heading">Periodo {$periodos[$i]}</div>

                <table class="table">
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Créditos</th>
                    <th>Nota</th>
                    
                        {foreach from=$semestre item=matricula}
                            <tr>
                                <td>{$matricula->curso}</td>
                                <td>{$matricula->nombre}</td>
                                <td>{$matricula->creditos}</td>
                                <td>{$matricula->nota}</td>
                            </tr>
                        {/foreach}

                </table>
                {$i = $i + 1}
            {/foreach}
            
        </div>
    </body>
</html>
