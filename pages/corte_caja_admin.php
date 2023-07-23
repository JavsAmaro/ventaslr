<?php
include'../includes/connection.php';
include'../includes/topp.php';
 $today = date("Y-m-d");
 $manana = date("Y-m-d", strtotime("+1 day"));

?>
<style>

.submenu {
height: 50px; 
width:100%; /*full width*/
    text-align:center;
    display:table;
}

.submenu:hover{
background-color: #500D76;

}

    

 .submenu h4{
  margin:0;
    padding:0;
    vertical-align:middle; /*middle centred*/
    display:table-cell;
    font-weight: 800;
}


 .submenu:hover h4{
 color: #fff!important;
}


</style>
<?php


?> 

<?php 


   date_default_timezone_set('America/Mexico_City');

$script_tz = date_default_timezone_get();

  if(isset($_POST['submit'])) {
      $today = $_POST['date'];
  }


$manana = DateTime::createFromFormat("Y-m-d", $today);
$manana->modify('tomorrow');
$manana = $manana->format('Y-m-d');

//            $today = date("yy-m-d"); 
            //$ayer =date($today,strtotime("-1 days"));//////dia anterior
            

            $corte=0;
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
              $totalCajas=0;
              //metodos de pago
              $efectivo=1;
              $tarjeta=2;
              $didi=2;
              $uber=3;
              $sindelantal=4;
              $rappi=5;
              $ubertarjeta=4;
              $sdefectivo=5;
              $sdtarjeta=6;
              $didiefectivo=7;
              $diditarjeta=8;
              $rappiefectivo=9;
              $rappitarjeta=10;
              $Totalcaja=0;

              $pagotarjeta=0;

              $pagoefectivo=0;

              $PagoEfectivo=0;
              $PagoTarjeta=0;
              $pagouber=0;
              $pagoubertarjeta=0;
              $pagosdefectivo=0;
              $pagosdtarjeta=0;
              $pagodidiefectivo=0;
              $pagodiditarjeta=0;
              $pagorappiefectivo=0;
              $pagorappitarjeta=0;

             

?> 
<?php

                    $query = "SELECT * FROM transaction WHERE date(DATE)  LIKE '{$today}%' AND CITY  LIKE '{$_SESSION['CITY']}%'";

                       $result = mysqli_query($db, $query) or die (mysqli_error($db));
                      while ($row = mysqli_fetch_assoc($result)) {

                  $ventaDia +=  $row['GRANDTOTAL'];
                  $totalCajas +=  $row['CANT_CAJAS'];

                      }
  ?>



<?php     
      $query = "SELECT * FROM transaction WHERE METODO_PAGO LIKE '{$efectivo}%' AND date(DATE)  LIKE '{$today}%' AND CITY  LIKE '{$_SESSION['CITY']}%'";
       $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
      while ($row = mysqli_fetch_assoc($result)) {
      $PagoEfectivo +=  $row['GRANDTOTAL'];

        }
?>

<?php    
       $query = "SELECT * FROM transaction WHERE date(DATE)  LIKE '{$today}%' AND METODO_PAGO LIKE '{$tarjeta}%' AND CITY  LIKE '{$_SESSION['CITY']}%'";
        $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
                      while ($row = mysqli_fetch_assoc($result)) {
         $PagoTarjeta +=  $row['GRANDTOTAL'];

                      }
     
?>


<?php     
      $query = "SELECT * FROM transaction WHERE METODO_PAGO LIKE '{$efectivo}%' AND INTERMEDIARIO LIKE'{$efectivo}%' AND date(DATE)  LIKE '{$today}%' AND CITY  LIKE '{$_SESSION['CITY']}%'";
       $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
      while ($row = mysqli_fetch_assoc($result)) {
      $pagoefectivo +=  $row['GRANDTOTAL'];

        }
?>

