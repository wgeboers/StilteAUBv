// <?php
##################################################
##### UNUSED BECAUSE ITS UNNECESSARY FOR NOW #####
##################################################
// require_once('UserManager.php');


// #Used to display data to the dashboard (maybe even post html to it...)
// class UserUI {

//     private UserManager $u_manager;
//     private ?User $user;

//     function __construct(UserManager $u_manager) {
//         $this->u_manager = $u_manager;
//     }

//     #checks if the user is logged in and returns user object based on that.
//     public function fetchUserObject() {
//         if($this->u_manager->getLoggedIn()) {
//             $this->user = $this->u_manager->fetchUserData($_SESSION["id"]);
//         } else {
//             $_SESSION["ErrorMsg"] = "You need to be logged in to view user data.";
//             $this->user = NULL;
//         }
//         return $this->user;
        
//     }

//     public function updateUserObject() {

//     }
    
//     public function doLogin($email, $password) {
//         $id = $this->u_manager->login($email, $password);
//         $this->u_manager->setLoggedIn(true);

//     }

//     public function getLoggedIn() {
//         $this->u_manager->getLoggedIn();
//     }

// }


#making sure userUI can access user objects through user manager.
// session_start();
// $_SESSION["id"] = 0;
// $ui = new UserUI();
// var_dump($ui->getUserObject());

?>