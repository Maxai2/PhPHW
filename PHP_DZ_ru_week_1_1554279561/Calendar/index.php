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
            function numToMonth($str) {
                switch($str) {
                    case '1':
                        return 'January';
                    case '2':
                        return 'February';
                    case '3':
                        return 'March';
                    case '4':
                        return 'April';
                    case '5':
                        return 'May';
                    case '6':
                        return 'June';
                    case '7':
                        return 'July';
                    case '8':
                        return 'August';
                    case '9':
                        return 'September';
                    case '10':
                        return 'October';
                    case '11':
                        return 'November';
                    case '12':
                        return 'December';
                }
            }
        ?>

        <?php 
            $month = $_POST['monthRange'] ?? 1;
            $monthStr = "";
        ?>

        <div class="monthContainer">
            <label id="monthResult" class="monthNum"><?php echo $month.'/ '.numToMonth($month) ?></label>

            <div class="cont">
                <span>Month:</span>
                <input type="range" id="monthRange" name="monthRange" min=1 max=12 value=<?= $month; ?>>
            </div>

            <script>
                monthRange.oninput = function() {
                    tempStr = monthRange.value + '/ ' + numToMonth(monthRange.value);
                    monthResult.innerHTML = tempStr;
                }

                function numToMonth(str) {
                    switch(str) {
                        case '1':
                            return 'January';
                        case '2':
                            return 'February';
                        case '3':
                            return 'March';
                        case '4':
                            return 'April';
                        case '5':
                            return 'May';
                        case '6':
                            return 'June';
                        case '7':
                            return 'July';
                        case '8':
                            return 'August';
                        case '9':
                            return 'September';
                        case '10':
                            return 'October';
                        case '11':
                            return 'November';
                        case '12':
                            return 'December';
                    }
                }
            </script>

            <input type="submit" value="Get Month">
        </div>

        <table>
                
        </table>
    </form>
</body>
</html>