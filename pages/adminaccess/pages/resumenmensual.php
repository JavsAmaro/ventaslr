<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
  date_default_timezone_set('America/Mexico_City');

$script_tz = date_default_timezone_get();
            $today = date("Y-m"); 


$location = "No elegida";

$sql = "SELECT DISTINCT LOCATION_ID, CITY FROM location ORDER BY `CITY` ASC";
$result = mysqli_query($db, $sql) or die ("Bad SQL: $sql");

$opt = "<select class='form-control'style='width: auto;background-color:#FFCC01;    font-size: 20px; color:#fff;' name='location' required>
      <option value='' disabled selected hidden>Seleccionar Sucursal</option>";
  while ($row = mysqli_fetch_assoc($result)) {
    $opt .= "<option value='".$row['CITY']."'>".$row['CITY']." </option>";
  }

$opt .= "</select>";

 if(isset($_POST['submit'])) {
      $location = $_POST['location'];

  }
?>

<?php
 if(isset($_POST['submit'])) {
      $today = $_POST['date'];  }

$psucursal=0;
$papps=0;

            $mes = date("0-n-Y"); 
            $mesC = date("1-n-Y"); 

            $firstDay = date('Y-m-1',strtotime($today));

            $lastDay = date('Y-m-t',strtotime($today));


            $showdate = date('F-Y',strtotime($today));

             $totalPagos = 0;  
             $totalCajas=0;
             $caja=0;
              $ingreso=0;
              $compras=0;
              $gastos=0;
              $totalEfectivo =0;
              $cortedecaja=0;
              $pagos=0;
              $retiro=0;
              $cancelacion=0;
              $cierredecaja=0;
              $ventaDia =0;
              $corte =0;
              //metodos de pago
              $efectivo=1;
              $tarjeta=2;
              $didi=2;
              $uber=3;
              $rappi=5;  
              $ubertarjeta=4;
              $didiefectivo=7;
              $diditarjeta=8;
              $rappiefectivo=9;
              $rappitarjeta=10;
              $Totalcaja=0;
              $pagotarjeta=0;
              $pagoefectivo=0;
              $PagoEfectivo=0;
              $pagouber=0;
              $pagoubertarjeta=0;
              $pagodidiefectivo=0;
              $pagodiditarjeta=0;
              $pagorappiefectivo=0;
              $pagorappitarjeta=0;
              $pgastos =0;
              $pprovedores =0;
              $pagotarjeta=0;
?>


<?php
                    $query = "SELECT * FROM transaction WHERE date(DATE) BETWEEN '{$firstDay}%' AND '{$lastDay}%' AND CITY  LIKE  '{$location}%'";

                       $result = mysqli_query($db, $query) or die (mysqli_error($db));
                      while ($row = mysqli_fetch_assoc($result)) {

                  $ventaDia +=  $row['GRANDTOTAL'];
                  $totalCajas +=  $row['CANT_CAJAS'];
      }
  ?>

<?php     
      $query = "SELECT * FROM transaction WHERE METODO_PAGO LIKE '{$efectivo}%' AND date(DATE) BETWEEN '{$firstDay}%' AND '{$lastDay}%'  AND CITY  LIKE  '{$location}%'";
       $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
      while ($row = mysqli_fetch_assoc($result)) {
      $PagoEfectivo +=  $row['GRANDTOTAL'];

        }
?>

<!-------    Formas de Pago     --------->



<?php     
      $query = "SELECT * FROM transaction WHERE METODO_PAGO LIKE '{$efectivo}%' AND INTERMEDIARIO LIKE'{$efectivo}%' AND  date(DATE) BETWEEN '{$firstDay}%' AND '{$lastDay}%' AND CITY  LIKE  '{$location}%'";
       $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
      while ($row = mysqli_fetch_assoc($result)) {
      $pagoefectivo +=  $row['GRANDTOTAL'];

        }
?>
<?php    
       $query = "SELECT * FROM transaction WHERE METODO_PAGO LIKE '{$tarjeta}%'  AND INTERMEDIARIO LIKE'{$efectivo}%' AND  date(DATE) BETWEEN '{$firstDay}%' AND '{$lastDay}%' AND CITY  LIKE  '{$location}%'";
        $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
                      while ($row = mysqli_fetch_assoc($result)) {
         $pagotarjeta +=  $row['GRANDTOTAL'];

                      }
     
?>

<?php     
      $query = "SELECT * FROM transaction WHERE  METODO_PAGO LIKE '{$efectivo}%' AND INTERMEDIARIO LIKE'{$uber}%' AND date(DATE) BETWEEN '{$firstDay}%' AND '{$lastDay}%' AND CITY  LIKE  '{$location}%'";
       $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
      while ($row = mysqli_fetch_assoc($result)) {
      $pagouber +=  $row['GRANDTOTAL'];

        }
?>

<?php     
      $query = "SELECT * FROM transaction WHERE METODO_PAGO LIKE '{$efectivo}%' AND INTERMEDIARIO LIKE'{$rappi}%'  AND date(DATE) BETWEEN '{$firstDay}%' AND '{$lastDay}%' AND CITY  LIKE  '{$location}%'";
       $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
      while ($row = mysqli_fetch_assoc($result)) {
      $pagorappiefectivo +=  $row['GRANDTOTAL'];

        }
