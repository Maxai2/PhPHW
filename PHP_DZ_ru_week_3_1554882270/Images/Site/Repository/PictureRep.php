<?php
    require_once __DIR__.'/../Model/Picture.php';

    class PictureRep {
        private $db;

        function __construct() {
            $this->db = new PDO("mysql:host=localhost", 'root', '');

            if (!$this->db->exec("use pictureDb;")) {
                $this->db->exec(
                "CREATE DATABASE `pictureDb`;" 
                ."use pictureDb;");
            }

            $this->db->exec(
                "CREATE TABLE IF NOT EXISTS `pictureList`(
                    `id` INT PRIMARY KEY AUTO_INCREMENT,
                    `name` VARCHAR(255) NOT NULL,
                    `size` INTEGER NOT NULL,
                    `imagePath` VARCHAR(500) NOT NULL
                );"
            );
        }

        function clean_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            $data = strip_tags($data);
            // $data = mysqli_real_escape_string($this->db, $data);
            
            return $data;
        }

        function insert(string $name, int $size, string $imagePath) {
            $name = $this->clean_input($name);
            $size = $this->clean_input($size);
            $imagePath = $this->clean_input($imagePath);

            $check = $this->db->exec(
                "INSERT INTO `pictureList`(`name`, `size`, `imagePath`)
                VALUES ('$name', '$size', '$imagePath');"
            );

            return $check;
        }

        function rowCount() {
            return $this->db->query(
                "SELECT COUNT(*) FROM `pictureList`"
            )->fetchColumn(0);
        }

        function getPicsByName() {
            return $this->db->query(
                "SELECT `id`, `name` FROM `pictureList`;"
                )->fetchAll();
        }

        function getPic(int $id) {
            return $this->db->query(
                "SELECT `imagePath` FROM `pictureList`
                WHERE `id` = '$id';"
            )->fetchColumn(0);
        }

        function getPictures() {
            $res = $this->db->query(
                "SELECT * FROM `pictureList`"
            )->fetchAll();

            $pics = [];
            foreach ($res as $pic) {
                $tempPic = new Picture(
                    $pic['name'],
                    $pic['size'],
                    $pic['imagePath']
                );

                $pics[] = $tempPic;
            }

            return $pics;
        }
    }

?>