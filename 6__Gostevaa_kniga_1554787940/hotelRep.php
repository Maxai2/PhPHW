<?php 
    interface IRepository {
        function get(): array;
        function find(int $id): Comment;
        function insert(Comment $comment): bool;
        function delete(int $id): bool;
        function update(int $id, Comment $comment): bool;
    }

    class HotelRep implements IRepository {
        private $__db;

        public function __construct() {
            $this->__db = new mysqli('localhost', 'root', '');

            if (!$this->__db->select_db('Hotel')) {   
                $query = "CREATE DATABASE `Hotel`";
                mysqli_query($this->__db, $query);
                $this->__db->select_db('Hotel');
            }
    
            $tableQuery = 'CREATE TABLE IF NOT EXISTS `guest`(
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

        private function clean_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            $data = strip_tags($data);
            $data = mysqli_real_escape_string($this->__db, $data);
            
            return $data;
        }

        public function get(): array {
            $getQuery = 'SELECT * FROM `guest`';
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
            $findQuery = "SELECT * FROM `guest` WHERE `id_msg` = '$id'";
            $res = mysqli_query($this->__db, $findQuery);

            $com = '';

            if (mysqli_num_rows($res) > 0) {
                while ($row = mysqli_fetch_assoc($res)) {
                    $com = new Comment(
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
            }

            return $com;
        }

        function insert(Comment $comment): bool {
            $name = $this->clean_input($comment->name);
            $city = $this->clean_input($comment->city);
            $email = $this->clean_input($comment->email);
            $url = $this->clean_input($comment->url);
            $msg = $this->clean_input($comment->msg);
            $answer = $this->clean_input($comment->answer);
            $puttime = $this->clean_input($comment->puttime);
            $hide = $comment->hide;

            $insQuery = ""
                ."INSERT INTO `guest`(`name`, `city`, `email`, `url`, `msg`, `answer`, `puttime`, `hide`)
                VALUES ('$name', '$city', '$email', '$url', '$msg', '$answer', '$puttime', '$hide')
            ";

            mysqli_query($this->__db, $insQuery);
            return mysqli_errno($this->__db) == 0;
        }

        function delete(int $id): bool {
            $delQuery = "DELETE FROM `guest` WHERE `id_msg` = '$id'";

            mysqli_query($this->__db, $delQuery);
            return mysqli_errno($this->__db) == 0;
        }

        function update(int $id, Comment $comment): bool {
            $name = $this->clean_input($comment->name);
            $city = $this->clean_input($comment->city);
            $email = $this->clean_input($comment->email);
            $url = $this->clean_input($comment->url);
            $msg = $this->clean_input($comment->msg);
            $answer = $this->clean_input($comment->answer);
            $puttime = $this->clean_input($comment->puttime);
            $hide = $comment->hide;

            $updQuery = ""
                ."UPDATE `guest` SET
                `name` = '$name', `city` = '$city', `email` = '$email', `url` = '$url', 
                `msg` = '$msg', `answer` = '$answer', `puttime` = '$puttime', `hide` = '$hide'
                WHERE `id_msg` = '$id' 
            ";

            mysqli_query($this->__db, $updQuery);
            return mysqli_errno($this->__db) == 0;
        }
    }
?>