<?php

class Pagina2 extends Controller{
    
    function __construct(){
        parent::__construct();
        $this->view->message = "";
    }

    function render(){
        $this->view->render('pagina2/index');
    }

    function pruebaModel(){
       $dni = $_POST['dni'];
       $nombre = $_POST['nombre'];
       $apellido = $_POST['apellido'];
       $fecha_nac = $_POST['fecha_nac'];
       $usuario = $_POST['usuario'];
       $password = $_POST['password'];
       $email = $_POST['email'];
       $rol = $_POST['rol'];

       $message = "";
    
       if($this->model->insert(['dni' => $dni, 'nombre' => $nombre,'apellido' => $apellido, 'fecha_nac' => $fecha_nac, 'usuario' => $usuario, 'password' => $password, 'email' => $email, 'rol' => $rol])){
            $message = "registro exitoso";
       }else{
            $message = "ya existe";
       }

       $this->view->message = $message;
       $this->render();

    }
}

?>