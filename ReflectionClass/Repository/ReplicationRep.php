<?php
    require_once 'Models/User.php';

    class ReplicationRep {
        private $db;
        private $classObj;

        public function __contruct(string $className) {
            // $this->db = new PDO("mysql:host=localhost", 'root', '');
            // if (!$this->db->exec("use ReplicDb;")) {
            //     $this->db->exec(
            //     "CREATE DATABASE `ReplicDb`;" 
            //     ."use ReplicDb;");
            // }

            $class = new ReflectionClass($className);
            $this->classObj = $class->getConstructor('login', 'psw', 'email');

            // $this->db->exec(
            //     "CREATE TABLE IF NOT EXISTS $className.'Table'(
            //         `id` INT PRIMARY KEY AUTO_INCREMENT,
            //         `login` VARCHAR(255) NOT NULL,
            //         `password` VARCHAR(255) NOT NULL,
            //         `email` VARCHAR(255) NOT NULL
            //     );"
            // );

            // switch($className) {
            //     case 'user': {
            //         $this->db->exec(
            //             "CREATE TABLE IF NOT EXISTS `userTable`(
            //                 `id` INT PRIMARY KEY AUTO_INCREMENT,
            //                 `login` VARCHAR(255) NOT NULL,
            //                 `password` VARCHAR(255) NOT NULL,
            //                 `email` VARCHAR(255) NOT NULL
            //             );"
            //         );

            //         $this->classObj = new ReflectionClass(User::class);
            //         $this->classObj->getConstructor();
            //         break;
            //     }
            //     case 'book': {
            //         $this->db->exec(
            //             "CREATE TABLE IF NOT EXISTS `bookTable`(
            //                 `id` INT PRIMARY KEY AUTO_INCREMENT,
            //                 `title` VARCHAR(255) NOT NULL,
            //                 `author` VARCHAR(255) NOT NULL,
            //                 `year` VARCHAR(5) NOT NULL
            //             );"
            //         );
            //         break;
            //     }
            // }

        }


    }

?>