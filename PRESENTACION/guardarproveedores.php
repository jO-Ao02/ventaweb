<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <h1>guardar proveedores</h1>
        <hr>
        <form action="" method="post">
            <input type="text" name="txtnom" placeholder="nombre">
            <input type="text" name="txtruc" placeholder="ruc">
            <br>
            <input type="submit" value="guardar">
        </form>
    </div>
</body>
</html>
<?php
    require_once '../LOGICA/LProveedor.php';
    if($_POST){
        $log = new LProveedor();
        $prov = new Proveedor();
        $prov->setNombre($_POST['txtnom']);
        $prov->setRuc($_POST['txtruc']);
        $log->guardar($prov);
        header('Location: cargarproveedores.php');
    }
?>