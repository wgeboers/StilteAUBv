<?php

require_once("Crud.php");

#User fetches from database with the help of a crud object.
class User {
	
	private $crud;
	
	function  __construct() {
		$this->crud = new Crud('root', '');
	}
	
	#pulls all data from a given user or employee email
	#Does not work without a set session email, which can only be done by logging in.
	public function getUserData() {
		if(!empty($_SESSION["id"]) && isset($_SESSION['id'])) {
			$userData = $this->crud->selectByEmail($_SESSION['email']);
			if(empty($userData)) {
				$userData = $this->crud->selectByEmail($_SESSION['email'], 'employees');
			}
			return $userData;
		}		
	}

	#Used to update a user's information when they submit a change to their user information.
	#TODO: Implementation
	public function updateUserInformation($userData) {
		if(isset($userData) && !empty($userData)) {
			$this->crud->updateProfile($userData, $_SESSION['type'], $_SESSION['email']);
		} else {
			echo "problems yep";
		}
	}
	
	#function used to log a user in, automatically checks for an end user or employee login
	#when the login button is clicked, the users will be redirected to the page they were on when they logged
	#An error msg will be published to $_SESSION["errormsg"] if the login failed.
	public function login($email, $password) {		
		$validation = $this->crud->validateUser($email, $password);
		if(!empty($validation)) {
			$_SESSION['id'] = $validation[0];
			$_SESSION['email'] = $email;
			return true;
		} else {
			$validation = $this->crud->validateUser($email, $password, 'employees');
			if(!empty($validation)) {
				$_SESSION['id'] = $validation[0];
				$_SESSION['email'] = $email;
				return true;
			} else {
				$_SESSION["ErrorMsg"] = 'wrong pass/username';
			}
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