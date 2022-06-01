<?php
session_start();
//Code is used to return to the URL the user is coming from.
//Requires $_SESSION['url'] = $_SERVER['REQUEST_URI'] at the top of the webpage.
if(isset($_SESSION['url'])) {
    $url = $_SESSION['url'];
} else {
    $url = "index.php";
}
header("Location: https://localhost$url");
session_unset();
session_destroy();
session_write_close();


?>