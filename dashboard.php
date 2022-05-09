<!DOCTYPE html>
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
	<?php
	#Basic SQL statement used to start a connection and to execute a query.
	require_once('db_conn.php');
	$db = conn_database();
	if(is_null( $db ))
		exit('<h1>Database-verbinding mislukt</h1>');
	$sql = 'SELECT  * FROM searchqueries';
	$statement = $db->prepare($sql);
	$statement->execute();
	$result = $statement->fetchall(PDO::FETCH_OBJ);
	?>
</head>
<body class='homepage'>
	<div class="parallax">
        <nav class="navbar sticky-top navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.html">
                    <img src="Images/Logo.png" alt="" width="60" height="auto">
                </a>
                <button class="navbar-toggler custom-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="index.html">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="onsaanbod.html">Ons aanbod</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="bestelnu.html">Bestel nu!</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="overons.html">Over ons</a>
                        </li>
						<li class="nav-item">
							<a class="nav-link" href="test.php">Test</a>
						</li>
						<li class="nav-item">
							<a class="nav-link"  href="dashboard.php">Dashboard</a>
						</li>
                    </ul>
                </div>
            </div>
        </nav>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="Script/base.js"></script>
</body>
</html> 