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
        <h1>Выберите файл для отображения.</h1>
        <form method="POST" action="show.php">
            <select name='picName'>
                <?php 
                    require_once __DIR__.'/../Repository/PictureRep.php';
                    $db = new PictureRep();
                    
                    $picsName = $db->getPicsByName();
                    
                    foreach ($picsName as $pic) {
                        echo '<option value='.$pic['id'].'|'.$pic['name'].'>'.$pic['name'].'</option>';
                    }
                ?>
            </select>
            <input type="submit" value="Open?">
        </form>

        <div class='picContainer' style='display: <?php 
            echo isset($_POST['picName']) ? 'grid' : 'none';
        ?>'>
            <img src='
                <?php 
                    $picId = substr($_POST['picName'], 0, 1);
                    echo $db->getPic((int)$picId);
                ?>
            '>
        </div>
    </div>
</body>
</html>