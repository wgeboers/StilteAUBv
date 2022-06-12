<?php
require_once('Crud.php');

Class OrderManager {
    
    private Crud $crud;

    public function __construct() {
        $this->crud = new Crud('root', '');
    }

    public function editOrder($id, $status, $finishedDate) : void {
		$this->crud->updateOrder($id, $status, $finishedDate);
	}

	public function editStatus($id, $status) : void{
		$this->crud->updateStatus($id, $status);
	}

	public function insertHeader($deliverAdres, $deliverZipcode, $deliverCity, $orderBy) : int {
        $data = $this->crud->addOrderHeader($deliverAdres, $deliverZipcode, $deliverCity, $orderBy);
		$this->headerid = $data;
		return $this->headerid;
    }

	public function insertLine($headerid, $productid, $amount, $linePrice)  {
        $data = $this->crud->addOrderLine($headerid, $productid, $amount, $linePrice);
        $this->lineid = $data;
        return $this->lineid;
    }

    public function fetchOrderHeaders() : array {
        return $this->crud->getTable('orderheaders');
    }
    
    public function fetchSingularOrderHeader($id) : array {
        return $this->crud->select('orderheaders', 'HeaderID', $id);
    }

    public function fetchOrderHeadersByUser($id) : array {
        return $this->crud->select('orderheaders', 'Order_By', $id);
    }
}
?>