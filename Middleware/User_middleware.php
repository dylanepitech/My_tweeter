<?php 
namespace Middleware;
use Model\User_model;
class User_middleware extends User_model
{
    private $user_conn;
    public function __construct() {
        $this->user_conn = new User_model();
    }
    public function user($id)
    {
        $user = $this->user_conn->GetUserInfo($id);

        if ($user['desactivate'] == true)
        {
            header('Location: connexion');
            return;
        }

        if ($user == false)
        {
            header('Location: connexion');
            return;
        }
    }

}