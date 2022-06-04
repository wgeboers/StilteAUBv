<?php
if(isset($_POST['addemployee'])) {
	session_start();
	unset($_POST['addemployee']);
	if(count($_POST) === 6) {
		$empData = $_POST;
	}

	require_once("EmployeeManager.php");
	$e_man = new EmployeeManager();
	$e_man->insertEmployee($empData);

	$url = "/stilteaubv/medewerkers.php";
	header("Location: https://localhost$url");
	exit();
}
?>