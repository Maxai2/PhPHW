<?php 
    var_dump($_FILES['picPath']);

    if (isset($_FILES['picPath'])) {
        require_once __DIR__.'/../Repository/PictureRep.php';
        $db = new PictureRep();

        @mkdir('../images');
        $c = count($_FILES['picPath']['tmp_name']);
        for ($i = 0; $i < $c; $i++) {
            $source = $_FILES['picPath']['tmp_name'][$i];
            $dest = '../images/'.$_FILES['picPath']['name'][$i];
            copy($source, $dest);

            $db->insert($_FILES['picPath']['name'][$i], $_FILES['picPath']['size'][$i], $dest);
        }
    }

    header('Location: ../index.php');
?>