<!DOCTYPE html>
<?php include('header.php'); ?>
<head>
    <title>Registreer</title>
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
<body class='register'>
    <div class='col-md-6'>
        <form id='registerForm' method='post' action='./registerUser.php'>
            <div class='row'>
                <div class='col-md-4'>
                    <label for='First_Name' class='form-label'>Voornaam</label>
                    <input type='text' class='form-control' placeholder='Voornaam' name='First_Name' id='First_Name'>
                </div>
                <div class='col-md-4'>
                    <label for='Middle_Name' class='form-label'>Tussenvoegsel</label>
                    <input type='text' class='form-control' placeholder='Tussenvoegsel' name='Middle_Name' id='Middle_Name'>
                </div>
                <div class='col-md-4'>
                    <label for='Last_Name' class='form-label'>Achternaam</label>
                    <input type='text' class='form-control' placeholder='Achternaam' name='Last_Name' id='Last_Name'>
                </div>
            </div>
            <div class='row'>
            <div class='col-md-4'>
                    <label for='Phone_Number' class='form-label'>Telefoonnummer</label>
                    <input type='text' class='form-control' name='Phone_Number' id='Phone_Number'>
                </div>
                <div class='col-md-4'>
                    <label for='Email' class='form-label'>Email</label>
                    <input type='text' class='form-control' placeholder='email@gmail.com' name='Email' id='Email'>
                </div>
                <div class='col-md-4'>
                    <label for='Password' class='form-label'>Wachtwoord</label>
                    <input type='password' class='form-control' placeholder='Wachtwoord' name='Password' id='Password'>
                </div>
            </div>
            <div class='row'>
                <div class='col-md-3'>
                    <label for='Street' class='form-label'>Straat</label>
                    <input type='text' class='form-control' name='Street' id='Street'>
                </div>
                <div class='col-md-3'>
                    <label for='House_Number' class='form-label'>Huisnummer</label>
                    <input type='text' class='form-control' name='House_Number' id='House_Number'>
                </div>
                <div class='col-md-3'>
                    <label for='House_Number_Addition' class='form-label'>toevoeging</label>
                    <input type='text' class='form-control' name='House_Number_Addition' id='House_Number_Addition'>
                </div>
                <div class='col-md-3'>
                    <label for='Zipcode' class='form-label'>Postcode</label>
                    <input type='text' class='form-control' name='Zipcode' id='Zipcode'>
                </div>
                <div class='col-md-3'>
                    <label for='City' class='form-label'>Stad</label>
                    <input type='text' class='form-control' name='City' id='City'>
                </div>
            </div>
            <div class='row'>
                <div class='col-md-2 text-center justfiy-content-center'>
                    <br>
                    <button type='submit' name='register' value='register' class='btn btn-primary'>Registreer</button>
                </div>
            </div>
        </form>
    </div>
    <script type="text/javascript" src="Script/registervalidation.js"></script>
</body>