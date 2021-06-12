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
       $user = $_POST['user'];
       $password = $_POST['password'];

       $message = "";
    
       if($this->model->insert(['user' => $user, 'password' => $password])){
            $message = "registro exitoso";
       }else{
            $message = "ya existe";
       }

       $this->view->message = $message;
       $this->render();

    }
}

?>