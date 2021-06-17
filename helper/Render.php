<?php

class Render{

	private $mustache;

	public function __construct($partialsPathLoader){

		Mustache_Autoloader::register();

		$this->mustache = new Mustache_Engine(

			array(

				'partials_loader' => new Mustache_Loader_FilesystemLoader($partialsPathLoader)

			));


	}

	function render($view,$data = []){

		$contentAsString = file_get_contents($view);
		return $this->mustache->render($contentAsString, $data);
	}

	function inicio(){
		
		header("location:index.php");
		exit();
		
	}

	function cuenta(){
		
		header("location:cuenta.php");
		exit();
		
	}
}