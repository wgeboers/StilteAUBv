<!DOCTYPE html>
<?php 
    include('header.php'); $_SESSION['url'] = $_SERVER['REQUEST_URI']; 
    require_once('ProductManager.php');
    $ProductManager = new ProductManager();
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
    <link rel="stylesheet" type="text/css" href="Style/webshop.css">
    <meta name="description" content="Huur een volledige doe-het-zelf Silent Disco set met koptelefoons. Binnen een mum van tijd organiseer jij zelf een Silent Disco!">
    <meta name="keywords" content="SilentDisco, Music, Headset, Party, Dance, Disco">
</head>

<body class="webshop">
    <div class = 'messages'>
        <?php include('messages.php'); 
        if($_SESSION['lang'] === 'lang_nl') {
            $errorMessage = 'Geen producten gevonden die voldoen aan de zoekopdracht';
            $searchBtn = 'Zoeken';
        } else {
            $errorMessage = 'No products associated with your search.';
            $searchBtn = 'Search';
        }
        ?>
    </div>
    <div class="main">   
        <form name="searchCatalog" class="searchCatalog" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
            <input class="searchField" type="text" name="searchTerm"></br>
            <input class="searchBtn" type="submit" name="submit" value=<?php echo $searchBtn; ?>></br>
        </form>
        <div class="container">
            <?php 
                $results = array();
                
                //controle of er een zoekterm is ingevuld
                if((isset($_POST['searchTerm']) && (!empty($_POST['searchTerm'])))) {
                    //is er een zoekterm ingevuld zoek dan in de database.
                    //Er word gezocht binnen de producten of de zoekterm voorkomt in de naam of omschrijving
                    $results = array();
                    $searchTerm = htmlspecialchars($_POST['searchTerm']);
                    $ProductManager->getCatalog($searchTerm);
                    $results = $ProductManager->getProducts();
                    //Controle of de zoekresultaten voor een resultaat zorgen.
                    //Is dit niet het geval sla de zoekterm op in de database met 0. 0 betekent dat de zoekterm voor niks heeft gezorgd.
                    if (empty($results)) {
                        echo $errorMessage;
                        $ProductManager->addSearchTerm($searchTerm, 0);
                    //Zijn er wel zoekresultaten gevonden sla dan de zoekterm op met 1 in de database. 1 betekend dat de zoekterm geslaagd is.    
                    } else {
                        $ProductManager->addSearchTerm($searchTerm, 1);
                    }

                } else {
                    //Is er geen zoekterm ingevuld haal dan alle producten op uit de database
                    $ProductManager->getCatalog();
                    $results = $ProductManager->getProducts();   
                }   
                //Bouw voor elk resultaat een kaart op met de product informatie
                foreach($results as $result) {
            ?>
            <div class="card">
                <div class= "cardContent">
                    <form action="addCart.php?id=<?php echo $result->getProductID();?>" method="post">
                        <img src=<?php 
                            if(empty($result->getImageFilePath())){
                                echo"./Images/Logo.png";
                            } else {
                                echo "./".$result->getImageFilePath();
                            }
                        ?> alt="Logo">
                        <h1><?php echo $result->getName();?></h1>
                        <p><?php echo $result->getDescription();?></p>
                        <h3><?php echo "€" . $result->getPrice();?></h3>
                        <div class="shopFlex">
                            <input type="number" class="form-control" placeholder="Aantal" name="hoeveelheid" id="hoeveelheid" value=0 min="0">
                            <button type="submit" name="addcart" value="addcart" class="shopbtn" id="addBtn">
                                <img src="./Images/basket-shopping-solid.svg" alt="basket">
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <?php
            }
            ?>
        </div>   
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="Script/base.js"></script>
</body>

</html>