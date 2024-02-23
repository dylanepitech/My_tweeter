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
            setcookie('user_id', $var['id'], time()+3600*24, '/My_tweeter', '',true);
            setcookie('user_email', $var['email'], time()+3600*24, '/My_tweeter', '', true);
            setcookie('user_pseudo', $var['pseudo'], time()+3600*24, '/My_tweeter', '', true);
           echo json_encode(array('status'=> 'success','message'=> 'OK'));
            exit;
        }else{
           echo json_encode(array('status'=> 'echec','message'=> 'no'));

        }
    }

    public function reactivation()
    {
        $var = $this->user->user_reactivation($_POST);
        if ($var)
        {
            echo json_encode(array('status'=> 'success','message'=> 'Ok'));
            return;
        }else{
            echo json_encode(array('status'=> 'echec', 'message'=> "non"));
            return;
        }
    }

    public function deconnexion()
    {

            setcookie('user_id', $_COOKIE['user_id'], time()-3600*24, '/My_tweeter', '',true);
            setcookie('user_email', $_COOKIE['user_email'], time()-3600*24, '/My_tweeter', '', true);
            setcookie('user_pseudo', $_COOKIE['user_pseudo'], time()-3600*24, '/My_tweeter', '', true);
            header('Location: connexion');
            return;
    }
}