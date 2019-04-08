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
    <form class=wrap method="post" action="index.php">
        <div class="groundContainer">
            <div class="container">
                <h3>Foreground</h3>

                <div>
                    <label class="lbR">R:</label>
                    <input type="number" name="leftR"  placeholder="0-255" max=255 min=0>
                </div>

                <div>
                    <label class="lbG">G:</label>
                    <input type="number" name="leftG" placeholder="0-255" max=255 min=0>
                </div>

                <div>
                    <label class="lbB">B:</label>
                    <input type="number" name="leftB" placeholder="0-255" max=255 min=0>
                </div>
            </div>

            <div class="container rightMargin">
                <h3>Background</h3>

                <div>
                    <label class="lbR">R:</label>
                    <input type="number" name="rightR" placeholder="0-255" max=255 min=0>
                </div>

                <div>
                    <label class="lbG">G:</label>
                    <input type="number" name="rightG" placeholder="0-255" max=255 min=0>
                </div>

                <div>
                    <label class="lbB">B:</label>
                    <input type="number" name="rightB" placeholder="0-255" max=255 min=0>
                </div>
            </div>
        </div>

        <div class="spanContainer" id="spanBackground">
            <span id="spanForeground">test</span>
        </div>

        <input type="submit" value="Accept">
    </form>

    <?php
        echo $_POST['leftR'] == '';
    ?>
</body>
</html>