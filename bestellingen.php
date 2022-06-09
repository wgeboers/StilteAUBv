<!DOCTYPE html>
<?php include('header.php'); $_SESSION['url'] = $_SERVER['REQUEST_URI']; ?>
<head>
    <title>Silent Disco</title>
   <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/jpg" href="Images/Logo.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="Style/base.css">
    <link rel="stylesheet" type="text/css" href="Style/bestellingen.css">
    <meta name="description" content="Huur een volledige doe-het-zelf Silent Disco set met koptelefoons. Binnen een mum van tijd organiseer jij zelf een Silent Disco!">
    <meta name="keywords" content="SilentDisco, Music, Headset, Party, Dance, Disco">
</head>

<body class="medewerkersportaal">
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
        <H2>Bestellingen</H2>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Aanmaak Datum</th>
                        <th scope="col">Status</th>
                        <th scope="col">Adres</th>
                        <th scope="col">Finish_Date</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        require_once('crud.php');
                        $classA = new Crud('root', '');
                        $orderData = $classA->getTable('orderheaders');

                        foreach($orderData as $rows){
                    ?>
                    <tr>
                        <td><?php echo $rows->Creation_Date;?></td>
                        <td><?php echo $rows->Status;?></td>
                        <td><?php echo $rows->Deliver_Adres;?></td>
                        <td><?php echo $rows->Finished_Date;?></td>
                        <td><a href="bestellingdetail.php?edit=<?php echo $rows->HeaderID;?>" class="neon-button">Details</a></td>
                    </tr>
                    <?php
                        }
                    ?>       
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="Script/base.js"></script>
</body>

</html>