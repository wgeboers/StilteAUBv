<?php

require_once("Crud.php");
include("Product.php");

class ProductManager {
        
    public $db_crud;
    private $results;
    private $products = array();

    public function __construct() {

        $this->db_crud = new Crud('root', '');
        $this->getCatalog();

    }

    public function getCatalog() {
        $results = $this->db_crud->getProducts();

        foreach($results as $result) {
            $add_product = new Product($result["ProductID"], $result["Name"], $result["Description"], $result["Stock"], $result["Price"], "EenFoto.png", "Ergens");
            //$this->products = $add_product;
            array_push($this->products, $add_product);
        }

    }

    public function getProducts() {
        return $this->products;
    }

}