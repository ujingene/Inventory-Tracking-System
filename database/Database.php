<?php 

include_once('Connection.php'); //import connection string

class Database extends Connection{


	public function __construct(){

		parent::__construct();

	}

	//get single record
	public function getRow($query, $params = []){
		try {
			$stmt = $this->datab->prepare($query);
			$stmt->execute($params);
			return $stmt->fetch();	
		} catch (PDOException $e) {
			throw new Exception($e->getMessage());	
		}


	}

	//get multiple records
	public function getRows($query, $params = []){
		try {
			$stmt = $this->datab->prepare($query);
			$stmt->execute($params);
			return $stmt->fetchAll();	
		} catch (PDOException $e) {
			throw new Exception($e->getMessage());	
		}
	}

	//insert record
	public function insertRow($query, $params = []){
		try {
			$stmt = $this->datab->prepare($query);
			$stmt->execute($params);
			return TRUE;	
		} catch (PDOException $e) {
			throw new Exception($e->getMessage());	
		}

	}

	//update row
	public function updateRow($query, $params = []){
		try{
			$stmt = $this->datab->prepare($query);
			$stmt->execute($params);
		} catch(PDOException $e) {
			throw new Exception($e->getMessage());
		}
		return $this->insertRow($query, $params);
	}

	//delete row
	public function deleteRow($query, $params = []){
		return $this->insertRow($query, $params);
	}

	//get the last inserted ID
	public function lastID(){
		$lastID = $this->datab->lastInsertId(); 
		return $lastID;
	}


	//perform multiple functions
	public function transInsert($query, $params = [], $query2, $params2 = []){
		try {
			$this->transaction->beginTransaction();
				$stmt = $this->datab->prepare($query);
				$stmt->execute($params);

				$stmt2 = $this->datab->prepare($query2);
				$stmt2->execute($params2);

			return $this->transaction->commit();
		} catch (PDOException $e) {
			$this->transaction->rollBack();
			throw new Exception($e->getMessage());	
		}
	}


	public function Begin(){
		return $this->transaction->beginTransaction();
	}

	public function Commit(){
		return $this->transaction->commit();
	}

	public function test()
	{
		echo 'database class test';
	}
}

$db = new Database();
 ?>