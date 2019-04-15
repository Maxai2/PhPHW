<?php 
    interface IRepository {
        function get(): array;
        function find(int $id): Comment;
        function insert(Comment $comment): bool;
        function delete(int $id): bool;
        function update(Comment $comment): bool;
    }

    class hotelRep implements IRepository {
        private $__db;

        public function __construct() {
            $this->__db = new mysqli('localhost', 'root', '');

            if (!$this->__db->select_db('Hotel')) {   
                $query = "CREATE DATABASE Hotel";
                mysqli_query($this->__db, $query);
                $this->__db->select_db('Hotel');
            }
    
            $tableQuery = 'CREATE TABLE IF NOT EXISTS `Guest`(
                `id_msg` INT PRIMARY KEY AUTO_INCREMENT,
                `name` VARCHAR(255) NOT NULL,
                `city` VARCHAR(155),
                `email` VARCHAR(255),
                `url` VARCHAR(255),
                `msg` VARCHAR(1000) NOT NULL,
                `answer` VARCHAR(1000),
                `puttime` VARCHAR(50) NOT NULL,
                `hide` BOOLEAN
            );';
    
            mysqli_query($this->__db, $tableQuery);
        }

        public function get(): array {
            $getQuery = 'SELECT * FROM guest';
            $res = mysqli_query($this->__db, $getQuery);

            $msgs = [];

            while($row = mysqli_fetch_array($res)) {
                $msgs[] = new Comment(
                    $row['name'],
                    $row['city'],
                    $row['email'],
                    $row['url'],
                    $row['msg'],
                    $row['asnwer'],
                    $row['puttime'],
                    $row['hide']
                );
            }

            return $msgs;
        }

        public function find(int $id): Comment {
            
        }
    }
?>