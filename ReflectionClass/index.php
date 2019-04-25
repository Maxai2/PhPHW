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

        $db = new ReplicationRep('localhost', 'reflecdb', 'root', '');
        
        // var_dump($db->delete('user', 3));

        $obj = new User();
        $obj->id = 10;
        $obj->login = 'log';
        $obj->password = 7894;
        $obj->email = 'emails1';
        
        // for ($i = 1; $i < count((array)$obj); $i++) {
        //     var_dump($obj[$i]);
        // }

        var_dump($db->update($obj));
        // var_dump ($db->find('user', 1));
    ?>
</body>
</html>
