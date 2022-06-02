<!DOCTYPE html>
<?php include('header.php'); $_SESSION['url'] = $_SERVER['REQUEST_URI']; ?>
<html>
<head>
	<title>Test</title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/jpg" href="Images/Logo.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="Style/base.css">
    <link rel="stylesheet" type="text/css" href="Style/index.css">
	<link rel="stylesheet" type="text/css" href="Style/base.css">
</head>
<body>
	<div class="parallax">
	</div>
	<link rel="stylesheet" type="text/css" href="Style/base.css">
</head>
<body>
<?php
    #require_once("Crud.php");
    #$crud = new Crud('root', '');
    #$test = array("First_Name"=>"Bart","Last_Name"=>"Frijters", "Email"=>"bart.frijters@student.avans.nl", "Phone_Number"=>"06-57574266", "Password"=>"kappa", "Street"=>"hogeschoollaan",
    #"House_Number"=>"13", "Zipcode"=>"5115 BD", "City"=>"Breda");
    #$crud->update(array("First_Name"=>"Puk", "Last_Name"=>"van de Petteflet"), "users", "bart.frijters@student.avans.nl");

    require_once("user.php");
    $user = new User();
    var_dump($user->getUser('users', 0));

?>
</body>
</html> 