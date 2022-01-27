<?php

class Ruta{
    public function ctrRutaWeb(){

        return "http://localhost/Web-SoftArt/Web-SoftArt/";
       // return "https://ferxostyle.com.mx/";
    }

    public function ctrRutaAdmin(){
     //return "https://admin.ferxostyle.com.mx/";
    
        return "http://localhost/Admin-SoftArt/Admin-SoftArt/";
    }

    public function ctrRutaProyecto(){
        // return "admin.ferxostyle";
        return "/Web-SoftArt/";
    }
}