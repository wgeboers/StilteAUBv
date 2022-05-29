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

	######################################################
	####################Employees#########################
	######################################################
	public function getEmployees($table) {
		try {
			$select = $this->connection->prepare("SELECT * FROM `$table`");
			$select->execute();
			return $select->fetchall(PDO::FETCH_OBJ);
		} catch(PDOExeption $e) {
			echo $e;
		}
	}

	public function addEmployee($firstName, $middleName, $lastName, $email, $password){
		$insert = $this->connection->prepare("INSERT INTO `employees` (`First_Name`, `Middle_Name`, `Last_Name`, `Email`, `Password`) VALUES ('$firstName', '$middleName', '$lastName', '$email', '$password')");
		$insert->execute();
		return $this->connection->lastInsertId();
	}

	public function addEmployeeRol($id, $rol){
		$insert = $this->connection->prepare("INSERT INTO `employees-roles` (`EmployeeID`, `RoleID`) VALUES ('$id', '$rol')");
		$insert->execute();
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

	public function updateEmployeeRol($id, $rol){
		$update = $this->connection->prepare("UPDATE `employees-roles` SET `RoleID` = $rol WHERE EmployeeID = $id");
		$update->execute();
	}

	######################################################
	#######################Rollen#########################
	######################################################
	public function getRoles($table) {
		try {
			$select = $this->connection->prepare("SELECT * FROM `$table`");
			$select->execute();
			return $select->fetchall(PDO::FETCH_OBJ);
		} catch(PDOExeption $e) {
			echo $e;
		}
	}

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
	###################Search history#####################
	######################################################
	public function getHistory($table) {
		try {
			$select = $this->connection->prepare("SELECT * FROM `$table`");
			$select->execute();
			return $select->fetchall(PDO::FETCH_OBJ);
		} catch(PDOExeption $e) {
			echo $e;
		}
	}

	######################################################
	#####################Products#########################
	######################################################
	public function getProducts($table) {
		try {
			$select = $this->connection->prepare("SELECT prd.*, pi.`ImageID`, img.`File_Name` as ImageName, img.`File_Path` as ImagePath FROM `$table`prd LEFT JOIN `products-images` pi ON prd.`ProductID` = pi.`ProductID` LEFT JOIN `images` img ON pi.`ImageID` = img.`ImageID`");
			$select->execute();
			return $select->fetchall(PDO::FETCH_OBJ);
		} catch(PDOExeption $e) {
			echo $e;
		}
	}

	public function getProductsImages($table) {
		try {
			$select = $this->connection->prepare("SELECT * FROM `$table`");
			$select->execute();
			return $select->fetchall(PDO::FETCH_OBJ);
		} catch(PDOExeption $e) {
			echo $e;
		}
	}

	public function addProduct($name, $description, $stock, $price){
		$insert = $this->connection->prepare("INSERT INTO `products` (`Name`, `Description`, `Stock`, `Price`) VALUES ('$name', '$description', $stock, $price)");
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
	public function getImages($table) {
		try {
			$select = $this->connection->prepare("SELECT * FROM `$table`");
			$select->execute();
			return $select->fetchall(PDO::FETCH_OBJ);
		} catch(PDOExeption $e) {
			echo $e;
		}
	}

	public function addImage($fileName, $filePath){
		$insert = $this->connection->prepare("INSERT INTO `images` (`File_Name`, `File_Path`) VALUES ('$fileName', '$filePath')");
		$insert->execute();
	}

	######################################################
	#######################Orders#########################
	######################################################
	public function getOrders($table) {
		try {
			$select = $this->connection->prepare("SELECT * FROM `$table`");
			$select->execute();
			return $select->fetchall(PDO::FETCH_OBJ);
		} catch(PDOExeption $e) {
			echo $e;
		}
	}

	public function getOrder($table, $id) {
		try {
			$select = $this->connection->prepare("SELECT * FROM `$table` WHERE HeaderID = $id");
			$select->execute();
			return $select->fetch(PDO::FETCH_ASSOC);
		} catch(PDOExeption $e) {
			echo $e;
		}
	}

	public function updateOrder($id, $status){
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
} 
?>