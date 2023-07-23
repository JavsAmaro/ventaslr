<?php

//Esta es la qwery de conexion a la base de datos del servido r 




 $db = mysqli_connect('localhost', 'punto_de_ventas', '12345') or
        die ('Unable to connect. Check your connection parameters.');
        mysqli_select_db($db, 'prince' ) or die(mysqli_error($db));


//esta es la qwery de coneccion a la base de datos localhost
/*
 $db = mysqli_connect('localhost', 'root', '') or
        die ('Unable to connect. Check your connection parameters.');
        mysqli_select_db($db, 'prince' ) or die(mysqli_error($db));
*/

?>
