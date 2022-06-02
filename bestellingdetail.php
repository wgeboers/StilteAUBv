<!DOCTYPE html>
<?php include('header.php'); $_SESSION['url'] = $_SERVER['REQUEST_URI'];

    require_once('order.php');
    $id=$_GET['edit'];
    $order = new Order();
    $order->id = $id;
    $order->readOne();
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
        <div id="artikelen" class="form">
                <form action="./updateOrder.php?id=<?php echo $id; ?>" method="post" name="orderForm" id="orderForm">
                    <div class="container">
                        <div class="row">
                            <h2><?php echo $order->id; ?></h2>
                            <div class="col-md-6">
                                <label for="creationdate" class="form-label">Aanmaak datum</label>
                                <input type="text" class="form-control" placeholder="Aanmaak datum" name="creationdate" id="creationdate" value='<?php echo $order->creationDate; ?>' readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="finisheddate" class="form-label">Gereed datum</label>
                                <input type="text" class="form-control" placeholder="Gereed datum" name="finisheddate" id="finisheddate" value='<?php echo $order->finishedDate; ?>' readonly>
                            </div>
                            <div class="col-md-12">
                                <label for="price" class="form-label">Bedrag</label>
                                <input type="text" class="form-control" placeholder="Bedrag" name="price" id="price" value='<?php echo $order->totalPrice; ?>' readonly>
                            </div>
                            <div class="col-md-12">
                                <label for="adres" class="form-label">Adres</label>
                                <input type="text" class="form-control" placeholder="Adres" name="adres" id="adres" value='<?php echo $order->deliverAdres; ?>' readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="zipcode" class="form-label">Postcode</label>
                                <input type="text" class="form-control" placeholder="Postcode" name="zipcode" id="zipcode" value='<?php echo $order->deliverZipcode; ?>' readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="city" class="form-label">Plaats</label>
                                <input type="text" class="form-control" placeholder="Plaats" name="city" id="city" value='<?php echo $order->deliverCity; ?>' readonly>
                            </div>
                            <div class="col-md-12">
                                <label for="status" class="form-label">Status</label>
                                <select name="status" id="status" class="form-select customSelect" aria-label="Default select example">
                                    <option value='<?php echo $order->status; ?>' selected='selected'><?php echo $order->status; ?></option>
                                    <option value="Openstaand">Openstaand</option>
                                    <option value="In behandeling">In behandeling</option>
                                    <option value="Vertuurd">Verstuurd</option>
                                    <option value="Geleverd">Geleverd</option>
                                </select>
                            </div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Product naam</th>
                                        <th scope="col">Product omschrijving</th>
                                        <th scope="col">Aantal</th>
                                        <th scope="col">Prijs</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        require_once('crud.php');
                                        $classA = new Crud('root', '');
                                        $orderDetailData = $classA->getOrdersDetail($id);

                                        foreach($orderDetailData as $rows){
                                    ?>
                                    <tr>
                                        <td><?php echo $rows->Name;?></td>
                                        <td><?php echo $rows->Description;?></td>
                                        <td><?php echo $rows->Amount;?></td>
                                        <td><?php echo $rows->Line_Price;?></td>
                                    </tr>
                                    <?php
                                        }
                                    ?>       
                                </tbody>
                            </table>
                            <div class="col-12 text-center">
                                <button type="submit" name="updateorder" value="updateorder" class="btn btn-primary" id="addBtn">Status update</button>
                            </div>
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