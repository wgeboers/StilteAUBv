<!doctype HTML>
<?php 
    require_once('EmployeeManager.php');
    $e_ui = new EmployeeManager();
    $empData = array();
    $empData = $e_ui->getAllEmployees();
    // if(isset($_SESSION['id']) && !empty($_SESSION['id'])) {
    //     // $user = $u_ui->fetchUserData($_SESSION['id']);
    //     // $userData = array();
        
    //     // if(isset($user))
    //     //     $userData = $user->getAllData();
    // }
    // echo "<div class='sidenav'>
    //     <a href='medewerkers.php'>Medewerkers</a>
    //     <a href='rollen.php'>Rollen</a>
    //     <a href='bestellingen.php'>Bestellingen</a>
    //     <a href='zoektermen.php'>Zoektermen</a>
    //     <a href='artikelen.php'>Artikelen</a>
    //     <a href='afbeeldingen.php'>Afbeeldingen</a>
    // </div>";
    foreach($empData as $results) {
        echo "<tr>";
        foreach($results as $key=>$value) {
            echo "<td>{$value}</td>";
            if(array_key_last($empData) == $key) {
                echo "<td><a href='medewerkerwijzigen.php?edit={$empID} class='neon-button'>Edit</a></td>";
                
            }
        }
        echo "</tr>";
    }
?>