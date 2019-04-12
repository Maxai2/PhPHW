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
    <div class="wrapIndex">
        <h3>Добро пожаловать новый Пользователь!</h3>
        <h5>Нас: 
            <?php 
                if (!file_exists("users.txt")) {
                    $file = fopen("users.txt", 'a');
                    fclose($file);
                }

                $users = fopen("users.txt", "r") or die("Unable to open file!");
                
                $str = substr(strstr(fgets($users), "Count"), 7);
                if (!$str) 
                    $str = 0;

                echo $str;
                
                fclose($users);
            ?>
        </h5>
        <form>
            <button formaction="addUser.php">Добавить</button>
            <button formaction="showUsers.php">Показать</button>
        </form>
    </div>
</body>
</html>