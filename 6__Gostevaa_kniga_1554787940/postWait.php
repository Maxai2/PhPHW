<?php 
    // ALTER TABLE guest AUTO_INCREMENT = 1;
    
    require_once './HotelRep.php';
    require_once './Comment.php';
    
    $hotel = new HotelRep();
    
    if (isset($_POST['name'])) {
        $name = $_POST['name'];
        $city = $_POST['city'];
        $email = $_POST['email'];
        $url = $_POST['url'];
        $msg = $_POST['msg'];

        $comAdmin = Comment::makeCommentForAdmin($name, $city, $email, $url, $msg);

        $hotel->insert($comAdmin);
    }

    header("Location: index.php");
?>