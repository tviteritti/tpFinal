<?php

class NotExists extends Controller{

    function __construct(){
        parent::__construct();
        $this->view->mensaje = "La URL no existe";
         $this->view->render('notExists/index');
    }

}

?>