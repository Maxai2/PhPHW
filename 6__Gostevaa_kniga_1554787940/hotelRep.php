<?php 
    require_once './Comment.php';

    interface IRepository {
        function getForAdmin(): array;
        function getForUser(): array;
        // function find(int $id): Comment;
        function insert(Comment $comment): bool;
        function delete(int $id): bool;
        function update(int $id, string $answer, bool $hide): bool;
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

        public function getforAdmin(): array {
            $getQuery = 'SELECT * FROM `guest`';
            $res = mysqli_query($this->__db, $getQuery);
            $msgs = [];

            while($row = mysqli_fetch_array($res)) {
                $msgs[] = Comment::makeCommentForAdmin(
                    $row['name'],
                    $row['city'],
                    $row['email'],
                    $row['url'],
                    $row['msg'],
                    $row['answer'],
                    $row['hide'],
                    $row['puttime'],
                    $row['id_msg']
                );
            }

            return $msgs;
        }

        public function getforUser(): array {
            $getQuery = 'SELECT `name`, `puttime`, `msg`, `hide`, `answer` FROM `guest`';
            $res = mysqli_query($this->__db, $getQuery);
            $msgs = [];

            while($row = mysqli_fetch_array($res)) {
                $msgs[] = Comment::makeCommentForUser(
                    $row['name'],
                    $row['msg'],
                    $row['hide'],
                    $row['puttime'],
                    $row['answer']
                );
            }

            return $msgs;
        }

        // public function find(int $id): Comment {
        //     $findQuery = "SELECT * FROM `guest` WHERE `id_msg` = '$id'";
        //     $res = mysqli_query($this->__db, $findQuery);

        //     $com = '';

        //     if (mysqli_num_rows($res) > 0) {
        //         while ($row = mysqli_fetch_assoc($res)) {
        //             $com = new Comment(
        //                 $row['name'],
        //                 $row['city'],
        //                 $row['email'],
        //                 $row['url'],
        //                 $row['msg']
        //             );
        //         }
        //     }

        //     return $com;
        // }

        public function insert(Comment $comment): bool {
            $name = $this->clean_input($comment->name);
            $city = $this->clean_input($comment->city);
            $email = $this->clean_input($comment->email);
            $url = $this->clean_input($comment->url);
            $msg = $this->clean_input($comment->msg);
            $answer = $this->clean_input($comment->answer);
            $puttime = $this->clean_input($comment->puttime);
            $hide = $this->clean_input($comment->hide);

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

        public function update(int $id, string $answer, bool $hide): bool {
            $answer = $this->clean_input($answer);

            $updQuery = ""
                ."UPDATE `guest` SET
                `answer` = '$answer', `hide` = '$hide'
                WHERE `id_msg` = '$id' 
            ";

            mysqli_query($this->__db, $updQuery);
            return mysqli_errno($this->__db) == 0;
        }
    }
?>