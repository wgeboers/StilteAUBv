<?php

require_once('crud.php');
require_once('employee.php');


#Used to connect to database and put data from the database into a employee object.
Class EmployeeManager {
    private Crud $crud;
    private ?Employee $employee;
    private bool $loggedIn = true; // turn back to false; true if you need to test without login functionality.

    function __construct() {
        $this->crud = new Crud('root', ''); 
    }

    #Creates a employee object based on database row.
    public function fetchEmployeeData($id) {
        $results = $this->crud->selectByEmployee($id, 'employees');
		foreach($results as $result) {
			$this->employee = new Employee($result["EmployeeID"], $result["First_Name"], $result["Middle_Name"], $result["Last_Name"], $result["Email"]);
		}

        return $this->employee;
    }

    public function getLoggedIn() {
        return $this->loggedIn;
    }

	public function getEmployeeID() {
		return $this->employee->getId();
	}

    #Used to update a employee's information when they submit a change to their employee information.
    public function updateEmployeeInformation($employeeData) {
		if(isset($employeeData) && !empty($employeeData)) {
			$this->crud->updateProfile($employeeData, $_SESSION['type'], $_SESSION['email']);
		} else {
			echo "problems yep";
		}
	}

    #function used to log a employee in, automatically checks for an end employee or employee login
	#when the login button is clicked, the employees will be redirected to the page they were on when they logged
	#An error msg will be published to $_SESSION["errormsg"] if the login failed.
	public function login($email, $password) {		
		$validation = $this->crud->validateUser($email, $password, 'employees');
		if(!empty($validation)) {
			$_SESSION['id'] = $validation[0];
            $_SESSION['type'] = 'employee';
            $this->loggedIn = true;
		} else {
            $_SESSION["ErrorMsg"] = 'wrong pass/employeename';
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
?>