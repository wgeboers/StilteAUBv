<?php
if(!empty($_POST['addproduct'])) {
	session_start();
	$name = $_POST["name"];
	$description = $_POST["description"];
    $stock = $_POST["stock"];
    $price = $_POST["price"];

	echo$price;

	require_once("ProductManager.php");
	$pman= new ProductManager();
	$pman->insertProduct($name, $description, $stock, $price ,'', '' ,'');

	if(isset($_SESSION['url'])) {
		$url = $_SESSION['url'];
	} else {
		$url = "/stilteaubv/index.php";
	}
	header("Location: https://localhost$url");
	exit();
}
?>