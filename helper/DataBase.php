<?php

class DataBase {

	private $servername;
	private $username;
	private $password;
	private $dbname;
	private $conn;
	

	public function __construct($servername, $username, $password, $dbname){

		$this->servername = $servername;
		$this->username = $username;
		$this->password = $password;
		$this->dbname = $dbname;
		$this->connect();
	}

	public function connect()
	{
		$this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
		
		if (!$this->conn) {
		    die("Connection failed: " . mysqli_connect_error());
		}

		
	}

	public function query($sql)
	{
		$result = $this->conn->query($sql);

		return $result->fetch_all(MYSQLI_ASSOC);
		
	}

	public function __destruct()
	{
		mysqli_close($this->conn);
		
	}

}