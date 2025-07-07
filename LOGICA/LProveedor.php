<?php
    require_once '../DATOS/DB.php';
    require_once '../INTERFAS/IProveedor.php';

    class LProveedor implements IProveedor {
        public function guardar(Proveedor $proveedor) {
            $db = new DB();
            $cn = $db->conectar();
            $sql = 'INSERT INTO proveedor (nombre, ruc) VALUES (:nom, :ruc)';
            $ps = $cn->prepare($sql);
            $ps->bindParam(':nom', $proveedor->getNombre());
            $ps->bindParam(':ruc', $proveedor->getRuc());
            $ps->execute();
        }

        public function modificar(Proveedor $proveedor) {
            $db = new DB();
            $cn = $db->conectar();
            $sql = 'UPDATE proveedor SET nombre = :nom, ruc = :ruc WHERE idproveedor = :idprov';
            $ps = $cn->prepare($sql);
            $ps->bindParam(':nom', $proveedor->getNombre());
            $ps->bindParam(':ruc', $proveedor->getRuc());
            $ps->bindParam(':idprov', $proveedor->getIdProveedor());
            $ps->execute();
        }

        public function borrar(Proveedor $proveedor) {
            $db = new DB();
            $cn = $db->conectar();
            $sql = 'DELETE FROM proveedor WHERE idproveedor = :idprov';
            $ps = $cn->prepare($sql);
            $ps->bindParam(':idprov', $proveedor->getIdProveedor());
            $ps->execute();
        }

        public function cargarPorId($idproveedor) {
            // Implementation for loading a provider by ID
        }

        public function cargar() {
            $db = new DB();
            $cn = $db->conectar();
            $sql = 'SELECT * FROM proveedor';
            $ps = $cn->prepare($sql);
            $ps->execute();
            $filas = $ps->fetchAll();
            $proveedores = array();
            foreach ($filas as $f) {
                $prov = new Proveedor();
                $prov->setIdProveedor($f[0]);
                $prov->setNombre($f[1]);
                $prov->setRuc($f[2]);
                array_push($proveedores, $prov);
            }
            return $proveedores;
        }
    }
?>