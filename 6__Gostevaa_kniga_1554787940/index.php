
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
        // ALTER TABLE table_name AUTO_INCREMENT = 1;

        require_once './HotelRep.php';
        require_once './Comment.php';

        $hotel = new HotelRep();

        if (isset($_POST['name'])) {
            $name = $_POST['name'];
            $city = $_POST['city'];
            $email = $_POST['email'];
            $url = $_POST['url'];
            $msg = $_POST['msg'];

            $com = new Comment($name, $city, $email, $url, $msg);

            $hotel->insert($com);
        }
    ?>

    <div class="wrap">
        <h1>Добро пожалователь в отель "Кортез"!</h1>
        <h3>Напишите свое предложение или жалобу, администратор ответит вам в скором времени.</h3>
        <hr>
        <br>

        <div class="msgClass">
            <?php
                $msgs = $hotel->get();
                
                foreach ($msgs as $msg) {
                    if (!$msg->hide) {
                        echo "
                            <div>
                                <labe><strong>'$msg->name'</strong>, <i>'$msg->puttime'</i></labe>
                                <p>'$msg->msg'</p>
                            </div>
                        ";
                    }
                }
            ?>
        </div>
        
        <div class="clButton">
            <button onclick="hideShow(this)">Добавить</button>
            <script>
                function hideShow(butEl) {
                    if (butEl.innerHTML == "Добавить") {
                        butEl.innerHTML = "Скрыть";
                        document.getElementById('msgDiv').style.display = 'inline-flex';
                    } else {
                        butEl.innerHTML = "Добавить";
                        document.getElementById('msgDiv').style.display = 'none';
                    }
                }
            </script>
        </div>

        <form class="msgClass" id="msgDiv" style="display: none" method="POST" action="index.php">
            <div class="gridCont propBorder">
                <span>Имя: </span>
                <input type="text" name="name" value='' required>
            </div>

            <div class="gridCont propBorder">
                <span>Город: </span>
                <input type="text" name="city" value=''>
            </div>

            <div class="gridCont propBorder">
                <span>E-mail: </span>
                <input type="email" name="email" value=''>
            </div>

            <div class="gridCont propBorder">
                <span>Url: </span>
                <input type="text" name="url" value=''>
            </div>

            <div class="gridCont propBorder">
                <span>Сообщение: </span>
                <textarea type="text" name="msg" value='' required></textarea>
            </div>

            <input type="submit" value="Отправить">
        </form>
    </div>

</body>
</html>