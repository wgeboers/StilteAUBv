<?php

require_once('Database.php');

#Class used to Select, Insert, Delete, Update & otherwise manipulate the database.
#You can add functions per query you want to run, but preferably every query will be a generic one based on params $data, $id, $table
#############################################
# TODO: error handling for all functions.
class Crud extends Database {
	
	#TODO: change constructor to not use user, password.
	public function __construct(string $user, string $password) {
		parent::__construct($user, $password);
	}
	
	#IF THIS DOESNT WORK: CHANGE `id` TO `UserId`... BUT PREFERABLY CHANGE DB ENTRY TO `id` SO ITS A GENERAL QUERY
	#ELSE WE NEED A SEPARATE QUERY FOR EVERY TABLE, WHICH IS ANNOYING AND BLOAT.
	#OTHER POSSIBILITY IS GETTING THE ID NAME FROM THE TABLE AND PUTTING IT AS PARAM INTO THE FUNCTION
	public function select($param, $table = 'users', $where = 'UserID') {
		try {
			$select = $this->connection->prepare("SELECT * FROM {$table} WHERE `{$where}` = '{$param}'");
			$select->execute();
			return $select->fetchall(PDO::FETCH_OBJ);
		} catch(PDOException $e) {
			return $e;
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
	
	#Dynamically generated sql statement 'updateProfile' based on given array, table & user/employee email
	#Input: Array with key=>value using column names from the given mysql, email is the value used to identify the row to update.
	#Testable in test.php; for output check the database.
	public function updateProfile($data = array(), $table, $email) {
		$keys = array_keys($data);
		$updateData = array_values($data);
		$values = NULL;
		for($i = 0; $i < count($data); $i++) {
			$updateField = $updateData[$i];
			$key = $keys[$i];
			$values .= "{$key}" . "=" . "'{$updateField}'";
			if($i < (count($data)-1)) {
				$values .= ", ";
			}
		}
		try {
			$statement = "UPDATE {$table} SET {$values} WHERE `email` = '{$email}'";
			$insert = $this->connection->prepare($statement);
			$insert->execute();
		} catch(PDOException $e) {
			return $e;
		}
	}
	
	#Dynamically generated sql statement 'insert' based on a given array and a given table
	#Input : Array with key=>value using column names from the given mysql table.
	#Testable in test.php; for output check the database.
	public function insert($data = array(), $table = 'users') {
		$keys = array_keys($data);
		$insertData = array_values($data);
		$values = NULL;
		$i = 1;
		foreach($data as $value) {
			$values .= "?";
			if($i < count($data)) {
				$values .= ", ";
			}
			$i++;
		}
		try {
			$statement = "INSERT INTO {$table} (`" . implode('`, `', $keys) . "`) VALUES ({$values})";
			$insert = $this->connection->prepare($statement);
			$insert->execute($insertData);
		} catch(PDOException $e) {
			return $e;
		}
	}
	
	#Generic delete, based on the table and a row id, only works if id is generic.
	public function deleteData($table, $id, $where) {
		$delete= $this->connection->prepare("DELETE FROM {$table} WHERE {$where} = {$id}");
		$delete->execute();
		return true;
	}
	
	public function selectByUser(int $id, $table) {
		try {
			$select = $this->connection->prepare("SELECT * FROM {$table} WHERE `UserId` = {$id}");
			$select->execute();
			return $select->fetchall(PDO::FETCH_ASSOC);
		} catch(PDOException $e) {
			echo $e;
		}
	}
	public function selectByEmployee(int $id, $table) {
		try {
			$select = $this->connection->prepare("SELECT * FROM {$table} WHERE `EmployeeID` = {$id}");
			$select->execute();
			return $select->fetchall(PDO::FETCH_ASSOC);
		} catch(PDOException $e) {
			echo $e;
		}
	}
	
	#Used to fetch a User's ID, if it is there, based on username and password, they will be logged in
	#if not throws a pdo exception
	#TO DO: Error handling
	public function validateUser(string $email, string $password, string $table) {
		try {
			$selectArray = array($email, $password);
			$select = $this->connection->prepare("SELECT * FROM {$table} WHERE `Email` = ? AND `Password` = ?");
			$select->execute($selectArray);
			return $select->fetchColumn();
		} catch(PDOException $e) {
			echo $e;
		}
	}

	public function selectByEmail($email, $table = 'users') {
		try {
			$select = $this->connection->prepare("SELECT * FROM {$table} WHERE `email` = '{$email}'");
			$select->execute();
			return $select->fetchall(PDO::FETCH_OBJ);
		} catch(PDOException $e) {
			echo $e;
		}
	}

	#NEEDS TO BE PUT ELSEWHERE.... EMPLOYEEMANAGER MAYBE?
	function csvToDatabase($fp, $db) {
		try {
			$statement = $db->prepare("INSERT INTO `products` (`Name`, `Description`, `Stock`, `Price`, `Created_By`) VALUES (?, ?, ?, ?, ?)");
			$i = 0;
			
			while(($data = fgetcsv($fp , 1000, ",")) !== FALSE){
				
				if($i >= 0) {
					$data = str_replace('"', '', $data);
					
					$statement->bindParam(1, $data[0], PDO::PARAM_STR);
					$statement->bindParam(2, $data[1], PDO::PARAM_STR);
					$statement->bindParam(3, $data[2], PDO::PARAM_STR);
					$statement->bindParam(4, $data[3], PDO::PARAM_STR);
					$statement->bindParam(5, $data[4], PDO::PARAM_STR);
					$statement->execute();
				}
				$i++;
			}
		}
		catch(PDOException $e) {
			echo $e->getMessage()."\n";
		}
		
	}
}
?>