<!doctype HTML>
<?php 
    require_once('EmployeeManager.php');
    $e_man = new EmployeeManager();
    if(basename($_SERVER['PHP_SELF']) === 'medewerkers.php') {
        $empData = $e_man->getAllEmployees();
        foreach($empData as $rows) {
            echo "<tr>";
            $row = $rows->toArray();
            foreach($row as $key=>$value) {
                echo "<td>{$value}</td>";
            }
            echo "</tr>";
        } 
    }

    if(basename($_SERVER['PHP_SELF']) === 'medewerkeraanmaken.php') {
        $roleData = $e_man->fetchRolesFromDB();
        echo "  <div class='col-md-4'>
                    <label for='First Name' class='form-label'>Voornaam</label>
                    <input type='text' class='form-control' placeholder='Voornaam' name='First Name' id='First Name'>
                </div>
                <div class='col-md-4'>
                    <label for='Middle Name' class='form-label'>Tussenvoegsel</label>
                    <input type='text' class='form-control' placeholder='Tussenvoegsel' name='Middle Name' id='Middle Name'>
                </div>
                <div class='col-md-4'>
                    <label for='Last Name' class='form-label'>Achternaam</label>
                    <input type='text' class='form-control' placeholder='Achternaam' name='Last Name' id='Last Name'>
                </div>
                <div class='col-md-12'>
                    <label for='Email' class='form-label'>Email</label>
                    <input type='text' class='form-control' placeholder='email@gmail.com' name='Email' id='Email'>
                </div>
                <div class='col-md-12'>
                    <label for='Password' class='form-label'>Wachtwoord</label>
                    <input type='password' class='form-control' placeholder='Wachtwoord' name='Password' id='Password'>
                </div>
                <div class='col-md-12'>
                    <label for='role' class='form-label'>Rol</label>
                    <select name='role' id='role' class='form-select customSelect' aria-label='Default select example'>";
        foreach($roleData as $rows) {
            $roleName = $rows->getRoleName();
            echo "<option>{$roleName}</option>";
        }
        echo    "</select>
                </div>
                <div class='col-12 text-center'>
                <button type='submit' name='addemployee' value='addemployee' class='btn btn-primary' id='addBtn'>Gebruiker aanmaken</button>
                </div";   
    }

    if(basename($_SERVER['PHP_SELF']) === 'rollen.php') {
        $roles = $e_man->fetchRolesFromDB();
        foreach($roles as $rows) {
            echo "<tr>";
            $row = $rows->toArray(); //cast object to array
            foreach($row as $key=>$value) {
                echo "<td>{$value}</td>";
            }
        }
        echo "</tr>";
    }

?>