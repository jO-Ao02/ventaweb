<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <h1>mis proveedores</h1>
        <hr>
        <a href="guardarproveedores.php">crear nuevo</a>
        <table border="1">
            <thead>
                <tr>
                    <th>id</th>
                    <th>nombre</th>
                    <th>ruc</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once '../LOGICA/LProveedor.php';
                $log = new LProveedor();
                $proveedores = $log->cargar();
                foreach ($proveedores as $prov) {
                ?>
                <tr>
                    <td><?=$prov->getIdProveedor()?></td>
                    <td><?=$prov->getNombre()?></td>
                    <td><?=$prov->getRuc()?></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
    </div>
</body>
</html>