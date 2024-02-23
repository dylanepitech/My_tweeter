<?php
namespace Model;

use Model\Database;
use PDO;
class User_model extends Database
{

    public function __construct()
    {
        parent::__construct();
    }
    public function put_maj($string){
       return ucfirst($string);
    }

    public function inscription($info)
    {
        $query = "INSERT INTO user (firstname, lastname, email, pseudo, sex, birthday, password, city, phone) 
        VALUES (:firstname, :lastname, :email, :pseudo, :sex, :birthday, :password, :city, :phone)";

        $password = $info['password'];
        $salt = "vive le projet tweet_academy";
        $passwordToHash = $password . $salt;
        $hashedPassword = hash('ripemd160', $passwordToHash);

        $firstname = $this->put_maj($info['firstname']);
        $lastname = $this->put_maj($info['lastname']);
        $city = $this->put_maj($info['city']);
        $pseudo = $this->put_maj($info['pseudo']);

        try {
        $statement = $this->conn->prepare($query);
        $statement->bindparam(':firstname', $firstname);
        $statement->bindparam(':lastname', $lastname);
        $statement->bindparam(':email', $info['email']);
        $statement->bindparam(':sex', $info['sex']);
        $statement->bindparam(':birthday', $info['birthday']);
        $statement->bindparam(':password', $hashedPassword);
        $statement->bindparam(':pseudo', $pseudo);
        $statement->bindparam(':city', $city);
        $statement->bindparam(':phone', $info['phone']);
        $statement->execute();
        $true = "User créé avec succès !";
        return $true;
        } catch (\Throwable $th) {
        return false;
        }
    }

    public function connexion($info)
    {
        try {
            $query = "SELECT * FROM user WHERE email LIKE :email";
            $statement = $this->conn->prepare($query);
            $statement->bindParam(':email', $info['email']);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
        
            if ($result['desactivate'] == true)
            {
                return false;
            }

            $hashedPasswordFromDB = $result['password'];
            $salt = "vive le projet tweet_academy"; 
        
            $passwordToCheck = hash('ripemd160', $info['password'] . $salt);
        

            if ($hashedPasswordFromDB === $passwordToCheck) {

                return $result;
            } else {

                return false;
            }
        } catch (\Throwable $th) {
            return false;
        }
        
    }

    public function GetUserInfo($id)
    {
        try {
            $query = "SELECT * FROM user WHERE id LIKE :id";
            $statement = $this->conn->prepare($query);
            $statement->bindParam(':id', $id);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function modification($info,$id)
    {
        if ($info['password'] == ""){
            $querry = "UPDATE user SET
            firstname = :firstname,
            lastname = :lastname,
            birthday = :birthday,
            email = :email,
            pseudo = :pseudo,
            city = :city,
            phone = :phone
            WHERE id = :user_id";


            try {
                $statement = $this->conn->prepare($querry);
                $statement->bindParam(':user_id', $id);
                $statement->bindParam(':firstname', $info['firstname']);
                $statement->bindParam(':lastname', $info['lastname']);
                $statement->bindParam(':email', $info['email']);
                $statement->bindParam(':birthday', $info['birthday']);
                $statement->bindParam(':pseudo', $info['pseudo']);
                $statement->bindParam(':city', $info['city']);
                $statement->bindParam(':phone', $info['phone']);
                $statement->execute();
                return true;
            } catch (\Throwable $th) {
                return false;
            }
        }else{

            $querry = "UPDATE user SET
            firstname = :firstname,
            lastname = :lastname,
            birthday = :birthday,
            email = :email,
            pseudo = :pseudo,
            city = :city,
            phone = :phone,
            password = :password
            WHERE id = :user_id";


            $password = $info['password'];
            $salt = "vive le projet tweet_academy";
            $passwordToHash = $password . $salt;
            $hashedPassword = hash('ripemd160', $passwordToHash);

           try {
            $statement = $this->conn->prepare($querry);
            $statement->bindParam(':user_id', $id);
            $statement->bindParam(':password', $hashedPassword);
            $statement->bindParam(':firstname', $info['firstname']);
            $statement->bindParam(':lastname', $info['lastname']);
            $statement->bindParam(':email', $info['email']);
            $statement->bindParam(':birthday', $info['birthday']);
            $statement->bindParam(':pseudo', $info['pseudo']);
            $statement->bindParam(':city', $info['city']);
            $statement->bindParam(':phone', $info['phone']);
            $statement->execute();
            return true;
           } catch (\Throwable $th) {
            return false;
           }


        }

       
    }

    public function user_suppression($id)
    {
        $querry = "UPDATE user SET desactivate = true where id = :id";
        try {
            $statement = $this->conn->prepare($querry);
            $statement->bindParam(":id", $id);
            $statement->execute();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function user_reactivation($email)
    {
        $query = "SELECT desactivate FROM user WHERE email = :email AND desactivate = 0";

        try {
            $statement = $this->conn->prepare($query);
            $statement->bindParam(":email", $email['email_reactivate']);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);

            if ($result) {
                return false;
            }
            
        } catch (\Throwable $th) {
            //throw $th;
        }

        $querry = "UPDATE user SET desactivate = 0 where email = :email";

        try {
            $statement = $this->conn->prepare($querry);
            $statement->bindParam(":email", $email['email_reactivate']);
            $statement->execute();
            return true;
        } catch (\Throwable $th) {
        return false;
        }
    }
    
}