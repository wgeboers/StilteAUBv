<?php

require_once("Crud.php");

class searchHistory {
	
	public $crud;

	public $id;
	public $searchDescription;
	public $passed;

	
	function  __construct() {
		$this->crud = new Crud('root', '');
	}

}
?>