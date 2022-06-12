<!DOCTYPE html>
<?php require_once('header.php'); $_SESSION['url'] = $_SERVER['REQUEST_URI'];
    require_once('Langmanager.php');
    $langManager = new LangManager();
    $content = $langManager->getContents("index.php");
    $titles = $langManager->getTitles();
    $texts = $langManager->getTexts();
    if($_SESSION['lang'] == 'lang_nl') {
        $fixArray = array('Aantal: ', 'Prijs: ', 'Totaal: ', 'Bestelgegevens');
    } elseif($_SESSION['lang'] == 'lang_en') {
        $fixArray = array('Amount: ', 'Price: ', 'Total: ', 'Order details');
    }
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
    <link rel="stylesheet" type="text/css" href="Style/winkelwagen.css">
    <meta name="description" content="Huur een volledige doe-het-zelf Silent Disco set met koptelefoons. Binnen een mum van tijd organiseer jij zelf een Silent Disco!">
    <meta name="keywords" content="SilentDisco, Music, Headset, Party, Dance, Disco">
</head>

<body class="overOns">
    <div class = 'messages'>
        <?php include('messages.php'); ?>
    </div>
    <div class="main">
        <div class="container">
            <div>
                <?php
                    if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                    //Splits op basis van de \ (pip)
                    $cart = explode("|",$_SESSION['cart']);
                    $total = 0;
                    $i = 0;
                    foreach($cart as $products){

                        $product = explode(",", $products);
                        if(!empty($product) && isset($product)) {
                            if(strlen(trim($product[1])) <> 0){
                                require_once('ProductManager.php');
                                $p = new ProductManager();
                                $id=$product[0];
                                if(!isset($_SESSION['type']) || $_SESSION['type'] !== 'user')
                                    $_SESSION['type'] = 'user';
                                $pObj = $p->fetchSingleProduct($id);
                                $lineprice = $product[1] * $pObj->getPrice();
                                $i++;
                        
                ?>
                <div class="card">
                    <div class= "cardContent">
                        <img src=<?php 
                            if(empty($pObj->getImagePath())){
                                echo"./Images/Logo.png";
                            } else {
                                echo "./".$pObj->getImagePath();
                            }
                        ?> alt="Logo">
                        <div class="cardDescription">
                            <h2><?php echo $pObj->getName();?></h2>
                            <h4><?php echo $fixArray[0]; echo $product[1];?></h4>
                            <h4><?php echo $fixArray[1]; echo "€" .number_format($lineprice, 2, ',', '');?></h4>
                        </div>
                    </div>
                    <div class="cartRemove">
                        <a href="javascript:removeItem(<?php echo $i ?>)">X</a>
                    </div>
                </div>
                <?php
                    $total = $total + $lineprice;
                        }
                    }
                    }
                }
                ?> 
            </div>
            <div class="orderDetails">
                <div class="orderTotal">
                    <h2><?php echo $fixArray[2]; if(isset($total))  echo "€".number_format($total, 2, ',', '.'); ?></h2>
                </div>
                <div class="form"> 
                    <form action="checkout.php" method="post" name="checkoutForm" id="checkoutForm">
                        <div class="row">
                            <h2><?php echo $fixArray[3]; ?></h2>
                            <div class="col-md-4">
                                <label for="firstName" class="form-label"><?php echo "$titles[2]"; ?></label>
                                <input type="text" class="form-control" placeholder="<?php echo "$titles[2]"; ?>" name="firstName" id="firstName">
                            </div>
                            <div class="col-md-4">
                                <label for="middleName" class="form-label"><?php echo "$titles[10]"; ?></label>
                                <input type="text" class="form-control" placeholder="<?php echo "$titles[10]"; ?>" name= "middleName" id="middleName">
                            </div>
                            <div class="col-md-4">
                                <label for="lastName" class="form-label"><?php echo "$titles[3]";?></label>
                                <input type="text" class="form-control" placeholder="<?php echo "$titles[3]";?>" name="lastName" id="lastName">
                            </div>
                            <div class="col-md-12">
                                <label for="adres" class="form-label">Adres</label>
                                <input type="text" class="form-control" placeholder="Adres" name="adres" id="adres">
                            </div>
                            <div class="col-md-6">
                                <label for="zipcode" class="form-label"><?php echo "$titles[11]";?></label>
                                <input type="text" class="form-control" placeholder="<?php echo "$titles[11]";?>" name="zipcode" id="zipcode">
                            </div>
                            <div class="col-md-6">
                                <label for="city" class="form-label"><?php echo "$texts[11]";?></label>
                                <input type="text" class="form-control" placeholder="<?php echo "$texts[11]";?>" name="city" id="city">
                            </div>
                        </div>
                        <div class="col-12 text-center">
                            <button type="submit" name="addproduct" value="addproduct" class="btn btn-primary" id="addBtn"><?php echo "$titles[12]"; ?></button>
                        </div>
                    </form>
                </div>
                <a href="javascript:removeCart()" class="OrderRemove"><?php echo "$texts[12]"; ?></a>
            </div>
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
    <script type="text/javascript">
        function removeItem(item) {
            var answer = confirm ('<?php echo "$texts[2]";?>')
            if (answer)
                window.location="deleteCartItem.php?item=" + item;
        }

        function removeCart() {
            var answer = confirm ('<?php echo "$texts[3]";?>')
            if (answer)
                window.location="deleteCart.php";
        }
    </script>
</body>
</html>