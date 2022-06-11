<?php
/**
 * Class used to describe the entity 'Employee'
 */
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

	/**
	 * Function used to put the object values in an associative array
	 * Use this function to enable Employee object data to be uploaded to the database.
	 */
	public function toArray() {
		return array('EmployeeID'=>$this->id, 'First Name'=>$this->firstName, 'Middle Name'=>$this->middleName, 'Last Name'=>$this->lastName, 'Email'=>$this->email, 'Creation Date'=>$this->creationDate, 'ACTIVE'=>$this->active);
	}
}
?>