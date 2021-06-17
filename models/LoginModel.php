<?php

class LoginModel{

	private $database;

	public function __construct($database){

   	$this->database=$database;

	}

	public function validarUsuario($user,$pass){

    $query="select * 
    		from Empleado
    		where usuario='".$user."' and password='".$pass."'";


	return $this->database->query($query);


}