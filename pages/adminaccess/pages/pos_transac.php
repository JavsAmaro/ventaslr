<?php
include'../includes/connection.php';
session_start();

              $date = $_POST['date'];
              $customer = $_POST['customer'];
              $total = $_POST['totalPago'];
              $cash = $_POST['cash'];
              $emp = $_POST['employee'];
              $rol = $_POST['role'];
              $metodoPago = $_POST['metodoPago'];
              $intermediario = $_POST['intermediario'];
              $sucursal = $_POST['sucursal'];
              $totalcajas = $_POST['cant_cajas'];
              $comentarios = $_POST['comentarios'];
              $cupon = $_POST['cupon'];

$valor = $_POST["caja_valor"];
              $category_id = $_POST['category_id'];
              $description = $_POST['description'];
$total_duplicados = 0;
              if ($cash==0) {
                $cambio=0;
              }else{
              $cambio=  $cash-$total;
              }

              //imma make it trans uniq id
              $hoy = date("mdGis"); 


              $today = $hoy; 

              $countID = count($_POST['name']);





                  

if($cupon != NULL) {


              // echo "<table>";
              switch($_GET['action']){
                case 'add':                    
                   
                   $queryc = "INSERT INTO `cupones`
                               (`ID_CUPON`,  `DATE`,`CODIGO`,  `DESCRIPCION`, `DESCUENTO`, `CITY`)
                               VALUES (Null, '$date','$cupon', '$today/$sucursal', '$valor', '{$sucursal}' )";

                    mysqli_query($db,$queryc)or die (mysqli_error($db));
          break;
              
          } 


 $query0 = "SELECT count(*) AS total_duplicados
FROM (
SELECT CODIGO FROM cupones WHERE CODIGO LIKE '{$cupon}%' AND CITY  LIKE '{$_SESSION['CITY']}%'
GROUP BY CODIGO HAVING COUNT(CODIGO) > 1
) as ver";
                       $result0 = mysqli_query($db, $query0) or die (mysqli_error($db));
                      while ($row0 = mysqli_fetch_assoc($result0)) {

                        $total_duplicados= $row0['total_duplicados'];
              }


}


if( $total_duplicados == 0) {


     $query1 = "SELECT COUNT(*) AS `count` FROM transaction WHERE DATE LIKE '{$date}%' AND CITY  LIKE '{$_SESSION['CITY']}%' ";
           $result = mysqli_query($db, $query1) or die (mysqli_error($db));

        while ($row = mysqli_fetch_assoc($result)) {
          $count = $row['count'];

        }

                    $query3 = "UPDATE product SET QTY_STOCK=QTY_STOCK-$totalcajas WHERE NAME LIKE'Cajas'AND CITY LIKE '{$_SESSION['CITY']}%'";

                    mysqli_query($db,$query3)or die ('Error al actualizar la base de datos');


if($count == 0){


              // echo "<table>";
              switch($_GET['action']){
                case 'add':  
                for($i=1; $i<=$countID; $i++)
                  {
                   
                   $query = "INSERT INTO `transaction_details`
                               (`ID`, `TRANS_D_ID`, `PRODUCTS`, `QTY`, `PRICE`, `EMPLOYEE`, `ROLE`)
                               VALUES (Null,  '$today/$sucursal', '".$_POST['name'][$i-1]."', '".$_POST['quantity'][$i-1]."', '".$_POST['price'][$i-1]."', '{$emp}', '{$rol}')";

                    mysqli_query($db,$query)or die (mysqli_error($db));



                   $query3 = "UPDATE product SET QTY_STOCK=QTY_STOCK-'".$_POST['quantity'][$i-1]."' WHERE NAME LIKE '".$_POST['name'][$i-1]."' AND CITY LIKE '{$_SESSION['CITY']}%'";

                    mysqli_query($db,$query3)or die ('Error al actualizar la base de datos');


                    $totalItems +=  $_POST['quantity'][$i-1];
                    }
                    $query111 = "INSERT INTO `transaction`
                               (`TRANS_ID`, `CUST_ID`, `NUMOFITEMS`, `GRANDTOTAL`, `CASH`, `DATE`, `TRANS_D_ID`, `METODO_PAGO`,`INTERMEDIARIO`,`CITY`,`CANT_CAJAS`,`COMENTARIOS`)
                               VALUES (Null,'{$customer}','{$totalItems}','{$total}','{$cash}','{$date}','$today/$sucursal','{$metodoPago}', '{$intermediario}','{$sucursal}','{$totalcajas}','{$comentarios}')";
                    mysqli_query($db,$query111)or die (mysqli_error($db));
          break;
              }
          }                   
          unset($_SESSION['pointofsale']);
              


}



               ?>          
          </div>

 <?php

