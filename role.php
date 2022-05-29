<?php

require_once("Crud.php");

class Role {
	
	public $crud;

	public $id;
	public $Name;
	public $Description;
	
	function  __construct() {
		$this->crud = new Crud('root', '');
	}
	
	public function readOne(){
		$id =$this->id;
		$row = $this->crud->getRole('roles', $id);

		$this->Name = $row['Name'];
		$this->Description = $row['Description'];
	}

    public function insertRole($name, $description) {
		#Nog veld validatie toevoegen!!!!
        $data = $this->crud->addRole($name, $description);
    }

	public function editRole($id, $name, $description){
		#Nog veld validatie toevoegen!!!!
		$data = $this->crud->updateRole($id, $name, $description);
	}
}
?>