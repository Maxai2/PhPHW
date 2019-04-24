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
        $db = new ReplicationRep('localhost', 'userdb', 'root', '');

        var_dump ($db->get('user'));
    ?>
</body>
</html>
