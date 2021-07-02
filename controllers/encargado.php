<?php

class Encargado extends Controller{
    
    function __construct(){
        parent::__construct();
        $this->view->message = "";

    }

    function render(){
        if( isset($_SESSION["encargado"]) ){
 
            $this->view->render('encargado/index');
            exit();
        }else{
            header('location:http://localhost/tpFinal/main'); //cambiar por la URL que tengan
            exit();
        }
        
    }

    function cerrarSesion(){
            
        session_start();

        if( isset($_SESSION["encargado"]) ){
            session_destroy();
            header('location:http://localhost/tpFinal/main'); //cambiar por la URL que tengan
            exit();
        }


    }

   
}

?>