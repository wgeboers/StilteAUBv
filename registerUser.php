<?php
if(isset($_POST['adduser'])) {
    session_start();
    unset($_POST['adduser']);
    
    $userData = $_POST;

    require_once('UserManager.php');
    $uman = new UserManager();
    $uman->insertUserIntoDB($userData);
    if(isset($_SESSION['url'])) {
		$url = "/stilteaubv/index.php";
	} else {
		$url = "/stilteaubv/index.php";
	}
	header("Location: https://localhost$url");
	exit();

}
?>