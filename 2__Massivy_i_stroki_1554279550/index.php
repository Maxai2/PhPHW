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

        // $numberByLetter = array(
        //     1 => array('', 'один', 'два', 'три', 'четыре', 'пять', 'шесть', 'семь', 'восемь', 'девять', 'десять', 'одиннадцать', 'двенадцать', 'тринадцать', 'четырнадцать', 'пятнадцать', 'шестнадцать', 'семнадцать', 'восемнадцать', 'девятнадцать'),
        //     2 => array('', '', 'двадцать', 'тридцать', 'сорок', 'пятьдесять', 'шестьдесять', 'семьдесять', 'восемьдесять', 'девяносто'),
        //     3 => array('', 'сто', 'двести', 'триста', 'четыреста', 'пятьсот', 'шестьсот', 'семьсот', 'восемьсот', 'девятьсот'),
        //     4 => array('', 'одна тысяча', 'две тысячи', 'три тысячи', 'четыре тысячи', 'пять тысяч', 'шесть тысяч', 'семь тысяч', 'восемь тысяч', 'девять тысяч')
        // );

        $numberByLetter = array(
            array('ноль'),
            array('','один','два','три','четыре','пять','шесть','семь','восемь','девять'),
            array('десять','одиннадцать','двенадцать','тринадцать','четырнадцать',
                'пятнадцать','шестнадцать','семнадцать','восемнадцать','девятнадцать'),
            array('','','двадцать','тридцать','сорок','пятьдесят','шестьдесят','семьдесят','восемьдесят','девяносто'),
            array('','сто','двести','триста','четыреста','пятьсот','шестьсот','семьсот','восемьсот','девятьсот'),
            array('','одна','две')
       );

       $degrees = array(
           array('тысяч','а','и')
       );

       // http://blog.kislenko.net/show.php?id=1598
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
                    $res = '';
                    $numberCount = strlen($number);

                    $digitGroups = array_reverse(str_split($number, 3));

                    var_dump($digitGroups);

                    foreach ($digitGroups as $digitsArray) {
                        foreach ($digitsArray as $num) {
                            echo $num;
                        }
                    }

                    // $number = strrev($number);
                    
                    // while($numberCount != 0) {
                    //     $num = $number % 10;
                        
                    //     if ($numberCount == 2 && $num == 1) {
                    //         $res .= $numberByLetter[1][strrev($number)].' ';
                    //         break;
                    //     }
                        
                    //     $res .= $numberByLetter[$numberCount][$num].' ';
                    //     $numberCount--;
                    //     $number = (int)($number / 10);
                    // }

                    // echo $res;
                ?>
            </span>
        </div>
    </div>
</body>
</html>