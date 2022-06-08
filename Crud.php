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
	public function select($table, $where, $param) {
		try {
			$select = $this->connection->prepare("SELECT * FROM {$table} WHERE `{$where}` = '{$param}'");
			$select->execute();
			return $select->fetchall(PDO::FETCH_ASSOC);
		} catch(PDOException $e) {
			return $e;
		}
	}

	public function delete($table, $where, $param) {
		if(isset($where) && isset($param)) {
			try {
				$statement = $this->connection->prepare("DELETE FROM {$table} WHERE {$where} = {$param}");
				$statement->execute();
			} catch(PDOException $e) {
				echo $e;
			}
		} else {
			try {
				$statement = $this->connection->prepare("DELETE FROM {$table}");
				$statement->execute();
			} catch(PDOException $e) {
				echo $e;
			}
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
	public function update($data = array(), $table, $where, $param) {
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
			$statement = "UPDATE {$table} SET {$values} WHERE {$where} = '{$param}'";
			$insert = $this->connection->prepare($statement);
			$insert->execute();
		} catch(PDOException $e) {
			return $e;
		}
	}
	
	#Dynamically generated sql statement 'insert' based on a given array and a given table
	#Input : Array with key=>value using column names from the given mysql table.
	#Testable in test.php; for output check the database.
	public function insert($data = array(), $table) {
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
	
	public function selectByUser($id, $table) {
		try {
			$select = $this->connection->prepare("SELECT * FROM {$table} WHERE `UserID` = {$id}");
			$select->execute();
			return $select->fetchall(PDO::FETCH_ASSOC);
		} catch(PDOException $e) {
			echo $e;
		}
	}
	public function selectByEmployee($table, $where, $param) {
		try {
			$select = $this->connection->prepare("SELECT * FROM {$table} WHERE {$where} = {$param}");
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

	######################################################
	####################Employees#########################
	######################################################
	public function getTable($table) {
		try {
			$select = $this->connection->prepare("SELECT * FROM `$table`");
			$select->execute();
			return $select->fetchall(PDO::FETCH_ASSOC);
		} catch(PDOExeption $e) {
			echo $e;
		}
	}
	public function getTableEmployees() {
		try {
			$select = $this->connection->prepare("SELECT `EmployeeID`, `First_Name`, `Middle_Name`,
			`Last_Name`, `Email`, `Creation_Date`, `ACTIVE` FROM `employees`");
			$select->execute();
			return $select->fetchall(PDO::FETCH_ASSOC);
		} catch(PDOExeption $e) {
			echo $e;
		}
	}


	// //Retreive products from the database based on a search term on name and description
	// public function getProducts(string $searchTerm = "") {
	// 	try {
	// 		$searchTerm = "%$searchTerm%";
	// 		$select = $this->connection->prepare("SELECT * FROM products WHERE name LIKE :search OR description LIKE :search");
	// 		$select->bindParam(':search', $searchTerm, PDO::PARAM_STR);
	// 		$select->execute();
	// 		return $select->fetchall(PDO::FETCH_ASSOC);
	// 	} catch(PDOException $e) {
	// 		echo $e;
	// 	}
	// }

	public function selectByEmail($email, $table = 'users') {
		try {
			$select = $this->connection->prepare("SELECT * FROM {$table} WHERE `email` = '{$email}'");
			$select->execute();
			return $select->fetchall(PDO::FETCH_OBJ);
		} catch(PDOException $e) {
			echo $e;
		}
	}

	public function addEmployee($firstName, $middleName, $lastName, $email, $password){
		$insert = $this->connection->prepare("INSERT INTO `employees` (`First_Name`, `Middle_Name`, `Last_Name`, `Email`, `Password`) VALUES ('$firstName', '$middleName', '$lastName', '$email', '$password')");
		$insert->execute();
		return $this->connection->lastInsertId();
	}

	public function addEmployeeRole($id, $roleID){
		try {
			$insert = $this->connection->prepare("INSERT INTO `employees-roles` (`EmployeeID`, `RoleID`) VALUES ('$id', '$roleID')");
			$insert->execute();
		} catch(PDOException $e) {
			echo $e;
		}

	}

	public function getEmployee($table, $id) {
		try {
			$select = $this->connection->prepare("SELECT emp.*, er.`RoleID`, rol.`Name` FROM `$table`emp INNER JOIN `employees-roles` er ON emp.`EmployeeID` = er.`EmployeeID` INNER JOIN `roles` rol ON er.`RoleID` = rol.`RoleID` WHERE emp.EmployeeID = $id");
			$select->execute();
			return $select->fetch(PDO::FETCH_ASSOC);
		} catch(PDOExeption $e) {
			echo $e;
		}
	}

	public function updateEmployee($id, $firstName, $middleName, $lastName, $email, $password, $active){
		$update = $this->connection->prepare("UPDATE `employees` SET `First_Name` = '$firstName', `Middle_Name` = '$middleName', `Last_Name` = '$lastName', `Email` = '$email', `Password` = '$password', `ACTIVE` = '$active' WHERE EmployeeID = $id");
		$update->execute();
	}

	public function updateEmployeeRole($role, $id){
		try {
			$update = $this->connection->prepare("UPDATE `employees-roles` SET `RoleID` = $role WHERE EmployeeID = $id");
			$update->execute();
		} catch(PDOException $e) {
			echo $e;
		}
		
	}

	######################################################
	#######################Rollen#########################
	######################################################
	public function addRole($name, $description){
		$insert = $this->connection->prepare("INSERT INTO `roles` (`Name`, `Description`) VALUES ('$name', '$description')");
		$insert->execute();
	}

	public function getRole($table, $id) {
		try {
			$select = $this->connection->prepare("SELECT * FROM `$table` WHERE RoleID = $id");
			$select->execute();
			return $select->fetch(PDO::FETCH_ASSOC);
		} catch(PDOExeption $e) {
			echo $e;
		}
	}

	public function updateRole($id, $name, $description){
		$update = $this->connection->prepare("UPDATE `roles` SET `Name` = '$name', `Description` = '$description' WHERE RoleID = $id");
		$update->execute();
	}

	######################################################
	#####################Products#########################
	######################################################
	public function getProducts() {
		try {
			$select = $this->connection->prepare("SELECT prd.*, pi.`ImageID`, img.`File_Name` as ImageName, img.`File_Path` as ImagePath FROM `products`prd LEFT JOIN `products-images` pi ON prd.`ProductID` = pi.`ProductID` LEFT JOIN `images` img ON pi.`ImageID` = img.`ImageID`");
			$select->execute();
			return $select->fetchall(PDO::FETCH_ASSOC);
		} catch(PDOExeption $e) {
			echo $e;
		}
	}

	public function getSingleProduct($id) {
		try {
			$select = $this->connection->prepare("SELECT prd.*, pi.`ImageID`, img.`File_Name` as ImageName, img.`File_Path` as ImagePath FROM `products`prd LEFT JOIN `products-images` pi ON prd.`ProductID` = pi.`ProductID` LEFT JOIN `images` img ON pi.`ImageID` = img.`ImageID` WHERE prd.`ProductID` = {$id}");
			$select->execute();
			return $select->fetchall(PDO::FETCH_ASSOC);
		} catch(PDOExeption $e) {
			echo $e;
		}
	}

	public function getProductsImages($table) {
		try {
			$select = $this->connection->prepare("SELECT * FROM `$table`");
			$select->execute();
			return $select->fetchall(PDO::FETCH_ASSOC);
		} catch(PDOExeption $e) {
			echo $e;
		}
	}

	public function addProduct($name, $description, $stock, $price){
		$insert = $this->connection->prepare("INSERT INTO `products` (`Name`, `Description`, `Stock`, `Price`) VALUES ('$name', '$description', $stock, $price)");
		$insert->execute();
	}

	public function addProductLog($id, $name, $description, $stock, $price){
		$insert = $this->connection->prepare("INSERT INTO `productlogs` (`ProductID`, `Name`, `Description`, `Stock`, `Price`) VALUES ($id, '$name', '$description', $stock, $price)");
		$insert->execute();
	}

	public function getProduct($table, $id) {
		try {
			$select = $this->connection->prepare("SELECT prd.*, pi.`ImageID`, img.`File_Name` as ImageName, img.`File_Path` as ImagePath FROM `$table`prd LEFT JOIN `products-images` pi ON prd.`ProductID` = pi.`ProductID` LEFT JOIN `images` img ON pi.`ImageID` = img.`ImageID` WHERE prd.ProductID = $id;");
			$select->execute();
			return $select->fetch(PDO::FETCH_ASSOC);
		} catch(PDOExeption $e) {
			echo $e;
		}
	}

	public function updateProduct($id, $name, $description, $stock, $price){
		$update = $this->connection->prepare("UPDATE `products` SET `price` = '$name', `Description` = '$description', `Stock` = $stock, `Price` = $price WHERE ProductID = $id");
		$update->execute();
	}

	public function addProductImage($id, $imageId){
		$insert = $this->connection->prepare("INSERT INTO `products-images` (`ProductID`, `ImageID`) VALUES ('$id', '$imageId')");
		$insert->execute();
	}
	
	public function updateProductImage($id, $imageId){
		$update = $this->connection->prepare("UPDATE `products-images` SET `ImageID` = $imageId WHERE ProductID = $id");
		$update->execute();
	}

	######################################################
	######################Images##########################
	######################################################
	public function addImage($fileName, $filePath){
		$insert = $this->connection->prepare("INSERT INTO `images` (`File_Name`, `File_Path`) VALUES ('$fileName', '$filePath')");
		$insert->execute();
	}

	######################################################
	#######################Orders#########################
	######################################################
	public function getOrder($table, $id) {
		try {
			$select = $this->connection->prepare("SELECT * FROM `$table` WHERE HeaderID = $id");
			$select->execute();
			return $select->fetch(PDO::FETCH_ASSOC);
		} catch(PDOExeption $e) {
			echo $e;
		}
	}

	public function updateOrder($id, $status, $finishedDate){
		$update = $this->connection->prepare("UPDATE `orderheaders` SET `Status` = '$status', `Finished_Date` = '$finishedDate' WHERE HeaderID = $id");
		$update->execute();
	}

	public function updateStatus($id, $status){
		$update = $this->connection->prepare("UPDATE `orderheaders` SET `Status` = '$status' WHERE HeaderID = $id");
		$update->execute();
	}

	public function getOrdersDetail($id) {
		try {
			$select = $this->connection->prepare("SELECT prd.`Name`, prd.`Description`, ol.`Amount`, ol.`Line_Price` FROM `orderlines` ol INNER JOIN `products` prd ON ol.`ProductID` = prd.`ProductID` where ol.`HeaderID` = $id;");
			$select->execute();
			return $select->fetchall(PDO::FETCH_OBJ);
		} catch(PDOExeption $e) {
			echo $e;
		}
	}

	public function addOrderHeader($deliverAdres, $deliverZipcode, $deliverCity){
		$insert = $this->connection->prepare("INSERT INTO `orderHeaders` (`Deliver_Adres`, `Deliver_Zipcode`, `Deliver_City`) VALUES ('$deliverAdres', '$deliverZipcode', '$deliverCity')");
		$insert->execute();
		return $this->connection->lastInsertId();
	}	

	public function addOrderLine($headerid, $productid, $amount, $linePrice){
		$insert = $this->connection->prepare("INSERT INTO `orderLines` (`HeaderID`, `ProductID`, `Amount`, `Line_Price`) VALUES ('$headerid', '$productid', $amount, $linePrice)");
		$insert->execute();
	}	
	
	public function addSearchTerm(string $searchTerm, bool $passed) {
		try {
			//$sql = "INSERT IGNORE INTO searchhistories values (:search, TRUE, '')";
			$sql2 = "INSERT INTO searchhistories (Search_Description, Passed)
			SELECT * FROM (SELECT :search, :passed) AS tmp
			WHERE NOT EXISTS (
				SELECT Search_Description, Passed FROM searchhistories WHERE Search_Description = :search AND Passed = :passed
			) LIMIT 1";
			$insert = $this->connection->prepare($sql2);
			$insert->bindParam(':search', $searchTerm, PDO::PARAM_STR);
			$insert->bindParam(':passed', $passed, PDO::PARAM_INT);
			$insert->execute();
		}catch (PDOException $e) {
			echo $e;
		}
	}
}
?>