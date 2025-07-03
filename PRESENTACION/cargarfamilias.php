<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <h1>listado de familias</h1>
        <hr>
        <a href="guardarfamilias.php">crear nuevo</a>
        <table border=1>
            <thead>
                <tr>
                    <th>id</th><th>nombre</th><th>descripcion</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once '../LOGICA/LFamilia.php';
                $log=new LFamilia();
                foreach($log->cargar() as $familia){
                ?>    
                <tr>
                    <td><?=$familia->getIdFamilia()?></td>
                    <td><?=$familia->getNombre()?></td>
                    <td><?=$familia->getDescripcion()?></td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>     
</body>
</html>
