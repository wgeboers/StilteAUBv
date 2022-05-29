<!DOCTYPE html>
<?php 
    include('header.php'); $_SESSION['url'] = $_SERVER['REQUEST_URI'];

    require_once('product.php');
    $id=$_GET['edit'];
    $product = new Product();
    $product->id = $id;
    $product->readOne();
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
            <div id="artikelen" class="form">
                <form action="./updateProduct.php?id=<?php echo $id; ?>" method="post" name="artikelForm" id="artikelForm">
                    <div class="container">
                        <div class="row">
                            <h2>Artikel wijzigen</h2>
                            <div class="col-md-12">
                                <label for="name" class="form-label">Naam</label>
                                <input type="text" class="form-control" placeholder="Naam" name="name" id="name" value='<?php echo $product->name; ?>'>
                            </div>
                            <div class="col-md-12">
                                <label for="description" class="form-label">Omschrijving</label>
                                <input type="text" class="form-control" placeholder="Omschrijving" name="description" id="description" value='<?php echo $product->description; ?>'>
                            </div>
                            <div class="col-md-6">
                                <label for="stock" class="form-label">Voorraad</label>
                                <input type="text" class="form-control" placeholder="Voorraad" name="stock" id="stock" value='<?php echo $product->stock; ?>'>
                            </div>
                            <div class="col-md-6">
                                <label for="price" class="form-label">Prijs</label>
                                <input type="text" class="form-control" placeholder="Prijs" name="price" id="inputEmail" value='<?php echo $product->price; ?>'>
                            </div>
                            <div class="col-md-12">
                                <label for="image" class="form-label">Afbeelding</label>
                                <select name="image" id="image" class="form-select customSelect" aria-label="Default select example">
                                    <option value="<?php echo $product->imageId;?>"><?php echo $product->imageName;?></option>
                                    <?php
                                        require_once('crud.php');
                                        $classA = new Crud('root', '');
                                        $imageData = $classA->getRoles('images');

                                        foreach($imageData as $rows){
                                    ?>
                                    <option value="<?php echo $rows->ImageID;?>"><?php echo $rows->File_Name;?></option>
                                    <?php
                                        }
                                    ?>  
                                </select>
                            </div>
                        </div>
                        </div>
                        <div class="col-12 text-center">
                            <button type="submit" name="updateproduct" value="updateproduct" class="btn btn-primary" id="addBtn">Artikel wijzigen</button>
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