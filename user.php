<?php

require_once("Crud.php");

#User fetches from database with the help of a crud object.
class User {
	
	public $crud;
	
	function  __construct() {
		$this->crud = new Crud('root', '');
	}
	
	#Used to check with crud if the credentials are valid, if they are a session will be created based on the user's id.
	#Returns true or false based on whether the user's data was fetched from the database.
	public function getUser($table = 'users', $id) {
		return $this->crud->select($table, 1);
		
	}
	
	public function login($email, $password) {		
		$userData = $this->crud->validateUser('users', $email, $password);
		if(!empty($userData)) {
			$_SESSION["id"] = $userData[0];
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