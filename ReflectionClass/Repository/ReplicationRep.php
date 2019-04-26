<?php
    require_once 'Models/User.php';
    require_once 'Models/Book.php';

    class ReplicationRep {
        private $db;

        function __construct(string $host, string $database, string $user, string $password) {
            try {
                $this->db = new PDO("mysql:host=$host", $user, $password);
    
                if (!$this->db->exec("use $database;")) {
                    $this->db->exec(
                    "CREATE DATABASE $database;" 
                    ."use $database;");
                }
            } catch (QueryException $th) {
                throw new QueryException($th->msg.'my');
            }
        }

        function get($entityType) {
            $dbName = $entityType.'Table';
            
            try {
                $res = $this->db->query(
                "SELECT * FROM $dbName;"
                )->fetchAll(PDO::FETCH_CLASS, $entityType);
            } catch (\Throwable $th) {
                $res = [];
            }

            return $res;
        }
            
        function find($entityType, int $id) {
            $dbName = $entityType.'Table';
            
            try {
                $res = $this->db->query(
                    "SELECT * FROM $dbName
                    WHERE `id` = $id;"
                )->fetchObject($entityType);
            } catch (\Throwable $th) {
                $res = null;
            }

            if (!$res) {
                $res = null;
            }

            return $res;
        }

        function insert($object) {
            $className = strtolower(get_class($object));
            $dbName = $className.'Table';

            $arrayOfObject = (array)$object;

            unset($arrayOfObject['id']);
            $paramForExec = '';
            $tableColumn = $arrayOfObject;
            $tableVal = $arrayOfObject;

            array_walk($arrayOfObject, function(&$value, $key){
                $value = $key.' '.$this->mysqlParamName(getType($value)).' '.'NOT NULL';
            });

            $paramForExec = implode(', ', $arrayOfObject);
            
            array_walk($tableColumn, function(&$value, &$key){
                $value = '`'.$key.'`';
            });

            $tableColumn = implode(', ', $tableColumn);
            
            array_walk($tableVal, function(&$value){
                $value = "'".$value."'";
            });
            
            $tableVal = implode(', ', $tableVal);

            $creExec = "CREATE TABLE IF NOT EXISTS $dbName(
                `id` INTEGER PRIMARY KEY AUTO_INCREMENT,
                $paramForExec);";

            $this->db->exec($creExec);

            $insQuery = "INSERT INTO $dbName($tableColumn)
                    VALUES ($tableVal);";
            
            $this->db->query($insQuery);
            $id = $this->db->lastInsertId();
            $object->id = $id;

            return $object;
        }

        function update($object) {
            $className = strtolower(get_class($object));
            $dbName = $className.'Table';
            
            $arrayOfObject = (array)$object;
            $id = $arrayOfObject['id'];

            array_walk($arrayOfObject, function(&$value, $key){
                $value = "`".$key."`".' = '."'".$value."'";
            });

            $updatedQue = implode(', ', $arrayOfObject);
            
            $que = "UPDATE $dbName SET
            $updatedQue
            WHERE `id` = '$id'";

            $res = $this->db->exec($que);

            return (bool)$res;
        }

        function delete($entityType, int $id) {
            $dbName = $entityType.'Table';
            
            $delQuery = "DELETE FROM $dbName WHERE `id` = '$id'";

            $res = $this->db->exec($delQuery);

            return (bool)$res;
        }

        private function mysqlParamName(string $oldName) {
            $newName = '';
            switch($oldName) {
                case 'integer':
                    $newName = 'INTEGER';
                    break;
                case 'string':
                    $newName = 'VARCHAR(255)';
                    break;
            }

            return $newName;
        }
    }

            // function get($entityType) {
        //     $dbName = $entityType.'Table';
            
        //     $res = $this->db->query(
        //         "SELECT * FROM $dbName;"
        //     )->fetchAll();

        //     $objects = [];

        //     $class = new ReflectionClass($entityType);
        //     $paramNames = $class->getMethod("__construct")->getParameters();
            
        //     foreach($res as $obj) {
        //         $param = [];
                
        //         for ($i = 0; $i < count($paramNames); $i++) {
        //             $param[] = $obj[$paramNames[$i]->getName()];
        //         }

        //         $objects[] = $class->newInstanceArgs($param);
        //     }

        //     return $objects;
        // }

        // function find($entityType, int $id) {
        //     $dbName = $entityType.'Table';
            
        //     $res = $this->db->query(
        //         "SELECT * FROM $dbName
        //         WHERE `id` = $id;"
        //     )->fetchAll();

        //     $objects = null;

        //     $class = new ReflectionClass($entityType);
        //     $paramNames = $class->getMethod("__construct")->getParameters();
            
        //     $param = [];
            
        //     for ($i = 0; $i < count($paramNames); $i++) {
        //         $param[] = $res[0][$paramNames[$i]->getName()];
        //     }

        //     $objects[] = $class->newInstanceArgs($param);

        //     return $objects;
        // }
            
        // function insert($object) {
        //     $className = strtolower(get_class($object));
        //     $dbName = $className.'Table';

        //     $class = new ReflectionClass($className);
        //     $paramNames = $class->getMethod("__construct")->getParameters();

        //     $paramForExec = '';
        //     $tableColumn = '';
        //     for ($i = 0; $i < count($paramNames); $i++) {
        //         $end = $i == count($paramNames) - 1 ? '' : ', ';
        //         $paramForExec .= $paramNames[$i]->getName().' '.mysqlParamName($paramNames[$i]->getType()->getName()).' '.'NOT NULL'.$end;

        //         $tableColumn .= '`'.$paramNames[$i]->getName().'`'.$end;
        //     }

        //     $this->db->exec(
        //         "CREATE TABLE IF NOT EXISTS $dbName(
        //             `id` INTEGER PRIMARY KEY AUTO_INCREMENT,
        //             $paramForExec
        //         );"
        //     );

        //     $objVal = [];
        //     // for ($i = 1; ) {
        //     //     $objVal
        //     // }

        //     $this->db->exec(
        //         "INSERT INTO $dbName($tableColumn)
        //         VALUES ();
        //     ");
        // }

?>

