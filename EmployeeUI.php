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

/** MEDEWERKERS BEGINT HIER */
if(basename($_SERVER['PHP_SELF']) === 'employeesView.php') {
    $empData = $e_man->getAllEmployees();
    foreach($empData as $rows) {
        echo "<tr>";
        $row = $rows->toArray();
        $linkKey = $row['EmployeeID'];
        foreach($row as $key=>$value) {
            echo "<td>{$value}</td>";
            if(array_key_last($row) === $key) {
                echo "<td><a href='editEmployeeView.php?edit={$linkKey}' class='neon-button'>Edit</a></td>";
            }
        }
        echo "</tr>";
    } 
}

if(basename($_SERVER['PHP_SELF']) === 'editEmployeeView.php') {
    $id = $_GET['edit'];
    $empData = $e_man->fetchEmployeeData('EmployeeID', $id)->toArray();
    $roles = $e_man->fetchRolesFromDB();
    unset($empData['EmployeeID']);
    unset($empData['ACTIVE']);
    unset($empData['Creation Date']); 
    var_dump($empData);
    echo "<form name='EmpUpdateForm' method='post' class='form' action='EmpUpdateForm.php'>";
    foreach($empData as $key=>$value) {
        echo    "<div class='col-md-4'>
                <label for='{$key}' class='form-label'>{$key}</label>
                <input type='text' class='form-control' name='{$key}' value={$value}>
                </div>";
    } echo "<div class='col-md-4'>
    <label for='role' class='form-label'>Rol</label>
    <select name='role' id='role' class='form-select customSelect' aria-label='Default select example'>";
    foreach($roles as $rows) {
        $roleName = $rows->getRoleName();
        echo "<option>{$roleName}</option>";
    }
    echo "</select></div><div class='col-4 text-center'>
    <button type='submit' class='btn btn-primary' name='updateBtn'>Wijzigen</button>
    </div>
    </form>";
    
}

if(basename($_SERVER['PHP_SELF']) === 'createEmployeeView.php') {
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

/* ROLLEN BEGINT HIER */
if(basename($_SERVER['PHP_SELF']) === 'rolesView.php') {
    $roles = $e_man->fetchRolesFromDB();
    foreach($roles as $rows) {
        echo "<tr>";
        $row = $rows->toArray(); //cast object to array
        $linkKey = $row[0];
        foreach($row as $key=>$value) {
            echo "<td>{$value}</td>";
            if(array_key_last($row) === $key) {
                echo "<td><a href='editRoleView.php?edit={$linkKey}' class='neon-button'>Edit</a></td>";
            }
        }
    }
    echo "</tr>";
}

if(basename($_SERVER['PHP_SELF']) === 'editRoleView.php') {
    $role = $e_man->fetchSingularRoleFromDB('RoleID', $_GET['edit']);
    $name = $role->getRoleName();
    $desc = $role->getRoleDesc();
    $_SESSION['RoleID'] = $role->getRoleID();
    echo "<form name='roleUpdateForm' method='post' class='form' action='updateRole.php'>
    <div class='col-md-4'>
    <label for='Name' class='form-label'>Naam</label>
    <input type='text' class='form-control' name='Name' value={$name}>
    </div>
    <div class='col-md-4'>
    <label for='Description' class='form-label'>Beschrijving</label>
    <input type='text' class='form-control' name='Description' value='{$desc}'>
    </div>
    </select></div><div class='col-4 text-center'>
    <button type='submit' class='btn btn-primary' name='updateRolebtn'>Wijzigen</button>
    </div>
    </form>";
}

/* BESTELLINGEN BEGINT HIER */
if(basename($_SERVER['PHP_SELF']) === 'ordersView.php') {
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
        $linkKey = $rows['HeaderID'];
        foreach($rows as $key=>$value) {
            echo "<td name={$key}>{$value}</td>";
            if(array_key_last($rows) === $key) {
                echo "<td><a href='orderDetailsView.php?edit={$linkKey}' class='neon-button'>Edit</a></td>";
            }
        }
        echo "</tr></tbody>";
    }
}