?>


<?php     
      $query = "SELECT * FROM transaction WHERE METODO_PAGO LIKE '{$tarjeta}%' AND INTERMEDIARIO LIKE'{$rappi}%' AND date(DATE) BETWEEN '{$firstDay}%' AND '{$lastDay}%' AND CITY  LIKE  '{$location}%'";
       $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
      while ($row = mysqli_fetch_assoc($result)) {
      $pagorappitarjeta +=  $row['GRANDTOTAL'];

        }
?>



<?php     
      $query = "SELECT * FROM transaction WHERE  METODO_PAGO LIKE '{$tarjeta}%' AND INTERMEDIARIO LIKE'{$uber}%' AND date(DATE) BETWEEN '{$firstDay}%' AND '{$lastDay}%'  AND CITY LIKE  '{$location}%'";
       $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
      while ($row = mysqli_fetch_assoc($result)) {
      $pagoubertarjeta +=  $row['GRANDTOTAL'];

        }
?>


<?php     
      $query = "SELECT * FROM transaction WHERE  METODO_PAGO LIKE '{$efectivo}%' AND INTERMEDIARIO LIKE'{$didi}%'  AND date(DATE) BETWEEN '{$firstDay}%' AND '{$lastDay}%'  AND CITY  LIKE  '{$location}%'";
       $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
      while ($row = mysqli_fetch_assoc($result)) {
      $pagodidiefectivo +=  $row['GRANDTOTAL'];

        }
?>

<?php     
      $query = "SELECT * FROM transaction WHERE  METODO_PAGO LIKE '{$tarjeta}%' AND INTERMEDIARIO LIKE'{$didi}%'  AND date(DATE) BETWEEN '{$firstDay}%' AND '{$lastDay}%'  AND CITY  LIKE  '{$location}%'";
       $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
      while ($row = mysqli_fetch_assoc($result)) {
      $pagodiditarjeta +=  $row['GRANDTOTAL'];

        }
?>


<?php  
//       $query = "SELECT * FROM cortes WHERE FECHA  LIKE '{$today}%'";

       $query = "SELECT * FROM cortes WHERE date(DATE) BETWEEN '{$firstDay}%' AND '{$lastDay}%' AND CITY  LIKE  '{$location}%'";
       $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
        while ($row = mysqli_fetch_assoc($result)) {
         
 if ($row['TIPO'] == 2){
        $pprovedores+=  $row['MONTO'];
        }
         if ($row['TIPO'] == 3){
        $pgastos +=  $row['MONTO'];
        }
         }

     ?>


              
 <?php  
    //Total de pagos con tarjeta
    $totalEfectivo = $pagoefectivo+$pagouber+$pagodidiefectivo+$pagorappiefectivo;
    //Total de pagos con tarjeta
    $totalTarjeta= $pagotarjeta+$pagoubertarjeta+$pagodiditarjeta+$pagorappitarjeta;
    //Total total 
     $totalPagos = $totalEfectivo+$totalTarjeta;

    //Gastos Totales
    $gastosTotales=$pprovedores+$pgastos;
    //Total utilidades
    $utilidadesTotales=$totalPagos-$gastosTotales;

    //Total Apps 
    $totalapps=$pagouber+$pagoubertarjeta+$pagodidiefectivo+$pagodiditarjeta+$pagorappiefectivo+$pagorappitarjeta;


   $pagototal=$pagoefectivo+$pagotarjeta;
?>
 
            <div class="card shadow mb-12">

              <div class="row" style="padding: 10px!important;">
            <div class="col-sm-12 col-md-3">

              <h4 class="m-2 font-weight-bold text-primary">Resumen del día<br> <?php echo $location ;  ?></h4>
            </div>



            <div class="col-sm-12 col-md-9" style="margin: auto;">

 <form action="" method="POST" style="display: flex;">

  <input type="month" id="date" name="date" value="<?php echo $today; ?>" required>

                                <b style=" align-self: center;font-size: x-large;padding: 0px 10px;"> EN </b>
        <?php
                  echo $opt;
                ?>

                <input type="submit" name="submit" value="Buscar">
              </form>
            </div>
              </div>


               <div class="row">
                <!-- Resumen General    --->
                <div class="col-sm-6 col-md-4">
                <table class="table table-bordered"  width="100%" cellspacing="0"> 
                  <tr  >
                    <td colspan="2" style="background-color: #FFA81A; color:#FFF; text-align: center;" > Resumen General</td>
                  </tr>
                    <tr>
                     <td>Ventas Totales</td>
                     <td style="color: #008f39">$<?php echo number_format($totalPagos, 2, '.', ','); ?></td>
                  </tr> 
                 
                  <tr>
                     <td>Gastos Totales</td>
                     <td style="color: #008f39">$<?php echo number_format($gastosTotales, 2, '.', ','); ?></td>
                  </tr> 
                   <tr style="color: #fff; background-color: #008f39">
                     <td>Utilidades Efectivo</td>
                     <td >$<?php echo number_format($utilidadesTotales, 2, '.', ','); ?></td>
                  </tr>
                    </table>
                    <h4 class="m-2 font-weight-bold text-primary">Total Cajas Vendidas: <?php echo $totalCajas; ?></h4>
                   <h4 class="m-2 font-weight-bold text-primary">Ventas Totales: <?php echo number_format($totalPagos, 2, '.', ','); ?></h4>
             
                  </div>

              <div class="col-sm-6 col-md-4">

   <table class="table table-bordered"  width="100%" cellspacing="0"> 
                  <tr  >
                    <td colspan="2" style="background-color: #FFA81A; color:#FFF; text-align: center;" > Ventas en Sucursal</td>
                  </tr>
                  <tr>
                     <td>Ventas con Efectivo</td>
                     <td style="color: #008f39">$<?php echo number_format($pagoefectivo, 2, '.', ','); ?></td>
                  </tr> 
                  <tr>
                     <td>Ventas con Tarjeta</td>
                     <td style="color: #008f39">$<?php echo number_format($pagotarjeta, 2, '.', ','); ?></td>
                  </tr> 
                  <tr style="color: #fff; background-color: #008f39">
                     <td>Ventas Totales</td>
                     <td style="color: #fff">$<?php echo number_format($pagototal, 2, '.', ','); ?></td>
                  </tr> 
 </table>




