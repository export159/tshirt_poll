<?php

class PDOConnector{
	private $host = "10.10.19.39";
	private $dbname = "db_tPoll";
	private $username = "root";
	private $password = "";
	protected $dbh = null;

	protected function connect(){
		$host = $this->host;
		$dbname = $this->dbname;
		$username = $this->username;
		$password = $this->password;

		try{
			$this->dbh = new PDO("mysql:dbname=".$dbname.";host=".$host, $username, $password);
		}catch(PDOException $e){
			print_r($e);
		}
		

	}

	protected function close(){
		try{
			$this->dbh = null;
		}catch(PDOException $e){
			print_r($e);
		}
	}
}