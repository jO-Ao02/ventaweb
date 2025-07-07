<?php
    class DB{
        public function conectar(){
        $url = 'mysql: host=localhost; dbname=demovenastweb';
        $user = 'root';
        $password = 'admin123';
        $cn = new PDO($url, $user, $password);
        return $cn;
        }
    }
?>