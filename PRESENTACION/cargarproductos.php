<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>modulo de productos</h1>
    <hr>
    <a href="guardarproductos.php">crear nuevo producto</a>
    <table border="1">
        <thead>
            <th>Id</th><th>Nombre</th><th>Stock</th><th>Monto</th><th>idcategoria</th>
        </thead>
        <tbody>
            <?php
                require_once '../LOGICA/LProducto.php';
                $log = new LProducto();
                $productos = $log->cargar();
                foreach ($productos as $p) {
            ?>
            <tr>
                <td><?=$p->getIdProducto()?></td>
                <td><?=$p->getNombre()?></td>
                <td><?=$p->getStock()?></td>
                <td><?=$p->getMonto()?></td>
                <td><?=$p->getIdCategoria()?></td>
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
</body>
</html>