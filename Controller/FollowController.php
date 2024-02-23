<?php 
        namespace Controller;
        use Model\Follow_model;

    
        class FollowController  extends Follow_model{
            public $db;
            public function __construct() {
                $this->db = new Follow_model();
            }
            public function view() {
                $getfollow = $this->db->getfollow($_COOKIE['user_id']);
                $getfollowing = $this->db->getfollowing($_COOKIE['user_id']);
                $countfollow = $this->db->countfollow($_COOKIE['user_id']);
                $countfollowing = $this->db->countfollowing($_COOKIE['user_id']);
                require_once 'View/Follow.php';
            }
            public function delete_follower()
            {
                if (isset($_GET['id'])){
                    $result = $this->db->delete_followers($_GET['id'], $_COOKIE['user_id']);

                    if ($result){
                        header('Location: follow');
                        return;
                    }else{
                        header('Location: follow');
                        return;
                    }

                }

            }

            public function delete_following()
            {
                if (isset($_GET['id'])){
                    $result = $this->db->delete_followings($_GET['id'], $_COOKIE['user_id']);

                    if ($result){
                        header('Location: follow');
                        return;
                    }else{
                        header('Location: follow');
                        return;
                    }

                }
            }
        }