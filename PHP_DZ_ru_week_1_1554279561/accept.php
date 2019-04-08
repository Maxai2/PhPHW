<?php
    echo 'hi';

    if (isset($_POST['leftR'], $_POST['leftG'], $_POST['leftB'])) {
        $dom = new DomDocument();
        $dom->load('index.html');
        $span = $dom->getElementById('spanForeground');
        
        echo $span;
    }
?>