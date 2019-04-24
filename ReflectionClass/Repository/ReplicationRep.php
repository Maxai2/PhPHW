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
                    $param[] = $obj[$paramNames[$i]->getName()];
                }

                $objects[] = $class->newInstanceArgs($param);
            }

            return $objects;
        }
            
        function find($entityType, int $id) {
            $dbName = $entityType.'Table';
            
            $res = $this->db->query(
                "SELECT * FROM $dbName
                WHERE `id` = $id;"
            )->fetchAll();

            $objects = null;

            $class = new ReflectionClass($entityType);
            $paramNames = $class->getMethod("__construct")->getParameters();
            
            $param = [];
            
            for ($i = 0; $i < count($paramNames); $i++) {
                $param[] = $res[0][$paramNames[$i]->getName()];
            }

            $objects[] = $class->newInstanceArgs($param);

            return $objects;
        }
            
        function insert($object) {
            $className = strtolower(get_class($object));
            $dbName = $className.'Table';

            $class = new ReflectionClass($className);
            $paramNames = $class->getMethod("__construct")->getParameters();

            $paramForExec = "";
            for ($i = 0; $i < count($paramNames); $i++) {
                $paramForExec .= $paramNames[$i]->getName().' '.mysqlParamName($paramNames[$i]->getType()->getName()).' '.'NOT NULL,';
            }

            $this->db->exec(
                "CREATE TABLE IF NOT EXISTS $dbName(
                    `id` INT PRIMARY KEY AUTO_INCREMENT,
                    $paramForExec
                );"
            );

            $this->db->exec(
                "INSERT INTO $dbName(
            );
        }

        function update($object) {

        }

        function delete($entityType, int $id) {

        }

        private function mysqlParamName(string $oldName) {
            $newName = '';
            switch($oldName) {
                case 'int':
                    $newName = 'INTEGER';
                    break;
                case 'string':
                    $newName = 'VARCHAR(255)';
                    break;
            }

            return $newName;
        }
    }

?>