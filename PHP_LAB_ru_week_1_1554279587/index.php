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
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            $data = strip_tags($data);
            // $data = mysqli_real_escape_string($data);
            
            return $data;
        }
        
        if (isset($_POST['login']) && $_POST['login'] != '' && filesize('users.txt') != 0)
        {
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

            $users = fopen("users.txt", "r+") or die("Unable to open file!");

            $str = substr(strstr(fgets($users), "Count"), 7);

            $equal = false;

            if($str != 0) {
                while(!feof($users)) {
                    $tempLogin = substr(strstr(fgets($users), 'Login'), 7);
                    $tempEmail = substr(strstr(fgets($users), 'Email'), 7);

                    if(strcmp($tempLogin, $login) != 2) {
                        if(strcmp($tempEmail, $email) == 2) {
                            echo 'Пользователь с такой почтой уже существует!';
                            $equal = true;
                            break;
                        }
                    } else {
                        echo 'Пользователь с таким логином уже существует!';
                        $equal = true;
                        break;
                    }
                }
            }

            if (!$equal) {
                fseek($users, 7);
                fwrite($users, strval((int)$str + 1));
                
                fseek($users, 0, SEEK_END);
                fwrite($users, 
                PHP_EOL
                .'--------------'
                .PHP_EOL.PHP_EOL
                .'Login: '.$login
                .PHP_EOL
                .'Password: '.$password
                .PHP_EOL
                .'FIO: '.$FIO
                .PHP_EOL
                .'Gender: '.$Gender
                .PHP_EOL
                .'Languages: '.$langsName
                .PHP_EOL
                .'Areas of activity: '.$areasOfActivity
                .PHP_EOL
                .'Email: '.$email
                .PHP_EOL
                .'Additional info: '.$additionalInfo
                .PHP_EOL
                );
            }   

            fclose($users);
        }
    ?>

    <div class="wrapIndex">
        <h3>Добро пожаловать новый Пользователь!</h3>
        <h5>Нас: 
            <?php 
                if (!file_exists("users.txt")) {
                    $file = fopen("users.txt", 'a');
                    fclose($file);
                }

                $users = fopen("users.txt", "r+") or die("Unable to open file!");
                
                $str = substr(strstr(fgets($users), "Count"), 7);

                if (!$str) {
                    fseek($users, 0);
                    fwrite($users, 'Count: 0');
                    $str = 0;
                }

                echo $str;
                
                fclose($users);
            ?>
        </h5>
        <form>
            <button formaction="addUser.php">Добавить</button>
            <button formaction="showUsers.php" <?php if ($str == 0) echo 'disabled'; ?>>Показать</button>
        </form>
    </div>
</body>
</html>