<?php

class Ruta{
    public function ctrRutaWeb(){
        //return "http://localhost:8080/Web-SoftArt/";
        //return "http://localhost/Web-SoftArt/Web-SoftArt/";
        return "https://softart.euro-latina.com.mx/";
    }

    public function ctrRutaAdmin(){
     return "http://admin.softart.euro-latina.com.mx/";
        //return "http://localhost:8080/Admin-SoftArt/";
        //return "http://localhost/Admin-SoftArt/Admin-SoftArt/";
    }

    public function ctrRutaProyecto(){
        // return "admin.ferxostyle";
        return "/Web-SoftArt/";
    }
}
