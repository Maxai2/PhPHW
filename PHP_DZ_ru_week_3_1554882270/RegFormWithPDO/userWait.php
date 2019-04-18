<?php 
    if (isset($_POST['login']) && $_POST['login'] != '')
    {
        require_once './User.php';
        require_once './UserRep.php';

        $db = new UserRep();

        $login = $_POST['login'];
        
        // $wordCount = strlen($_POST['password']);
        // $password = '';
        // for ($i=0; $i < $wordCount; $i++) {
        //     $password .= '*';
        // }

        $password = str_repeat('*', strlen($_POST['password']));
        
        $FIO = $_POST['FIO'];
        $gender = $_POST['gender'];
        
        // $langs = $_POST['lang'];
        // $langCount = count($langs);
        // $langsName = '';
        
        // if (!empty($langs)) {
        //     for ($i=0; $i < $langCount; $i++) {
        //         $langsName .= $langs[$i].($i == $langCount - 1 ? "" : ", ");
        //     }
        // }

        $langsName = implode(", ", $_POST['lang']);
        
        $areasOfActivity = $_POST['areasOfActivity'];
        $email = $_POST['email'];
        $additionalInfo = $_POST['additionalInfo'];

        $equal = $db->checkLoginEmail($login, $email);

        if ($equal == '') {
            $user = new User($login, $password, $FIO, $gender, $langsName, $areasOfActivity, $email, $additionalInfo);

            $db->insert($user);
        } else {
            setcookie('error', $equal);
        }

        header("Location: index.php");
    }

?>