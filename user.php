<?php
/**
 * Class representing a User Object.
 */
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
	private ?string $password;

	
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
	/**
	 * Associative array based on object data.
	 * If password is set, it will be put into the array
	 * Used to display data more easily on the front end.
	 */
	public function getAllData() : array {
		if(isset($this->password)) {
			return array('First Name'=>$this->firstName, 'Middle Name'=>$this->midName, 'Last Name'=>$this->lastName, 'Email'=>$this->email, 'Phone Number'=>$this->phoneNr,
		'Street'=>$this->street, 'House Number'=>$this->houseNr, 'House Number Addition'=>$this->houseNrAdd, 'Zipcode'=>$this->zipcode, 'City'=>$this->city, 'Password'=>$this->password);
		} else {
			return array('First Name'=>$this->firstName, 'Middle Name'=>$this->midName, 'Last Name'=>$this->lastName, 'Email'=>$this->email, 'Phone Number'=>$this->phoneNr,
		'Street'=>$this->street, 'House Number'=>$this->houseNr, 'House Number Addition'=>$this->houseNrAdd, 'Zipcode'=>$this->zipcode, 'City'=>$this->city);
		}
	}



	/**
	 * Get the value of id
	 */ 
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Set the value of id
	 *
	 * @return  self
	 */ 
	public function setId($id)
	{
		$this->id = $id;

		return $this;
	}

	/**
	 * Get the value of firstName
	 */ 
	public function getFirstName()
	{
		return $this->firstName;
	}

	/**
	 * Set the value of firstName
	 *
	 * @return  self
	 */ 
	public function setFirstName($firstName)
	{
		$this->firstName = $firstName;

		return $this;
	}

	/**
	 * Get the value of midName
	 */ 
	public function getMidName()
	{
		return $this->midName;
	}

	/**
	 * Set the value of midName
	 *
	 * @return  self
	 */ 
	public function setMidName($midName)
	{
		$this->midName = $midName;

		return $this;
	}

	/**
	 * Get the value of lastName
	 */ 
	public function getLastName()
	{
		return $this->lastName;
	}

	/**
	 * Set the value of lastName
	 *
	 * @return  self
	 */ 
	public function setLastName($lastName)
	{
		$this->lastName = $lastName;

		return $this;
	}

	/**
	 * Get the value of email
	 */ 
	public function getEmail()
	{
		return $this->email;
	}

	/**
	 * Set the value of email
	 *
	 * @return  self
	 */ 
	public function setEmail($email)
	{
		$this->email = $email;

		return $this;
	}

	/**
	 * Get the value of phoneNr
	 */ 
	public function getPhoneNr()
	{
		return $this->phoneNr;
	}

	/**
	 * Set the value of phoneNr
	 *
	 * @return  self
	 */ 
	public function setPhoneNr($phoneNr)
	{
		$this->phoneNr = $phoneNr;

		return $this;
	}

	/**
	 * Get the value of street
	 */ 
	public function getStreet()
	{
		return $this->street;
	}

	/**
	 * Set the value of street
	 *
	 * @return  self
	 */ 
	public function setStreet($street)
	{
		$this->street = $street;

		return $this;
	}

	/**
	 * Get the value of houseNr
	 */ 
	public function getHouseNr()
	{
		return $this->houseNr;
	}

	/**
	 * Set the value of houseNr
	 *
	 * @return  self
	 */ 
	public function setHouseNr($houseNr)
	{
		$this->houseNr = $houseNr;

		return $this;
	}


	/**
	 * Get the value of zipcode
	 */ 
	public function getZipcode()
	{
		return $this->zipcode;
	}

	/**
	 * Set the value of zipcode
	 *
	 * @return  self
	 */ 
	public function setZipcode($zipcode)
	{
		$this->zipcode = $zipcode;

		return $this;
	}

	/**
	 * Get the value of houseNrAdd
	 */ 
	public function getHouseNrAdd()
	{
		return $this->houseNrAdd;
	}

	/**
	 * Set the value of houseNrAdd
	 *
	 * @return  self
	 */ 
	public function setHouseNrAdd($houseNrAdd)
	{
		$this->houseNrAdd = $houseNrAdd;

		return $this;
	}

	/**
	 * Get the value of city
	 */ 
	public function getCity()
	{
		return $this->city;
	}

	/**
	 * Set the value of city
	 *
	 * @return  self
	 */ 
	public function setCity($city)
	{
		$this->city = $city;

		return $this;
	}

	/**
	 * Set the value of password
	 *
	 * @return  self
	 */ 
	public function setPassword($password)
	{
		$this->password = $password;

		return $this;
	}
}
?>