<?php

require_once('crud.php');
require_once('Employee.php');
require_once('role.php');


#Used to connect to database and put data from the database into a employee object.
Class EmployeeManager {
    private Crud $crud;
    private ?Employee $employee = null;
    private array $rolesArray = array();
    private array $employeesArray = array();
    private bool $loggedIn;

    function __construct() {
        $this->crud = new Crud('root', ''); 
    }

    #Creates a employee object based on database row.
    public function fetchEmployeeData($where, $param) : Employee {
        $results = $this->crud->select('employees', $where, $param);
		foreach($results as $result) {
			$this->employee = new Employee($result["EmployeeID"], $result["First_Name"], $result["Middle_Name"], $result["Last_Name"], $result["Email"], $result['Creation_Date'], $result['ACTIVE']);
        }
        return $this->employee;
    }

    public function getAllEmployees() {
        $empData = $this->crud->getTableEmployees();
        foreach($empData as $emp) {
            $empObj = new Employee($emp["EmployeeID"], $emp["First_Name"], $emp["Middle_Name"], $emp["Last_Name"], $emp["Email"], $emp['Creation_Date'], $emp['ACTIVE']);
            array_push($this->employeesArray, $empObj);
        }
        return $this->employeesArray;
    }

    public function getLoggedIn() {
        return $this->loggedIn;
    }

	public function getEmployeeID() {
		return $this->employee->getEmployeeID();
	}
    
    #function used to log a employee in, automatically checks for an end employee or employee login
	#when the login button is clicked, the employees will be redirected to the page they were on when they logged
	#An error msg will be published to $_SESSION["errormsg"] if the login failed.
	public function login($email, $password) {		
		$validation = $this->crud->validateUser($email, $password, 'employees');
		if(!empty($validation)) {
			$_SESSION['id'] = $validation;
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

    public function fetchRolesFromDB() {
        $roles = $this->crud->getTable('roles');
        foreach($roles as $role) {
            $roleObj = new Role($role['RoleID'], $role['Name'], $role['Description'], $role['Creation_Date']);
            array_push($this->rolesArray, $roleObj); 
        }
        return $this->rolesArray;
    }

    public function fetchSingularRoleFromDB($where, $param) {
        $roles = $this->crud->select('roles', $where, $param);
        foreach($roles as $role) {
            $roleObj = new Role($role['RoleID'], $role['Name'], $role['Description'], $role['Creation_Date']);
        }
        return $roleObj;
    }
    public function insertRole($name, $description, $createdby) {
		#Nog veld validatie toevoegen!!!! (js)
        $this->crud->addRole($name, $description, $createdby);
    }

	public function editRole($id, $name, $description){
		$this->crud->updateRole($id, $name, $description);
	}
    public function insertEmployee($empData) {
        $this->crud->insert($empData, 'employees');
    }

	public function insertEmployeeRole($param, $where, $role) {
        $empData = $this->crud->selectByEmployee('employees', $where, $param);
        $empID = $empData[0]['EmployeeID'];
        $data = $this->crud->addEmployeeRole($empID, $role);
    }

	public function editEmployee($empData = array(), $email){
		$this->crud->update($empData, 'employees', 'Email', $email);
	}

	public function updateEmployeeRole($role, $id) {
        $data = $this->crud->updateEmployeeRole($role, $id);
    }

    public function fetchOrders() {
        return $this->crud->getTable('orderheaders');
    }

    public function fetchRole($name) {
        return $this->crud->select('roles', 'Name', $name);
    }
}

//Works
 //$eman = new EmployeeManager();
// $eman->editEmployee(array('First_Name'=>'Wesley'), 'w.geboers@student.avans.nl');
//var_dump($eman->fetchSingularRoleFromDB('Name', 'Directie'));

?>