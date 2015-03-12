<?php
require_once "../include/PDOConnector.php";
require_once "../model/model_brands.php";

class Model_polls extends PDOConnector{
	private $model_brands;
	function __construct(){
		$this->model_brands = new Model_brands();
	}
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

	/*
		function polls
		params:    none
		for:       to count the votes
		return:    array() <-- multidimension
	*/
	function polls(){
		$result = null;
		$counter = 0;
		$brands = $this->model_brands->getAllBrands();
		try{
			foreach($brands as $brand){
				$result[$counter]['id'] = $brand['id'];
				$result[$counter]['name'] = $brand['name'];
				$result[$counter]['votes'] = $this->countVotes($brand['id']);
			}
		}catch(PDOException $e){
			print_r($e)
		}
		return $result;
	}
	/*
		function countVotes
		params:    $brand_id
		for   :    called by function polls()
		return:    integer
	*/
	function countVotes($brand_id){
		$result = 0;
		$this->connect();
		try{
			$sql = "Select count(user_id) FROM tbl_polls WHERE brand_id = ?";
			$stmt = $this->dbh->prepare($sql);
			$stmt->bindParam(1, $brand_id);
			$stmt->execute();

			if($rs = $stmt->fetch()){
				$result = $rs[1];
			}else{
				$result = 0;
			}
		}catch(PDOException $e){
			print_r($e)
		}
		$this->close();
		return $result;
	}
}