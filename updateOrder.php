<?php
if(!empty($_POST['updateorder'])) {
	session_start();
    $id = $_GET['id'];
	$status = $_POST["status"];

    require_once("order.php");
	$order = new Order();
	$update = $order->editOrder($id, $status);

	$url = "bestellingen.php";
	header("Location: ".$url);
    exit();
}
?>