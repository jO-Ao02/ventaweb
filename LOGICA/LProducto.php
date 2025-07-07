<?php
    require_once '../INTERFAS/IProducto.php';
    require_once '../DATOS/DB.php';
    class LProducto implements IProducto{
        public function guardar(Producto $producto){
            $db = new DB();
            $cn = $db->conectar();
            $sql = 'INSERT INTO producto (nombre, stock, monto, idcategoria) VALUES (:nom, :sto, :mon, :idcat)';
            $stmt = $cn->prepare($sql);
            $stmt->bindParam(':nom', $producto->getNombre());
            $stmt->bindParam(':sto', $producto->getStock());
            $stmt->bindParam(':mon', $producto->getMonto());
            $stmt->bindParam(':idcat', $producto->getIdCategoria());
            $stmt->execute();
        }

        public function cargar(){
            $db = new DB();
            $cn = $db->conectar();
            $sql = 'SELECT * FROM producto';
            $stmt = $cn->prepare($sql);
            $stmt->execute();
            $filas = $stmt->fetchAll();
            $productos = array();
            foreach ($filas as $f) {
                $prod = new Producto();
                $prod->setIdProducto($f[0]);
                $prod->setNombre($f[1]);
                $prod->setStock($f[2]);
                $prod->setMonto($f[3]);
                $prod->setIdCategoria($f[4]);
                array_push($productos, $prod);
            }
            return $productos;
        }
    }
?>