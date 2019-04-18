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

        $mode = '';
        if (isset($_COOKIE['mode']))
            $mode = $_COOKIE['mode'];
    ?>
    <div class="wrap">
        <h1>Добро пожаловать Admin!</h1>
        
        <?php 
            if ($mode != 'ad') {
                echo '
                    <form class="msgClass" id="adminDiv" onsubmit="adminGo()">
                    <div class="gridCont propBorder">
                    <span>Login: </span>
                    <input type="text" id="login" autofocus required>
                    </div>
                    <div class="gridCont propBorder">
                    <span>Password: </span>
                        <input type="password" id="password" required>
                        </div>
                        <input value="Okay" type="submit">
                        <script>
                        function adminGo() {
                            let data = new FormData();
                            data.append("login", document.getElementById("login").value);
                            data.append("password", document.getElementById("password").value);
                            
                            fetch("adminCheck.php", {
                                body: data,
                                method: "post"
                            }).then(function (response) {
                                return response.json();
                            }).then(json => {
                                if (json) {
                                    document.getElementById("adminDiv").style.display = "none";
                                    document.getElementById("forAdminMsg").style.display = "flex";
                                } else {
                                    alert("Login or password is wrong!");
                                }
                            });
                            
                            event.preventDefault();
                        }
                        </script>
                    </form>';
                }
        ?>

        <div id="forAdminMsg" class="adminMsg" style="display: <?php 
            echo $mode == 'ad' ? 'flex' : 'none';
        ?>">
            <?php 
                $msgs = $hotel->getForAdmin();

                foreach ($msgs as $msg) {
                    $cityUrlEmail = '';
                    $answerArea = '';
                    $hide = '';
                    $id_msg = $msg->id_msg;

                    if ($msg->hide) {
                        $hide = 'checked';
                    }

                    if ($msg->answer == '') {
                        $answerArea = "<textarea name='answer' type='text'></textarea>";
                    } else {
                        $answerArea = "<label>$msg->answer</label>
                        <input type='hidden' name='answer' value=$msg->answer>";
                    }

                    if ($msg->city != '') {
                        $cityUrlEmail .= ', '.$msg->city;
                    }

                    if ($msg->url != '')  {
                        $cityUrlEmail .= ', '.$msg->url;
                    }

                    if ($msg->email != '')  {
                        $cityUrlEmail .= ', '.$msg->email;
                    }

                    echo "
                        <form method='POST' action='postWait.php'>
                            <label><strong>$msg->name</strong>, <i>$msg->puttime</i>$cityUrlEmail</label>
                            <p>$msg->msg</p>
                            <div class='gridCont propBorder answerDiv'>
                                <label>Answer: </label>
                                $answerArea
                            </div>
                            <div class='hideSubDiv'>
                                <div>
                                    <label>Hide: </label>
                                    <input type='checkbox' name='hide' $hide>
                                </div>

                                <div>
                                    <input type='submit' name='delete' value='Delete' onclick='return deleteMsg();'>
                                    <input type='submit' name='update' value='Submit'>  
                                </div>
                                <input type='hidden' name='id_msg' value=$id_msg>
                                <input type='hidden' name='mode' value='update'>
                            </div>
                        </form>
                    ";
                }
            ?>
        </div>
        <script>
            function deleteMsg() {
                if (confirm('Are you sure you want to delete message?')) {
                    return true;
                } else {
                    return false;
                }
            }
        </script>
    </div>
</body>
</html>