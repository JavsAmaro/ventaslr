<?php
include'../includes/connection.php';
session_start();

date_default_timezone_set('America/Mexico_City');

$script_tz = date_default_timezone_get();
            $today = date("j-n-Y H:i:s"); 
$id = $_GET['id'];
$query = 'SELECT * FROM transaction WHERE TRANS_ID ='.$_GET['id'];

// echo $id;
$result = mysqli_query($db, $query) or die(mysqli_error($db));
  while($row = mysqli_fetch_array($result))
  {   
    $zz= $row['CUST_ID'];
    $i= $row['NUMOFITEMS'];
    $a=$row['GRANDTOTAL'];
    $b=$row['CASH'];
    $c=$row['INTERMEDIARIO'];
    $d=$row['METODO_PAGO'];
    $cajas=$row['CANT_CAJAS'];

    $motivo_cancelacion=$row['MOTIVO_CANCEL'];
    $fechahoy= $row['DATE'];
    $trans_d_id=$row['TRANS_D_ID'];


  }


?>
<?php

  $query3 = "SELECT * FROM customer WHERE CUST_ID = '{$zz}%'";
  $result3 = mysqli_query($db, $query3) or die(mysqli_error($db));
 

  
while($row = mysqli_fetch_array($result3))
    {   
      $nombre= $row['FIRST_NAME'];
      $apellido= $row['LAST_NAME'];
      $telefono=$row['PHONE_NUMBER'];
      $direccion=$row['DIRECCION'];


    }  
      ?>
           
         
          

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style.css"> <script src="script.js"></script>
    </head>
    <body onload="window.print()">
        <div class="ticket">
            <img
                src="img/logo-ticket.png">
            <p class="centrado" style="margin: 5px 0px;">Little Rome Pizza<br>
              <?php echo $sucursal;?>
            </p>
            <p class="centrado" style="margin: 5px 0px;"><?php echo $today;?><?php echo $sucursal;?> </h3>

            <table style="width: 100%;">
                <tbody>
                    <tr>
                       <!-- <td >Fecha</td>
                         <td ><?php echo date("d-m-Y H:i:s", strtotime($date) ); ?></td> -->
                    </tr>
                    <tr>
                        <td >Cajero: </td>
                        <td ><?php echo $emp;?></td>
                    </tr>
                  </tbody>
            </table>
             <p class="centrado" style="margin: 5px 0px;">Productos Cobrados</p>
            <table style="width: 100%;">

                <tbody>
                    <tr>
                        <td style='width: 70%;'>Producto</td>
                        <td style='width: 10%;'>Cant. </td>
                        <td style='width: 20%;'>Precio</td>

                    </tr>
                    <?php




$query2 = 'SELECT * FROM transaction_details,transaction WHERE transaction.TRANS_D_ID = transaction_details.TRANS_D_ID AND TRANS_ID ='.$_GET['id'];

  $res = mysqli_query($db, $query2) or die(mysqli_error($db));
    while ($row = mysqli_fetch_assoc($res)) {
                      echo '<tr>';
                      echo '<td>'. $row['PRODUCTS'].'</td>';
                    
                      echo '<td>'. $row['QTY'].'</td>';
                      echo '<td>'. $row['PRICE'].'</td>';

                      echo '</tr>';
                      echo "<tr>";
                      echo "<td colspan='3' >(" . $_POST['ingrediente1'][$i-1] ."-". $_POST['ingrediente2'][$i-1] .")</td>";

                    
                      echo "</tr>";

      }  



                     for($i=1; $i<=$countID; $i++){
                        echo "<tr>";
                        echo "<td >" . $_POST['product'][$i-1] ."</td>";
                        echo "<td >" . $_POST['quantity'][$i-1] . "</td>";
                        echo "<td >$" . $_POST['price'][$i-1] . "</td>";
                        echo "</tr>";
                       
                  }
?>

                </tbody>
            </table>
            <p>Comentarios: <?php echo $comentarios;?> </p>

            <table style="width: 100%;">
                <tbody>
                    <tr>
                        <td >Total: </td>
                        <td >$<?php echo $total;?></td>
                    </tr>
                    <tr>
                        <td >Pago con:</td>

                        <td >$<?php 
             if ($metodoPago == 1) {
                      echo $cash;
                  } elseif ($metodoPago == 2) {
                      echo $total;
                  } 
                  ?>   
               </td>
                    </tr>
                    <tr>
                        <td >Cambio:</td>
                        <td >$<?php echo $cambio;?></td>
                    </tr>
                  </tbody>
            </table>
 <?php                  

 echo "<p class='centrado' style='margin: 5px 0px;'>";
 
                if ($intermediario == 1) {
                      echo "-Entrega en Caja-<br> Little Rome</p>";
                  } elseif ($intermediario == 2) {
                      echo "-Entrega en Domicilio-<br> DIDI</p>";
                  } elseif ($intermediario == 3) {
                      echo "-Entrega en Domicilio-<br>UBER</p>";
                  } elseif ($intermediario == 4) {
                      echo "-Entrega en Domicilio-<br>Sin Delantal</p>";
                  } elseif ($intermediario == 5) {
                      echo "-Entrega en Domicilio-<br>Rappi</p>";
                  } 




 echo "<p class='centrado' style='margin: 5px 0px;'>";

             if ($metodoPago == 1) {
                      echo "Método de pago<br>Efectivo</p>";
                  } elseif ($metodoPago == 2) {
                      echo "Método de pago<br>Tarjeta de Débito/Crédito</p>";
                  } 




                  $query = "SELECT * FROM customer WHERE CUST_ID LIKE '{$customer}%' LIMIT 1";
                       $result = mysqli_query($db, $query) or die (mysqli_error($db));
                                  
                  while ($row = mysqli_fetch_assoc($result)){
    echo "Nombre: ".$row["FIRST_NAME"].' '.$row["LAST_NAME"]."<br>
    Direccion: ".$row["DIRECCION"]."<br>Telefono: ".$row["PHONE_NUMBER"]."";
  }
   
?>




            <p class="centrado" style="font-size: 11px;">
               ***VUELVA PRONTO***
              <br>ESTE NO ES UN COMPROBANTE FISCAL</p>

        </div>



<br><br><br><br>





    </body>
</html>

<script type="text/javascript">

window.onafterprint = function(event) {
    window.location.href = 'pos.php'
};

</script>
