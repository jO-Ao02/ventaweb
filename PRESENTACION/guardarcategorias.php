<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        require_once '../logica/LFamilia.php';
        require_once '../logica/LCategoria.php';
    ?>
    <div>
        <h1>Módulo de Inserción</h1>
        <hr>
        <form action="" method="post">
            <input type="text" name="txtnom" placeholder="Nombre">
            <select name="cbxfam" id="cbxFam">
                <option>Seleccione Familia</option>
                <?php
                    $logFamilia=new LFamilia();
                    $familias=$logFamilia->cargar();
                    foreach($familias as $fam){
                ?>
                <option value="<?=$fam->getIdFamilia()?>"><?=$fam->getNombre()?></option>
                <?php
                    }
                ?>
            </select>
            <br>
            <input type="submit" name="" id="" value="Guardar">
        </form>
    </div>
</body>
</html>
<?php
    if($_POST){
        $log = new LCategoria();
        $cat = new Categoria();
        $cat->setNombre($_POST['txtnom']);
        $cat->setIdFamilia($_POST['cbxfam']);
        $log->guardar($cat);
        header('Location: cargarcategorias.php');
    }
?>
