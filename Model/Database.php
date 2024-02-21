<?php
namespace Model;

use Dotenv\Dotenv as Dotenv;
use PDO;
use PDOException;
use Exception;


abstract class Database
{
    protected $host;
    protected $dbname;
    protected $username;
    protected $password;
    protected $port;
    protected $conn;

    public function __construct()
{
    $dotenv = Dotenv::createImmutable(__DIR__ . '/../');
    $dotenv->load();

    $this->host = $_ENV['DB_HOST'];
    $this->dbname =  $_ENV['DB_NAME']; 
    $this->username = $_ENV['DB_USERNAME'];
    $this->password = $_ENV['DB_PASSWORD'];
    $this->port =  $_ENV['DB_PORT'];

     $this->connect();
}


protected function connect(){
    try {
        $this->conn = new PDO(
            'mysql:host=' . $this->host . ';dbname=' . $this->dbname . ';port=' . $this->port,
            $this->username,
            $this->password
        );
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        throw new Exception("Erreur de connexion à la base de donnée: ");
    }
}
}