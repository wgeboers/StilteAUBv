<?php

require_once("Crud.php");

class Order {
	

	public $id;
	public $headerid;
	public $totalPrice;
	public $deliverAdres;
	public $deliverZipcode;
	public $deliverCity;
    public $creationDate;
    public $finishedDate;
	public $status;
	
	function  __construct() {

	}

}
?>