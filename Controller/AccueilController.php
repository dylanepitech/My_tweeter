<?php 
        namespace Controller;
        use Model\PostModel;
        
        class AccueilController {
            public $db;
            public function __construct() {
                $this->db = new PostModel();
            }
            public function view() {
                $result_post = $this->db->getpost();
                require_once 'View/Accueil.php';
            }
            public function post()
            {
                $result_twitt = $this->db->twitt($_POST['content'], $_COOKIE['user_id']);

                if ($result_twitt)
                {
                    echo json_encode(array('status'=> 'success','message'=> 'ok'));
                    return;
                }else{
                    echo json_encode(array('status'=> 'echec','message'=> 'no'));
                    return;
                }
            }
            public function like()
            {
                $put_like = $this->db->putlike($_POST['id_user'],$_POST['id_post']);

                var_dump($put_like);
            }
        }