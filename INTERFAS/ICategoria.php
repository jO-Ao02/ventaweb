<?php
require_once '../ENTIDADES/Categoria.php';
interface ICategoria {
    public function guardar(Categoria $categoria);
    public function modificar(Categoria $categoria);
    public function borrar(Categoria $categoria);
    public function cargarPorId($idCategoria);
    public function cargarPorFamilia($idfam);
    public function cargar();
}
?>