<?php    
       $query = "SELECT * FROM transaction WHERE METODO_PAGO LIKE '{$tarjeta}%'  AND INTERMEDIARIO LIKE'{$efectivo}%' AND date(DATE)  LIKE '{$today}%' AND CITY  LIKE '{$_SESSION['CITY']}%'";
        $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
                      while ($row = mysqli_fetch_assoc($result)) {
         $pagotarjeta +=  $row['GRANDTOTAL'];

                      }
     
?>

<!-------    Formas de Pago     --------->
<?php     
      $query = "SELECT * FROM transaction WHERE  METODO_PAGO LIKE '{$efectivo}%' AND INTERMEDIARIO LIKE'{$uber}%' AND date(DATE)  LIKE '{$today}%' AND CITY  LIKE '{$_SESSION['CITY']}%'";
       $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
      while ($row = mysqli_fetch_assoc($result)) {
      $pagouber +=  $row['GRANDTOTAL'];

        }
?>
<?php     
      $query = "SELECT * FROM transaction WHERE  METODO_PAGO LIKE '{$tarjeta}%' AND INTERMEDIARIO LIKE'{$uber}%' AND date(DATE)  LIKE '{$today}%' AND CITY  LIKE '{$_SESSION['CITY']}%'";
       $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
      while ($row = mysqli_fetch_assoc($result)) {
      $pagoubertarjeta +=  $row['GRANDTOTAL'];

        }
?>

<?php     
      $query = "SELECT * FROM transaction WHERE  METODO_PAGO LIKE '{$efectivo}%' AND INTERMEDIARIO LIKE'{$sindelantal}%' AND date(DATE)  LIKE '{$today}%' AND CITY  LIKE '{$_SESSION['CITY']}%'";
       $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
      while ($row = mysqli_fetch_assoc($result)) {
      $pagosdefectivo +=  $row['GRANDTOTAL'];

        }
?>


<?php     
      $query = "SELECT * FROM transaction WHERE METODO_PAGO LIKE '{$tarjeta}%' AND INTERMEDIARIO LIKE'{$sindelantal}%'  AND date(DATE)  LIKE '{$today}%' AND CITY  LIKE '{$_SESSION['CITY']}%'";
       $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
      while ($row = mysqli_fetch_assoc($result)) {
      $pagosdtarjeta +=  $row['GRANDTOTAL'];

        }
?>


<?php     
      $query = "SELECT * FROM transaction WHERE  METODO_PAGO LIKE '{$efectivo}%' AND INTERMEDIARIO LIKE'{$didi}%'  AND date(DATE)  LIKE '{$today}%' AND CITY  LIKE '{$_SESSION['CITY']}%'";
       $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
      while ($row = mysqli_fetch_assoc($result)) {
      $pagodidiefectivo +=  $row['GRANDTOTAL'];

        }
?>

<?php     
      $query = "SELECT * FROM transaction WHERE  METODO_PAGO LIKE '{$tarjeta}%' AND INTERMEDIARIO LIKE'{$didi}%'  AND date(DATE)  LIKE '{$today}%' AND CITY  LIKE '{$_SESSION['CITY']}%'";
       $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
      while ($row = mysqli_fetch_assoc($result)) {
      $pagodiditarjeta +=  $row['GRANDTOTAL'];

        }
?>

<?php     
      $query = "SELECT * FROM transaction WHERE METODO_PAGO LIKE '{$efectivo}%' AND INTERMEDIARIO LIKE'{$rappi}%'  AND date(DATE)  LIKE '{$today}%' AND CITY  LIKE '{$_SESSION['CITY']}%'";
       $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
      while ($row = mysqli_fetch_assoc($result)) {
      $pagorappiefectivo +=  $row['GRANDTOTAL'];

        }
?>


<?php     
      $query = "SELECT * FROM transaction WHERE METODO_PAGO LIKE '{$tarjeta}%' AND INTERMEDIARIO LIKE'{$rappi}%' AND date(DATE)  LIKE '{$today}%' AND CITY  LIKE '{$_SESSION['CITY']}%'";
       $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
      while ($row = mysqli_fetch_assoc($result)) {
      $pagorappitarjeta +=  $row['GRANDTOTAL'];

        }
