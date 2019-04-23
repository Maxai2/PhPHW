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
                    $id = $pic['id'];
                    echo "<img src=$str onclick='picDetail(this, $id)'>";
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
                <td id='id'></td>
                <td id='name'></td>
                <td id='size'></td>
                <td id='imagePath'></td>
            </tr>
        </table>
    </div>
    <script>
        function picDetail(img, id) {
            document.getElementById('detTable').style.display = 'table';

            let data = data.append("id", id);
            fetch("picWait.php", {
                body: data,
                method: 'post'
            }).then(function (responce) {
                return responce.json();
            }).then(json => {
                
            })
        }
    </script>
</body>
</html>