<?php

class Employee {

	private int $id;
	private string $firstName;
	private string $middleName;
	private string $lastName;
	private string $email;
	private string $creationDate;
	private string $active;
	
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
		return array('EmployeeID'=>$this->id, 'First Name'=>$this->firstName, 'Middle Name'=>$this->middleName, 'Last Name'=>$this->lastName, 'Email'=>$this->email, 'Creation Date'=>$this->creationDate, 'ACTIVE'=>$this->active);
	}
}
?>