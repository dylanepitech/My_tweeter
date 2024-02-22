<?php 
namespace Controller;

use Model\User_model;

class InscriptionController {
   private $user;
    public function __construct() {
       $this->user = new User_model();
    }
    public function view(){
        require_once "View/Inscription.php";
    }
    public function inscription_controller()
    {
       $var = $this->user->inscription($_POST);
       if ($var == false) {
            echo json_encode(array("status"=> "echec","message"=> "No"));
            exit;
       }else{
         echo json_encode(array("status"=> "success","message"=>"yes"));
         exit;
       }
        
    }

}