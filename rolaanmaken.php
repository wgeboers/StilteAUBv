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
    <?php include('sidenav.php'); ?>
    <div class="content">
        <div class="main">
            <div id="rollen" class="form">
                <form action="./addRole.php" method="post" name="rolForm" id="medewerkerForm">
                    <div class="container">
                        <div class="row">
                            <h2>Rol aanmaken</h2>
                            <div class="col-md-12">
                                <label for="name" class="form-label">Naam</label>
                                <input type="text" class="form-control" placeholder="Naam" name="name" id="name">
                            </div>
                            <div class="col-md-12">
                                <label for="description" class="form-label">Omschrijving</label>
                                <input type="text" class="form-control" placeholder="Omschrijving" name="description" id="description">
                            </div>
                        </div>
                        <div class="col-12 text-center">
                            <button type="submit" name="addrole" value="addrole" class="btn btn-primary" id="addBtn">Rol aanmaken</button>
                        </div>
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