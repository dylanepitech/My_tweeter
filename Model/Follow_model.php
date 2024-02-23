<?php 
        namespace Model;
        use PDO;
        
        class Follow_model extends Database {

            public function __construct()
            {
                parent::__construct();
            }

            public function getfollow($id)
            {
                $query = "SELECT * from user inner join follow on user.id = follow.id_follower where id_following = :id";

                try {
                    $statement = $this->conn->prepare($query);
                    $statement->bindParam(":id", $id);
                    $statement->execute();
                    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                    return $result;
                } catch (\Throwable $th) {
                    return false;
                }
            }
            public function getfollowing($id)
            {
                $query = "SELECT * from user inner join follow on user.id = follow.id_following where id_follower = :id";

                try {
                    $statement = $this->conn->prepare($query);
                    $statement->bindParam(":id", $id);
                    $statement->execute();
                    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                    return $result;
                } catch (\Throwable $th) {
                    return false;
                }
            }

                public function delete_followers($id_follower, $id_following)
                {
                    $query = "DELETE from follow where id_follower = :id_follower and id_following = :id_following";

                    try {
                        $statement = $this->conn->prepare($query);
                        $statement->bindParam(":id_follower", $id_follower);
                        $statement->bindParam(":id_following", $id_following);
                        $statement->execute();  
                        return true;
                    } catch (\Throwable $th) {
                        return false;
                    }
                }

                public function countfollow($id_following)
                {
                    $query = "SELECT COUNT(id_follower) AS count_followers FROM follow WHERE id_following = :id_following";

                    try {
                        $statement = $this->conn->prepare($query);
                        $statement->bindParam(":id_following", $id_following);
                        $statement->execute();
                        $result = $statement->fetch(PDO::FETCH_ASSOC);
                        return $result['count_followers'];
                    } catch (\Throwable $th) {
                        return false;
                    }
                }

                public function countfollowing($id_follower)
                {
                    $query = "SELECT COUNT(id_following) AS count_following FROM follow WHERE id_follower = :id_follower";

                    try {
                        $statement = $this->conn->prepare($query);
                        $statement->bindParam(":id_follower", $id_follower);
                        $statement->execute();
                        $result = $statement->fetch(PDO::FETCH_ASSOC);
                        return $result['count_following'];
                    } catch (\Throwable $th) {
                        return false;
                    }
                }


                public function delete_followings($id_following, $id_follower)
                {
                    $query = "DELETE from follow where id_following = :id_following and id_follower = :id_follower";

                    try {
                        $statement = $this->conn->prepare($query);
                        $statement->bindParam(":id_follower", $id_follower);
                        $statement->bindParam(":id_following", $id_following);
                        $statement->execute();  
                        return true;
                    } catch (\Throwable $th) {
                        return false;
                    }
                }
        }