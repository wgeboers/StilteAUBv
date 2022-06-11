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
	
	public function getRoleName() : string {
		return $this->name;
	}

	public function getRoleDesc() : string {
		return $this->description;
	}

	public function setId($id) : void {
		$this->id = $id;
	}

	public function setName($name) : void {
		$this->name = $name;
	}

	public function getRoleID() : int {
		return $this->id;
	}

	/**
	 * Associative array to be used for easier UI generation in front end.
	 */
	public function toArray() : array {
		return array($this->id, $this->name, $this->description, $this->creationDate);
	}
}
?>