<?php
if(!empty($_POST['updateorder'])) {
	session_start();
    $id = $_GET['id'];
	$status = $_POST["status"];
	if ($status == 'Geleverd'){
		$finishedDate = date("Y-m-d H:i:s");

		require_once("order.php");
		$order = new Order();
		$update = $order->editOrder($id, $status, $finishedDate);
	} else {
		require_once("order.php");
		$order = new Order();
		$update = $order->editStatus($id, $status);
	}
	



	$url = "bestellingen.php";
	header("Location: ".$url);
    exit();
}
?>