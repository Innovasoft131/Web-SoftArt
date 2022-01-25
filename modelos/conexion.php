<?php

class Conexion{
    static public function conectar(){
        $con = new PDO("mysql:host=localhost;bdname=softStore", "root", "root");
        $con -> execute("set names utf8");

        return $con;
    }
}