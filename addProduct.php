<?php
if(!empty($_POST['addproduct'])) {
	session_start();
	$name = $_POST["name"];
	$description = $_POST["description"];
    $stock = $_POST["stock"];
    $price = $_POST["price"];

	require_once("product.php");
	$product = new Product();
	$add = $product->insertProduct($name, $description, $stock, $price);

	$url = "artikelen.php";
	header("Location: ".$url);
	exit();
}
?>