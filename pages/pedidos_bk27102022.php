<?php
include'../includes/connection.php';
include'../includes/topp.php';

   date_default_timezone_set('America/Mexico_City');
            $buscarDia = date('Y-m-d',strtotime("-1 days")); 
$script_tz = date_default_timezone_get();
  if(isset($_POST['submit'])) {
      $buscarDia = $_POST['date'];
  }


            $today = date("Y-m-d"); 
           $ayer =date($today,strtotime("-1 days"));//////dia anterior
            
            $manana =date($today,strtotime("+1 days"));//////dia anterior

            
             $ventaDia = 0;  
             $caja=0;
              $ingreso=0;
              $compras=0;
              $gastos=0;
              $totalEfectivo =0;
              $cortedecaja=0;
              $corte =0;
              $pagos=0;
              $retiro=0;
              $cancelacion=0;
              $cierredecaja=0;
            $ventaDia =0;
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
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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

                    $query = "SELECT * FROM transaction WHERE date(DATE)  LIKE '{$today}%' AND CITY LIKE '{$_SESSION['CITY']}%'";

                       $result = mysqli_query($db, $query) or die (mysqli_error($db));
                      while ($row = mysqli_fetch_assoc($result)) {

                  $ventaDia +=  $row['GRANDTOTAL'];

                      }



  ?>


<?php     
      $query = "SELECT * FROM transaction WHERE METODO_PAGO LIKE '{$efectivo}%' AND date(DATE)  LIKE '{$today}%' AND CITY LIKE '{$_SESSION['CITY']}%'";
       $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
      while ($row = mysqli_fetch_assoc($result)) {
      $PagoEfectivo +=  $row['GRANDTOTAL'];

        }
?>

<?php    
       $query = "SELECT * FROM transaction WHERE date(DATE)  LIKE '{$today}%' AND METODO_PAGO LIKE '{$tarjeta}%' AND CITY LIKE '{$_SESSION['CITY']}%'";
        $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
                      while ($row = mysqli_fetch_assoc($result)) {
         $PagoTarjeta +=  $row['GRANDTOTAL'];

                      }
     
?>

<!-------    Formas de Pago     --------->
<?php     
      $query = "SELECT * FROM transaction WHERE  METODO_PAGO LIKE '{$efectivo}%' AND INTERMEDIARIO LIKE'{$uber}%' AND date(DATE)  LIKE '{$today}%' AND CITY LIKE '{$_SESSION['CITY']}%'";
       $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
      while ($row = mysqli_fetch_assoc($result)) {
      $pagouber +=  $row['GRANDTOTAL'];

        }
?>
<?php     
      $query = "SELECT * FROM transaction WHERE  METODO_PAGO LIKE '{$tarjeta}%' AND INTERMEDIARIO LIKE'{$uber}%' AND date(DATE)  LIKE '{$today}%' AND CITY LIKE '{$_SESSION['CITY']}%'";
       $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
      while ($row = mysqli_fetch_assoc($result)) {
      $pagoubertarjeta +=  $row['GRANDTOTAL'];

        }
?>

<?php     
      $query = "SELECT * FROM transaction WHERE  METODO_PAGO LIKE '{$efectivo}%' AND INTERMEDIARIO LIKE'{$sindelantal}%' AND date(DATE)  LIKE '{$today}%' AND CITY LIKE '{$_SESSION['CITY']}%'";
       $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
      while ($row = mysqli_fetch_assoc($result)) {
      $pagosdefectivo +=  $row['GRANDTOTAL'];

        }
?>


<?php     
      $query = "SELECT * FROM transaction WHERE METODO_PAGO LIKE '{$tarjeta}%' AND INTERMEDIARIO LIKE'{$sindelantal}%'  AND date(DATE)  LIKE '{$today}%' AND CITY LIKE '{$_SESSION['CITY']}%'";
       $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
      while ($row = mysqli_fetch_assoc($result)) {
      $pagosdtarjeta +=  $row['GRANDTOTAL'];

        }
?>


