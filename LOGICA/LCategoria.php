<?php
    require_once '../DATOS/DB.php';
    require_once '../INTERFAS/ICategoria.php';
    
    class LCategoria implements ICategoria {
        public function guardar(Categoria $categoria) {
            $db = new DB();
            $cn = $db->conectar();
            $sql = 'INSERT INTO categoria (nombre, idfamilia) VALUES (:nom, :idfam)';
            $ps = $cn->prepare($sql);
            $ps->bindParam(':nom', $categoria->getNombre());
            $ps->bindParam(':idfam', $categoria->getIdFamilia());
            $ps->execute();
        }

        public function modificar(Categoria $categoria) {
            $db = new DB();
            $cn = $db->conectar();
            $sql = 'UPDATE categoria SET nombre = :nom, idfamilia = :idfam WHERE idcategoria = :idcat';
            $ps = $cn->prepare($sql);
            $ps->bindParam(':nom', $categoria->getNombre());
            $ps->bindParam(':idfam', $categoria->getIdFamilia());
            $ps->bindParam(':idcat', $categoria->getIdCategoria());
            $ps->execute();
        }

        public function borrar(Categoria $categoria) {
            $db = new DB();
            $cn = $db->conectar();
            $sql = 'DELETE FROM categoria WHERE idcategoria = :idcat';
            $ps = $cn->prepare($sql);
            $ps->bindParam(':idcat', $categoria->getIdCategoria());
            $ps->execute();
        }

        public function cargarPorId($idCategoria) {
            // Implementation to load a category by its ID
        }

        public function cargar() {
            $db = new DB();
            $cn = $db->conectar();
            $sql = 'SELECT * FROM categoria';
            $ps = $cn->prepare($sql);
            $ps->execute();
            $filas = $ps->fetchAll(PDO::FETCH_ASSOC);
            
            // Convert rows to Categoria objects
            return array_map(function($c) {
                $cat = new Categoria();
                $cat->setIdCategoria($c['idcategoria']);
                $cat->setNombre($c['nombre']);
                $cat->setIdFamilia($c['idfamilia']);
                return $cat;
            }, $filas);
        }

        public function cargarPorFamilia($idfam) {
            $db = new DB();
            $cn = $db->conectar();
            $sql = 'SELECT * FROM categoria WHERE idfamilia = :idfam';
            $ps = $cn->prepare($sql);
            $ps->bindParam(':idfam', $idfam);
            $ps->execute();
            $filas = $ps->fetchAll(PDO::FETCH_ASSOC);
            
            // Convert rows to Categoria objects
            return array_map(function($c) {
                $cat = new Categoria();
                $cat->setIdCategoria($c['idcategoria']);
                $cat->setNombre($c['nombre']);
                $cat->setIdFamilia($c['idfamilia']);
                return $cat;
            }, $filas);
        }
    }
?>