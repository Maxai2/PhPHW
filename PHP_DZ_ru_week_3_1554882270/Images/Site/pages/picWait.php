<?php 
    // var_dump($_FILES['picPath']);
    require_once __DIR__.'/../Repository/PictureRep.php';
    $db = new PictureRep();

    if (isset($_POST['id'])) {
        $obj = $db->getPic($_POST['id']);
        $json = json_encode($obj);
        echo $json;
        return;
    } elseif (isset($_FILES['picPath'])) {
        @mkdir('../images');
        $c = count($_FILES['picPath']['tmp_name']);
        for ($i = 0; $i < $c; $i++) {
            $ext = $_FILES['picPath']['type'][$i];
            if ($ext == 'image/png' || $ext == 'image/jpg' || $ext == 'image/jpeg') {
                $source = $_FILES['picPath']['tmp_name'][$i];

                $tempName = $_FILES['picPath']['name'][$i];
                $lastPart = strrchr($tempName, '.');
                $firstPart = str_replace($lastPart, '', $tempName);
                $name = $firstPart.'_'.time().$lastPart;

                $dest = '../images/'.$name;
                copy($source, $dest);

                $db->insert($name, $_FILES['picPath']['size'][$i], $dest);
            }
        }

    }

    header('Location: ../index.php');
?>