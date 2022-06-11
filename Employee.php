<?php
/**
 * Class used to describe the entity 'Employee'
 */
class Employee {

	private int $id;
	private string $firstName;
	private ?string $middleName = '';
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
    
	public function getEmployeeID() : int {
		return $this->id;
	}

	public function getName() : string {
		return $this->firstName;
	}

	/**
	 * Function used to put the object values in an associative array
	 * Use this function to enable Employee object data to be uploaded to the database.
	 */
	public function toArray() : array {
		return array('EmployeeID'=>$this->id, 'First Name'=>$this->firstName, 'Middle Name'=>$this->middleName, 'Last Name'=>$this->lastName, 'Email'=>$this->email, 'Creation Date'=>$this->creationDate, 'ACTIVE'=>$this->active);
	}
}
?>