<?php
    class cliente{
        private $idcliente;
        private $nombre;
        private $apellido;
        private $dni;

        public function getIdCliente(){
            return $this->idcliente;
        }

        public function setIdCliente($idcliente){
            $this->idcliente=$idcliente;
        }

        public function getNombre(){
            return $this->nombre;
        }

        public function setNombre($nombre){
            $this->nombre=$nombre;
        }

        public function getApellido(){
            return $this->apellido;
        }

        public function setApellido($apellido){
            $this->apellido=$apellido;
        }

        public function getDni(){
            return $this->dni;
        }

        public function setDni($dni){
            $this->dni=$dni;
        }


    }
?>