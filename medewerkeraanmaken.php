<!DOCTYPE html>
<?php 
    include('header.php'); $_SESSION['url'] = $_SERVER['REQUEST_URI'];
?>
<head>
    <title>Silent Disco</title>
   <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/jpg" href="Images/Logo.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="Style/base.css">
    <link rel="stylesheet" type="text/css" href="Style/medewerkers.css">
    <meta name="description" content="Huur een volledige doe-het-zelf Silent Disco set met koptelefoons. Binnen een mum van tijd organiseer jij zelf een Silent Disco!">
    <meta name="keywords" content="SilentDisco, Music, Headset, Party, Dance, Disco">
</head>

<body class="medewerkers">
    <div class="sidenav">
        <a href="medewerkers.php">Medewerkers</a>
        <a href="rollen.php">Rollen</a>
        <a href="bestellingen.php">Bestellingen</a>
        <a href="zoektermen.php">Zoektermen</a>
        <a href="artikelen.php">Artikelen</a>
        <a href="afbeeldingen.php">Afbeeldingen</a>
    </div>
    <div class="content">
        <div class="main">
            <div id="medewerker" class="form">
                <form action="./addEmployee.php" method="post" name="medewerkerForm" id="medewerkerForm">
                    <div class="container">
                        <div class="row">
                            <h2>Medewerker aanmaken</h2>
                            <?php include('EmployeeUI.php'); ?>
                    </div>
                </form>
            </div>
        </div>    
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="Script/base.js"></script>
</body>

</html>