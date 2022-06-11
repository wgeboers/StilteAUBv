<?php

require_once('crud.php');
require_once('user.php');


#Used to connect to database and put data from the database into a user object.
Class UserManager {
    private Crud $crud;
    private ?User $user;
    private ?bool $loggedIn;

    function __construct() {
        $this->crud = new Crud('root', ''); 
    }

    #Creates a user object based on database row.
    public function fetchUserData($id) {
        $results = $this->crud->selectByUser($id, 'users');
		foreach($results as $result) {
			$this->user = new User($result["UserID"], $result["First_Name"], $result["Middle_Name"], $result["Last_Name"], $result["Email"], $result["Phone_Number"],
			$result["Street"], $result["House_Number"], $result["House_Number_Addition"], $result["Zipcode"], $result["City"]);
		}

        return $this->user;
    }

	public function insertUserIntoDB($userData = array()) {
		$this->crud->insert($userData, 'users');
	}

    public function updateUserData($userData = array()) {
		$this->crud->update($userData, 'users', 'Email', $userData['Email']);
	}

	public function setLoggedIn(bool $loggedIn) {
		$this->loggedIn = $loggedIn;
	}

	public function getLoggedIn() {
		return $this->loggedIn;
	}

	public function getUserID() {
		return $this->user->getId();
	}

    #function used to log a user in, automatically checks for an end user or employee login
	#when the login button is clicked, the users will be redirected to the page they were on when they logged
	public function login($email, $password) {		
		$validation = $this->crud->validateUser($email, $password, 'users');
		if(!empty($validation)) {
			$_SESSION['id'] = $validation;
			$this->loggedIn = true;
		} 
		if(isset($_SESSION['url'])) {
			$url = $_SESSION['url'];
		} else {
			$url = "/stiltaubv/index.php";
		}
		header("Location: https://localhost$url");
	}

}
?>