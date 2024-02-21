<?php
namespace Model;
require_once "vendor/autoload.php";
class Table extends Database {

    public function __construct() {
        parent::__construct();
    }

    public function User() {
        $query = "CREATE TABLE IF NOT EXISTS `user` (
            `id` INT AUTO_INCREMENT PRIMARY KEY,
            `firstname` VARCHAR(255) NOT NULL,
            `lastname` VARCHAR(255) NOT NULL,
            `email` VARCHAR(255) NOT NULL UNIQUE,
            `sex` VARCHAR(50) NOT NULL,
            `birthday` DATE NOT NULL,
            `password` VARCHAR(255) NOT NULL,
            `pseudo` VARCHAR(255) NOT NULL,
            `city` VARCHAR(255) NOT NULL,
            `phone` VARCHAR(20) NOT NULL
        )";

        try {
            $connection = $this->conn->prepare($query);
            $connection->execute();
        } catch (\Throwable $th) {
            echo "Erreur $th";
        }
    }
    public function post() {
        $query = "CREATE TABLE IF NOT EXISTS `post` (
            `id` INT AUTO_INCREMENT PRIMARY KEY,
            `id_user` INT NOT NULL,
            `content` VARCHAR(255) NULL,
            `image` VARCHAR(510) NULL,
            `date` DATE NOT NULL,
            FOREIGN KEY (`id_user`) REFERENCES `user`(`id`)
        )";


        try {
            $connection = $this->conn->prepare($query);
            $connection->execute();
        } catch (\Throwable $th) {
            echo "Erreur $th";
        }
    }
    public function hashtag() {
        $query = "CREATE TABLE IF NOT EXISTS `hashtag` (
            `id` INT AUTO_INCREMENT PRIMARY KEY,
            `id_post` INT NOT NULL,
            `content` VARCHAR(255) NULL,
            FOREIGN KEY (`id_post`) REFERENCES `post`(`id`)
        )";
    
        try {
            $connection = $this->conn->prepare($query);
            $connection->execute();
        } catch (\Throwable $th) {
            echo "Erreur $th";
        }
    }
    
    public function mention() {
        $query = "CREATE TABLE IF NOT EXISTS `mention` (
            `id` INT AUTO_INCREMENT PRIMARY KEY,
            `id_post` INT NOT NULL,
            `id_user` INT NOT NULL,
            FOREIGN KEY (`id_user`) REFERENCES `user`(`id`)
        )";


        try {
            $connection = $this->conn->prepare($query);
            $connection->execute();
        } catch (\Throwable $th) {
            echo "Erreur $th";
        }
    }
    public function follow() {
        $query = "CREATE TABLE IF NOT EXISTS `follow` (
            `id` INT AUTO_INCREMENT PRIMARY KEY,
            `id_follower` INT NOT NULL,
            `id_following` INT NOT NULL,
            FOREIGN KEY (`id_follower`) REFERENCES `user`(`id`),
            FOREIGN KEY (`id_following`) REFERENCES `user`(`id`)
        )";
    
        try {
            $connection = $this->conn->prepare($query);
            $connection->execute();
        } catch (\Throwable $th) {
            echo "Erreur $th";
        }
    }
    
    public function re_tweet() {
        $query = "CREATE TABLE IF NOT EXISTS `re_tweet` (
            `id` INT AUTO_INCREMENT PRIMARY KEY,
            `id_post` INT NOT NULL,
            `date` DATE NOT NULL
        )";
    
        try {
            $connection = $this->conn->prepare($query);
            $connection->execute();
        } catch (\Throwable $th) {
            echo "Erreur $th";
        }
    }
    

}

$dd = new Table();
$dd->User();
$dd->post();
$dd->hashtag();
$dd->mention();
$dd->follow();
$dd->re_tweet();