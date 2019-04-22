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
        <form action='../index.php'>
            <button>Main menu</button>
        </form>
        <form method="POST" action="show.php">
            <select name='picName'>
                <?php 
                    require_once __DIR__.'/../Repository/PictureRep.php';
                    $db = new PictureRep();
                    
                    $picsName = $db->getPicsByName();

                    $postCome = isset($_POST['picName']);
                    $name = '';

                    if ($postCome) {
                        $picId = explode('|', $_POST['picName']);
                        if(isset($picId[1])) {
                            $pic = $db->getPic((int)$picId[0]);
                            $imagePath = $pic->imagePath;
                            $name = $pic->name;
                            $size = $pic->size;
                        } else {
                            $postCome = false;
                        }
                    }
                    
                    foreach ($picsName as $pic) {
                        $sel = '';
                        if ($pic['name'] == $name) {
                            $sel = "selected='selected'";
                        }
                        echo "<option $sel value=".$pic['id'].'|'.$pic['name'].'>'.$pic['name'].'</option>';
                    }
                ?>
            </select>
            <input type="submit" value="Open?">
        </form>

        <div class='picContainer' style='display: <?php 
            echo $postCome ? 'grid' : 'none';
        ?>'>
            <?php 
                echo "
                    <img src='$imagePath'>
                    <div class='propCont'>
                        <div>
                            <strong>Name:</strong>
                            <label>$name</label>
                        </div>
                        <hr>
                        <div>
                            <strong>Size:</strong>
                            <label>$size</label>
                        </div>
                    </div>
                ";
            ?>
        </div>
    </div>
</body>
</html>