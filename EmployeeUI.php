<!doctype HTML>
<?php 
    //UI for an employee's dashboard.
    //Contains all data from orders, roles, employees & products.
    require_once('EmployeeManager.php');
    require_once('OrderManager.php');
    require_once('ProductManager.php');
    $e_man = new EmployeeManager();
    $o_man = new OrderManager();
    $p_man = new ProductManager();

    if(basename($_SERVER['PHP_SELF']) === 'medewerkers.php') {
        $empData = $e_man->getAllEmployees();
        foreach($empData as $rows) {
            echo "<tr>";
            $row = $rows->toArray();
            foreach($row as $key=>$value) {
                if(array_key_first($row) === $key) {
                    $linkKey = $key;
                }
                echo "<td>{$value}</td>";
                if(array_key_last($row) === $key) {
                    echo "<td><a href='medewerkerwijzigen.php?edit={$linkKey}' class='neon-button'>Edit</a></td>";
                }
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
                </div>";   
    }

    if(basename($_SERVER['PHP_SELF']) === 'rollen.php') {
        $roles = $e_man->fetchRolesFromDB();
        foreach($roles as $rows) {
            echo "<tr>";
            $row = $rows->toArray(); //cast object to array
            foreach($row as $key=>$value) {
                if(array_key_first($row) === $key) {
                    $linkKey = $key;
                }
                echo "<td>{$value}</td>";
                if(array_key_last($row) === $key) {
                    echo "<td><a href='rolwijzigen.php?edit={$linkKey}' class='neon-button'>Edit</a></td>";
                }
            }
        }
        echo "</tr>";
    }

    if(basename($_SERVER['PHP_SELF']) === 'bestellingen.php') {
        $orders = $o_man->fetchOrderHeaders();
        $count = 0;
        foreach($orders as $rows) {
            if($count < 1) {
                echo "<thead><tr>";
                foreach(array_keys($rows) as $keys) {
                    echo "<th scope='col'>{$keys}</th>";
                }
                $count++;
                echo "</tr></thead>
                    <tbody>
                    <tr>";
            }
            foreach($rows as $key=>$value) {
                if(array_key_first($rows) === $key) {
                    $linkKey = $key;
                }
                echo "<td name={$key}>{$value}</td>";
                if(array_key_last($rows) === $key) {
                    echo "<td><a href='artikelwijzigen.php?edit={$linkKey}' class='neon-button'>Edit</a></td>";
                }
            }
            echo "</tr></tbody>";
        }
    }

    if(basename($_SERVER['PHP_SELF']) === 'zoektermen.php') {
        $searchTerms = $p_man->fetchSearchTerms();
        $count = 0;
        foreach($searchTerms as $rows) {
            if($count < 1) {
                echo "<thead><tr>";
                foreach(array_keys($rows) as $keys) {
                    echo "<th scope='col'>{$keys}</th>";
                }
                $count++;
                echo "</tr></thead>
                    <tbody>
                    <tr>";
            }
            foreach($rows as $key=>$value) {
                if(array_key_first($rows) === $key) {
                    $linkKey = $key;
                }
                echo "<td name={$key}>{$value}</td>";
                if(array_key_last($rows) === $key) {
                    echo "<td><a href='artikelwijzigen.php?edit={$linkKey}' class='neon-button'>Edit</a></td>";
                }
            }
            echo "</tr></tbody>";
        }
    }

    if(basename($_SERVER['PHP_SELF']) === 'artikelen.php') {
        $products = $p_man->fetchProductsFromDB();
        foreach($products as $rows) {
            echo "<tr>";
            $row = $rows->toArray(); //cast object to array
            foreach($row as $key=>$value) {
                if(array_key_first($row) === $key) {
                    $linkKey = $key;
                }
                echo "<td>{$value}</td>";
                if(array_key_last($row) === $key) {
                    echo "<td><a href='rolwijzigen.php?edit={$linkKey}' class='neon-button'>Edit</a></td>";
                }
            }
        }
        echo "</tr>";
    }

    if(basename($_SERVER['PHP_SELF']) === 'afbeeldingen.php') {
        $images = $p_man->fetchImagesFromDB();
        $count = 0;
        foreach($images as $rows) {
            if($count < 1) {
                echo "<thead><tr>";
                foreach(array_keys($rows) as $keys) {
                    echo "<th scope='col'>{$keys}</th>";
                }
                $count++;
                echo "</tr></thead>
                    <tbody>
                    <tr>";
            }
            foreach($rows as $key=>$value) {
                if(array_key_first($rows) === $key) {
                    $linkKey = $key;
                }
                echo "<td name={$key}>{$value}</td>";
                if(array_key_last($rows) === $key) {
                    echo "<td><a href='artikelwijzigen.php?edit={$linkKey}' class='neon-button'>Edit</a></td>";
                }
            }
            echo "</tr></tbody>";
        }
    }

?>