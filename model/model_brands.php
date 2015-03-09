<?php
require_once "../include/PDOConnector.php";

class Model_brands extends PDOConnector{

	/*
		function getAllBrands
		param: none
		return: $result(multi array);
		for: displaying all the brands
	*/
	public function getAllBrands(){
		$this->connect();
		$result = null;
		$counter = 0;
		try{
			$sql = "SELECT * FROM tbl_brands";
			$stmt->prepare($sql);
			$stmt->execute();

			while($rs = $stmt->fetch()){
				$result[$counter]['id'] = $rs['id'];
				$result[$counter]['name'] = $rs['name'];
				$counter++;
			}

		}catch(PDOException $e){
			print_r($e);
		}
		$this->close();

		return $result;
	}
}