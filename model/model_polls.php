<?php
require_once "../include/PDOConnector.php";

class Model_polls extends PDOConnector{
	/*
		function addPoll
		for:      adding polls
		params:   $brand_id, $user_id <=== an user id, an current na naka login nga user. an brand id, an gin pili na brand
		return:   $id <==== an last nga gin insert na data
	*/
	function addPoll($brand_id, $user_id){
		$id;
		$this->connect();
		try{
			$sql = "INSERT INTO tb_polls(brand_id, user_id) VALUES(?, ?)";
			$stmt = $this->dbh->prepare($sql);
			$stmt->bindParam(1, $brand_id);
			$stmt->bindParam(2, $user_id);
			$stmt->execute();

			$return = $this->dbh->lastInsertId();
		}catch(PDOException $e){
			print_r($e);
		}
		$this->close();
		return $id;
	}
}