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
    <form class="wrap" method="POST" action="index.php">
        <?php 
            $month = $_POST['monthRange'] ?? -1;
        ?>

        <div class="monthContainer">
            <span id="monthResult" class="monthNum">
                <?php
                    if ($month != -1) {
                        $dateObj = DateTime::createFromFormat('!m', $month);
                        $monthName = $dateObj->format('F');
                        echo $month.'/ '.$monthName;
                    }
                ?>
            </span>

            <div class="cont">
                <span>Month:</span>
                <input type="range" id="monthRange" name="monthRange" min=1 max=12 value=<?= $month; ?>>
            </div>

            <script>
                var monthArray = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

                monthRange.oninput = function() {
                    tempStr = monthRange.value + '/ ' + monthArray[monthRange.value - 1];
                    monthResult.innerHTML = tempStr;
                }
            </script>

            <input type="submit" value="Get Month">
        </div>

        <div class="divTable" style="display: <?php
            if ($month == -1) {
                echo 'none';
            } else {
                echo 'block';
            }
          ?>">
            <h1><?= $monthName; ?></h1>

            <div class="weekDay">
                <span>Monday</span>
                <span>Tuesday</span>
                <span>Wendsday</span>
                <span>Thursday</span>
                <span>Friday</span>
                <span>Saturday</span>
                <span>Sunday</span>
            </div>

            <div class="monthDay">
                <?php 
                    $currentYear = date("Y");

                    function getWeekNum($dayNum, $curMonth, $curYear) {
                        $date = new DateTime($curYear.'-'.$curMonth.'-'.$dayNum);
                        $weekNum = $date->format("N");

                        return (int)$weekNum;
                    }

                    $days = cal_days_in_month(CAL_GREGORIAN, $month, $currentYear);

                    for ($i = 1; ; $i++) { 
                        if ($i == getWeekNum(1, $month, $currentYear)) {
                            for ($j = 1; $j <= $days; $j++) { 
                                $curWeekNum = getWeekNum($j, $month, $currentYear);

                                if ($curWeekNum == 6 || $curWeekNum == 7)
                                    echo '<span class="weekend">'.$j.'</span>';
                                else
                                    echo '<span>'.$j.'</span>';
                            }
                            break;
                        }
                        echo '<span></span>';
                    }
                ?>
            </div>
        </div>

    </form>
</body>
</html>