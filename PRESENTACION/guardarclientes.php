<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1>guardar clientes</h1>
        <hr>
        <form action="" method="post">
            <input type="text" name="txtnom" placeholder="nombre" class="form-control">
            <br>
            <input type="text" name="txtape" placeholder="apellido" class="form-control">
            <br>
            <input type="text" name="txtdni" placeholder="dni" class="form-control">
            <br>
            <input type="submit" value="guardar" class="btn btn-primary">
        </form>
    </div>
</body>
</html>
<?php
    require_once '../LOGICA/LCliente.php';
    if($_POST){
        $log = new LCliente();
        $cli = new Cliente();
        $cli->setNombre($_POST['txtnom']);
        $cli->setApellido($_POST['txtape']);
        $cli->setDni($_POST['txtdni']);
        $log->guardar($cli);
        header('Location: cargarclientes.php');
    }
?>