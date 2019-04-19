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
        require_once "./UserRep.php";

        $db = new UserRep();

        if (isset($_COOKIE['error'])) {
            echo $_COOKIE['error'];
            setcookie('error', '', time() - 1);
        }
    ?>

    <div class="wrapIndex">
        <h3>Добро пожаловать новый Пользователь!</h3>
        <h5>Нас: 
            <?php
                $str = 0;

                $count = $db->rowCount();
                if ($count)
                    $str = $count;

                echo $str;
            ?>
        </h5>
        <form>
            <button formaction="addUser.php">Добавить</button>
            <button formaction="showUsers.php" <?php if ($str == 0) echo 'disabled'; ?>>Показать</button>
        </form>
    </div>
</body>
</html>