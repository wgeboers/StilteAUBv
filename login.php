<?php

#Script that's executed on pressing 'login' in the website header.
#TODO: Error message is not picked up yet.
var_dump($_SESSION['url']);
if(!empty($_POST['login'])) {
	session_start();
	$email = $_POST["email"];
	$password = $_POST["psw"];
	require_once("user.php");
			
	$user = new User();
	$loggedIn = $user->login($email, $password);
	if(!$loggedIn) {
		$_SESSION["errorMsg"] = "Wrong info";
		} else {
			$_SESSION["userData"] = $user->getUserData();
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