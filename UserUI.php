<?php

require_once('UserManager.php');

class UserUI {

    private UserManager $u_manager;
    private User $user;

    function __construct() {
        $this->u_manager = new UserManager();
        #$this->user = $this->u_manager->getUserObject();
    }

    public function displayUserInformation() {
        $this->user->getUserData();
    }

    public function getUMan() {
        return $this->u_manager;
    }

    public function getUserArray() {
        return (array)$this->user;
    }
}

$ui = new UserUI();
$u_man = $ui->getUMan();
#$u_man->login('bjal.frijters@student.avans.nl', 'P@ssw0rd@2022!');
$u_man->fetchUserData(3, 'employees');

var_dump($u_man);

?>