<?php
include'../includes/connection.php';

	$qty_transac=0;
    $id_transac = $_POST['id_transac'];
    $motivo_cancelacion = $_POST['motivo_cancelacion'];



	$query = "UPDATE transaction set GRANDTOTAL = '0', MOTIVO_CANCEL = '{$motivo_cancelacion}', CANT_CAJAS = '0' WHERE TRANS_ID LIKE '{$id_transac}%' LIMIT 1";
	
     $result = mysqli_query($db, $query) or die (mysqli_error($db));
	

?>


<?php  /*

       $query = "SELECT * FROM transaction WHERE TRANS_ID LIKE '{$id_transac}%'";
       $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
        while ($row = mysqli_fetch_assoc($result)) {

      $qty_transac =  $row['TRANS_D_ID'];
         }*/
     ?>


<?php
/*
     echo $qty_transac;

$query2 = "UPDATE transaction_details set QTY = '0' WHERE TRANS_D_ID LIKE '{$qty_transac}%'";
	
     $result = mysqli_query($db, $query2) or die (mysqli_error($db));*/
?>

  <script type="text/javascript">

  alert("Venta Cancelada con éxito.");window.location = "ventasdias.php";

</script> 