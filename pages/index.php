<?php
include'../includes/connection.php';
include'../includes/side-bar.php';
include'../includes/topbar.php';
  date_default_timezone_set('America/Mexico_City');

$script_tz = date_default_timezone_get();
            $today = date("Y-m-d"); 
            $manana = date("Y-m-d", strtotime("+1 day"));


  $query = 'SELECT ID, t.TYPE
            FROM users u
            JOIN type t ON t.TYPE_ID=u.TYPE_ID WHERE ID = '.$_SESSION['MEMBER_ID'].'';
  $result = mysqli_query($db, $query) or die (mysqli_error($db));
  
  while ($row = mysqli_fetch_assoc($result)) {
            $Aa = $row['TYPE'];
                   
  if ($Aa=='User'){
?>
  <script type="text/javascript">

    //then it will be redirected /ventas/pages/img/

    alert("¡Página restringida! Serás redirigido a POS");
    window.location = "pos.php";

  </script>
<?php
  }           
}
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



 if(isset($_POST['submit'])) {
      $today = $_POST['date'];
  }

/*
            $lunes=date('yy-m-d',strtotime("last sunday"));
            $domingo=date('yy-m-d',strtotime("next sunday"));
            $lunesC=date('yy-m-d',strtotime("last monday"));
*/
$Ulunes = DateTime::createFromFormat("Y-m-d", $today);
$Ulunes->modify('Last Monday');
$Ulunes = $Ulunes->format('Y-m-d');

$Pdomingo = DateTime::createFromFormat("Y-m-d", $today);
$Pdomingo->modify('next sunday');
$Pdomingo = $Pdomingo->format('Y-m-d');

$manana = DateTime::createFromFormat("Y-m-d", $today);
$manana->modify('tomorrow');
$manana = $manana->format('Y-m-d');

$psucursal=0;
$papps=0;



            //$semana =date('yy-m-d',strtotime("-7 days"));///valor semana

            //$ayer =date('yy-m-d',strtotime("-1 days"));//////dia anterior
            
            //$manana =date('yy-m-d',strtotime("+1 days"));//////dia anterior

            $mes = date("0-n-Y"); 
            $mesC = date("1-n-Y"); 
/*
            $firstDay=date('yy-m-d',strtotime("first day of this month"));
            $lastDay=date('yy-m-d',strtotime("last day of this month"));
*/
            $firstDay = date('Y-m-1',strtotime($today));

            $lastDay = date('Y-m-t',strtotime($today));

             $ventaDia = 0;  
             $ventaSemana=0;
             $ventaMes=0;

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
              //$sindelantal=4;
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
              $PagoTarjeta=0;
              $pagouber=0;
              $pagoubertarjeta=0;
              $pagodidiefectivo=0;
              $pagodiditarjeta=0;
              $pagorappiefectivo=0;
              $pagorappitarjeta=0;

?>



<?php
                    $query = "SELECT * FROM transaction WHERE date(DATE) LIKE '{$today}%' AND CITY  LIKE '{$_SESSION['CITY']}%'";

                       $result = mysqli_query($db, $query) or die (mysqli_error($db));
                      while ($row = mysqli_fetch_assoc($result)) {

                  $ventaDia +=  $row['GRANDTOTAL'];
                  $totalCajas +=  $row['CANT_CAJAS'];

                      }
  ?>

<?php

    $query = "SELECT * FROM transaction WHERE date(DATE) BETWEEN '{$Ulunes}%' AND '{$Pdomingo}%' AND CITY  LIKE '{$_SESSION['CITY']}%'";

         $result = mysqli_query($db, $query) or die (mysqli_error($db));
         while ($row = mysqli_fetch_assoc($result)) {

          $ventaSemana += $row['GRANDTOTAL'];

      }
  ?>

<?php
   $query = "SELECT * FROM transaction WHERE date(DATE) BETWEEN '{$firstDay}%' AND '{$lastDay}%' AND CITY  LIKE '{$_SESSION['CITY']}%'";

         $result = mysqli_query($db, $query) or die (mysqli_error($db));
         while ($row = mysqli_fetch_assoc($result)) {

          $ventaMes +=  $row['GRANDTOTAL'];
      }
  ?>

