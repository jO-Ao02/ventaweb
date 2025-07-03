<?php
    require_once '../DATOS/DB.php';
    require_once '../INTERFAS/IFamilia.php';

    class LFamilia implements IFamilia{
        public function guardar(Familia $familia){
            $db = new DB();
            $cn = $db->conectar();
            $sql = 'insert into familia (nombre, descripcion) values (:nom, :des)';
            $ps = $cn->prepare($sql);
            $ps->bindParam(':nom', $familia->getNombre());
            $ps->bindParam(':des', $familia->getDescripcion());
            $ps->execute();
        }

        public function modificar(Familia $familia){
            $db = new DB();
            $cn = $db->conectar();
            $sql = 'update familia set nombre = :nom, descripcion = :des where idfamilia = :idfam';
            $ps = $cn->prepare($sql);
            $ps->bindParam(':nom', $familia->getNombre());
            $ps->bindParam(':des', $familia->getDescripcion());
            $ps->bindParam(':idfa', $familia->getIdFamilia());
            $ps->execute();
        }

        public function borrar(Familia $familia){
            $db = new DB();
            $cn = $db->conectar();
            $sql = 'delete from familia where idfamilia = :idfa';
            $ps = $cn->prepare($sql);
            $ps->bindParam(':idfa', $familia->getIdFamilia());
            $ps->execute();
        }

        public function cargarPorId($idfam){

        }

        public function cargar(){
            $db = new DB();
            $cn = $db->conectar();
            $sql = 'select * from familia';
            $ps = $cn->prepare($sql);
            $ps->execute();
            $filas = $ps->fetchall();
            $familias = array();
            foreach($filas as $f){
                $fam = new Familia();
                $fam->setIdFamilia($f[0]);
                $fam->setNombre($f[1]);
                $fam->setDescripcion($f[2]);
                array_push($familias, $fam);
            }
            return $familias;
        }


    }
?>