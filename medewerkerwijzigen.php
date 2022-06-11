<!DOCTYPE html>
<?php 
    include('header.php'); $_SESSION['url'] = $_SERVER['REQUEST_URI'];

    require_once('employee.php');
    $id=$_GET['edit'];
    $employee = new Employee();
    $employee->id = $id;
    $employee->readOne();
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
            <div id="medewerker"  class="form">
                <form action="./updateEmployee.php?id=<?php echo $id; ?>" method="post" name="medewerkerForm" id="medewerkerForm">
                    <div class="container">
                        <div class="row">
                            <h2>Medewerker wijzigen</h2>
                            <div class="col-md-4">
                                <label for="firstName" class="form-label">Voornaam</label>
                                <input type="text" class="form-control" placeholder="Voornaam" name="firstName" id="firstName" value='<?php echo $employee->firstName; ?>'>
                            </div>
                            <div class="col-md-4">
                                <label for="middleName" class="form-label">Tussenvoegsel</label>
                                <input type="text" class="form-control" placeholder="Tussenvoegsel" name="middleName" id="middleName" value='<?php echo $employee->middleName; ?>'>
                            </div>
                            <div class="col-md-4">
                                <label for="lastName" class="form-label">Achternaam</label>
                                <input type="text" class="form-control" placeholder="Achternaam" name="lastName" id="lastName" value='<?php echo $employee->lastName; ?>'>
                            </div>
                            <div class="col-md-12">
                                <label for="inputEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" placeholder="email@gmail.com" name="inputEmail" id="inputEmail" value='<?php echo $employee->email; ?>'>
                            </div>
                            <div class="col-md-12">
                                <label for="inputPassword" class="form-label">Wachtwoord</label>
                                <input type="password" class="form-control" placeholder="Wachtwoord" name="inputPassword" id="inputPassword" value='<?php echo $employee->Password; ?>'>
                            </div>
                            <div class="col-md-12">
                                <label for="inputActive" class="form-label">Status</label>
                                <input type="text" class="form-control" placeholder="Status" name="inputActive" id="inputActive" value='<?php echo $employee->active; ?>'>
                            </div>
                            <div class="col-md-12">
                                <label for="rol" class="form-label">Rol</label>
                                <select name="rol" id="rol" class="form-select customSelect" aria-label="Default select example">
                                    <option value="<?php echo $employee->rolId;?>"><?php echo $employee->rolName;?></option>
                                    <?php
                                        require_once('crud.php');
                                        $classA = new Crud('root', '');
                                        $roleData = $classA->getTable('roles');

                                        foreach($roleData as $rows){
                                    ?>
                                    <option value="<?php echo $rows->RoleID;?>"><?php echo $rows->Name;?></option>
                                    <?php
                                        }
                                    ?>  
                                </select>
                            </div>
                        </div>
                        <div class="col-12 text-center">
                            <button type="submit" name="updateemployee" value="updateemployee" class="btn btn-primary" id="addBtn">Gebruiker wijzigen</button>
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