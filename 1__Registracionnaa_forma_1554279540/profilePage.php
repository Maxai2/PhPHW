<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Profile page</title>
</head>
<body>
    <div class="divTable">
        <form action="index.php">
            <button><-Back</button>
        </form>
        <table>
            <?php 
                function test_input($data) {
                    $data = trim($data);
                    $data = stripslashes($data);
                    $data = htmlspecialchars($data);
                    $data = strip_tags($data);
                    // $data = mysqli_real_escape_string($data);
                    
                    return $data;
                }

                $login = test_input($_POST['login']);

                $wordCount = strlen(test_input($_POST['password']));
                $password = '';
                for ($i=0; $i < $wordCount; $i++) {
                    $password .= '*';
                }

                $FIO = test_input($_POST['FIO']);
                $Gender = $_POST['gender'];

                $langs = $_POST['lang'];
                $langCount = count($langs);
                $langsName = '';

                if (!empty($langs)) {
                    for ($i=0; $i < $langCount; $i++) {
                        $langsName .= $langs[$i].($i == $langCount - 1 ? "" : ", ");
                    }
                }

                $areasOfActivity = test_input($_POST['areasOfActivity']);
                $email = test_input($_POST['email']);
                $additionalInfo = test_input($_POST['additionalInfo']);
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