<?php

session_start();
session_unset();
session_destroy();
session_write_close();
if(isset($_SESSION['url'])) {
    $url = $_SESSION['url'];
} else {
    $url = "index.php";
}
header("Location: https://localhost$url");

?>