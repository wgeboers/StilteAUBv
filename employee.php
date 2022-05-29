<?php

require_once("Crud.php");

class Employee {
	
	public $crud;

	public $id;
	public $rolId;
	public $rolName;
	public $firstName;
	public $middleName;
	public $lastName;
	public $email;
	public $password;
	public $active;
	
	function  __construct() {
		$this->crud = new Crud('root', '');
	}
	
	public function readOne(){
		$id =$this->id;
		$row = $this->crud->getEmployee('employees', $id);
		$this->firstName = $row['First_Name'];
		$this->middleName = $row['Middle_Name'];
		$this->lastName = $row['Last_Name'];
		$this->email = $row['Email'];
		$this->password = $row['Password'];
		$this->active = $row['ACTIVE'];
		$this->rolId = $row['RoleID'];
		$this->rolName = $row['Name'];
	}

    public function insertEmployee($firstName, $middleName, $lastName, $email, $password) {
		#Nog veld validatie toevoegen!!!!
        $data = $this->crud->addEmployee($firstName, $middleName, $lastName, $email, $password);
		$this->id = $data;
		return $this->id;
    }

	public function insertEmployeeRole($id, $rol) {
        $data = $this->crud->addEmployeeRol($id, $rol);
    }

	public function editEmployee($id, $firstName, $middleName, $lastName, $email, $password, $active){
		#Nog veld validatie toevoegen!!!!
		$data = $this->crud->updateEmployee($id, $firstName, $middleName, $lastName, $email, $password, $active);
	}

	public function updateEmployeeRole($id, $rol) {
        $data = $this->crud->UpdateEmployeeRol($id, $rol);
    }
}
?>