<?php

require_once('crud.php');
require_once('user.php');


#Used to connect to database and put data from the database into a user object.
Class UserManager {
    private Crud $crud;
    private ?User $user;
    private bool $loggedIn = true; // turn back to false; true if you need to test without login functionality.

    function __construct() {
        $this->crud = new Crud('root', ''); 
    }

    #Creates a user object based on database row.
    public function fetchUserData($id, $table) {
        $results = $this->crud->selectByUser($id, $table);
        if($table == 'users') {
            foreach($results as $result) {
                $this->user = new User($result["UserId"], $result["First_Name"], $result["Middle_Name"], $result["Last_Name"], $result["Email"], $result["Phone_Number"],
                $result["Street"], $result["House_Number"], $result["House_Number_Addition"], $result["Zipcode"], $result["City"]);
            }
        }
        return $this->user;
    }

    public function getLoggedIn() {
        return $this->loggedIn;
    }

    #Used to update a user's information when they submit a change to their user information.
    public function updateUserInformation($userData) {
		if(isset($userData) && !empty($userData)) {
			$this->crud->updateProfile($userData, $_SESSION['type'], $_SESSION['email']);
		} else {
			echo "problems yep";
		}
	}

    #function used to log a user in, automatically checks for an end user or employee login
	#when the login button is clicked, the users will be redirected to the page they were on when they logged
	#An error msg will be published to $_SESSION["errormsg"] if the login failed.
	public function login($email, $password) {		
		$validation = $this->crud->validateUser($email, $password);
		if(!empty($validation)) {
			$_SESSION['id'] = $validation[0];
            $this->loggedIn = true;
		} else {
			$validation = $this->crud->validateUser($email, $password, 'employees');
			if(!empty($validation)) {
				$_SESSION['id'] = $validation[0];
				$this->loggedIn = true;
			} else {
				$_SESSION["ErrorMsg"] = 'wrong pass/username';
			}
			if(isset($_SESSION['url'])) {
				$url = $_SESSION['url'];
			} else {
				$url = "/index.php";
			}
			header("Location: https://localhost$url");
			return false;
		}
	}
}
?>