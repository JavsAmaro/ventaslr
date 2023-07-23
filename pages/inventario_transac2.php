<?php
include'../includes/connection.php';
include'../includes/topp.php';
?>

      
          <!-- Page Content -->
          <div class="col-lg-12">
 
            <?php
            /*
        date_default_timezone_set('America/Mexico_City');

$script_tz = date_default_timezone_get();

              $tipo = $_POST['tipo'];
              $producto = $_POST['producto'];
              $fecha = $_POST['fecha'];
              $monto = $_POST['monto'];
              $sucursal = $_SESSION['CITY'];



 if ($tipo == 1) {

              switch($_GET['action']){
                case 'add':     
                    $query = "UPDATE product SET QTY_STOCK=QTY_STOCK+$monto WHERE NAME LIKE'{$producto}'AND CITY LIKE '{$sucursal}'";
                    mysqli_query($db,$query)or die ('Error al actualizar la base de datos');


  $query2 = "INSERT INTO inventory(ID_INVENTARIO, DATE,CANTIDAD, TIPO, PRODUCTO  , CITY)
                    VALUES (Null,'{$fecha}','{$monto}','{$tipo}','{$producto}','{$sucursal}')";
                    mysqli_query($db,$query2)or die ('Error al actualizar la base de datos');

               break;
              }
         }
          if ($tipo == 2) {

              switch($_GET['action']){
                case 'add':     
                    $query = "UPDATE product SET QTY_STOCK=QTY_STOCK-$monto WHERE NAME LIKE'{$producto}'AND CITY LIKE '{$sucursal}'";
                    mysqli_query($db,$query)or die ('Error al actualizar la base de datos');

  $query2 = "INSERT INTO inventory(ID_INVENTARIO, DATE,CANTIDAD, TIPO, PRODUCTO  , CITY)
                    VALUES (Null,'{$fecha}','{$monto}','{$tipo}','{$producto}','{$sucursal}')";
                    mysqli_query($db,$query2)or die ('Error al actualizar la base de datos');



                break;
              }
         }
         */
 ?>



<?php
        date_default_timezone_set('America/Mexico_City');

$script_tz = date_default_timezone_get();

              $tipo = $_POST['tipo'];
              $producto = $_POST['producto'];
              $fecha = $_POST['fecha'];
              //$fecha = date( "Y-m-d (H:i:s)" , $fecha);
              //$fecha = "'".date('Y-m-d H:i:s', strtotime(str_replace('-', '/', $_POST['fecha'])))."'";
              $monto = $_POST['monto'];
              $sucursal = $_SESSION['CITY'];



 if ($tipo == 1) {

              switch($_GET['action']){
                
                case 'add':  
                  echo $fecha;   
                    $query = "UPDATE almacen SET QTY_STOCK=QTY_STOCK+$monto, MONTO=$monto, FECHA_ENTREGA =now() WHERE NAME LIKE '{$producto}' AND CITY LIKE '{$sucursal}'";
                    mysqli_query($db,$query)or die ('Error al actualizar la base de datos');

                  


/* 

     $query = "UPDATE almacen SET QTY_STOCK=QTY_STOCK+$monto, MONTO=$monto WHERE NAME LIKE'{$producto}'AND  CITY LIKE '{$sucursal}'";
                    mysqli_query($db,$query)or die ('Error al actualizar la base de datos');

                    $query0 = "UPDATE almacen SET FECHA_ENTREGA='$fecha WHERE CITY LIKE '{$sucursal}'";
                    mysqli_query($db,$query0)or die ('Error al actualizar la base de datos');
                    

                    $query6 = "UPDATE almacen SET MONTO=$monto WHERE NAME LIKE'{$producto}'AND CITY LIKE '{$sucursal}'";
                    mysqli_query($db,$query)or die ('Error al actualizar la base de datos');


                   $query23 = "INSERT INTO inventory (ID_INVENTARIO, DATE, CANTIDAD, TIPO, PRODUCTO, CITY)
                    VALUES (Null,'{$fecha}','{$monto}','{$tipo}','{$producto}','{$sucursal}')";
                    mysqli_query($db,$query23)or die ('Error al actualizar la base de datos1');*/
 
               break;
              }
         }
          if ($tipo == 2) {

              switch($_GET['action']){
                case 'add':     
                    $query = "UPDATE product SET QTY_STOCK=QTY_STOCK-$monto WHERE NAME LIKE'{$producto}'AND CITY LIKE '{$sucursal}'";
                    mysqli_query($db,$query)or die ('Error al actualizar la base de datos');

  $query23 = "INSERT INTO almacen(ID_INVENTARIO, DATE,CANTIDAD, TIPO, PRODUCTO, CITY)
                    VALUES (Null,'{$fecha}','{$monto}','{$tipo}','{$producto}','{$sucursal}')";
                    mysqli_query($db,$query23)or die ('Error al actualizar la base de datos');



                break;
              }
         }
 ?>

 





              <script type="text/javascript">

      alert("Actualización realizada con exito.");

  window.history.back();
  
              </script>
          </div>

<?php
include'../includes/footer.php';
?>