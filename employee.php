<?php
//klasse (Employee) = een template voor een object | Object = een instantie van een klasse
class Employee { 
	//Properties|Eigenschappen
	private int $id;											//Public, protected en private zijn toegangsmodifiers die de toegankelijkheid bepalen.
	private string $firstName;									//Public = De property of method is overal te benaderen (default).
	private ?string $middleName = '';							//Protected = kan alleen benaderd worden binnen de klasse of de klasses die zijn afgeleid.
	private string $lastName;									//Private = Is ALLEEN toegangelijk binnen de klasse
	private string $email;
	private string $creationDate;
	private string $active;
	
	//Methods|Methode
	function  __construct($id, $firstName, $middleName, $lastName, $email, $creationDate, $active) {		
		$this->id = $id;										//Met een constructor kan je de eigenschappen van een object initialiseren bij het maken van een object.
		$this->firstName = $firstName;							//PHP roept een constructor functie automatisch aan wanneer een object gemaakt wordt.
		$this->middleName = $middleName;						//De constructor word hier gebruikt voor de setters.
		$this->lastName = $lastName;
		$this->email = $email;									
		$this->creationDate = $creationDate;
		$this->active = $active;								//$this is een sleutelwoord, verwijst naar het huidige object en is alleen beschikbaar binnen een methoden.

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