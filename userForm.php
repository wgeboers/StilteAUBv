<?php

//Dashboard user form functionality. Updates form from database when changed.
if(isset($_POST['changeBtn'])) {
    session_start();
    unset($_POST['changeBtn']);
    $userData = $_POST;
    var_dump($userData);
    require_once('UserManager.php');
    $u_man = new UserManager();
    $u_man->updateUserData($userData);
    $u_man->fetchUserData($_SESSION['id']);
    if(isset($_SESSION['url'])) {
		$url = $_SESSION['url'];
	} else {
		$url = "index.php";
	}
	header("Location: https://localhost$url");
	exit();
}
?>