<?php

class Configuracion{

	public static function crearDataBase(){

		include_once('helper/DataBase.php');
		$config = self::getConfigurationParameters();
		return new Database($config["servername"], $config["username"], $config["password"], $config["dbname"]);
	}
	
	public static function crearRender(){

		include_once('third-party/mustache/src/Mustache/Autoloader.php');
		include_once('helper/Render.php');
		return new Render('view/partial');
	}
	
	public static function crearLoginModel(){

		  $database = self::crearDatabase();
		  include_once("models/LoginModel.php");
		  return new LoginModel($database);

	}

	public static function crearLoginController(){

		$render = Configuracion::crearRender();
		$loginModel = Configuracion::crearLoginModel();
		include_once("controllers/LoginController.php");
		return new LoginController($render, $loginModel);
	}

}