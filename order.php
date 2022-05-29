<?php

require_once("Crud.php");

class Order {
	
	public $crud;

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
		$this->crud = new Crud('root', '');
	}
	
	public function readOne(){
		$id =$this->id;
		$row = $this->crud->getOrder('orderheaders', $id);
		$this->totalPrice = $row['Total_Price'];
        $this->deliverAdres = $row['Deliver_Adres'];
        $this->deliverZipcode = $row['Deliver_Zipcode'];
        $this->deliverCity = $row['Deliver_City'];
        $this->creationDate = $row['Creation_Date'];
        $this->finishedDate = $row['Finished_Date'];
        $this->status = $row['Status'];
	}

	public function editOrder($id, $status){
		$data = $this->crud->updateOrder($id, $status);
	}

	public function insertHeader($deliverAdres, $deliverZipcode, $deliverCity) {
        $data = $this->crud->addOrderHeader($deliverAdres, $deliverZipcode, $deliverCity);
		$this->headerid = $data;
		return $this->headerid;
    }

	public function insertLine($headerid, $productid, $amount, $linePrice) {
        $data = $this->crud->addOrderLine($headerid, $productid, $amount, $linePrice);
    }
}
?>