<?php

require_once('UserManager.php');


#Used to display data to the dashboard (maybe even post html to it...)
class UserUI {

    private UserManager $u_manager;
    private ?User $user;

    function __construct() {
        $this->u_manager = new UserManager();
    }

    #checks if the user is logged in and returns user object based on that.
    public function fetchUserObject() {
        if($this->u_manager->getLoggedIn())
            $this->user = $this->u_manager->fetchUserData($_SESSION["id"]);
        else
            $_SESSION["ErrorMsg"] = "You need to be logged in to view user data.";
        return $this->user;
    }

    public function updateUserObject() {

    }
    // SHOULD NOT BE USED; ONLY FOR TESTING PURPOSES!!!!! IF YOU NEED SOMETHING FROM THE MANAGER, GET IT FROM INSIDE THIS CLASS!!!!
    // public function getUMan() {
    //     return $this->u_manager;
    // }

    //Unused for now...
    // public function getUserArray() {
    //     return (array)$this->user;
    // }
}


#making sure userUI can access user objects through user manager.
session_start();
$_SESSION["id"] = 0;
$ui = new UserUI();
var_dump($ui->getUserObject());

?>