<?php
    class DB{
        public function conectar(){
        $url = 'pgsql: host=localhost; port=5433; dbname=ventasweb';
        $user = 'postgres';
        $password = '123';
        $cn = new PDO($url, $user, $password);
        return $cn;
        }
    }
?>