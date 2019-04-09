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
        $leftR = $_POST['leftR'] ?? 0;
        $leftG = $_POST['leftG'] ?? 0;
        $leftB = $_POST['leftB'] ?? 0;

        $rightR = $_POST['rightR'] ?? 0;
        $rightG = $_POST['rightG'] ?? 0;
        $rightB = $_POST['rightB'] ?? 0;
    ?>

    <form class=wrap method="post" action="index.php">
        <div class="groundContainer">
            <div class="container">
                <h3>Foreground</h3>

                <div>
                    <label class="lbR">R:</label>
                    <input type="range" id="leftR" name="leftR" value=<?= $leftR; ?> max=255 min=0>
                    <label id="leftRresult"><?= $leftR; ?></label>
                    <script>
                        leftR.oninput = function() {
                            leftRresult.innerHTML = leftR.value;
                        }
                    </script>
                </div>

                <div>
                    <label class="lbG">G:</label>
                    <input type="range" id="leftG" name="leftG" value=<?= $leftG; ?> max=255 min=0>
                    <label id="leftGresult"><?= $leftG; ?></label>
                    <script>
                        leftG.oninput = function() {
                            leftGresult.innerHTML = leftG.value;
                        }
                    </script>
                </div>

                <div>
                    <label class="lbB">B:</label>
                    <input type="range" id="leftB" name="leftB" value=<?= $leftB; ?> max=255 min=0>
                    <label id="leftBresult"><?= $leftB; ?></label>
                    <script>
                        leftB.oninput = function() {
                            leftBresult.innerHTML = leftB.value;
                        }
                    </script>
                </div>
            </div>

            <div class="container rightMargin">
                <h3>Background</h3>

                <div>
                    <label class="lbR">R:</label>
                    <input type="range" id="rightR" name="rightR" value=<?= $rightR; ?> max=255 min=0>
                    <label id="rightRresult"><?= $rightR; ?></label>
                    <script>
                        rightR.oninput = function() {
                            rightRresult.innerHTML = rightR.value;
                        }
                    </script>
                </div>

                <div>
                    <label class="lbG">G:</label>
                    <input type="range" id="rightG" name="rightG" value=<?= $rightG; ?> max=255 min=0>
                    <label id="rightGresult"><?= $rightG; ?></label>
                    <script>
                        rightG.oninput = function() {
                            rightGresult.innerHTML = rightG.value;
                        }
                    </script>
                </div>

                <div>
                    <label class="lbB">B:</label>
                    <input type="range" id="rightB" name="rightB" value=<?= $rightB; ?> max=255 min=0>
                    <label id="rightBresult"><?= $rightB; ?></label>
                    <script>
                        rightB.oninput = function() {
                            rightBresult.innerHTML = rightB.value;
                        }
                    </script>
                </div>
            </div>
        </div>

        <div class="spanContainer" style="background: rgb(<?= $rightR; ?>, <?= $rightG; ?>, <?= $rightB; ?>)">
            <span style="color: rgb(<?= $leftR; ?>, <?= $leftG; ?>, <?= $leftB; ?>)">test</span>
        </div>

        <input type="submit" value="Accept">
    </form>
    
</body>
</html>