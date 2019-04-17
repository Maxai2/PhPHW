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
    <div class="wrap">
        <h1>Добро пожаловать Admin!</h1>

        <form class="msgClass" id="adminDiv" onsubmit="adminGo()">
            <div class="gridCont propBorder">
                <span>Login: </span>
                <input type="text" id="login" required>
            </div>
            <div class="gridCont propBorder">
                <span>Password: </span>
                <input type="password" id="password" required>
            </div>
            <input value="Okay" type="submit">
            <script>
                function adminGo() {
                    let data = new FormData();
                    data.append('login', document.getElementById('login').value);
                    data.append('password', document.getElementById('password').value);

                    fetch("adminCheck.php", {
                        body: data,
                        method: "post"
                    }).then(function (response) {
                        return response.json();
                    }).then(json => {
                        if (json) {
                            document.getElementById('adminDiv').style.display = 'none';
                            document.getElementById('forAdminMsg').style.display = 'flex';
                        } else {
                            alert("Login or password is wrong!");
                        }
                    });

                    event.preventDefault();
                }
            </script>
        </form>

        <div id="forAdminMsg" class="adminMsg" style="display: none">
            <?php 

                // <form method="POST" action="postWait.php">
                //         <label><strong>name</strong>, <i>puttime</i>, city, url, email</label>
                //         <p>msg</p>
                //         <div class="gridCont propBorder answerDiv">
                //                 <label>Answer: </label>
                //                 <textarea name="answer" type="text"></textarea>
                //             </div>
                //             <div class="hideSubDiv">
                //                     <div>
                //                             <label>Hide: </label>
                //                             <input type="checkbox" name="hide">
                //                         </div>
                //                         <input type="submit" value="Submit">
                //                     </div>
                //                 </form>
            ?>
        </div>
    </div>
</body>
</html>