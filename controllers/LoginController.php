<?php

class LoginController{

	private $render;
	private $loginModel;

	public function __construct($render, $loginModel){

   	$this->render=$render;
   	$this->loginModel=$loginModel;

	}

	public function iniciarSesion(){

		if(isset($_SESSION["usuario"]) ){
	      $this->render->cuenta();
	  	}

	  	$user=isset($_POST['usuario'])?$_POST['usuario']:"";
		$pass=isset($_POST['password'])?$_POST['password']:"";
        
		$usuario["usuario"] = $this->loginModel->validarUsuario($user,$pass);
		echo $this->render->render("view/cuenta.mustache",$usuario);

	}

	public function cerrarSesion(){

		session_destroy();
        $this->render->inicio();
	}
}