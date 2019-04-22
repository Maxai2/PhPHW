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
    <div class='galleryWrap'>
        <h1>А вот и все фотки</h1>
        <form action='../index.php'>
            <button>Main menu</button>
        </form>
        <div class='picsCont'>
            <?php 
                require_once __DIR__.'/../Repository/PictureRep.php';
                $db = new PictureRep();
                
                $picsPath = $db->getPicsByPath();

                foreach ($picsPath as $pic) {
                    $str = $pic['imagePath'];
                    echo "<img src=$str onclick='picDetail(this)'>";
                }
            ?>
        </div>

        <table id='detTable' style='display: none;'>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Size</th>
                <th>Image path</th>
            </tr>

            <tr>

            </tr>
        </table>
    </div>
    <script>
        function picDetail(img) {
            document.getElementById('detTable').style.display = 'table';
        }
    </script>
</body>
</html>