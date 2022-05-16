<?php

#Action that starts a session when a login attempt is made, creates a user object that logs in via crud on the database
#TODO: Error message is not picked up yet.
if(!empty($_POST['login'])) {
	session_start();
	$email = $_POST["email"];
	$password = $_POST["psw"];
	require_once("user.php");
			
	$user = new User();
	$loggedIn = $user->login($email, $password);
	if(!$loggedIn) {
		$_SESSION["errorMsg"] = "Wrong info";
		}
	header("Location: ./index.php");
	exit();
}
?>