<?php     
      $query = "SELECT * FROM transaction WHERE  METODO_PAGO LIKE '{$efectivo}%' AND INTERMEDIARIO LIKE'{$didi}%'  AND date(DATE)  LIKE '{$today}%' AND CITY LIKE '{$_SESSION['CITY']}%'";
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
      $query = "SELECT * FROM transaction WHERE METODO_PAGO LIKE '{$tarjeta}%' AND INTERMEDIARIO LIKE'{$rappi}%'  AND date(DATE)  LIKE '{$today}%' AND CITY LIKE '{$_SESSION['CITY']}%'";
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

 $totalPagos = $totalEfectivo+$totalTarjeta;

$salidaEfectivo=$retiro+$compras;

//$caja =  ($fondo+$PagoEfectivo)-($salidaEfectivo);
$caja=$PagoEfectivo+$fondo+$corte-$retiro-$compras;
$totalcorte=$caja-$Totalcaja;
$fondoInicial=$corte;


                    ?>


          <input type="hidden" name="date" value="<?php echo $today; ?>">


           


           <?php                        
include 'cantidades.php';               
?>



            <div class="card shadow mb-4">
            <div class="card-header py-3">

              <div class="row">
                <div class="col-6">
              <h4 class="m-2 font-weight-bold text-primary">Pedidos&nbsp;</h4>
           
                </div>
              <div class="col-6">
                <div class="row" style="float: right;">
              <h4 class="m-2 font-weight-bold text-primary">Seleccionar dia&nbsp;</h4>

             <form action="" method="POST">
                <input type="text" id="date" name="date" placeholder="<?php echo date("d-m-Y", strtotime($buscarDia) ); ?>" autocomplete="off" required>
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
                </div>
              </div>


            </div>
            
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">        
                  <thead>
                      <tr>
                        <th>Numero Telefonico</th>
                        <th>Fecha</th>
                        <th>Nombre</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                        <th>Pago</th>
                        <th>Metodo de Pago</th>
                        <th>Metodo de Compra</th>
                        <th>Acción</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php     

                    /*$query = 'SELECT * FROM transaction, transaction_details WHERE transaction.TRANS_D_ID = transaction_details.TRANS_D_ID ';
                    /*
                      $query = "SELECT * FROM transaction INNER JOIN customer WHERE transaction.CUST_ID = customer.CUST_ID AND CITY LIKE '{$_SESSION['CITY']}%'";*/

                $query = "SELECT * FROM transaction INNER JOIN customer WHERE transaction.CUST_ID = customer.CUST_ID AND transaction.CITY LIKE '{$_SESSION['CITY']}%' AND date(DATE) LIKE '{$buscarDia}%' ";

                      $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
                      while ($row = mysqli_fetch_assoc($result)) {
                      if($row['GRANDTOTAL'] == "0")
                           {
                             echo '<tr class="btn-danger">';
                           }else{
                             echo '<tr>';
                           } 
                      echo '<td>'. $row['PHONE_NUMBER'].'</td>';
                      echo '<td>'. date("d-m-Y H:i:s", strtotime($row['DATE'])).'</td>';
                      echo '<td>'. $row['FIRST_NAME'].' '. $row['LAST_NAME'].'</td>';
                      echo '<td>'. $row['NUMOFITEMS'].'</td>';
                      echo '<td>'. $row['GRANDTOTAL'].'</td>';
                      echo '<td>'. $row['CASH'].'</td>';

                         if($row['METODO_PAGO'] == "1")
                           {
                             echo '<td>Efectivo';
                           }if($row['METODO_PAGO'] == "2"){
                             echo '<td> Tarjeta';
                           } 
                           '</td>';
                           if($row['INTERMEDIARIO'] == "1")
                           {
                             echo '<td>Sucursal';
                           }if($row['INTERMEDIARIO'] == "2"){
                             echo '<td> DIDI';
                           } if($row['INTERMEDIARIO'] == "3"){
                             echo '<td> UBER';
                           }if($row['INTERMEDIARIO'] == "4"){
                             echo '<td> Sin Delantal';
                           } if($row['INTERMEDIARIO'] == "5"){
                             echo '<td> Rappi';
                           }  

                           

                           '</td>';
                      echo '<td align="right"> <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary" href="trans_searchfrm.php?action=edit & id='.$row['TRANS_ID'] . '"><i class="fas fa-fw fa-list-alt"></i> Detalles</a>

                          </div> </td>';
                      echo '</tr> ';
                    }  
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

<?php
include'../includes/footer.php';
?>