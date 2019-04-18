<?php
    require_once './User.php';

    class UserRep {
        private $db;

        function __construct() {
            $this->db = new PDO("mysql:host=localhost", 'root', '', );

            if (!$this->db->exec("use userDb;")) {
                $this->db->exec(
                "CREATE DATABASE `userDb`;" 
                ."use userDb;");
            }

            $this->db->exec(
                "CREATE TABLE IF NOT EXISTS `userList`(
                    `id` INT PRIMARY KEY AUTO_INCREMENT,
                    `login` VARCHAR(255) NOT NULL,
                    `password` VARCHAR(155) NOT NULL,
                    `FIO` VARCHAR(255) NOT NULL,
                    `gender` VARCHAR(7) NOT NULL,
                    `langsName` VARCHAR(70) NOT NULL,
                    `areasOfActivity` VARCHAR(25) NOT NULL,
                    `email` VARCHAR(255) NOT NULL,
                    `additionalInfo` VARCHAR(1000) NOT NULL);"
                );
        }

        function clean_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            $data = strip_tags($data);
            $data = mysqli_real_escape_string($this->db, $data);
            
            return $data;
        }

        function insert(User $user) {
            $login = $this->clean_input($user->login);
            $password = $this->clean_input($user->password);
            $FIO = $this->clean_input($user->FIO);
            $gender = $this->clean_input($user->gender);
            $langsName = $this->clean_input($user->langsName);
            $areasOfActivity = $this->clean_input($user->areasOfActivity);
            $email = $this->clean_input($user->email);
            $additionalInfo = $this->clean_input($user->additionalInfo);

            $check = $this->db->exec(
                "INSERT INTO `userList`(`login`, `password`, `FIO`, `gender`, `langsName`, `areasOfActivity`, `email`, `additionalInfo`)
                VALUES ('$login', '$password', '$FIO', '$gender', '$langsName', '$areasOfActivity', '$email', '$additionalInfo');"
            );

            return $check;
        }

        function checkLoginEmail(string $login, string $email) {
            $result = $this->db->query(
                "SELECT `id` 
                FROM `userList`
                WHERE `login` = '$login';
            ");

            if ($result->fetch()) {
                return 'Пользователь с таким логином уже существует!';
            }

            $result = $this->db->query(
                "SELECT `id` 
                FROM `userList`
                WHERE `email` = '$email';
            ");

            if ($result->fetch()) {
                return 'Пользователь с такой почтой уже существует!';
            }

            return '';
        }

        function rowCount() {
            return $this->db->prepare(
            "SELECT COUNT(*) FROM `userList`;")->fetch();
        }
    }

?>