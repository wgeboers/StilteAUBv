<?php

class Employee {

	private $id;
	private $firstName;
	private $middleName;
	private $lastName;
	private $email;
	private $creationDate;
	private $active;
	
	function  __construct($id, $firstName, $middleName, $lastName, $email, $creationDate, $active) {
		$this->id = $id;
		$this->firstName = $firstName;
		$this->middleName = $middleName;
		$this->lastName = $lastName;
		$this->email = $email;
		$this->creationDate = $creationDate;
		$this->active = $active;

	}
    
	public function getEmployeeID() {
		return $this->id;
	}

	public function getName() {
		return $this->firstName;
	}

	public function toArray() {
		return array($this->id, $this->firstName, $this->middleName, $this->lastName, $this->email, $this->creationDate, $this->active);
	}
}
?>