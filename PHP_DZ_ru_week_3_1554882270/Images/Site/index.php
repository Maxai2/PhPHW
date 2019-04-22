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
        require_once './Repository/PictureRep.php';

        $db = new PictureRep();
    ?>

    <div class="wrap">
        <h1>Добро пожаловать в галерею!</h1>
        <h4>Изображений: <?php 
            $count = 0;

            if ($db->rowCount()) {
                $count = $db->rowCount();
            }

            echo $count;
        ?></h4>
        <div class='formCont'>
            <form action='Pages/upload.html'>
                <input type='submit' value='Upload?'>
            </form>
            <form action='Pages/show.php'>
                <input type='submit' value='Show?' <?php 
                    echo $count == 0 ? 'disabled' : '';
                ?>>
            </form>
            <form action='Pages/gallery.php'>
                <input type='submit' value='Gallery' <?php 
                    echo $count == 0 ? 'disabled' : '';
                ?>>
            </form>
        </div>
    </div>
</body>
</html>