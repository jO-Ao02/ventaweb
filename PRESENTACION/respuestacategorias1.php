<?php
    require_once '../LOGICA/LCategoria.php';
    $idfam = $_GET['idfam'];
    $log = new LCategoria();
    $categorias = $log->cargarPorFamilia($idfam);
    $repuesta = '';
    foreach ($categorias as $c) {
        $repuesta.="<option value='<?=$c->getIdCategoria()?>'>".$c->getNombre()."</option>";
    }
    echo $repuesta;
?>