?>



<?php  
//       $query = "SELECT * FROM cortes WHERE date(DATE)  LIKE '{$today}%'";

       $query = "SELECT * FROM cortes WHERE date(DATE)  LIKE '{$manana}%' AND CITY  LIKE '{$_SESSION['CITY']}%'";
       $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
        while ($row = mysqli_fetch_assoc($result)) {

           if ($row['TIPO'] == 4){
      $Totalcaja +=  $row['MONTO'];
        }



         }

     ?>




   <?php                  
                      $query = "SELECT PROVEEDOR, DESCRIPCION, SUM(MONTO) as MONTO_TC FROM cortes
                      INNER JOIN supplier WHERE supplier.COMPANY_NAME = cortes.PROVEEDOR AND date(DATE) LIKE '{$today}%' AND TIPO LIKE '2' AND supplier.TYPE LIKE '1' AND  cortes.CITY  LIKE '{$_SESSION['CITY']}%' GROUP BY supplier.COMPANY_NAME";
                      $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
                      while ($row = mysqli_fetch_assoc($result)) {
     
                            $compras +=  $row['MONTO_TC'];

                      }
                    ?>
                    
<?php  

       $query = "SELECT * FROM cortes WHERE date(DATE)  LIKE '{$today}%' AND CITY  LIKE '{$_SESSION['CITY']}%'";
       $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
        while ($row = mysqli_fetch_assoc($result)) {
         
 if ($row['TIPO'] == 1){
        $ingreso +=  $row['MONTO'];
        }
/*
         if ($row['TIPO'] == 2){
        $compras +=  $row['MONTO'];
        }*/
         if ($row['TIPO'] == 3){
        $retiro +=  $row['MONTO'];
        }
 if ($row['TIPO'] == 4){
        $corte +=  $row['MONTO'];
        }

         }

     ?>



 <?php  
        $fondo=$ingreso;


 $totalEfectivo = $PagoEfectivo+$pagouber+$pagosdefectivo+$pagodidiefectivo+$pagorappiefectivo;

              $totalTarjeta= $PagoTarjeta+$pagoubertarjeta+$pagosdtarjeta+$pagodiditarjeta+$pagorappitarjeta;

 //$totalPagos = $totalEfectivo+$totalTarjeta;

$salidaEfectivo=$retiro+$compras;

//$caja =  ($fondo+$PagoEfectivo)-($salidaEfectivo);
$caja=$PagoEfectivo+$fondo+$corte-$retiro-$compras;


$fondoInicial=$corte+$fondo;





