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
    <link rel="stylesheet" type="text/css" href="Style/base.css">
    <link rel="stylesheet" type="text/css" href="Style/onsaanbod.css">
    <meta name="description" content="Huur een volledige doe-het-zelf Silent Disco set met koptelefoons. Binnen een mum van tijd organiseer jij zelf een Silent Disco!">
    <meta name="keywords" content="SilentDisco, Music, Headset, Party, Dance, Disco, 70s, 80s, 90s, Theme,">
</head>

<body class="aanbodPage">
    <div class="parallax">
        <div class="container" id="containerLeft">
            <div class="hexagonAanbod">
                <div class="shape">
                    <a href="#" id="play70">
                        <img src="Images/70's.png" alt="...">
                        <div class="overlayPlay" id="Play70">
                            <img class="overlayImgPlay" src="Images/play.svg" alt="">
                        </div>
                        <div class="overlayPause" id="Pause70">
                            <img class="overlayImgPause" src="Images/pause.svg" alt="">
                        </div>
                    </a>
                </div>
                <div class="text">
                    <div>
                        <h2>
                            70's thema
                        </h2>
                        <p>
                            Ga terug naar de jaren 70 met onze 70’s thema pakket. In dit pakket ontvang je alle hits van de jaren 70 om de hustle te kunnen doen.
                            <br>Je ontvangt van ons 10 headsets en 1 zender met de daarbij horende kabels.
                        </p>
                        <audio id="audio70s" src="music/70s.mp3"></audio>
                    </div>
                </div>
            </div>
        </div>
        <div class="container" id="containerRight">
            <div class="hexagonAanbodRight">
                <div class="shape">
                    <a href="#" id="play80">
                        <img src="Images/80s.jpg" alt="...">
                        <div class="overlayPlay" id="Play80">
                            <img class="overlayImgPlay" src="Images/play.svg" alt="">
                        </div>
                        <div class="overlayPause" id="Pause80">
                            <img class="overlayImgPause" src="Images/pause.svg" alt="">
                        </div>
                    </a>
                </div>
                <div class="text">
                    <div>
                        <h2>
                            80's thema
                        </h2>
                        <p>
                            Herleef de 80’s met dit geweldige 80’s thema pakket door topartiesten zoals Rick Astley, Queen en Elton John. Als je nu nog stil op de bank kan zitten dan doe je iets fout.
                            <br>Je ontvangt van ons 10 headsets en 1 zender met de daarbij horende kabels.
                        </p>
                        <audio id="audio80s" src="music/80s.mp3"></audio>
                    </div>
                </div>
            </div>
        </div>
        <div class="container" id="containerLeft">
            <div class="hexagonAanbod">
                <div class="shape">
                    <a href="#" id="play90">
                        <img src="Images/90s.png" class="img-fluid rounded-start" alt="...">
                        <div class="overlayPlay" id="Play90">
                            <img class="overlayImgPlay" src="Images/play.svg" alt="">
                        </div>
                        <div class="overlayPause" id="Pause90">
                            <img class="overlayImgPause" src="Images/pause.svg" alt="">
                        </div>
                    </a>
                </div>
                <div class="text">
                    <div>
                        <h2>
                            90's thema
                        </h2>
                        <p>
                            Back tot he 90’s. Geniet van de jaren 90 hip-hop klassiekers of stamp als een gabber door de woonkamer op Rainbow In The Sky van DJ Paul Elstak.
                            <br>Je ontvangt van ons 10 headsets en 1 zender met de daarbij horende kabels.
                        </p>
                        <audio id="audio90s" src="music/90s.mp3"></audio>
                    </div>
                </div>
            </div>
        </div>
        <div class="order">
            <a href="bestelnu.html" class="neon-button">Bestel nu!</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="Script/onsaanbod.js"></script>
</body>

</html>