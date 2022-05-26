<?php

require_once("Crud.php");

#User fetches from database with the help of a crud object.
class User {
	
	private $crud;
	
	function  __construct() {
		$this->crud = new Crud('root', '');
	}
	
	#get userdata from db via crud
	public function getUserData() {
		if(!empty($_SESSION["id"]) && isset($_SESSION["id"])) {
			$$_SESSION["type"] = "users";
			$userData = $this->crud->select('users', $_SESSION["email"]);
			if(!isset($userData)) {
				$_SESSION["type"] = "employees";
				$userData =  $this->crud->select('employees', $_SESSION["email"]);
			} 
			return $userData;
		}
		
	}

	public function updateUserInformation($userData) {
		if(isset($userData) && !empty($userData)) {
			$this->crud->updateProfile($userData, $_SESSION["type"], $_SESSION["email"]);
		} else {
			echo "problems yep";
		}

	}
	
	public function login($email, $password) {		
		$validation = $this->crud->validateUser('users', $email, $password);
		if(!empty($validation)) {
			$_SESSION["id"] = $validation[0];
			$_SESSION["email"] = $email;
			return true;
		} else {
			$_SESSION["ErrorMsg"] = "Email or username invalid";
			if(isset($_SESSION['url'])) {
				$url = $_SESSION['url'];
			} else {
				$url = "index.php";
			}
			header("Location: https://localhost$url");
			return false;
		}
	}
}
?>