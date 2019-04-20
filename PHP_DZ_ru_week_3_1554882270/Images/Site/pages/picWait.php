<?php 
    if (isset($_FILES['picPath'])) {   
        @mkdir('../images');
        $c = count($_FILES['picPath']);
        
        for ($i = 0; $i < $c; $i++) {
            $source = $_FILES['picPath']['tmp_name'][$i];
            $dest = 'uploads/'.$_FILES['upload']['name'][$i];
            copy($source, $dest);
        }
    }
?>