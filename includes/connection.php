<?php
//  $db = mysqli_connect('localhost', 'punto_de_ventas', '12345') or
//         die ('Unable to connect. Check your connection parameters.');
//         mysqli_select_db($db, 'prince' ) or die(mysqli_error($db));


        $db = mysqli_connect('localhost', 'root', '') or
        die ('Unable to connect. Check your connection parameters.');
        mysqli_select_db($db, 'prince' ) or die(mysqli_error($db));

?>