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
        require_once 'Repository/ReplicationRep.php';
        require_once 'Models/User.php';
        $db = new ReplicationRep('localhost', 'userdb', 'root', '');

        $obj = new User('admin', 123, '');
        var_dump($db->insert($obj));
        // var_dump ($db->find('user', 3));
    ?>
</body>
</html>
