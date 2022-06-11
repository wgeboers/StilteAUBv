<?php

require_once('Image.php');

class Product extends Image {
	

	private int $id;
	private string $name;
	private string $desc;
	private int $stock;
	private float $price;
	
	function  __construct($id, $name, $desc, $stock, $price, $imageID, $imageName, $imageFilePath) {
		$this->id = $id;
		$this->name = $name;
		$this->desc = $desc;
		$this->stock = $stock;
		$this->price = $price;
		$this->imageID = $imageID;
		$this->imageName = $imageName;
		$this->imageFilePath = $imageFilePath;
	}
	
	public function toArray() : array {
		return array('ID'=>$this->id, 'Name'=>$this->name, 'Desc'=>$this->desc, 'Stock'=>$this->stock, 'Price'=>$this->price, 'imageID'=>$this->imageID, 'imageName'=>$this->imageName, 'imageFilePath'=>$this->imageFilePath);
	}   

	/**
	 * Get the value of id
	 */ 
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Set the value of id
	 *
	 * @return  self
	 */ 
	public function setId($id)
	{
		$this->id = $id;

		return $this;
	}

	/**
	 * Get the value of name
	 */ 
	public function getName()
	{
		return $this->name;
	}

	/**
	 * Set the value of name
	 *
	 * @return  self
	 */ 
	public function setName($name)
	{
		$this->name = $name;

		return $this;
	}

	/**
	 * Get the value of desc
	 */ 
	public function getDesc()
	{
		return $this->desc;
	}

	/**
	 * Set the value of desc
	 *
	 * @return  self
	 */ 
	public function setDesc($desc)
	{
		$this->desc = $desc;

		return $this;
	}

	/**
	 * Get the value of stock
	 */ 
	public function getStock()
	{
		return $this->stock;
	}

	/**
	 * Set the value of stock
	 *
	 * @return  self
	 */ 
	public function setStock($stock)
	{
		$this->stock = $stock;

		return $this;
	}

	/**
	 * Get the value of price
	 */ 
	public function getPrice()
	{
		return $this->price;
	}

	/**
	 * Set the value of price
	 *
	 * @return  self
	 */ 
	public function setPrice($price)
	{
		$this->price = $price;

		return $this;
	}
}
?>