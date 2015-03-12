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
			$sql = "SELECT * FROM tbl_users WHERE username = ? AND password = ?";
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

		$this->close();
		return $result;
	}

	/*
		function addUser
		params: $userInfo(array)
		for: signup functionality
	*/
	public function addUser($userInfo){
		$id = null;
		$this->connect();
		try{
			$sql = "INSERT INTO tbl_users(name, username, password) VALUES(?, ?, ?)";
			$stmt = $this->dbh->prepare($sql);
			$stmt->bindParam(1, $userInfo['name']);
			$stmt->bindParam(2, $userInfo['username']);
			$stmt->bindParam(3, $userInfo['password']);
			$stmt->execute();
			$id = $this->dbh->lastInsertId();
		}catch(PDOException $e){
			print_r($e);
		}
		$this->close();
		return $id;
	}
}