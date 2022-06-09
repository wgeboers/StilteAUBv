<?php


class Role {

	private int $RoleID;
	private string $name;
	private string $description;
	private string $creationDate;
	
	function  __construct($id, $name, $description, $creationDate) {
		$this->id = $id;
		$this->name = $name;
		$this->description = $description;
		$this->creationDate = $creationDate;
	}
	
	public function getRoleName() {
		return $this->name;
	}

	public function getRoleDesc() {
		return $this->description;
	}

	public function setid($id){
		$this->id = $id;
	}

	public function setname($name) {
		$this->name = $name;
	}

	public function getRoleID() {
		return $this->id;
	}

	//To cast object to array for easy data reading in UI.
	public function toArray() {
		return array($this->id, $this->name, $this->description, $this->creationDate);
	}
}
?>