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
            1 => array('ноль', 'один', 'два', 'три', 'четыре', 'пять', 'шесть', 'семь', 'восемь', 'девять'),
            2 => array('десять', 'одиннадцать', 'двенадцать', 'тринадцать', 'четырнадцать', 'пятнадцать', 'шестнадцать', 'семнадцать', 'восемнадцать', 'девятнадцать', 'двадцать', 'тридцать', 'сорок', 'пятьдесять', 'шестьдесять', 'семьдесять', 'восемьдесять', 'девяносто'),
            3 => array('сто', 'двести', 'триста', 'четыреста', 'пятьсот', 'шестьсот', 'семьсот', 'восемьсот', 'девятьсот')
        );
    ?>

    <div class="wrap">
        <form action="index.php" method="POST">
            <div>
                <span>Number by numeric:</span>
                <input type="text" name="number">
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
                    // $numberCount = strlen($number);
                    // $res = '';

                    // while($numberCount != 0) {
                    //     $num = $number % 10;

                    //     if($num == 1 && )
                    //     {

                    //     }

                    //     $res .= $numberByLetter[$numberCount][$num];
                    //     $numberCount--;
                    //     $number /= 10;
                    // }

                    $f = new NumberFormatter("ru", NumberFormatter::SPELLOUT);
                    $res = $f->format($number);

                    echo $res;
                ?>
            </span>
        </div>
    </div>
</body>
</html>