if( $total_duplicados != 0) {
?>


              <script type="text/javascript">

   alert("La venta no se concreto. CUPON USADO");
       window.location.href = 'pos.php'


              </script>

 <?php
}
   ?>           


 <?php

if( $total_duplicados == 0) {
?>


              <script type="text/javascript">

  window.print();

              </script>

 <?php
}
   ?> 





 <?php
 //ciclo for para procesar si cada uno de los productos forma parte de un combo 
  for($i=1; $i<=$countID; $i++){
    //verificacion si pertenece a la categoria

    if( $_POST['category_id'][$i-1] == 7 || $_POST['category_id'][$i-1] == 14 || $_POST['category_id'][$i-1] == 24 || $_POST['category_id'][$i-1] == 44 ) {

            //Este  bloque aplica por si el combo lleva Coca-Cola 2L

            if ((strpos($_POST['description'][$i-1], 'Coca-Cola 2L') !== false) || (strpos($_POST['description'][$i-1], 'coca-cola 2L') !== false)){
//actualización de los productos pertenecientes al combo 
            $query3 = "UPDATE product SET QTY_STOCK=QTY_STOCK-'".$_POST['quantity'][$i-1]."' WHERE NAME LIKE'Coca-Cola 2L'AND CITY LIKE '{$_SESSION['CITY']}%'";

                mysqli_query($db,$query3)or die ('Error al actualizar la base de datos');
            }

            //Este  bloque aplica por si el combo lleva Espagueti
            if ((strpos($_POST['description'][$i-1], 'Espagueti') !== false) || (strpos($_POST['description'][$i-1], 'espagueti') !== false)) {
//actualización de los productos pertenecientes al combo 
            $query3 = "UPDATE product SET QTY_STOCK=QTY_STOCK-'".$_POST['quantity'][$i-1]."' WHERE NAME LIKE'Espagueti'AND CITY LIKE '{$_SESSION['CITY']}%'";

                mysqli_query($db,$query3)or die ('Error al actualizar la base de datos');
            }

            //Este  bloque aplica por si el combo lleva Alitas
            if ((strpos($_POST['description'][$i-1], 'Alitas') !== false) || (strpos($_POST['description'][$i-1], 'alitas') !== false)) {
//actualización de los productos pertenecientes al combo 
            $query3 = "UPDATE product SET QTY_STOCK=QTY_STOCK-'".$_POST['quantity'][$i-1]."' WHERE NAME LIKE'Alitas'AND CITY LIKE '{$_SESSION['CITY']}%'";
             mysqli_query($db,$query3)or die ('Error al actualizar la base de datos');
              }
  }
}
?>


<!-- Para activa la Impresion automatica se debe activar el modo kiosko en el navegador
  PARA CHROME:

1) Abre el navegador e imprime una página de prueba para configurar los parámetros de la impresora

2) cerrar todo el chrome

2) Crea un nuevo acceso directo del google Chrome

3) Hacer click con el botón derecho del mouse para ver el menú contextual del acceso directo creado para “google Chrome” y seleccionar propiedades.

4) en el campo de la ruta target: colocar el final el parámetro: --kiosk-printing

5) aplicar cambios y OK

6) Ejecutar el nuevo acceso directo de Chrome

7) Probar el codigo de impresión nuevamente.
--->

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
              <?php echo $sucursal;?>
            </p>
            <p class="centrado" style="margin: 5px 0px;"><?php echo $today;?><?php echo $sucursal;?> </h3>

            <table style="width: 100%;">
                <tbody>
                    <tr>
                        <td >Fecha</td>
                        <td ><?php echo date("d-m-Y H:i:s", strtotime($date) ); ?></td>
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
                     for($i=1; $i<=$countID; $i++){
                        echo "<tr>";
                        echo "<td >" . $_POST['name'][$i-1] ."</td>";
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








        <div class="ticket">
            <img
                src="img/logo-lrp.png">
            <p class="centrado" style="margin: 5px 0px;">Little Rome Pizza<br>
              <?php echo $sucursal;?>
            </p>
            <p class="centrado" style="margin: 5px 0px;"><?php echo $today;?> <?php echo $sucursal;?></h3>

            <table style="width: 100%;">
                <tbody>
                    <tr>
                        <td >Fecha</td>
                        <td ><?php echo date("d-m-Y H:i:s", strtotime($date) ); ?></td>
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
                        <td style='width: 65%;'>Producto</td>
                        <td style='width: 15%;'>Cant. </td>
                        <td style='width: 20%;'>Precio</td>

                    </tr>
                    <?php
                     for($i=1; $i<=$countID; $i++){
                        echo "<tr>";
                        echo "<td >" . $_POST['name'][$i-1] ."</td>";
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



    </body>
</html>

<script type="text/javascript">

window.onafterprint = function(event) {
    window.location.href = 'pos.php'
};

</script>
