<?php

session_start();
unset($_SESSION["id"]);
if(isset($_SESSION['url'])) {
    $url = $_SESSION['url'];
} else {
    $url = "index.php";
}
header("Location: https://localhost$url");

?>