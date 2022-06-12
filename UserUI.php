<!doctype HTML>
<?php 
require_once('UserManager.php');
require_once('OrderManager.php');
$uman = new UserManager();
$oman = new OrderManager();

if(basename($_SERVER['PHP_SELF']) === 'userInfo.php') {
    
    $count = 0;
    $translationArray = array();
    if(isset($_SESSION['id']) && !empty($_SESSION['id'])) {
        $user = $uman->fetchUserData($_SESSION['id']);
        $userData = array();
        
        if(isset($user))
            $userData = $user->getAllData();
    }

    echo "<div id='usetInfo' class='form'>";
    echo "<form name='userDataForm' id='userdata' method='POST' action='userForm.php'>";
    echo "<div class='container'>";
    echo "<div class='row'>";
    foreach($userData as $key=>$value) {
        echo "<div class='col-md-12'>";
        foreach(array_keys($userData) as $keys) {
            switch($keys) {
                case 'First Name':
                    array_push($translationArray, 'Voornaam');
                    break;
                case 'Middle Name':
                    array_push($translationArray, 'tussenvoegsel');
                    break;
                case 'Last Name':
                    array_push($translationArray, 'Achternaam');
                    break;
                case 'Email':
                    array_push($translationArray, 'Email');
                    break;
                case 'Phone Number':
                    array_push($translationArray, 'Telefoonnummer');
                    break;
                case 'Street':
                    array_push($translationArray, 'Straat');
                    break;
                case 'House Number':
                    array_push($translationArray, 'Huisnummer');
                    break;
                case 'House Number Addition':
                    array_push($translationArray, 'Toevoeging');
                    break;
                case 'Zipcode':
                    array_push($translationArray, 'Postcode');
                    break;
                case 'City':
                    array_push($translationArray, 'Stad');
                    break;
                default:
                    break;
            }
        }
        $trans = $translationArray[$count];
        if($_SESSION['lang'] === 'lang_nl') {
            echo "<label for='{$key}' class='form-label'>{$trans}</label>";
            echo "<input type='text' class='form-control' name='{$key}' value={$value}>";
            echo "</div>";
            
        } else {
            echo "<label for='{$key}' class='form-label'>{$key}</label>";
            echo "<input type='text' class='form-control' name='{$key}' value={$value}>";
            echo "</div>";
        }
        $count++;
        if(array_key_last($userData) == $key) {
            echo "<br><div class='col-12 text-center'>
            <button type='submit' class='btn btn-primary' name='changeBtn'>Wijzigen</button>";
            echo "</form>";
            echo "</div>";
            echo "</div>";
        }
    }
}

if(basename($_SERVER['PHP_SELF']) === 'userOrders.php') {
    $orders = $oman->fetchOrderHeadersByUser($_SESSION['id']);
    $count = 0;
    echo "<table class='table'>";
    foreach($orders as $rows) {
        $linkKey = $rows['HeaderID']; //used to change values.
        unset($rows['HeaderID'], $rows['Order_By'], $rows['Finished_Date']);
        if($count < 1) {
            echo "<thead><tr>";
            foreach(array_keys($rows) as $keys) {
                switch($keys) {
                    case 'Total_Price':
                        $trans = 'Totaalprijs';
                        break;
                    case 'Deliver_Adres':
                        $trans = 'Bezorgadres';
                        break;
                    case 'Deliver_Zipcode':
                        $trans = 'Postcode';
                        break;
                    case 'Deliver_City':
                        $trans = 'Stad';
                        break;
                    case 'Creation_Date':
                        $trans = 'Besteldatum';
                        break;
                    default:
                        break;
                }
                if($_SESSION['lang'] === 'lang_nl') 
                    echo "<th scope='col'>{$trans}</th>";
                else {
                    $keys = str_replace('_', ' ', $keys);
                    echo "<th scope='col'>{$keys}</th>";
                }
            }
            $count++;
            echo "</tr></thead>
                <tbody>
                <tr>";
        }
        foreach($rows as $key=>$value) {
            echo "<td name={$key}>{$value}</td>";
        }
        echo "</tr>";
    }
    echo "</tbody></table>";
}
?>