<?php
    class DB{
        public function conectar(){
        $url = 'mysql: host=localhost; dbname=ventasweb';
        $user = 'root';
        $password = '';
        $cn = new PDO($url, $user, $password);
        return $cn;
        }
    }
?>