<?php
include'../includes/connection.php';
/*include'../includes/topp.php';*/
session_start();
   $today = $_POST['today'];
   $sucursal = $_POST['sucursal'];

 //$today = date("j-n-Y");
   $manana = DateTime::createFromFormat("Y-m-d", $today);
$manana->modify('tomorrow');
$manana = $manana->format('Y-m-d');
?>

<?php 


   date_default_timezone_set('America/Mexico_City');

$script_tz = date_default_timezone_get();

 /* if(isset($_POST['submit'])) {
      $today = $_POST['today'];
  }*/


//            $today = date("j-n-Y"); 
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

                    $query = "SELECT * FROM transaction WHERE DATE  LIKE '{$today}%' AND CITY  LIKE '{$_SESSION['CITY']}%'";

                       $result = mysqli_query($db, $query) or die (mysqli_error($db));
                      while ($row = mysqli_fetch_assoc($result)) {

                  $ventaDia +=  $row['GRANDTOTAL'];
                  $totalCajas +=  $row['CANT_CAJAS'];

                      }



  ?>



<?php     
      $query = "SELECT * FROM transaction WHERE METODO_PAGO LIKE '{$efectivo}%' AND DATE  LIKE '{$today}%' AND CITY  LIKE '{$_SESSION['CITY']}%'";
       $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
      while ($row = mysqli_fetch_assoc($result)) {
      $PagoEfectivo +=  $row['GRANDTOTAL'];

        }
?>

<?php    
       $query = "SELECT * FROM transaction WHERE DATE  LIKE '{$today}%' AND METODO_PAGO LIKE '{$tarjeta}%' AND CITY  LIKE '{$_SESSION['CITY']}%'";
        $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
                      while ($row = mysqli_fetch_assoc($result)) {
         $PagoTarjeta +=  $row['GRANDTOTAL'];

                      }
     
?>


<?php     
      $query = "SELECT * FROM transaction WHERE METODO_PAGO LIKE '{$efectivo}%' AND INTERMEDIARIO LIKE'{$efectivo}%' AND DATE  LIKE '{$today}%' AND CITY  LIKE '{$_SESSION['CITY']}%'";
       $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
      while ($row = mysqli_fetch_assoc($result)) {
      $pagoefectivo +=  $row['GRANDTOTAL'];

        }
?>

<?php    
       $query = "SELECT * FROM transaction WHERE METODO_PAGO LIKE '{$tarjeta}%'  AND INTERMEDIARIO LIKE'{$efectivo}%' AND DATE  LIKE '{$today}%' AND CITY  LIKE '{$_SESSION['CITY']}%'";
        $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
                      while ($row = mysqli_fetch_assoc($result)) {
         $pagotarjeta +=  $row['GRANDTOTAL'];

                      }
     
?>

<!-------    Formas de Pago     --------->
<?php     
      $query = "SELECT * FROM transaction WHERE  METODO_PAGO LIKE '{$efectivo}%' AND INTERMEDIARIO LIKE'{$uber}%' AND DATE  LIKE '{$today}%' AND CITY  LIKE '{$_SESSION['CITY']}%'";
       $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
      while ($row = mysqli_fetch_assoc($result)) {
      $pagouber +=  $row['GRANDTOTAL'];

        }
?>
<?php     
      $query = "SELECT * FROM transaction WHERE  METODO_PAGO LIKE '{$tarjeta}%' AND INTERMEDIARIO LIKE'{$uber}%' AND DATE  LIKE '{$today}%' AND CITY  LIKE '{$_SESSION['CITY']}%'";
       $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
      while ($row = mysqli_fetch_assoc($result)) {
      $pagoubertarjeta +=  $row['GRANDTOTAL'];

        }
?>

<?php     
      $query = "SELECT * FROM transaction WHERE  METODO_PAGO LIKE '{$efectivo}%' AND INTERMEDIARIO LIKE'{$sindelantal}%' AND DATE  LIKE '{$today}%' AND CITY  LIKE '{$_SESSION['CITY']}%'";
       $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
      while ($row = mysqli_fetch_assoc($result)) {
      $pagosdefectivo +=  $row['GRANDTOTAL'];

        }
?>