if(basename($_SERVER['PHP_SELF']) === 'orderDetailsView.php') {
    $order = $o_man->fetchSingularOrderHeader($_GET['edit']);
    $_SESSION['HeaderID'] = $_GET['edit'];
    foreach($order as $rows) {
        echo "<form name='orderUpdateForm' method='post' class='form' action='updateOrder.php'>";
        $status = $rows['Status'];
        unset($rows['HeaderID']);
        unset($rows['Order_By']);
        foreach($rows as $key=>$value) {
            if(array_key_last($rows) === $key) {
                echo "<div class='col-md-4'>
                <label for='Status' class='form-label'>Status</label>
                <select name='Status' id='Status' class='form-select customSelect' aria-label='Default select example'>
                <option value='{$status}' selected='selected'>'{$status}'</option>
                <option value='openstaand'>Openstaand</option>
                <option value='In behandeling'>In behandeling</option>
                <option value='Verstuurd'>Verstuurd</option>
                <option value='Geleverd'>Geleverd</option>
                </select></div>
                <div class='col-4 text-center'>
                <button type='submit' class='btn btn-primary' name='updateOrderBtn'>Wijzigen</button>
                </div></div>
                </form>";
            } else {
            echo    "<div class='col-md-4'>
                    <label for='{$key}' class='form-label'>'{$key}'</label>
                    <input type='text' class='form-control' name='{$key}' value='{$value}' readonly>
                    </div>";
            }
        } 
    }
    
}

/** ZOEKTERMEN BEGINT HIER */
if(basename($_SERVER['PHP_SELF']) === 'searchtermsView.php') {
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
        }
        echo "</tr></tbody>";
    }
}

/** ARTIKELEN BEGINT HIER */
if(basename($_SERVER['PHP_SELF']) === 'productsView.php') {
    $products = $p_man->fetchProductsFromDB();
    foreach($products as $rows) {
        echo "<tr>";
        $row = $rows->toArray(); //cast object to array
        $linkKey = $row['ID'];
        foreach($row as $key=>$value) {
            echo "<td>{$value}</td>";
            if(array_key_last($row) === $key) {
                echo "<td><a href='ProductEditView.php?edit={$linkKey}' class='neon-button'>Edit</a></td>";
            }
        }
    }
    echo "</tr>";
}

if(basename($_SERVER['PHP_SELF']) === 'ProductEditView.php') {
    $product = $p_man->fetchSingleProduct($_GET['edit']);
    $images = $p_man->fetchImagesFromDB();
    $prodArray = $product->toArray();
    $_SESSION['ProductID'] = $prodArray['ID'];
    $_SESSION['ImageID'] = $prodArray['imageID'];
    $imName = $prodArray['imageName'];
    unset($prodArray['ID']);
    unset($prodArray['imageID']);
    unset($prodArray['imageFilePath']);
    echo "<form name='ProductEditForm' method='post' class='form' action='updateProduct.php'>";
    foreach($prodArray as $key=>$value) {
        echo    "<div class='col-md-4'>
        <label for='{$key}' class='form-label'>{$key}</label>
        <input type='text' class='form-control' name='{$key}' value='{$value}'>
        </div>";
    }
    echo "<label for='image' class='form-label'>Afbeelding</label>
    <select name='image' id='image' class='form-select customSelect' aria-label='Default select example'>";
    foreach($images as $rows) {
        $imID = $rows->getImageID();
        $imName = $rows->getImageName();
        echo "<option value='{$imID}'>'{$imName}'</option>";
    }
    echo "</select><div class='col-md-4'>
    <button type='submit' class='btn btn-primary' name='updateproduct'>Wijzigen</button>
    </div>
    </form>";
}

/** AFBEELDINGEN BEGINT HIER */
if(basename($_SERVER['PHP_SELF']) === 'imagesView.php') {
    $images = $p_man->fetchImagesFromDB();
    foreach($images as $rows) {
        $rows = $rows->toArray();
        $linkKey = $rows['ImageID'];
        echo" <tbody><tr>";
        foreach($rows as $key=>$value) {
            echo "<td name={$key}>{$value}</td>";
        }
        echo "</tr></tbody>";
    }
}


?>