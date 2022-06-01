<!doctype HTML>
<?php 
    require_once('UserManager.php');
    $u_ui = new UserManager();
    $userData = array();
    if(isset($_SESSION['id']) && !empty($_SESSION['id'])) {
        $user = $u_ui->fetchUserData($_SESSION['id']);
        $userData = array();
        
        if(isset($user))
            $userData = $user->getAllData();
    }
   
    echo "<form name='userDataForm' id='userdata' method='POST' action='userForm.php'>";
    foreach($userData as $key=>$value) {
        echo "<div class='col-md-3'>";
        echo "<label for='{$key} class='form-label'>{$key}</label>";
        echo "<input type='text' class='form-control' name='{$key}' value={$value}>";
        echo "</div>";
        if(array_key_last($userData) == $key) {
            echo "<br><div class='col-3 text-center'>
            <button type='submit' class='btn btn-primary' name='changeBtn'>Change</button>";
            echo "</form>";
        }
    }
?>