<?php     
      $query = "SELECT * FROM transaction WHERE METODO_PAGO LIKE '{$tarjeta}%' AND INTERMEDIARIO LIKE'{$sindelantal}%'  AND DATE  LIKE '{$today}%' AND CITY  LIKE '{$_SESSION['CITY']}%'";
       $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
      while ($row = mysqli_fetch_assoc($result)) {
      $pagosdtarjeta +=  $row['GRANDTOTAL'];

        }
?>


<?php     
      $query = "SELECT * FROM transaction WHERE  METODO_PAGO LIKE '{$efectivo}%' AND INTERMEDIARIO LIKE'{$didi}%'  AND DATE  LIKE '{$today}%' AND CITY  LIKE '{$_SESSION['CITY']}%'";
       $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
      while ($row = mysqli_fetch_assoc($result)) {
      $pagodidiefectivo +=  $row['GRANDTOTAL'];

        }
?>

<?php     
      $query = "SELECT * FROM transaction WHERE  METODO_PAGO LIKE '{$tarjeta}%' AND INTERMEDIARIO LIKE'{$didi}%'  AND DATE  LIKE '{$today}%' AND CITY  LIKE '{$_SESSION['CITY']}%'";
       $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
      while ($row = mysqli_fetch_assoc($result)) {
      $pagodiditarjeta +=  $row['GRANDTOTAL'];

        }
?>

<?php     
      $query = "SELECT * FROM transaction WHERE METODO_PAGO LIKE '{$efectivo}%' AND INTERMEDIARIO LIKE'{$rappi}%'  AND DATE  LIKE '{$today}%' AND CITY  LIKE '{$_SESSION['CITY']}%'";
       $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
      while ($row = mysqli_fetch_assoc($result)) {
      $pagorappiefectivo +=  $row['GRANDTOTAL'];

        }
?>


<?php     
      $query = "SELECT * FROM transaction WHERE METODO_PAGO LIKE '{$tarjeta}%' AND INTERMEDIARIO LIKE'{$rappi}%' AND DATE  LIKE '{$today}%' AND CITY  LIKE '{$_SESSION['CITY']}%'";
       $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
      while ($row = mysqli_fetch_assoc($result)) {
      $pagorappitarjeta +=  $row['GRANDTOTAL'];

        }
?>



<?php  
//       $query = "SELECT * FROM cortes WHERE DATE  LIKE '{$today}%'";

       $query = "SELECT * FROM cortes WHERE DATE  LIKE '{$manana}%' AND CITY  LIKE '{$_SESSION['CITY']}%'";
       $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
        while ($row = mysqli_fetch_assoc($result)) {

           if ($row['TIPO'] == 4){
      $Totalcaja +=  $row['MONTO'];
        }



         }

     ?>




<?php  
//       $query = "SELECT * FROM cortes WHERE DATE  LIKE '{$today}%'";

       $query = "SELECT * FROM cortes WHERE DATE  LIKE '{$today}%' AND CITY  LIKE '{$_SESSION['CITY']}%'";
       $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
        while ($row = mysqli_fetch_assoc($result)) {
         
 if ($row['TIPO'] == 1){
        $ingreso +=  $row['MONTO'];
        }

         if ($row['TIPO'] == 2){
        $compras +=  $row['MONTO'];
        }
         if ($row['TIPO'] == 3){
        $retiro +=  $row['MONTO'];
        }
/*
         if ($row['TIPO'] == 5){
        $cancelacion +=  $row['MONTO'];
        }*/
 if ($row['TIPO'] == 4){
        $corte +=  $row['MONTO'];
        }





         }

     ?>

 <?php  

     /*   $fondo=$ingreso;


 $totalEfectivo = $PagoEfectivo+$pagouber+$pagosdefectivo+$pagodidiefectivo+$pagorappiefectivo;

              $totalTarjeta= $PagoTarjeta+$pagoubertarjeta+$pagosdtarjeta+$pagodiditarjeta+$pagorappitarjeta;

 $totalPagos = $totalEfectivo+$totalTarjeta;

$salidaEfectivo=$retiro+$compras;

//$caja =  ($fondo+$PagoEfectivo)-($salidaEfectivo);
$caja=$PagoEfectivo+$fondo+$corte-$retiro-$compras;
$totalcorte=$caja-$Totalcaja;
$fondoInicial=$corte+$fondo;*/



   $fondo=$ingreso;


 $totalEfectivo = $PagoEfectivo+$pagouber+$pagosdefectivo+$pagodidiefectivo+$pagorappiefectivo;

              $totalTarjeta= $PagoTarjeta+$pagoubertarjeta+$pagosdtarjeta+$pagodiditarjeta+$pagorappitarjeta;

 //$totalPagos = $totalEfectivo+$totalTarjeta;

