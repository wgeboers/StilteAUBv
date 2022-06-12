<!DOCTYPE html>
<?php include('header.php'); $_SESSION['url'] = $_SERVER['REQUEST_URI']; 
        require_once('LangManager.php');
        $langManager = new LangManager();
        $content = $langManager->getContents("overons.php");
        $titles = $langManager->getTitles();
        $texts = $langManager->getTexts();
?>
<head>
    <title><?php echo "$titles[0]"; ?></title>
   <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/jpg" href="Images/Logo.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="Style/base.css">
    <link rel="stylesheet" type="text/css" href="Style/overons.css">
    <meta name="description" content="Huur een volledige doe-het-zelf Silent Disco set met koptelefoons. Binnen een mum van tijd organiseer jij zelf een Silent Disco!">
    <meta name="keywords" content="SilentDisco, Music, Headset, Party, Dance, Disco">
</head>

<body class="overOns">
    <div class="container-fluid text-white">
        <div class="row">
            <div class="col-xs-6 col-md-8 p-5 content">
            <div class="col-xs-6 col-md-4 p-5 content">
                <p>
                    <img id="logoOverOns" src="Images/Logo.png" />
                </p>
                <p>
                    <?php echo "$titles[2]"; ?>: STILTE AUBV<br>
                    ADRES: HOGESCHOOLLAAN 1<br>
                    <?php echo "$texts[2]"; ?>: 4818 CR<br>
                    <?php echo "$texts[1]"; ?>: BREDA<BR>
                </p>
                <p>
                    TEL: 088 5698475<br>
                    E-MAIL: info@stilteaubv.nl<br>
                    KVK: 8978676748<br>
                </p>
            </div>
        </div>
        <div class = "child">
            <p>
                <img id="logoOverOns" src="Images/Logo.png" />
            </p>
            <p>
                <span class="overonsColorChange"><?php echo "$titles[2]"; ?> </span>STILTE AUBV<br>
                <span class="overonsColorChange">ADRES: </span>HOGESCHOOLLAAN 1<br>
                <span class="overonsColorChange"><?php echo "$texts[2]"; ?></span>4818 CR<br>
                <span class="overonsColorChange"><?php echo "$texts[1]"; ?> </span>BREDA<BR>
            </p>
            <p>
                <span class="overonsColorChange">TEL: </span>088 5698475<br>
                <span class="overonsColorChange">E-MAIL: </span>info@stilteaubv.nl<br>
                <span class="overonsColorChange">KVK: </span>8978676748<br>
            </p>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="Script/base.js"></script>
</body>

</html>