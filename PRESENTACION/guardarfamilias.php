<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <h1>guardar familias</h1>
        <hr>
        <form action="" method="post">
            <input type="text" name="txtnom" placeholder="nombre">
            <input type="text" name="txtdes" placeholder="descripcion">
            <br>
            <input type="submit" value="guardar">
        </form>
    </div>
</body>
</html>
<?php
    require_once '../LOGICA/LFamilia.php';
    if($_POST){
        $log = new LFamilia();
        $fam = new Familia();
        $fam->setNombre($_POST['txtnom']);
        $fam->setDescripcion($_POST['txtdes']);
        $log->guardar($fam);
        header('Location: cargarfamilias.php');
    }
?>