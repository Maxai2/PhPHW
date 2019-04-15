<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <?php 
        $__db = new mysqli('localhost', 'root', '');

        if (!$__db->select_db('Hotel')) {   
            $query = "CREATE DATABASE Hotel";
            mysqli_query($__db, $query);
            $__db->select_db('Hotel');
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
    ?>

</body>
</html>