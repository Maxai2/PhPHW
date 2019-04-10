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
                <td><?= $_POST['login']; ?></td>
                <td>
                    <?php
                        $wordCount = strlen($_POST['password']);
                        $str = '';
                        for ($i=0; $i < $wordCount; $i++) {
                            $str .= '*';
                        }
                        echo $str;
                    ?>
                </td>
                <td><?= $_POST['FIO']; ?></td>
                <td><?= $_POST['gender']; ?></td>
                <td>
                    <?php
                        $langs = $_POST['lang'];
                        $langCount = count($langs);

                        if (empty($langs))
                            echo ''; 
                        else {
                            for ($i=0; $i < $langCount; $i++) {
                                echo $langs[$i].($i == $langCount - 1 ? "" : ", ");
                            }
                        }
                    ?>
                </td>
                <td><?= $_POST['areasOfActivity']; ?></td>
                <td><?= $_POST['email']; ?></td>
                <td><?= $_POST['additionalInfo']; ?></td>
            </tr>
        </table>
    </div>
</body>
</html>