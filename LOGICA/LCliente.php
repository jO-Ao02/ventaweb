<?php
    require_once '../DATOS/DB.php';
    require_once '../INTERFAS/ICliente.php';

    class LCliente implements ICliente{
        public function guardar(Cliente $cliente){
            $db = new DB();
            $cn = $db->conectar();
            $sql = 'insert into cliente (nombre, apellido, dni) values (:nom, :ape, :dni)';
            $ps = $cn->prepare($sql);
            $ps->bindParam(':nom', $cliente->getNombre());
            $ps->bindParam(':ape', $cliente->getApellido());
            $ps->bindParam(':dni', $cliente->getDni());
            $ps->execute();
        }

        public function modificar(Cliente $cliente){
            $db = new DB();
            $cn = $db->conectar();
            $sql = 'update cliente set nombre = :nom, apellido = :ape, dni = :dni where idcliente = :idcli';
            $ps = $cn->prepare($sql);
            $ps->bindParam(':nom', $cliente->getNombre());
            $ps->bindParam(':ape', $cliente->getApellido());
            $ps->bindParam(':dni', $cliente->getDni());
            $ps->bindParam(':idcli', $cliente->getIdCliente());
            $ps->execute();
        }

        public function borrar(Cliente $cliente){
            $db = new DB();
            $cn = $db->conectar();
            $sql = 'delete from cliente where idcliente = :idcli';
            $ps = $cn->prepare($sql);
            $ps->bindParam(':idcli', $cliente->getIdCliente());
            $ps->execute();
        }

        public function cargarPorId($cliente){

        }

        public function cargar(){
            $db = new DB();
            $cn = $db->conectar();
            $sql = 'select * from cliente';
            $ps = $cn->prepare($sql);
            $ps->execute();
            $filas = $ps->fetchall();
            $clientes = array();
            foreach($filas as $c){
                $cli = new Cliente();
                $cli->setIdCliente($c[0]);
                $cli->setNombre($c[1]);
                $cli->setApellido($c[2]);
                $cli->setDni($c[3]);
                array_push($clientes, $cli);
            }
            return $clientes;
        }


    }
?>