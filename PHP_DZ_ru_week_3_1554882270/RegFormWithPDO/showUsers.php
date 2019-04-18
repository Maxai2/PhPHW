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
    <div class="divTable">
        <form action="index.php">
            <button>Главное меню</button>
        </form>
        <table>
            <tr>
                <th>Логин</th>
                <th>Пароль</th>
                <th>ФИО</th>
                <th>Пол</th>
                <th>Иностранные языки</th>
                <th>Сфера деятельности</th>
                <th>E-mail</th>
                <th>Дополнительная информация</th>
            </tr>
            
            <?php
                $names = array(
                    'Login' => 7,
                    'Password' => 10, 
                    'FIO' => 5, 
                    'Gender' => 8, 
                    'Languages' => 11, 
                    'Areas of activity' => 19, 
                    'Email' => 7, 
                    'Additional info' => 17
                );

                $users = fopen("users.txt", "r") or die("Unable to open file!");

                while(!feof($users)) {
                    $line = strstr(fgets($users), '--------------');

                    if ($line) {
                        fgets($users);
                        echo '<tr>';
                        foreach ($names as $name => $offset) {
                            $val = substr(strstr(fgets($users), $name), $offset);
                            echo '<td>'.$val.'</td>';
                        }
                        echo '</tr>';
                    }
                }
                
                fclose($users);
            ?>
        </table>
    </div>
</body>
</html>