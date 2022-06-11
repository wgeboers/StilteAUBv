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

    /**
	 * User object is made based based on a given userID.
	 */
    public function fetchUserData($id) : User {
        $results = $this->crud->selectByUser($id, 'users');
		foreach($results as $result) {
			$this->user = new User($result["UserID"], $result["First_Name"], $result["Middle_Name"], $result["Last_Name"], $result["Email"], $result["Phone_Number"],
			$result["Street"], $result["House_Number"], $result["House_Number_Addition"], $result["Zipcode"], $result["City"]);
		}

        return $this->user;
    }
	/**
	 * Function to insert a user into DB with crud insert
	 */
	public function insertUserIntoDB($userData = array()) : void {
		$this->crud->insert($userData, 'users');
	}
	/**
	 * Function to insert a user into DB with crud update
	 */
    public function updateUserData($userData = array()) : void {
		$this->crud->update($userData, 'users', 'Email', $userData['Email']);
	}

	/**
	 * GET $loggedIn
	 */
	public function getLoggedIn() : bool {
		return $this->loggedIn;
	}

    /**
	 * function used to log a user in, automatically checks for an end user or employee login
	 * when the login button is clicked, the users will be redirected to the page they were on when they logged
	 */
	public function login($email, $password) : void {		
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