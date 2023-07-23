<?php
include'../includes/connection.php';
session_start();
   $id_cortes = $_POST['id_corte'];
?>
<?php
                    $query = "SELECT * FROM cortes WHERE ID_CORTE LIKE '{$id_cortes}%'";

                       $result = mysqli_query($db, $query) or die (mysqli_error($db));
                      while ($row = mysqli_fetch_assoc($result)) {

                  $tipo =  $row['TIPO'];
                  $monto =  $row['MONTO'];
                  $fecha =  $row['DATE'];
                  $descripcion =  $row['DESCRIPCION'];
                  $proveedor =  $row['PROVEEDOR'];
                  $ciudad =  $row['CITY']; }
  ?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style.css"> <script src="script.js"></script>
    </head>
    <body>
        <div class="ticket">
            <img
                src="img/logo-lrp.png">
            <p class="centrado" style="margin: 5px 0px;">Little Rome Pizza<br>
            <?php echo  $_SESSION['CITY'];?>

            </p>
            <p class="centrado" style="margin: 5px 0px;">:::TRANSACCIÓN:::</h3>

           <table class="table table-bordered"  width="100%" cellspacing="0"> 
                  <tr  >
                    <td colspan="2" style="text-align: center;"class="centrado"></td>
                  </tr>
                  <tr>
                     <td>Id transccion</td>
                     <td >#<?php echo $id_cortes; ?></td>
                  </tr> 


                  <tr>
                     <td>Fecha</td>
                     <td ><?php echo $fecha; ?></td>
                  </tr> 

                  <tr>
                     <td>Tipo de transacción</td>
                     <td>
                   <?php   if($tipo == "1"){
                          echo 'Fondo Extra de Caja';
                           }if($tipo == "2"){
                             echo 'Pagos a proveedores';
                           } if($tipo == "3"){
                             echo 'Retiro';
                           } if($tipo == "4"){
                             echo 'Corte de ayer';
                           } if($tipo == "5"){
                             echo 'Cierre de Caja del Día Anterior';
                           } 
                  ?></td>
                  </tr> 
                  <tr>
                     <td>Descripcion</td>
                     <td ><?php echo $descripcion; ?></td>
                  </tr> 
                  <tr>
                     <td>Monto</td>
                     <td >$<?php echo $monto; ?></td>
                  </tr> 


                  <?php   if($tipo == "2"){
                  echo '<tr>
                     <td>Proveedor</td>
                     <td >';
                    echo $proveedor;
                     '</td>
                  </tr> ';
                           }
                  ?>







               </table>
                   
              <p class="centrado" style="font-size: 11px;">
              <a onclick="imprimir()"> ***VUELVA PRONTO***</a>
              <br>ESTE NO ES UN COMPROBANTE FISCAL</p>
        </div>
    </body>
</html>

<script type="text/javascript">

  window.print();

window.onafterprint = function(event) {
    window.location.href = 'cortes.php'
};

</script>