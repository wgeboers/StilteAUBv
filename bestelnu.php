<!DOCTYPE html>
<?php include('header.php'); ?>
<html lang="en">

<head>
    <title>Silent Disco</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/jpg" href="Images/Logo.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="Style/base.css">
    <link rel="stylesheet" type="text/css" href="Style/bestelnu.css">
    <meta name="description" content="Huur een volledige doe-het-zelf Silent Disco set met koptelefoons. Binnen een mum van tijd organiseer jij zelf een Silent Disco!">
    <meta name="keywords" content="SilentDisco, Music, Headset, Party, Dance, Disco, Order">
</head>

<body class="orderPage">
    <div class="parallax">
		<div class="container hide" id="alertContainer">
			<div class="alert alert-warning alert-dismissible fade show" id="alertId">
				<button type="button" class="btn-close" aria-label="Close" id="alertBtn"></button>
				<span id="alertText"></span>
			</div>
		</div>
        <div id="order">
            <form id="orderForm">
                <div class="container">
                    <div class="row">
                        <h2>Gegevens</h2>
                        <div class="col-md-6">
                            <label for="firstName" class="form-label">Voornaam</label>
                            <input type="text" class="form-control" placeholder="Voornaam" id="firstName">
                        </div>
                        <div class="col-md-6">
                            <label for="lastName" class="form-label">Achternaam</label>
                            <input type="text" class="form-control" placeholder="Achternaam" id="lastName">
                        </div>
                        <div class="col-md-12">
                            <label for="phoneNumber" class="form-label">Telefoon</label>
                            <input type="text" class="form-control" placeholder="06-12345678" id="phoneNumber">
                        </div>
                        <div class="col-md-12">
                            <label for="inputEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" placeholder="email@gmail.com" id="inputEmail">
                            <small id="emailHelp" class="form-text text-muted">Wij zullen je email adres niet met andere
                                delen!</small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 affix">
                            <h2>Afleveradres</h2>
                            <div class="row g-2">
                                <div class="col-md-12">
                                    <label for="name" class="form-label">Naam</label>
                                    <input type="text" class="form-control" placeholder="Naam" id="name">
                                </div>
                                <div class="col-md-8">
                                    <label for="street" class="form-label">Straat</label>
                                    <input type="text" class="form-control" placeholder="Straat" id="street">
                                </div>
                                <div class="col-md-4">
                                    <label for="number" class="form-label">huisnummer</label>
                                    <input type="text" class="form-control" placeholder="007" id="number">
                                </div>
                                <div class="col-md-4">
                                    <label for="zipCode" class="form-label">Postcode</label>
                                    <input type="text" class="form-control" placeholder="1234AB" id="zipCode">
                                </div>
                                <div class="col-md-8">
                                    <label for="city" class="form-label">Plaats</label>
                                    <input type="text" class="form-control" placeholder="Amsterdam" id="city">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 hide" id="f_form">
                            <h2>Factuuradres</h2>
                            <div class="row g-2">
                                <div class="col-md-12">
                                    <label for="f_name" class="form-label">Naam</label>
                                    <input type="text" class="form-control invoice" placeholder="Naam" id="f_name">
                                </div>
                                <div class="col-md-8">
                                    <label for="f_street" class="form-label">Straat</label>
                                    <input type="text" class="form-control invoice" placeholder="Straat" id="f_street">
                                </div>
                                <div class="col-md-4">
                                    <label for="f_number" class="form-label">huisnummer</label>
                                    <input type="text" class="form-control invoice" placeholder="007" id="f_number">
                                </div>
                                <div class="col-md-4">
                                    <label for="f_zipCode" class="form-label">Postcode</label>
                                    <input type="text" class="form-control invoice" placeholder="1234AB" id="f_zipCode">
                                </div>
                                <div class="col-md-8">
                                    <label for="f_city" class="form-label">Plaats</label>
                                    <input type="text" class="form-control invoice" placeholder="Amsterdam" id="f_city">
                                </div>
                            </div>
                        </div>
						<div class="row">
							<div class="col-md-2 checkbox-custom">
								<input class="form-check-input" type="checkbox" value="" id="f_box">
								<label class="form-check-label" for="f_box">Factuuradres(indien afwijkend)</label>
							</div>
						</div>
                        <div class="row">
                            <div class="col">
                                <h2>checkout</h2>
                                <div class="row g-2">
                                    <div class="col-md-2">
                                        <label for="theme" class="form-label">Thema</label>
                                        <select id="theme" class="form-select">
                                            <option selected>Maak een keuze...</option>
                                            <option>70's thema</option>
                                            <option>80's thema</option>
                                            <option>90's thema</option>
                                        </select>
                                    </div>
                                    <div class="col-md-1">
                                        <label for="street" class="form-label">Aantal</label>
                                        <input type="text" class="form-control" id="street">
                                    </div>
									<div class="col-12 text-center">
										<button type="submit" class="btn btn-primary" id="purchaseBtn">Bestel</button>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
			</form></div>
        </div>
        
	</div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="Script/bestelnu.js"></script>
</body>

</html>