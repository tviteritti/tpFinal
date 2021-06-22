<?php

class Supervisor extends Controller{
    
    function __construct(){
        parent::__construct();
    }

    function render(){
        if( isset($_SESSION["supervisor"]) ){
            $this->view->render('supervisor/index');
            exit();
        }else{
            header('location:http://localhost/tpFinal/main'); //cambiar por la URL que tengan
            exit();
        }
        
    }

    function cerrarSesion(){
            
        session_start();

        if( isset($_SESSION["supervisor"]) ){
            session_destroy();
            header('location:http://localhost/tpFinal/main'); //cambiar por la URL que tengan
            exit();
        }


    }
}

?>