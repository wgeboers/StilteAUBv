<?php

#Script that's executed on pressing 'login' in the website header.
#TODO: Error message is not picked up yet.
if(!empty($_POST['login'])) {
	session_start();
	$email = $_POST["email"];
	$password = $_POST["psw"];
	$type = $_POST['chkbox'];

	if(!isset($type)) {
		require_once("UserManager.php");
		$u_man = new UserManager();
		$u_man->login($email, $password);
		if($u_man->getLoggedIn())
			$u_man->fetchUserData($_SESSION['id']);
	} else {
		require_once("EmployeeManager.php");
		$e_man = new EmployeeManager();
		$e_man->login($email, $password);
		if($e_man->getLoggedIn())
			$e_man->fetchEmployeeData($_SESSION['id']);
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