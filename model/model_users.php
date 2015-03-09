<?php
require_once "../include/PDOConnector.php";

class Model_users extends PDOConnector{

	/*
		function getUser
		params: $username, $passowrd
		for: login function
	*/
	public function getUser($username, $password){
		$this->connect();
		$result = null;
		try{
			$sql = "SELECT * FROM tbl_user WHERE username = ? AND password = ?";
			$stmt = $this->dbh->prepare($sql);
			$stmt->bindParam(1, $username);
			$stmt->bindParam(2, $password);
			$stmt->execute();
			if($rs = $stmt->fetch()){

				$result['id'] = $rs['id'];
				$result['name'] = $rs['name'];
				$result['username'] = $rs['username'];
				$result['password'] = $rs['password'];
			}
		}catch(PDOException $e){
			print_r($e);
		}

		return $result;
		$this->close();
	}
}