<!--

   <table class="table table-bordered"  width="100%" cellspacing="0"> 
                  <tr  >
                    <td colspan="2" style="background-color: #FFA81A; color:#FFF; text-align: center;" > Ventas en Totales</td>
                  </tr>

                  <tr>
                     <td>Ventas con Efectivo</td>
                     <td style="color: #008f39">$<?php echo number_format($PagoEfectivo, 2, '.', ','); ?></td>
                  </tr> 
                  <tr>
                     <td>Ventas con Tarjeta</td>
                     <td style="color: #008f39">$<?php echo number_format($totalTarjeta, 2, '.', ','); ?></td>
                  </tr> 
                  <tr style="color: #fff; background-color: #008f39">
                     <td>Ventas Totales</td>
                     <td >$<?php echo number_format($totalPagos, 2, '.', ','); ?></td>
                  </tr>
 </table>

-->
<h4 class="m-2 font-weight-bold text-primary">
                   <?php

                   if ($totalPagos!=0) {
                      //porcentaje de ventas en sucursal
                      $sumapagosucursal= $pagoefectivo+$pagotarjeta;
                      $psucursal= (100*$sumapagosucursal)/ $totalPagos;
                        //porcentaje de ventas en app
                      $sumapagotarjeta= $pagouber+$pagoubertarjeta+$pagodidiefectivo+$pagodiditarjeta + $pagorappiefectivo+$pagorappitarjeta;
                      $papps= (100*$sumapagotarjeta)/ $totalPagos;
                  echo "Porcentaje en sucursal:";             
                  echo number_format($psucursal, 2, '.', ',');  
                  echo "%";
                    echo "<br><br>";
                        echo "Porcentaje en APPs:";             
                  echo number_format($papps, 2, '.', ',');  
                  echo "% ";
                   }else{
                            echo "Aun no hay ventas";
                       }
                        ?>

</h4>


                </div>
              <div class="col-sm-6 col-md-4">

                  <table class="table table-bordered"  width="100%" cellspacing="0"> 
                <tr  >
                    <td colspan="2" style="background-color: #FFA81A; color:#FFF; text-align: center;" >Venta con App</td>
                  </tr>
                  

                  <tr>
                     <td style="font-weight: 800;">Concepto</td>
                     <td style="font-weight: 800;">Cantidad</td>
                  </tr>
                  <tr>
                     <td>UBER Efectivo</td>
                     <td>$<?php echo number_format($pagouber, 2, '.', ','); ?></td>
                  </tr> 
                  <tr>
                     <td>UBER Tarjeta</td>
                     <td>$<?php echo number_format($pagoubertarjeta, 2, '.', ','); ?></td>
                  </tr> 
                  <tr>
                     <td>DIDI Efectivo</td>
                     <td>$<?php echo number_format($pagodidiefectivo, 2, '.', ','); ?></td>
                  </tr>
                  <tr>
                     <td>DIDI Tarjeta</td>
                     <td>$<?php echo number_format($pagodiditarjeta, 2, '.', ','); ?></td>
                  </tr>
                 <tr>
                     <td>Rappi Efectivo</td>
                     <td>$<?php echo number_format($pagorappiefectivo, 2, '.', ','); ?></td>
                  </tr>
                  <tr>
                     <td>Rappi Tarjeta</td>
                     <td>$<?php echo number_format($pagorappitarjeta, 2, '.', ','); ?></td>
                  </tr>

                   <tr style="color: #fff; background-color: #008f39">
                     <td>Total</td>
                     <td>$<?php echo number_format($totalapps, 2, '.', ','); ?></td>
                  </tr>  
                  </table>   
              </div>
            </div>
          </div>
<?php
include'../includes/footer.php';
?>