<?php

require_once('db_conn.php');

class Crud extends db_conn {
	
	public $cols=''; 
    public $vals=''; 
	
    public $col=''; 
    public $val=''; 
	
	public function __construct() {
		parent::__construct();
	}
	
	public function selectDataById($table, $id) {
		$select = $this->connection->prepare("SELECT * FROM $table WHERE `UserId` = $id");
		$select->execute();
		return $select->fetchall(PDO::FETCH_OBJ);
	}
	
	public function insertUser(array $data) {
		
		try {
		$insert = $this->connection->prepare("INSERT INTO `users` (`First_Name`, `Last_Name`, `Email`, `Phone_Number`, `Password`, `Street`, `House_Number`, `Zipcode`, `City`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$i = 0;
		$j = 1;
		
		while($i < count($data)) {
			$insert->bindParam($j, $data[$i], PDO::PARAM_STR);
			$i++;
			$j++;
		}
		$insert->execute();
		} catch(PDOException $e) {
			return $e;
		}
		
	}
	
	public function update($data, $table, $id) : void {
		
	}
	
	public function deleteData($table, $where) {
		$delete= $this->connection->prepare("DELETE FROM $table WHERE id=$where");
		$delete->execute();
	}
}	

?>