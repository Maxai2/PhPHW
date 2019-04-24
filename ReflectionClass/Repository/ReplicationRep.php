<?php
    require_once 'Models/User.php';

    class ReplicationRep {

        private $db;

        function __constructor(string $host, string $database, string $user, string $password) {
            $this->db = new PDO("mysql:host=$host", $user, $password);

            if (!$this->db->exec("use $database;")) {
                $this->db->exec(
                "CREATE DATABASE $database;" 
                ."use $database;");
            }
        }

        function get($entityType) {
            $dbName = $entityType.'Table';
            
            $res = $this->db->query(
                "SELECT * FROM $dbName;"
            )->fetchAll();

            $objects = [];

            $class = new ReflectionClass($entityType);
            $classObj = $class->getConstructor();

            foreach ($res as $obj) {
                $tempObj = new 

                $objects[] = $tempObj;
            }
        }
            
        function find($entityType, int $id) {
            
        }
            
        function insert($object) {
            $this->db->exec(
                "CREATE TABLE IF NOT EXISTS $dbName(
                    `id` INT PRIMARY KEY AUTO_INCREMENT,
                    `name` VARCHAR(255) NOT NULL,
                    `size` INTEGER NOT NULL,
                    `imagePath` VARCHAR(500) NOT NULL
                );"
            );

        }

        function update($object) {

        }

        function delete($entityType, int $id) {

        }

    }

?>