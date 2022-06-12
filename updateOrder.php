<?php
if(isset($_POST['updateOrderBtn'])) {
	session_start();
	require_once("OrderManager.php");
	$order = new OrderManager();
	$status = $_POST['Status'];
	$id = $_SESSION['HeaderID'];
	unset($_SESSION['HeaderID']);

	//Als de status op geleverd op geleverd gezet word vul dan de huidige datum en tijd in.
	if ($status == 'Geleverd'){
		$finishedDate = date("Y-m-d H:i:s");
		$update = $order->editOrder($id, $status, $finishedDate);
	} else {
		$update = $order->editOrder($id, $status, NULL);
	}
	
	$url = '/stilteaubv/ordersView.php';
	header("Location: https://localhost$url");
	exit();
}
?>