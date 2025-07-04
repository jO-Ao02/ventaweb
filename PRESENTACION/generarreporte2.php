<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    <div>
        <h1>reporte - categoria por familia</h1>
        <hr>
        <select name="cbxfam" id="cbxFam">
                <option>Seleccione Familia</option>
                <?php
                    require_once '../LOGICA/LFamilia.php';
                    $logFamilia=new LFamilia();
                    $familias=$logFamilia->cargar();
                    foreach($familias as $fam){
                ?>
                <option value="<?=$fam->getIdFamilia()?>"><?=$fam->getNombre()?></option>
                <?php
                    }
                ?>
            </select>
    </div>
    <div id="res">
        <h2>Resultados</h2>
        <p>Seleccione una familia para ver las categorías asociadas.</p>

    </div>
</body>
</html>
<script>
     $('#cbxFam').change(function(){
        idfam=$('#cbxFam').val();
        param={'idfam':idfam};
        $.ajax({
            url:'reporte1.php',
            data:param,
            type:'get',
            success:function(res){
                $('#res').html(res);
            }
        });
    });
</script>