$totalcorte=$caja-$Totalcaja;
/*
if ($Totalcaja==0) {

$totalcorte=0;

}else{

$totalcorte=$caja-$Totalcaja;

}*/
   ?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

               <div class="row">
                <div class="col-lg-12">



                  <div class="card shadow mb-0">
                  <div class="card-header py-2 row">

            <div class="col-2" style="text-align: center;">

                    <a href="corte_caja.php"  >
                      <div class="submenu" style="background-color: #FA4616!important">
                       <h4 class="m-1 text-lg text-primary" style="color: #fff!important; ">Corte</h4>
                       </div>
                    </a>
              <br>
                                        
              <form action="" method="POST">
                <input type="text" id="date" name="date" placeholder="Fecha hoy <?php echo date("d-m-Y", strtotime($today) ); ?>" autocomplete="off" required>
                <input type="submit" name="submit" value="Buscar">
              </form>

              <script type="text/javascript">
              $( "#date" ).datepicker({
                  dateFormat: 'yy-mm-dd',
                  altFormat : "yy-mm-dd",
                  altField  : '#alternate',
                  onSelect  : function() {
                  
                      // proof
                      console.log( $('#alternate').val() );
                  }
              });
              </script>

                </div>

                   <div class="col-2" style="text-align: center;">
                      <a href="ventasdias.php">
                        <div class="submenu" >
                       <h4 class="m-1 text-lg text-primary">Ventas del Día</h4>
                     </div>
                       </a>
                     </div>

                    <div class="col-2" style="text-align: center;">
                      <a href="pedidos.php">
                      <div class="submenu" >
                       <h4 class="m-1 text-lg text-primary">Ventas Anteriores</h4>
                      </div>
                       </a>
                     </div>

                      <div class="col-3" style="text-align: center;">
                      <a href="cortes.php">
                       <div class="submenu" >
                       <h4 class="m-1 text-lg text-primary">Movimientos de Caja</h4>
                        </div>
                       </a>
                     </div>

                <div class="col-3" style="text-align: right;">
                  <span class="m-2 font-weight-bold ">Sucursal <?php echo  $_SESSION['CITY'];?> </span><br>
              <span class="m-2 font-weight-bold ">Fondo Inicial &nbsp; $<?php echo $fondoInicial; ?>  </span><br>
               <span class="m-2 font-weight-bold text-primary">Salida de Efectivo &nbsp; $<?php echo $salidaEfectivo; ?>          </span><br>

              <span class="m-2 font-weight-bold ">Efectivo en Caja &nbsp; $<?php echo $caja; ?>
              </span><br>

              <span class="m-2 font-weight-bold ">Pagos en Efectivo &nbsp; $<?php echo $PagoEfectivo; ?>
              </span><br>
              <span class="m-2 font-weight-bold ">Pagos Con Tarjeta &nbsp; $<?php echo $PagoTarjeta; ?>
              </span><br>
               <span class="m-2 font-weight-bold ">Ventas de Hoy &nbsp; $<?php echo $ventaDia; ?>
              </span><br>

         </div>
</div></div>

            
            <div class="card shadow mb-12">
              <div class="row">
            <div class="card-header py-12 col-sm-6 col-md-8">
              <h4 class="m-2 font-weight-bold text-primary">Resumen del día</h4>
            </div>
            <!--
            <div class="card-header py-12 col-sm-3 col-md-2">
