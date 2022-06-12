<?php
require_once('order.php');

Class OrderManager {
    
    private $crud;

    public function __construct() {
        $this->crud = new Crud('root', '');
    }

    public function editOrder($id, $status, $finishedDate){
		$data = $this->crud->updateOrder($id, $status, $finishedDate);
	}

	public function editStatus($id, $status){
		$data = $this->crud->updateStatus($id, $status);
	}

	public function insertHeader($deliverAdres, $deliverZipcode, $deliverCity, $orderBy) {
        $data = $this->crud->addOrderHeader($deliverAdres, $deliverZipcode, $deliverCity, $orderBy);
		$this->headerid = $data;
		return $this->headerid;
    }

	public function insertLine($headerid, $productid, $amount, $linePrice) {
        $data = $this->crud->addOrderLine($headerid, $productid, $amount, $linePrice);
        $this->lineid = $data;
        return $this->lineid;
    }

    public function fetchOrderHeaders() {
        return $this->crud->getTable('orderheaders');
    }
    
    public function fetchSingularOrderHeader($id) {
        return $this->crud->select('orderheaders', 'HeaderID', $id);
    }

    public function fetchOrderHeadersByUser($id) {
        return $this->crud->select('orderheaders', 'Order_By', $id);
    }
}
?>