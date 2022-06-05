<?php
if(!empty($_POST['updateorder'])) {
	session_start();
    $id = $_GET['id'];
	$status = $_POST["status"];
	require_once("OrderManager.php");
	$order = new OrderManager();
	if ($status == 'Geleverd'){
		$finishedDate = date("Y-m-d H:i:s");
		$update = $order->editOrder($id, $status, $finishedDate);
	} else {
		$update = $order->editStatus($id, $status);
	}
	



	$url = "bestellingen.php";
	header("Location: ".$url);
    exit();
}
?>