<?php

class Employee {

	private $id;
	private $roleID;
	private $roleName;
	private $firstName;
	private $middleName;
	private $lastName;
	private $email;
	private $password;
	private $active;
	
	function  __construct($id, $firstName, $middleName, $lastName, $email, $password, $roleID, $roleName) {
		$this->id = $id;
		$this->firstName = $firstName;
		$this->middleName = $middleName;
		$this->lastName = $lastName;
		$this->email = $email;
		$this->password = $password;
		$this->roleID = $roleID;
		$this->roleName = $roleName;
	}
    
}
?>