<?php

class Employee {
	
	private int $id;
	private string $firstName;
	private ?string $midName;
	private string $lastName;
	private string $email;

	
	function  __construct($id, $firstName, $midName, $lastName, $email) {
		$this->id = $id;
		$this->firstName = $firstName;
		$this->midName = $midName ?? ''; #because midName can be NULL.
		$this->lastName = $lastName;
		$this->email = $email;
	}

	public function getId() {
		return $this->id;
	}

	public function getName() {
		return "{$this->firstName} {$this->midName} {$this->lastName}";
	}

	public function getEmail() {
		return $this->email;
	}
}
?>