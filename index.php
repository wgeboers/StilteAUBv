<!DOCTYPE html>
<?php include('header.php'); $_SESSION['url'] = $_SERVER['REQUEST_URI'];
include('LangManager.php');
$langManager = new LangManager();
$content = $langManager->getContents("index.php");
$titles = $langManager->getTitles();
$texts = $langManager->getTexts();
?>
<html>
<head>
    <title>Silent Disco!</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/jpg" href="Images/Logo.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="Style/base.css">
    <link rel="stylesheet" type="text/css" href="Style/index.css">
    <meta name="description" content="Huur een volledige doe-het-zelf Silent Disco set met koptelefoons. Binnen een mum van tijd organiseer jij zelf een Silent Disco!">
    <meta name="keywords" content="SilentDisco, Music, Headset, Party, Dance, Disco">
</head>
<body class='homePage'>
	<div class="parallax">
        <div class="content">
            <div class="container">
                <div class="hexagon">
                    <div class="shape">
                        <img src="Images/Main.jpg" alt="">
                    </div>
                    <div class="text">
                        <div>
                            <h2>
                               <span class="hexagonTextChange"><?php echo "$titles[0]" ?></span>
                            </h2>
                            <p><?php echo "$texts[0]"?></p>
                        </div>
                    </div>
                </div>
                <div class="hexagon2">
                    <div class="shape">
                        <img src="Images/Main3.jpg" alt="">
                    </div>
                </div>
                <div class="hexagon3">
                    <div class="shape">
                        <img src="Images/Main2.jpg" alt="">
                    </div>
                </div>
                <div class="hexagon4">
                    <a href="onsaanbod.php">
                        <div class="shape">
                            <img src="Images/Main4.png" alt="">
                            <div class="text">
                                <div>
                                    <p>
                                        <?php echo "$texts[1]"?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
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
        <button id="btnScrollToBottom">
            <img src="Images/QuestionMark.svg" alt="" class="question">
        </button>
        <button id="btnScrollToTop">
            <img src="Images/Up.svg" alt="" class="question">
        </button>
    </div>
    <div class="contact" id="contact">
        <h2><?php echo "$titles[9]"?></h2>
        <form action="./contactForm.php" method="post" id="contactForm" class="row">
            <div class="col-md-6">
                <label for="firstName" class="form-label"><?php echo "$titles[2]"?></label>
                <input type="text" class="form-control" id="firstName" name="firstName">
            </div>
            <div class="col-md-6">
                <label for="lastName" class="form-label"><?php echo "$titles[3]"?></label>
                <input type="text" class="form-control" id="lastName" name="lastName">
            </div>
            <div class="col-md-6">
                <label for="inputEmail" class="form-label"><?php echo "$titles[4]"?></label>
                <input type="email" class="form-control" id="inputEmail" name="inputEmail">
                <small id="emailHelp" class="form-text text-muted"><?php echo "$texts[4]"?></small>
            </div>
            <div class="col-md-6">
                <label for="" class="form-label"><?php echo "$titles[5]"?></label>
                <input type="text" class="form-control" id="phoneNumber" name="phoneNumber">
            </div>
            <div class="col-md-12">
                <label for="subject" class="form-label"><?php echo "$titles[6]"?></label>
                <input type="text" class="form-control" id="subject" name="subject">
            </div>
            <div class="col-md-12">
                <label for="Textarea1" class="form-label"><?php echo "$titles[7]"?></label>
                <input type="text" class="form-control" id="description" name="description">
            </div>
            <div class="col-12 text-center">
                <button type="submit" id="contactButton" name="contactForm" class="btn btn-primary"><?php echo "$titles[8]"?></button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="Script/base.js"></script>
</body>

</html>