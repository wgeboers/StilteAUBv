<?php

require_once('crud.php');
require_once('user.php');

Class UserManager {
    private Crud $crud;
    private ?User $user;
    private bool $loggedIn = false;

    function __construct() {
        $this->crud = new Crud('root', ''); 
    }

    public function fetchUserData($id, $table) {
        $this->crud->selectByUser($id, $table);
    }

    public function getLoggedIn() {
        return $this->loggedIn;
    }

    public function getUserObject() {
        return $this->user;
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
				$url = "index.php";
			}
			header("Location: https://localhost$url");
			return false;
		}
	}
}
?>