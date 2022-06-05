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
    <link rel="stylesheet" type="text/css" href="Style/webshop.css">
    <meta name="description" content="Huur een volledige doe-het-zelf Silent Disco set met koptelefoons. Binnen een mum van tijd organiseer jij zelf een Silent Disco!">
    <meta name="keywords" content="SilentDisco, Music, Headset, Party, Dance, Disco">
</head>

<body class="overOns">
    <div class="main">
        <div class="container">
            <?php
                require_once('crud.php');
                $classA = new Crud('root', '');
                $productData = $classA->getProducts();

                foreach($productData as $rows){
            ?>
            <div class="card">
                <div class= "cardContent">
                    <form action="addCart.php?id=<?php echo $rows['ProductID'];?>" method="post">
                        <img src=<?php 
                            if(empty($rows['ImagePath'])){
                                echo"./Images/Logo.png";
                            } else {
                                echo "./".$rows['ImagePath'];
                            }
                        ?> alt="Logo">
                        <h1><?php echo $rows['Name'];?></h1>
                        <p><?php echo $rows['Description']?></p>
                        <h3><?php echo "€" . $rows['Price'];?></h3>
                        <div class="shopFlex">
                            <input type="number" class="form-control" placeholder="Aantal" name="hoeveelheid" id="hoeveelheid" value=0>
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
    <div class="footer">
        <div class="container-fluid bg-transparent" id="socialMediaBar">
            <div class="row">
                <ul>
                    <li>
                        <a href="https://www.facebook.com" target="_blank">
                            <img src="Images/logo_facebook.png" height="20" />
                            <span>FACEBOOK</span>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.twitter.com" target="_blank">
                            <img src="Images/logo_twitter.png" height="20" />
                            <span>TWITTER</span>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com" target="_blank">
                            <img src="Images/logo_instagram.png" height="20" />
                            <span>INSTAGRAM</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="Script/base.js"></script>
</body>

</html>