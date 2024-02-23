<?php 
        namespace Controller;
        use Model\User_model;
    
        class ProfilController {

            public $db;
            public function __construct() {
               $this->db = new User_model();
            }
            public function view() {
                $result =  $this->db->GetUserInfo($_COOKIE['user_id']);
                require_once 'View/Profil.php';
            }

            public function modification()
            {
                $result = $this->db->modification($_POST, $_COOKIE['user_id']);

                if($result)
                {
                    echo json_encode(array("status"=>"success","message"=> "Ok"));
                    return;
                }else{
                    echo json_encode(array("status"=>"echec","message"=> "Non"));
                    return;
                }
            }

            public function suppression()
            {
                if (isset($_GET)){
                    $result_desactivate = $this->db->user_suppression($_COOKIE['user_id']);
                    if($result_desactivate)
                    {
                        echo json_encode(array('status'=> 'success','message'=>'Ok'));
                        header('Location: connexion');
                        exit;
                    } else{
                        echo json_encode(array('status'=> 'echec', 'message'=>"non"));
                    }
                }

                
            }
        }