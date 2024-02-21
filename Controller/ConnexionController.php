<?php 
namespace Controller;
use Model\User_model;

class ConnexionController
{
    private $user;
    public function __construct() {
       $this->user = new User_model();
    }
    public function view()
    {
        require_once "View/Connexion.php";
    }
    public function connexion_controller()
    {
        $var = $this->user->connexion($_POST);
        if ($var && $_POST['conected'] == "on"){
            setcookie('user_id', $var['id'], time()+3600*24, '/', '', true, true);
            setcookie('user_email', $var['email'], time()+3600*24, '/', '', true, true);
            setcookie('user_pseudo', $var['pseudo'], time()+3600*24, '/', '', true, true);
           echo json_encode(array('status'=> 'success','message'=> 'OK'));
            exit;
        }else{
           echo json_encode(array('status'=> 'echec','message'=> 'no'));

        }
    }
}