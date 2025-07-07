<?php
    require_once '../ENTIDADES/Producto.php';
    interface IProducto{
        public function guardar(Producto $producto);
        public function cargar();
    }
?>