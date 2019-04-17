<?php 
    // ALTER TABLE guest AUTO_INCREMENT = 1;
    
    require_once './HotelRep.php';
    require_once './Comment.php';
    
    $hotel = new HotelRep();
    
    if (!isset($_POST['mode']))
        exit;

    $mode = $_POST['mode'];

    switch($mode) {
        case 'insert': {
            $name = $_POST['name'];
            $city = $_POST['city'];
            $email = $_POST['email'];
            $url = $_POST['url'];
            $msg = $_POST['msg'];
            
            $comAdmin = Comment::makeCommentForAdmin($name, $city, $email, $url, $msg);
            
            $hotel->insert($comAdmin);
            
            header("Location: index.php");
            break;
        }
        case 'update': {
            $id = $_POST['id_msg'];
            $answer = $_POST['answer'];
            $hide = 0;

            if (isset($_POST['hide'])) {
                $hide = $_POST['hide'];
            }
    
            $hotel->update($id, $answer, $hide);
    
            header("Location: admin.php");
            break;
        }
    }
?>