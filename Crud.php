<?php

require_once('db_conn.php');

#Class used to Select, Insert, Delete, Update & otherwise manipulate the database.
#You can add classes per query you want to run, but preferably every query will be a generic one based on params $data, $id, $table
#############################################
# TODO: generic select/insert/update/delete #
#############################################
class Crud extends db_conn {
	
	public function __construct() {
		parent::__construct();
	}
	
	#TO DO: Change all ID's in database to a single 'id' so we can select globally by id with this function.
	#IF THIS DOESNT WORK: CHANGE `id` TO `UserId`... BUT PREFERABLY CHANGE DB ENTRY TO `id` SO ITS A GENERAL QUERY
	#ELSE WE NEED A SEPARATE QUERY FOR EVERY TABLE, WHICH IS ANNOYING AND BLOAT.
	public function select($table, $id) {
		$select = $this->connection->prepare("SELECT * FROM $table WHERE `id` = $id");
		$select->execute();
		return $select->fetchall(PDO::FETCH_OBJ);
	}
	
	#Values are bound in the while-loop based on position in the array
	#2 counters (i, j), because for some reason bindParam starts at 1 instead of 0 with the assignment of data to the query.
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
		} catch(PDOException $e) {
				return $e;
			}
		
	}
	
	#TO DO: Generic update based on the table, the key=>value pairs as data and the id to identify a row.
	public function update($data, $table, $id) {
		try {
			#$update = $this->connection->prepare("UPDATE $table ($data[keys]) VALUES ($data[vals])");
			
		} catch(PDOException $e) {
			return $e;
		}
	}
	
	#TO DO: Generic insert based on the table, the key=>value pairs as data.
	public function insert($data, $table) {
		try {
			#$insert = $this->connection->prepare("INSERT INTO $table (data[key], data[key], data[key]) VALUES (data[val], data[val], data[val])
			
		} catch(PDOException $e) {
			return $e;
		}
	}
	
	#Generic delete, based on the table and a row id, only works if id is generic.
	public function deleteData($table, $where) {
		$delete= $this->connection->prepare("DELETE FROM $table WHERE id=$where");
		$delete->execute();
	}
}	

?>