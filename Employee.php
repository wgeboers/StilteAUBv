<?php

class Employee {

	private $id;
	private $firstName;
	private $middleName;
	private $lastName;
	private $email;
	
	function  __construct($id, $firstName, $middleName, $lastName, $email) {
		$this->id = $id;
		$this->firstName = $firstName;
		$this->middleName = $middleName;
		$this->lastName = $lastName;
		$this->email = $email;
	}
    
	public function getEmployeeID() {
		return $this->id;
	}

	public function getName() {
		return $this->firstName;
	}
}
?>