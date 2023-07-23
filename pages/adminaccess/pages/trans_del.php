<table class="table table-bordered" id="dataTable" width="500px" cellspacing="0">        

<?php
include'../includes/connection.php';
session_start();

	$qty_transac=0;
    $id_transac = $_POST['id_transac'];
    $trans_d_id = $_POST['trans_d_id'];
    $totalcajas = $_POST['cajas'];


    $motivo_cancelacion = $_POST['motivo_cancelacion'];


// Cancelacion normal
$query3 = "UPDATE product SET QTY_STOCK=QTY_STOCK+$totalcajas WHERE NAME LIKE'Cajas'AND CITY LIKE '{$_SESSION['CITY']}%'";

  mysqli_query($db,$query3)or die ('Error al actualizar la base de datos');



	$query2 = "UPDATE transaction set GRANDTOTAL = '0', MOTIVO_CANCEL = '{$motivo_cancelacion}', CANT_CAJAS = '0' WHERE TRANS_ID LIKE '{$id_transac}%' LIMIT 1";

     $result = mysqli_query($db, $query2) or die (mysqli_error($db));



   $query = "SELECT * FROM transaction_details WHERE TRANS_D_ID LIKE '{$trans_d_id}%'";

    $result = mysqli_query($db, $query) or die (mysqli_error($db));

      while ($row = mysqli_fetch_assoc($result)) {

    $cantidad = 0;

 
        $query3 = "UPDATE product SET QTY_STOCK=QTY_STOCK+'".$row['QTY']."' WHERE NAME LIKE '".$row['PRODUCTS']."' AND CITY LIKE '{$_SESSION['CITY']}%'";

           mysqli_query($db,$query3)or die ('Error al actualizar la base de datos');

$cantidad=$row['QTY'];

         $query4 = "SELECT * FROM product WHERE NAME  LIKE '{$row['PRODUCTS']}%' AND CITY  LIKE '{$_SESSION['CITY']}%'";
         $result2 = mysqli_query($db,$query4)or die ('Error al actualizar la base de datos');

            while ($row = mysqli_fetch_assoc($result2)) {
        
         $description = $row['DESCRIPTION'];
         $category_id = $row['CATEGORY_ID'];

                      }
///Cancelacion para combos                  
    if( $category_id == 7 || $category_id == 14 || $category_id == 24 || $category_id == 44 ) {

            //Este  bloque aplica por si el combo lleva Coca-Cola 2L

            if ((strpos($description, 'Coca-Cola 2L') !== false) || (strpos($description, 'coca-cola 2L') !== false)){



//actualización de los productos pertenecientes al combo 


            $query5 = "UPDATE product SET QTY_STOCK=QTY_STOCK+$cantidad WHERE NAME LIKE'Coca-Cola 2L'AND CITY LIKE '{$_SESSION['CITY']}%'";

  mysqli_query($db,$query5)or die ('Error al actualizar la base de datos');

            }

            //Este  bloque aplica por si el combo lleva Espagueti
            if ((strpos($description, 'Espagueti') !== false) || (strpos($description, 'espagueti') !== false)) {
//actualización de los productos pertenecientes al combo 
            $query6 = "UPDATE product SET QTY_STOCK=QTY_STOCK+$cantidad WHERE NAME LIKE'Espagueti'AND CITY LIKE '{$_SESSION['CITY']}%'";

              mysqli_query($db,$query6)or die ('Error al actualizar la base de datos');
                echo"<br>";
                echo"ESPAGUUETI";
          echo $cantidad;

            }

            //Este  bloque aplica por si el combo lleva Alitas
            if ((strpos($description, 'Alitas') !== false) || (strpos($description, 'alitas') !== false)) {
//actualización de los productos pertenecientes al combo 
            $query7 = "UPDATE product SET QTY_STOCK=QTY_STOCK+$cantidad WHERE NAME LIKE'Alitas'AND CITY LIKE '{$_SESSION['CITY']}%'";
           mysqli_query($db,$query7)or die ('Error al actualizar la base de datos');

              }
        }

   }


?>


</table>

  <script type="text/javascript">

alert("Venta Cancelada con éxito.");window.location = "ventasdias.php";

</script> 