$salidaEfectivo=$retiro+$compras;

//$caja =  ($fondo+$PagoEfectivo)-($salidaEfectivo);
$caja=$PagoEfectivo+$fondo+$corte-$retiro-$compras;
$totalcorte=$caja-$Totalcaja;
$fondoInicial=$corte+$fondo;


   ?>
   <!--
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

                                         
              <form action="" method="POST">
                <input type="text" id="date" name="date" placeholder="Fecha hoy <?php  echo "$today"; ?>" autocomplete="off" >
                <input type="submit" name="submit" value="Buscar">
              </form>

              <script type="text/javascript">
              $( "#date" ).datepicker({
                  dateFormat: 'd-mm-yy',
                  altFormat : "yy-mm-dd",
                  altField  : '#alternate',
                  onSelect  : function() {
                  
                      // proof
                      console.log( $('#alternate').val() );
                  }
              });
              </script>





 Para activa la Impresion automatica se debe activar el modo kiosko en el navegador
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
            <?php echo  $_SESSION['CITY'];?>

            </p>
            <p class="centrado" style="margin: 5px 0px;"><?php echo date("d-m-Y", strtotime($today) ); ?></h3>
            <p class="centrado" style="margin: 5px 0px;">:::CORTE DE CAJA:::</h3>

           <table class="table table-bordered"  width="100%" cellspacing="0"> 
                  <tr  >
                    <td colspan="2" style="text-align: center;"class="centrado"> Resumen General de Caja</td>
                  </tr>
                  <tr>
                     <td style="font-weight: 800;">Concepto</td>
                     <td style="font-weight: 800;">Cantidad</td>
                  </tr>
                    <tr>
                     <td>Fondo Inicial</td>
                     <td >$<?php echo $corte; ?></td>
                  </tr> 
                 
                  <tr>
                     <td>Fondo Caja Extra</td>
                     <td >$<?php echo $fondo; ?></td>
                  </tr> 

                   <tr>
                     <td>Ventas Efectivo</td>
                     <td >$<?php echo $PagoEfectivo; ?></td>
                  </tr>


                  <tr>
                     <td>Pago a Proveedores</td>
                     <td >$<?php echo $compras; ?></td>
                  </tr> 

                  <tr>
                     <td>Retiros en efectivo</td>
                     <td >$<?php echo $retiro; ?></td>
                  </tr>

                   <tr >
                     <td>Subtotal en Caja</td>
                     <td>$<?php echo $caja; ?></td>
                  </tr>    

                  <tr >
                     <td>Corte</td>
                     <td>$<?php echo $totalcorte; ?></td>
                  </tr>   

                  <tr >
                     <td>Fondo Final </td>
                     <td>$<?php echo $Totalcaja; ?></td>
                  </tr> 

             </table>
            <table class="table table-bordered"  width="100%" cellspacing="0"> 
              <tr  >
                    <td colspan="2" style="text-align: center;" class="centrado">Pago con Efectivo</td>
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

      
                   <tr >
                     <td>Total</td>
                     <td>$<?php echo $PagoEfectivo; ?></td>
                  </tr>  

          </table> 
              <table class="table table-bordered"  width="100%" cellspacing="0"> 
                <tr  >
                    <td colspan="2" style="text-align: center;" class="centrado">Pago con Tarjeta</td>
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

                   <tr >
                     <td>Total</td>
                     <td>$<?php echo $PagoTarjeta; ?></td>
                  </tr>  
                  </table>   


          <p class="centrado" style="font-size: 11px;">
            Total Cajas Vendidas: <?php echo $totalCajas; ?></p>

              <p class="centrado" style="font-size: 11px;">
           Ventas Totales: <?php echo $ventaDia; ?></p>        

          
  <p class="centrado" style="font-size: 11px;">
              <a onclick="imprimir()"> ***VUELVA PRONTO***</a>
              <br>ESTE NO ES UN COMPROBANTE FISCAL</p>
        </div>
    </body>
</html>




<script type="text/javascript">

  window.print();
window.onafterprint = function(event) {
    window.location.href = 'corte_caja.php'
};

</script>

