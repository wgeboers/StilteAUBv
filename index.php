
<!DOCTYPE html>
<?php include('header.php'); $_SESSION['url'] = $_SERVER['REQUEST_URI']; ?>
<html lang="en">
<head>
    <title>Silent Disco</title>
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
                                Silent D<span class="hexagonTextChange">isco</span>
                            </h2>
                            <p> Huur een volledige doe-het-zelf Silent Disco set met koptelefoons. Het systeem is makkelijk aan te sluiten op een laptop of op DJ-apparatuur met het door jou gekozen thema pakket. Binnen een mum van tijd organiseer jij zelf een Silent Disco!</p>
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
                    <a href="onsaanbod.html">
                        <div class="shape">
                            <img src="Images/Main4.png" alt="">
                            <div class="text">
                                <div>
                                    <p>
                                        Bekijk onze producten!
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
        <h2>Contactformulier</h2>
        <form id="contactForm" class="row">
            <div class="col-md-6">
                <label for="firstName" class="form-label">Voornaam</label>
                <input type="text" class="form-control" id="firstName">
            </div>
            <div class="col-md-6">
                <label for="lastName" class="form-label">Achternaam</label>
                <input type="text" class="form-control" id="lastName">
            </div>
            <div class="col-md-6">
                <label for="inputEmail" class="form-label">Email</label>
                <input type="email" class="form-control" id="inputEmail">
                <small id="emailHelp" class="form-text text-muted">Wij zullen je email adres niet met andere
                    delen!</small>
            </div>
            <div class="col-md-6">
                <label for="" class="form-label">Telefoon</label>
                <input type="text" class="form-control" id="phoneNumber">
            </div>
            <div class="col-md-12">
                <label for="subject" class="form-label">Onderwerp</label>
                <input type="text" class="form-control" id="subject">
            </div>
            <div class="col-md-12">
                <label for="Textarea1" class="form-label">Omschrijving</label>
                <textarea class="form-control" id="Textarea1" rows="5"></textarea>
            </div>
            <div class="col-12 text-center">
                <button type="submit" id="contactButton" class="btn btn-primary">Verstuur</button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="Script/base.js"></script>
</body>

</html>