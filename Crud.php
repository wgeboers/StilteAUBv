<?php

require_once('db_conn.php');

#Class used to Select, Insert, Delete, Update & otherwise manipulate the database.
#You can add functions per query you want to run, but preferably every query will be a generic one based on params $data, $id, $table
#############################################
# TODO: error handling for all functions.
class Crud extends db_conn {
	
	public function __construct(string $user, string $password) {
		parent::__construct($user, $password);
	}
	
	#TO DO: Change all ID's in database to a single 'id' so we can select globally by id with this function.
	#IF THIS DOESNT WORK: CHANGE `id` TO `UserId`... BUT PREFERABLY CHANGE DB ENTRY TO `id` SO ITS A GENERAL QUERY
	#ELSE WE NEED A SEPARATE QUERY FOR EVERY TABLE, WHICH IS ANNOYING AND BLOAT.
	#OTHER POSSIBILITY IS GETTING THE ID NAME FROM THE TABLE AND PUTTING IT AS PARAM INTO THE FUNCTION
	public function select($table, $id) {
		try {
			$select = $this->connection->prepare("SELECT * FROM $table WHERE `id` = $id");
			$select->execute();
			return $select->fetchall(PDO::FETCH_OBJ);
		} catch(PDOException $e) {
			echo $e;
		}
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
		$delete= $this->connection->prepare("DELETE FROM $table WHERE id = $where");
		$delete->execute();
	}
	
	public function selectByUser($table, string $email, string $password) {
		try {
			$select = $this->connection->prepare("SELECT * FROM `$table` WHERE `Email` = '$email' AND `Password` = '$password'");
			$select->execute();
			return $select->fetchall(PDO::FETCH_OBJ);
		} catch(PDOException $e) {
			echo $e;
		}
	}
	
	#Used to fetch a User's ID, if it is there, based on username and password, they will be logged in
	#if not throws a pdo exception
	#TO DO: Error handling
	public function validateUser($table, string $email, string $password) {
		try {
			$select = $this->connection->prepare("SELECT * FROM `$table` WHERE `Email` = ? AND `Password` = ?");
			$selectArray = array($email, $password);
			$select->execute($selectArray);
			return $select->fetchColumn();
		} catch(PDOException $e) {
			echo $e;
		}
	}

	//Retreive products from the database based on a search term on name and description
	public function getProducts(string $searchTerm = "") {
		try {
			$searchTerm = "%$searchTerm%";
			$select = $this->connection->prepare("SELECT * FROM products WHERE name LIKE :search OR description LIKE :search");
			$select->bindParam(':search', $searchTerm, PDO::PARAM_STR);
			$select->execute();
			return $select->fetchall(PDO::FETCH_ASSOC);
		} catch(PDOException $e) {
			echo $e;
		}
	}

	public function addSearchTerm(string $searchTerm) {

	}
}	
?>