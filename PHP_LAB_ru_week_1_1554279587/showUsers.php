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
            <button><-Back</button>
        </form>
        <table>
            <?php 

            ?>
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
            
            <tr>
                <td><?= $login; ?></td>
                <td><?= $password; ?></td>
                <td><?= $FIO; ?></td>
                <td><?= $Gender; ?></td>
                <td><?= $langsName; ?></td>
                <td><?= $areasOfActivity; ?></td>
                <td><?= $email; ?></td>
                <td><?= $additionalInfo; ?></td>
            </tr>
        </table>
    </div>
</body>
</html>