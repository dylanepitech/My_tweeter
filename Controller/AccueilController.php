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
                if ($_FILES['file']['size'] != 0){
                    $targetDirectory = "public/image_twitt/";
                    $tempFilePath = $_FILES["file"]["tmp_name"];
                    $fileName = uniqid() . '_' . basename($_FILES["file"]["name"]);
                    $targetFilePath = $targetDirectory . $fileName;
    
                    move_uploaded_file($tempFilePath, $targetFilePath);
                    $path = "public/image_twitt/";
                    $pathtarget = $path . $fileName;
                }else{
                    $pathtarget = false;
                }
                

                

                $result_twitt = $this->db->twitt($_POST['content'], $_COOKIE['user_id'], $pathtarget);

                if ($result_twitt)
                {
                    echo json_encode(array('status'=> 'success','message'=> 'OK'));
                    return;
                }else{
                    echo json_encode(array('status'=> 'success','message'=> 'OK'));
                    return;
                }
            }
            public function like()
            {
                $put_like = $this->db->putlike($_POST['id_user'],$_POST['id_post']);
            }
        }