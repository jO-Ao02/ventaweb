<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <h1>mis categorias</h1>
        <hr>
        <a href="guardarcategorias.php">crear nuevo</a>
        <table border="1">
            <thead>
                <tr>
                    <th>id</th>
                    <th>nombre</th>
                    <th>idfamilia</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once '../LOGICA/LCategoria.php';
                $log = new LCategoria();
                $categorias = $log->cargar();
                foreach ($categorias as $cat) {
                ?>
                <tr>
                    <td><?=$cat->getIdCategoria()?></td>
                    <td><?=$cat->getNombre()?></td>
                    <td><?=$cat->getIdFamilia()?></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
    </div>
</body>
</html>