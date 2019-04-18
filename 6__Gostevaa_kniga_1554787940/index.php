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
        require_once './HotelRep.php';
        
        $hotel = new HotelRep();

        if (isset($_COOKIE['mode'])) {
            setcookie('mode', '', time() - 1);
        }
    ?>

    <div class="wrap">
        <h1>Добро пожалователь в отель "Кортез"!</h1>
        <h3>Напишите свое предложение или жалобу, администратор ответит вам в скором времени.</h3>
        <hr>
        <br>
        
        <div class="clButton">
            <button onclick="hideShow(this)">Добавить</button>
            <script>
                function hideShow(butEl) {
                    if (butEl.innerHTML == "Добавить") {
                        butEl.innerHTML = "Скрыть";
                        document.getElementById('msgDiv').style.display = 'flex';
                    } else {
                        butEl.innerHTML = "Добавить";
                        document.getElementById('msgDiv').style.display = 'none';
                    }
                }
            </script>
        </div>

        <form class="msgClass" id="msgDiv" style="display: none" method="POST" action="postWait.php">
            <div class="gridCont propBorder">
                <span>Имя: </span>
                <input type="text" name="name" required>
            </div>

            <div class="gridCont propBorder">
                <span>Город: </span>
                <input type="text" name="city">
            </div>

            <div class="gridCont propBorder">
                <span>E-mail: </span>
                <input type="email" name="email">
            </div>

            <div class="gridCont propBorder">
                <span>Url: </span>
                <input type="text" name="url">
            </div>

            <div class="gridCont propBorder">
                <span>Сообщение: </span>
                <textarea type="text" name="msg" required></textarea>
            </div>

            <input type="submit" value="Отправить">
            <input type="hidden" value="insert" name="mode">
        </form>
        
        <div class="msgContainer">
            <?php
                $msgs = $hotel->getForUser();
                
                foreach ($msgs as $msg) {
                    if (!$msg->hide) {
                        echo "
                            <div>
                                <label><strong>$msg->name</strong>, <i>$msg->puttime</i></label>
                                <p>$msg->msg</p>
                                <label>$msg->answer</label>
                            </div>
                        ";
                    }
                }
            ?>
        </div>
    </div>

</body>
</html>