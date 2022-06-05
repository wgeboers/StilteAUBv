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

	public function insertHeader($deliverAdres, $deliverZipcode, $deliverCity) {
        $data = $this->crud->addOrderHeader($deliverAdres, $deliverZipcode, $deliverCity);
		$this->headerid = $data;
		return $this->headerid;
    }

	public function insertLine($headerid, $productid, $amount, $linePrice) {
        $data = $this->crud->addOrderLine($headerid, $productid, $amount, $linePrice);
    }

    public function fetchOrderHeaders() {
        return $this->crud->getTable('orderheaders');
    }
    
    public function fetchSingularOrderHeader($id) {
        return $this->crud->select('orderheaders', 'HeaderID', $id);
    }
}
?>