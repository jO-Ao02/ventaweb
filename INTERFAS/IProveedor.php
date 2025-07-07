<?php
    require_once '../ENTIDADES/Proveedor.php';
    interface IProveedor {
        public function guardar(Proveedor $proveedor);
        public function modificar(Proveedor $proveedor);
        public function borrar(Proveedor $proveedor);
        public function cargarPorId($idproveedor);
        public function cargar();
    }
?>