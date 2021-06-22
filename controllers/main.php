<?php

class Main extends Controller{

    function __construct(){
        parent::__construct(); 
        $this->view->messageIS = "";       
    }

    function render(){
        $this->view->render('main/index');
    }

    function inicioSesion(){
       $usuario = $_POST['user'];
       $password = $_POST['password'];

       $empleado = $this->model->getByUser($usuario);

       if($empleado->password == ""){
            $this->view->render('main/index');
            exit();
       }

       
    
        if($empleado->password == $password){
            $rol = $empleado->rol;
            switch($rol){
                case "chofer":
                    $_SESSION["chofer"] = $rol;
                    header('location:http://localhost/tpFinal/chofer');      //cambiar por la URL que tengan
                    exit();
                    break;
                case "supervisor":
                    $_SESSION["supervisor"] = $rol;
                    header('location:http://localhost/tpFinal/supervisor');      //cambiar por la URL que tengan
                    exit();
                    break;
                case "encargado":
                    $_SESSION["encargado"] = $rol;
                    header('location:http://localhost/tpFinal/encargado');      //cambiar por la URL que tengan
                    exit();
                    break;
                case "administrador":                  
                    $_SESSION["administrador"] = $rol;
                    header('location:http://localhost/tpFinal/administrador');      //cambiar por la URL que tengan
                    exit();
                    break;
                case "mecanico":
                    $_SESSION["mecanico"] = $rol;
                    header('location:http://localhost/tpFinal/mecanico');      //cambiar por la URL que tengan
                    exit();
                    break;
             }
            $_SESSION["usuario"] = $usuario;
            $this->view->render('ayuda/index');
            exit();
        }else{
            $this->view->render('main/index');
            exit();
        }

       

    }

}

?>