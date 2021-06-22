<?php

class Chofer extends Controller{
    
    function __construct(){
        parent::__construct();
    }

    function render(){
        if( isset($_SESSION["chofer"]) ){
            $this->view->render('chofer/index');
            exit();
        }else{
            header('location:http://localhost/tpFinal/main');   //cambiar por la URL que tengan
            exit();
        }
        
    }

    function cerrarSesion(){
            
    session_start();

    if( isset($_SESSION["chofer"]) ){
        session_destroy();
        header('location:http://localhost/tpFinal/main'); //cambiar por la URL que tengan
        exit();
    }


    }
}

?>