<?php     
      $query = "SELECT * FROM transaction WHERE METODO_PAGO LIKE '{$efectivo}%' AND date(DATE)  LIKE '{$today}%'  AND CITY  LIKE '{$_SESSION['CITY']}%'";
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
<!-------    Formas de Pago     --------->
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

<?php     
      $query = "SELECT * FROM transaction WHERE  METODO_PAGO LIKE '{$efectivo}%' AND INTERMEDIARIO LIKE'{$uber}%' AND date(DATE)  LIKE '{$today}%' AND CITY  LIKE '{$_SESSION['CITY']}%'";
       $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
      while ($row = mysqli_fetch_assoc($result)) {
      $pagouber +=  $row['GRANDTOTAL'];

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
      $query = "SELECT * FROM transaction WHERE  METODO_PAGO LIKE '{$tarjeta}%' AND INTERMEDIARIO LIKE'{$uber}%' AND date(DATE)  LIKE '{$today}%'  AND CITY LIKE '{$_SESSION['CITY']}%'";
       $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
      while ($row = mysqli_fetch_assoc($result)) {
      $pagoubertarjeta +=  $row['GRANDTOTAL'];

        }
?>


<?php     
      $query = "SELECT * FROM transaction WHERE  METODO_PAGO LIKE '{$efectivo}%' AND INTERMEDIARIO LIKE'{$didi}%'  AND date(DATE)  LIKE '{$today}%'  AND CITY  LIKE '{$_SESSION['CITY']}%'";
       $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
      while ($row = mysqli_fetch_assoc($result)) {
      $pagodidiefectivo +=  $row['GRANDTOTAL'];

        }
?>

<?php     
      $query = "SELECT * FROM transaction WHERE  METODO_PAGO LIKE '{$tarjeta}%' AND INTERMEDIARIO LIKE'{$didi}%'  AND date(DATE)  LIKE '{$today}%'  AND CITY  LIKE '{$_SESSION['CITY']}%'";
       $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
      while ($row = mysqli_fetch_assoc($result)) {
      $pagodiditarjeta +=  $row['GRANDTOTAL'];

        }
?>

<?php  
//       $query = "SELECT * FROM cortes WHERE FECHA  LIKE '{$today}%'";

       $query = "SELECT * FROM cortes WHERE DATE  LIKE '{$manana}%' AND CITY  LIKE '{$_SESSION['CITY']}%'";
       $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
        while ($row = mysqli_fetch_assoc($result)) {

           if ($row['TIPO'] == 4){
      $Totalcaja +=  $row['MONTO'];
        }



         }

     ?>


                    <?php   
                    
/*                      $query = "SELECT PROVEEDOR, DESCRIPCION, SUM(MONTO) as MONTO_TC FROM cortes
                      INNER JOIN supplier WHERE supplier.COMPANY_NAME = cortes.PROVEEDOR AND date(DATE) LIKE '{$today}%' AND TIPO LIKE '2' AND supplier.TYPE LIKE '1' AND  cortes.CITY  LIKE '{$_SESSION['CITY']}%' GROUP BY supplier.COMPANY_NAME";
                      $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
                      while ($row = mysqli_fetch_assoc($result)) {
     
                            $compras +=  $row['MONTO_TC'];

                      }*/
                    ?>


<?php  
//       $query = "SELECT * FROM cortes WHERE FECHA  LIKE '{$today}%'";

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
    $fondo=$ingreso;
            
    $totalEfectivo = $PagoEfectivo+$pagouber+$pagodidiefectivo+$pagorappiefectivo;

    $totalTarjeta= $PagoTarjeta+$pagoubertarjeta+$pagodiditarjeta+$pagorappitarjeta;

     $totalPagos = $totalEfectivo+$totalTarjeta;

    $salidaEfectivo=$retiro+$compras;

    //$caja =  ($fondo+$PagoEfectivo)-($salidaEfectivo);
    $caja=$PagoEfectivo+$fondo+$corte-$retiro-$compras;
    $totalcorte=$caja-$Totalcaja;
    $fondoInicial=$corte;

?>


<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<div class="show-grid">
  <div class="card  mb-2">
    <div class="card-header shadow ">
      <div class="row" style="justify-content: center;">
                      <?php
                      /* <div class="col-12" style="text-align: center;"> <span class="m-3 font-weight-bold " style="color: #858796;font-size: 16px;    font-weight: 500 !important;">
                        Sucursal <?php echo  $_SESSION['CITY'];?> </span> </div> */
                      ?>

                    
          <span class="valores  m-2 font-weight-bold " style="color: #858796;font-size: medium;font-weight: 500 !important; ">&nbsp;Fondo Inicial
            $<?php echo number_format($fondoInicial, 2, '.', ','); ?>&nbsp;
          </span>
               

          <span class=" valores m-2 font-weight-bold text-primary" style="font-size: medium; border-left: outset ;border-left-color: red; ">&nbsp;Salida de Efectivo
            $<?php echo number_format($salidaEfectivo, 2, '.', ',');?> &nbsp;</span> 

          <span class="valores m-2 font-weight-bold " style="color: #858796;font-size: medium;font-weight: 500 !important;">&nbsp; Efectivo en Caja $<?php echo number_format($caja, 2, '.', ',');?> &nbsp;</span>

          <span class="valores m-2 font-weight-bold " style="color: #858796;font-size: medium; font-weight: 500 !important;">&nbsp; Pagos en Efectivo
            $<?php echo number_format($PagoEfectivo, 2, '.', ','); ?> &nbsp;</span>
          <span class="valores m-2 font-weight-bold " style="color: #858796;font-size: medium; font-weight: 500 !important;">&nbsp; Pagos Con Tarjeta 

            $<?php echo number_format($PagoTarjeta, 2, '.', ',');?> &nbsp;
          </span>
          <span class="valores m-2 font-weight-bold " style="color: #858796;font-size: medium;font-weight: 500 !important;">&nbsp; Ventas de Hoy
                $<?php echo number_format($ventaDia, 2, '.', ','); ?> &nbsp;
          </span>
      </div>
    </div>
  </div>
</div>

<div class="card shadow mb-1"  style="align-items: center;">
      <div class="row--index card-body" style="align-items: center;">

        <div class="card border-left-primary  h-100 mb-1 col-auto">
          <div class="card-body  col-md-12 ">
            <div class="row no-gutters col-auto align-items-center">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1" style="text-align: center;">
                <h6 style="font-size: small;"> Ventas de Hoy<span style="color: #858796;"> $<?php  echo number_format($ventaDia, 2, '.', ','); ?> </span>
                
                </h6> 
              </div> 
            </div>
              <h6 style="font-size: small; text-align: center;"> 
                <?php echo date("d-m-Y", strtotime($today) ); ?>                      
              </h6> 
          </div>
        </div>
              


        <div class="card border-left-warning  h-100 mb-1 col-auto" style="align-items: center;">
          <div class="card-body col-md-12">
          <div class="row no-gutters col-auto align-items-center">
            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1" style="text-align: center;">
            <h6 style="font-size: small; text-align: center;"> Ventas de la semana <span style="color:#858796;">$<?php echo number_format($ventaSemana, 2, '.', ','); ?></span>
                </h6> 
              </div> 
            </div>
              <h6 style="font-size: small; text-align: center;">
                Del <?php echo date("d-m-Y", strtotime($Ulunes) ); ?> al <?php echo date("d-m-Y", strtotime($Pdomingo) ); ?>               
              </h6> 
          </div>
        </div>

              <div class="card border-left-success   h-100 mb-1 col-auto">
                <div class="card-body  col-md-12">
                  <div class="row no-gutters col-auto align-items-center">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1" style="text-align: center;">
                      <h6 style="font-size: small; text-align: center;"> Ventas del Mes
                          <span style="color: #858796;">$<?php echo number_format($ventaMes, 2, '.', ','); ?>
                          </span>
                        </h6>
                    </div>
                  </div>
                  <h6 style="font-size: small; text-align: center;">
                    Del <?php echo date("d-m-Y", strtotime($firstDay) ); ?> al <?php echo date("d-m-Y", strtotime($lastDay) ); ?>           
                  </h6> 
                </div>
              </div>
        </div>
      </div>



    <!--TABLAS RESUMEN DEL DIA  -->

    <div class="card-header shadow ">
        <div class="row" style="text-align: center;">
            <div class=" py-12 col-sm-6 col-md-4" style="align-items: center;">
              <h5 class="m-2  font-weight-bold text-primary" style="align-items: center;">Resumen del día</h5>
            </div>
          
            <div class=" py-12 col-sm-6 col-md-4">
            <form action="" method="POST" style="align-items: center;">
              <input style="font-size: small;" type="text" id="date" name="date" placeholder="Fecha hoy <?php echo date("d-m-Y", strtotime($today) ); ?>" autocomplete="off" required>
              <input style="font-size: small;" type="submit" name="submit" value="Buscar">
            </form>
          </div>

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
            <div class=" py-12 col-sm-6 col-md-4">
              <!-- input1 extra los datos del dia y direcciona a (imprimir_corte_caja.php)[IMPORTANTE] -->
                  <form action="imprimir_corte_caja.php" method="post" style="margin-top: .5rem;margin-bottom: .5rem;">
                    <input style="font-size: small;"  type="hidden" name="today" value="<?php echo $today; ?>" />
                    <input style="font-size: small;"  type="submit" class="btn btn-danger bg-gradient-danger" value="Imprimir" />
                  </form>
          </div>
          </div>
                    <!--<div class="card-header py-12 col-sm-3 col-md-2">
                        <a href="#" data-toggle="modal" data-target="#corteCajaModal" type="button" class="btn btn-danger bg-gradient-danger" style="border-radius: 0px;"><i >Cerrar Caja</i></a>
                         </div>-->

      


            <div class="row card-body--tablas">
                

<div class="col-sm-6 col-md-4">

              <table class="table table-bordered"  width="100%" cellspacing="0" style="font-size:revert;"> 
              <tr  >
                    <td colspan="2" style="background-color: #FFA81A; color:#FFF; text-align: center;" >Pago con Efectivo</td>
                  </tr>
                   <tr>
                     <td style="font-weight: 800;">Concepto</td>
                     <td style="font-weight: 800;">Cantidad</td>
                  </tr>

                   <tr>
                     <td>Efectivo en caja</td>
                     <td>$<?php echo number_format($pagoefectivo, 2, '.', ','); ?></td>
                  </tr>

                  <tr>
                     <td>UBER Efectivo</td>
                     <td>$<?php echo number_format($pagouber, 2, '.', ','); ?></td>
                  </tr> 

                    <tr>
                     <td>DIDI Efectivo</td>
                     <td>$<?php echo number_format($pagodidiefectivo, 2, '.', ','); ?></td>
                  </tr>

                      <tr>
                     <td>Rappi Efectivo</td>
                     <td>$<?php echo number_format($pagorappiefectivo, 2, '.', ','); ?></td>
                  </tr>

     
                   <tr style="color: #fff; background-color: #008f39">
                     <td>Total</td>
                     <td>$<?php echo number_format($PagoEfectivo, 2, '.', ','); ?></td>
                  </tr>  

                  </table> 

                  <h4 class="m-2 font-weight-bold text-primary" style="font-size: revert;text-align: center;">
                   <?php

                   if ($ventaDia!=0) {
                      //porcentaje de ventas en sucursal
                      $sumapagosucursal= $pagoefectivo+$pagotarjeta;
                      $psucursal= (100*$sumapagosucursal)/ $ventaDia;
                        //porcentaje de ventas en app
                      $sumapagotarjeta= $pagouber+$pagoubertarjeta+$pagodidiefectivo+$pagodiditarjeta + $pagorappiefectivo+$pagorappitarjeta;
                      $papps= (100*$sumapagotarjeta)/ $ventaDia;
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

                        ?> </h4>

 

                             






                </div>

                <div class="col-sm-6 col-md-4">

                <table class="table table-bordered"   cellspacing="0" style="font-size: revert;"> 
                <tr >
                    <td colspan="2" style="background-color: #FFA81A; color:#FFF; text-align: center;" >Pago con Tarjeta</td>
                  </tr>
                  

                  <tr>
                     <td style="font-weight: 800;">Concepto</td>
                     <td style="font-weight: 800;">Cantidad</td>
                  </tr>

                   <tr>
                     <td>Tarjeta En Caja</td>
                     <td>$<?php echo number_format($pagotarjeta, 2, '.', ','); ?></td>
                  </tr> 

                  <tr>
                     <td>UBER Tarjeta</td>
                     <td>$<?php echo number_format($pagoubertarjeta, 2, '.', ','); ?></td>
                  </tr> 

                  <tr>
                     <td>DIDI Tarjeta</td>
                     <td>$<?php echo number_format($pagodiditarjeta, 2, '.', ','); ?></td>
                  </tr>
                  <tr>
                     <td>Rappi Tarjeta</td>
                     <td>$<?php echo number_format($pagorappitarjeta, 2, '.', ','); ?></td>
                  </tr>

                   <tr style="color: #fff; background-color: #008f39">
                     <td>Total</td>
                     <td>$<?php echo number_format($PagoTarjeta, 2, '.', ','); ?></td>
                  </tr>  
                  </table>   

                   <h4 class="m-2 font-weight-bold text-primary" style="font-size: revert;text-align: center;">Total Cajas Vendidas: <?php echo $totalCajas; ?></h4>
                   <h4 class="m-2 font-weight-bold text-primary" style="font-size: revert;text-align: center;">Ventas Totales: <?php echo number_format($ventaDia, 2, '.', ','); ?></h4>



               
                </div>


                
              <div class="col-sm-6 col-md-4">

              <table class="table table-bordered"  width="100%" cellspacing="0" style="font-size: revert;"> 
                  <tr  >
                    <td colspan="2" style="background-color: #FFA81A; color:#FFF; text-align: center;" >Resumen General de Caja</td>
                  </tr>
                  <tr>
                     <td style="font-weight: 800;">Concepto</td>
                     <td style="font-weight: 800;">Cantidad</td>
                  </tr>
                    <tr>
                     <td>Fondo Inicial</td>
                     <td style="color: #008f39">$<?php echo number_format($corte, 2, '.', ','); ?></td>
                  </tr> 
                 
                  <tr>
                     <td>Fondo Caja Extra</td>
                     <td style="color: #008f39">$<?php echo number_format($fondo, 2, '.', ','); ?></td>
                  </tr> 

                   <tr>
                     <td>Ventas Efectivo</td>
                     <td style="color: #008f39">$<?php echo number_format($PagoEfectivo, 2, '.', ','); ?></td>
                  </tr>


                  <tr>
                     <td>Pago a Proveedores</td>
                     <td style="color: #ff0000">$<?php echo number_format($compras, 2, '.', ','); ?></td>
                  </tr> 

                  <tr>
                     <td>Retiros en efectivo</td>
                     <td style="color: #ff0000">$<?php echo number_format($retiro, 2, '.', ','); ?></td>
                  </tr>

                                 <tr style="color: #fff;  background-color: #FFA81A">
                     <td>Subtotal en Caja</td>
                     <td>$<?php echo number_format($caja, 2, '.', ','); ?></td>
                  </tr>    

                  <tr style="color: #fff; background-color: #FA4616">
                     <td>Corte Del Día</td>
                     <td>$<?php echo number_format($totalcorte, 2, '.', ','); ?></td>
                  </tr>   

                  <tr style="color: #fff; background-color: #008f39">
                     <td>Fondo Caja Final </td>
                     <td>$<?php echo number_format($Totalcaja, 2, '.', ','); ?></td>
                  </tr> 

                    </table>
              </div>
              
            </div>
            
</div>

<!--FIN TABLAS RESUMEN DEL DIA  -->
    
          <script type="text/javascript">
function dia_anterior($fecha)
{
    $sol = (strtotime($fecha) - 3600);
    return date('yy-mm-dd', $sol);
}
 
</script>



<?php
include'../includes/footer.php';
?>
