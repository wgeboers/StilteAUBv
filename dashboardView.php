<!DOCTYPE html>
<?php include('header.php'); $_SESSION['url'] = $_SERVER['REQUEST_URI'];?>

<html>
<head>
	<title>Dashboard</title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/jpg" href="Images/Logo.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="Style/base.css">
    <link rel="stylesheet" type="text/css" href="Style/medewerkersportaal.css">
</head>
<body class='medewerkersportaal'>

    <?php 
        if(isset($_SESSION['id']) && $_SESSION['type'] === 'user') {
            include('sidenav.php');
        } elseif(isset($_SESSION['id']) && $_SESSION['type'] === 'employee') {
            include('sidenav.php');
        }
    ?>
        
        
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="Script/base.js"></script>
</body>
</html> 
