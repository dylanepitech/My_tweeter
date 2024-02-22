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
}