<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style.css">
    <title>Document</title>
</head>
<body>
    <div class="showWrap">
        <h2>Выберите файл для отображения.</h2>
        <!-- <select> -->
            <?php 
                require_once __DIR__.'/../Repository/PictureRep.php';
                $db = new PictureRep();

                $picsName = $db->getPicsByName();

                var_dump($picsName);
            ?>
        <!-- </select> -->
    </div>
</body>
</html>