<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    <h1>guardar productos</h1>
    <hr>
    <div>
        <?php
            require_once '../logica/LFamilia.php';
            require_once '../logica/LCategoria.php';
        ?>
        <form action="" method="post">
            <input type="text" name="txtnom" placeholder="nombre">
            <input type="number" name="txtsto" placeholder="stock">
            <input type="number" name="txtmon" placeholder="monto">
            
            
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
            <select name="cbxCat" id="cbxCat">

            </select>
            <br>
            <input type="submit" name="" id="" value="Guardar">
        </form>
</body>
</html>
<?php
    if($_POST){
        require_once '../logica/LProducto.php'; 
        $log = new LProducto();
        $prod = new Producto();
        $prod->setNombre($_POST['txtnom']);
        $prod->setStock($_POST['txtsto']);
        $prod->setMonto($_POST['txtmon']);
        $prod->setIdCategoria($_POST['cbxCat']);
        $log->guardar($prod);
        header('Location: cargarproductos.php');
    }
?>
<script>
     $('#cbxFam').change(function(){
        idfam=$('#cbxFam').val();
        param={'idfam':idfam};
        $.ajax({
            url:'respuestacategorias1.php',
            data:param,
            type:'get',
            success:function(res){
                $('#cbxCat').html(res);
            }
        });
    });
</script>