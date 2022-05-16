<?php
#Session is killed here.
session_start();
$_SESSION["id"] = "";
session_destroy();
header("Location: index.php");

?>