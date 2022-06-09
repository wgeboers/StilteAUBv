<?php
if(isset($_POST['updateOrderBtn'])) {
	session_start();
	require_once("OrderManager.php");
	$order = new OrderManager();
	$status = $_POST['Status'];
	$id = $_SESSION['HeaderID'];
	unset($_SESSION['HeaderID']);

	if ($status == 'Geleverd'){
		$finishedDate = date("Y-m-d H:i:s");
		$update = $order->editOrder($id, $status, $finishedDate);
	} else {
		$update = $order->editOrder($id, $status, NULL);
	}
	
	if(isset($_SESSION['url'])) {
		$url = $_SESSION['url'];
	} else {
		$url = "index.php";
	}
	header("Location: https://localhost$url");
	exit();
}
?>