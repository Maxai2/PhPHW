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

        $number = $_POST['number'] ?? '';

        $numberByLetter = array(
            1 => array('', 'один', 'два', 'три', 'четыре', 'пять', 'шесть', 'семь', 'восемь', 'девять', 'десять', 'одиннадцать', 'двенадцать', 'тринадцать', 'четырнадцать', 'пятнадцать', 'шестнадцать', 'семнадцать', 'восемнадцать', 'девятнадцать'),
            2 => array('', '', 'двадцать', 'тридцать', 'сорок', 'пятьдесять', 'шестьдесять', 'семьдесять', 'восемьдесять', 'девяносто'),
            3 => array('', 'сто', 'двести', 'триста', 'четыреста', 'пятьсот', 'шестьсот', 'семьсот', 'восемьсот', 'девятьсот')
        );
    
        $degrees = array(
            array('тысяч','а','и'),
            array('одна', 'две')
        );
    ?>

    <div class="wrap">
        <form action="index.php" method="POST">
            <div>
                <label>Number:</label>
                <input type="text" name="number" autofocus>
            </div>
            <input type="submit" value="Convert">
        </form>

        <div class="result" style="display: <?php
            if ($number == '') {
                echo 'none';
            } else {
                echo 'flex';
            }
          ?>">

            <span><?= $number; ?></span>
            <span>
                <?php
                    $number = strrev(test_input($number));
                    $wholeNumCount = strlen($number);
                    $res = '';
                    $maybeGoto = false;

                    $digitGroups = array_reverse(str_split($number, 3));

                    for ($i = 0; $i < count($digitGroups); $i++) {
                        $numberCount = strlen($digitGroups[$i]);
                        $tempArr = array_reverse(str_split($digitGroups[$i]));

                        for ($j = 0; $j < count($tempArr); $j++) {
                            if ($numberCount == 2 && $tempArr[$j] == 1) {
                                $res .= $numberByLetter[1][$tempArr[$j] * 10 + $tempArr[$j + 1]].' ';
                                $maybeGoto = true;
                            } else {
                                if ($tempArr[$j] == 1 && $j == (count($tempArr) - 1) && $wholeNumCount >= 4 && $i != 1)
                                    $res .= $degrees[1][0].' ';
                                elseif ($tempArr[$j] == 2 && $j == (count($tempArr) - 1) && $wholeNumCount >= 4  && $i != 1)
                                    $res .= $degrees[1][1].' ';
                                else
                                    $res .= $numberByLetter[$numberCount--][$tempArr[$j]].' ';
                            }
                            
                            if(count($digitGroups) == 2 && ($j == (count($tempArr) - 1) || $maybeGoto) && $i == 0) {
                                $res .= $degrees[0][0];

                                if ($tempArr[$j] == 1 && !$maybeGoto)
                                    $res .= $degrees[0][1].' ';
                                elseif ((2 <= $tempArr[$j] && $tempArr[$j] <= 4)  && !$maybeGoto)
                                    $res .= $degrees[0][2].' ';
                                else
                                    $res .= ' ';
                            }

                            if ($maybeGoto) {
                                $maybeGoto = false;
                                break;
                            }
                        }
                    }

                    echo $res;
                ?>
            </span>
        </div>
    </div>
</body>
</html>