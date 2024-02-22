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
                
                public function putlike($id_user, $id_post)
                {
                    $takelike = "SELECT * FROM liked WHERE id_user = :id_user AND id_post = :id_post";
                    try {
                        $statement = $this->conn->prepare($takelike);
                        $statement->bindParam(":id_user", $id_user);
                        $statement->bindParam(":id_post", $id_post);
                        $statement->execute();
                        $result = $statement->fetch(PDO::FETCH_ASSOC);
                    } catch (\Throwable $th) {
                        return false;
                    }
                
                    if ($result) {
                        $delete = "DELETE FROM liked WHERE id_user = :id_user AND id_post = :id_post";
                        try {
                            $statement = $this->conn->prepare($delete);
                            $statement->bindParam(":id_user", $id_user);
                            $statement->bindParam(":id_post", $id_post);
                            $statement->execute();
                            return true;
                        } catch (\Throwable $th) {
                            return false;
                        }
                    } else {
                        $query = "INSERT INTO liked (id_user, id_post) VALUES (:id_user, :id_post)";
                        try {
                            $statement = $this->conn->prepare($query);
                            $statement->bindParam(":id_user", $id_user);
                            $statement->bindParam(":id_post", $id_post);
                            $statement->execute();
                            return true;
                        } catch (\Throwable $th) {
                            return false;
                        }
                    }
                }
                

        }