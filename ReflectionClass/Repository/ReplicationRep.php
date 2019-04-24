<?php
    require_once 'Models/User.php';
    require_once 'Models/Book.php';

    class ReplicationRep {
        private $db;

        function __construct(string $host, string $database, string $user, string $password) {
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
            $paramNames = $class->getMethod("__construct")->getParameters();
            
            foreach($res as $obj) {
                $param = [];
                
                for ($i = 0; $i < count($paramNames); $i++) {
                    $param[] = $obj[$paramNames[$i]->name];
                }

                $objects[] = $class->newInstanceArgs($param);
            }

            return $objects;
        }
            
        function find($entityType, int $id) {
            
        }
            
        function insert($object) {
            // $this->db->exec(
            //     "CREATE TABLE IF NOT EXISTS $dbName(
            //         `id` INT PRIMARY KEY AUTO_INCREMENT,
            //         `name` VARCHAR(255) NOT NULL,
            //         `size` INTEGER NOT NULL,
            //         `imagePath` VARCHAR(500) NOT NULL
            //     );"
            // );

        }

        function update($object) {

        }

        function delete($entityType, int $id) {

        }

    }

?>