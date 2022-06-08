<?php

class User {
	
	private int $id;
	private string $firstName;
	private ?string $midName;
	private string $lastName;
	private string $email;
	private string $phoneNr;
	private string $street;
	private int $houseNr;
	private ?string $houseNrAdd;
	private string $zipcode;
	private string $city;

	
	function  __construct($id, $firstName, $midName, $lastName, $email, $phoneNr, $street, $houseNr, $houseNrAdd, $zipcode, $city) {
		$this->id = $id;
		$this->firstName = $firstName;
		$this->midName = $midName ?? ''; #because midName can be NULL.
		$this->lastName = $lastName;
		$this->email = $email;
		$this->phoneNr = $phoneNr;
		$this->street = $street;
		$this->houseNr = $houseNr;
		$this->houseNrAdd = $houseNrAdd ?? ''; #because houseNrAdd can be NULL.
		$this->zipcode = $zipcode;
		$this->city = $city;
		
	}

	public function getId() {
		return $this->id;
	}

	public function getName() {
		return $this->firstName;
	}

	public function getEmail() {
		return $this->email;
	}

	public function getPhoneNumber() {
		return $this->phoneNr;
	}

	public function getAddress() {
		return array($this->street, $this->houseNr, $this->houseNrAdd, $this->zipcode, $this->city);
	}

	public function getAllData() {
		return array('First Name'=>$this->firstName, 'Middle Name'=>$this->midName, 'Last Name'=>$this->lastName, 'Email'=>$this->email, 'Phone Number'=>$this->phoneNr,
		'Street'=>$this->street, 'House Number'=>$this->houseNr, 'House Number Addition'=>$this->houseNrAdd, 'Zipcode'=>$this->zipcode, 'City'=>$this->city);
	}
}
?>