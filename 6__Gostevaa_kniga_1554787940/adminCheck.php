<?php 
    if ($_POST['login'] == 'admin' && $_POST['password'] == 'admin') {
        echo json_encode(true);
    } else {
        echo json_encode(false);
    }
?>