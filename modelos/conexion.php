<?php

class Conexion{

    static public function conectar()

    {

        //$link = new PDO("mysql:host=162.241.60.127;dbname=systems3_ferxostyle","systems3_Angel","Angel?123+");
        $link = new PDO("mysql:host=localhost;dbname=softart","root","root");

        $link->exec("set names utf8");



        return $link;

    }


}