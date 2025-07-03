<?php
    require_once '../ENTIDADES/Cliente.php';
    interface ICliente{
        public function guardar(Cliente $cliente);
        public function modificar(Cliente $cliente);
        public function borrar(Cliente $cliente);
        public function cargarPorId($cliente);
        public function cargar();
    }
?>