<?php
if(isset($_POST['addemployee'])) {
	session_start();
	unset($_POST['addemployee']);
	if(count($_POST) === 6) {
		$empData = $_POST;
	}
	$role = key(array_slice($empData, -1, 1, true));
	array_pop($empData);
	require_once("EmployeeManager.php");
	$e_man = new EmployeeManager();
	$e_man->insertEmployee($empData);
	$e_man->insertEmployeeRole($_POST['Email'], 'Email', $role);


	$url = "/stilteaubv/employeesView.php";
	header("Location: https://localhost$url");
	exit();
}
?>