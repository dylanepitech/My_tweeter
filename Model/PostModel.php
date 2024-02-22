<?php 
        namespace Model;
        use PDO;
        use Model\Database;
        
        class PostModel extends Database {
            protected $db;

            public function __construct()
            {
                parent::__construct();
            }

            public function getpost()
                {
                    $query = "SELECT * FROM user inner join post on user.id = post.id_user";
                    try {
                        $statement = $this->conn->prepare($query);
                        $statement->execute();
                        $posts = $statement->fetchAll(PDO::FETCH_ASSOC);
                        return $posts;
                    } catch (\Throwable $th) {
                        return false;
                    }
                }

                public function twitt($content, $id_user)
                {
                    $query = "INSERT INTO post (id_user, content) VALUES (:id_user, :content)";
                
                    try {
                        $statement = $this->conn->prepare($query);
                        $statement->bindParam(":id_user", $id_user); 
                        $statement->bindParam(":content", $content); 
                        $statement->execute();
                        return true;
                    } catch (\Throwable $th) {
                        error_log($th->getMessage());
                        return false;
                    }
                }
                

        }