<a href="#" data-toggle="modal" data-target="#corteCajaModal" type="button" class="btn btn-danger bg-gradient-danger" style="border-radius: 0px;"><i >Cerrar Caja</i></a>
            </div>-->
            <div class="card-header py-12 col-sm-3 col-md-4" style="text-align-last: right;">


              <form action="imprimir_corte_caja.php" method="post">
               <input type="hidden" name="today" value="<?php echo $today; ?>" />
               <input type="submit" class="btn btn-danger bg-gradient-danger" style="border-radius: 0px;" value="Imprimir" />
              </form>
        <!-- <a href="#" data-toggle="modal" data-target="#corteModal" type="button" class="btn btn-danger bg-gradient-danger" style="border-radius: 0px;"><i> Imprimir</i></a>  -->          
            </div>

              </div>


               <div class="row">
                <div class="col-sm-6 col-md-4">

                <table class="table table-bordered"  width="100%" cellspacing="0"> 
                  <tr  >
                    <td colspan="2" style="background-color: #FFA81A; color:#FFF; text-align: center;" > Resumen General de Caja</td>
                  </tr>
                  <tr>
                     <td style="font-weight: 800;">Concepto</td>
                     <td style="font-weight: 800;">Cantidad</td>
                  </tr>
                    <tr>
                     <td>Fondo Inicial</td>
                     <td style="color: #008f39">$<?php echo $corte; ?></td>
                  </tr> 
                 
                  <tr>
                     <td>Fondo Caja Extra</td>
                     <td style="color: #008f39">$<?php echo $fondo; ?></td>
                  </tr> 

                   <tr>
                     <td>Ventas Efectivo</td>
                     <td style="color: #008f39">$<?php echo $PagoEfectivo; ?></td>
                  </tr>


                  <tr>
                     <td>Pago a Proveedores</td>
                     <td style="color: #ff0000">$<?php echo $compras; ?></td>
                  </tr> 

                  <tr>
                     <td>Retiros en efectivo</td>
                     <td style="color: #ff0000">$<?php echo $retiro; ?></td>
                  </tr>

                   <tr style="color: #fff;  background-color: #FFA81A">
                     <td>Subtotal en Caja</td>
                     <td>$<?php echo $caja; ?></td>
                  </tr>    

                  <tr style="color: #fff; background-color: #FA4616">
                     <td>Corte Del Día</td>
                     <td>$<?php echo $totalcorte; ?></td>
                  </tr>   

                  <tr style="color: #fff; background-color: #008f39">
                     <td>Fondo Caja Final </td>
                     <td>$<?php echo $Totalcaja; ?></td>
                  </tr> 

                    </table>
                </div>
              <div class="col-sm-6 col-md-4">

              <table class="table table-bordered"  width="100%" cellspacing="0"> 
              <tr  >
                    <td colspan="2" style="background-color: #FFA81A; color:#FFF; text-align: center;" >Pago con Efectivo</td>
                  </tr>
                   <tr>
                     <td style="font-weight: 800;">Concepto</td>
                     <td style="font-weight: 800;">Cantidad</td>
                  </tr>

                   <tr>
                     <td>Efectivo en caja</td>
                     <td>$<?php echo $pagoefectivo; ?></td>
                  </tr>

                  <tr>
                     <td>UBER Efectivo</td>
                     <td>$<?php echo $pagouber; ?></td>
                  </tr> 

                  <tr>
                     <td>SD Efectivo</td>
                     <td>$<?php echo $pagosdefectivo; ?></td>
                  </tr> 

   
                    <tr>
                     <td>DIDI Efectivo</td>
                     <td>$<?php echo $pagodidiefectivo; ?></td>
                  </tr>


                         <tr>
                     <td>Rappi Efectivo</td>
                     <td>$<?php echo $pagorappiefectivo; ?></td>
                  </tr>

      
                   <tr style="color: #fff; background-color: #008f39">
                     <td>Total</td>
                     <td>$<?php echo $PagoEfectivo; ?></td>
                  </tr>  

                  </table> 
                </div>
              <div class="col-sm-6 col-md-4">

                  <table class="table table-bordered"  width="100%" cellspacing="0"> 
                <tr  >
                    <td colspan="2" style="background-color: #FFA81A; color:#FFF; text-align: center;" >Pago con Tarjeta</td>
                  </tr>
                  

                  <tr>
                     <td style="font-weight: 800;">Concepto</td>
                     <td style="font-weight: 800;">Cantidad</td>
                  </tr>

                   <tr>
                     <td>Tarjeta En Caja</td>
                     <td>$<?php echo $pagotarjeta; ?></td>
                  </tr> 

                  <tr>
                     <td>UBER Tarjeta</td>
                     <td>$<?php echo $pagoubertarjeta; ?></td>
                  </tr> 

                 <tr>
                     <td>SD Tarjeta</td>
                     <td>$<?php echo $pagosdtarjeta; ?></td>
                  </tr>

                  <tr>
                     <td>DIDI Tarjeta</td>
                     <td>$<?php echo $pagodiditarjeta; ?></td>
                  </tr>

                 <tr>
                     <td>Rappi Tarjeta</td>
                     <td>$<?php echo $pagorappitarjeta; ?></td>
                  </tr>

                   <tr style="color: #fff; background-color: #008f39">
                     <td>Total</td>
                     <td>$<?php echo $PagoTarjeta; ?></td>
                  </tr>  
                  </table>   

                   <h4 class="m-2 font-weight-bold text-primary">Total Cajas Vendidas: <?php echo $totalCajas; ?></h4>
                   <h4 class="m-2 font-weight-bold text-primary">Ventas Totales: <?php echo $ventaDia; ?></h4>

              </div>
            </div>
          </div>

<script type="text/javascript">
function dia_anterior($fecha)
{
    $sol = (strtotime($fecha) - 3600);
    return date('yy-m-d', $sol);
}
 
</script>
<?php
include'../includes/footer.php';
?>
