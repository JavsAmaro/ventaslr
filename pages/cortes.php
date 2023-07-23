<?php
include'../includes/connection.php';
include'../includes/topp.php';
   date_default_timezone_set('America/Mexico_City');

$script_tz = date_default_timezone_get();
            $today = date("Y-m-d"); 
            //$ayer =date($today,strtotime("-1 days"));//////dia anterior
            
            $manana =date('Y-m-d',strtotime("+1 days"));//////dia anterior

             $ventaDia = 0;  
             $caja=0;
              $ingreso=0;
              $compras=0;
              $gastos=0;
              $totalEfectivo =0;
              $cortedecaja=0;
              $corte =0;
              $Totalcaja=0;
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
      $query = "SELECT * FROM transaction WHERE METODO_PAGO LIKE '{$efectivo}%' AND date(DATE)  LIKE '{$today}%' AND CITY LIKE '{$_SESSION['CITY']}%' ";
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
      $query = "SELECT * FROM transaction WHERE  METODO_PAGO LIKE '{$tarjeta}%' AND INTERMEDIARIO LIKE'{$didi}%'  AND date(DATE)  LIKE '{$today}%' AND CITY LIKE '{$_SESSION['CITY']}%'";
       $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
      while ($row = mysqli_fetch_assoc($result)) {
      $pagodiditarjeta +=  $row['GRANDTOTAL'];

        }
?>

<?php     
      $query = "SELECT * FROM transaction WHERE METODO_PAGO LIKE '{$efectivo}%' AND INTERMEDIARIO LIKE'{$rappi}%'  AND date(DATE)  LIKE '{$today}%' AND CITY LIKE '{$_SESSION['CITY']}%'";
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
              <h4 class="m-2 font-weight-bold text-primary">Movimientos &nbsp;<a  href="#" data-toggle="modal" data-target="#corteModal" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a></h4>

            </div>
            


                        <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">        
                  <thead>
                      <tr>
                        <th>Fecha</th>
                        <th>Tipo de accion</th>
                        <th>Monto</th>
                        <th>Descripcion</th>
                        <th>Acción</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php                  
                      $query = "SELECT * FROM cortes WHERE DATE LIKE '{$manana}%' AND CITY LIKE '{$_SESSION['CITY']}%'";
                      $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
                      while ($row = mysqli_fetch_assoc($result)) {
                      echo '<tr>';
                      echo '<td>'. date("d-m-Y H:i:s", strtotime($row['DATE'])).'</td>';
                      echo '<td>';
                            echo "Cierre de Caja Hoy";

                       

                     echo '</td>';
                      echo '<td>'. $row['MONTO'].'</td>';
                      echo '<td>'. $row['DESCRIPCION'].'</td>';
      
                      echo '<td align="right"> <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary" href="cortes_searchfrm.php?action=edit & id='.$row['ID_CORTE'] . '"><i class="fas fa-fw fa-list-alt"></i> Detalles</a>
                            <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary dropdown no-arrow" data-toggle="dropdown" style="color:white;">
                              ... <span class="caret"></span></a>
                            <ul class="dropdown-menu text-center" role="menu">
                                <li>
                                  <a type="button" class="btn btn-warning bg-gradient-warning btn-block" style="border-radius: 0px;" href="cortes_edit.php?action=edit & id='.$row['ID_CORTE']. '">
                                    <i class="fas fa-fw fa-edit"></i> Editar
                                  </a>
                                </li>
                            </ul>
                            </div>
                          </div> </td>';
                      echo '</tr> ';
                      }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>



            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">        
                  <thead>
                      <tr>
                        <th>Fecha</th>
                        <th>Tipo de accion</th>
                        <th>Monto</th>
                        <th>Descripcion</th>
                        <th>Acción</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php                  
                      $query = "SELECT * FROM cortes WHERE DATE LIKE '{$today}%' AND CITY LIKE '{$_SESSION['CITY']}%'";
                      $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
                      while ($row = mysqli_fetch_assoc($result)) {
                      echo '<tr>';
                      echo '<td>'. date("d-m-Y H:i:s", strtotime($row['DATE'])).'</td>';
                      echo '<td>';
                          if ($row['TIPO'] == 1) {
                            echo "Fondo Extra de Caja";
                          }
                          if ($row['TIPO'] == 2) {
                            echo "Pagos a proveedores";
                          }
                          if ($row['TIPO'] == 3) {
                            echo "Retiro";
                          }
                          if ($row['TIPO'] == 4) {
                            echo "Corte de ayer";
                          }
                          if ($row['TIPO'] == 5) {
                            echo "Cierre de Caja del Día Anterior";
                          }
                       

                     echo '</td>';
                      echo '<td>'. $row['MONTO'].'</td>';
                      echo '<td>'. $row['DESCRIPCION'].'</td>';
      
                      echo '<td align="right"> <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary" href="cortes_searchfrm.php?action=edit & id='.$row['ID_CORTE'] . '"><i class="fas fa-fw fa-list-alt"></i> Detalles</a>
                            <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary dropdown no-arrow" data-toggle="dropdown" style="color:white;">
                              ... <span class="caret"></span></a>
                            <ul class="dropdown-menu text-center" role="menu">
                                <li>
                                  <a type="button" class="btn btn-warning bg-gradient-warning btn-block" style="border-radius: 0px;" href="cortes_edit.php?action=edit & id='.$row['ID_CORTE']. '">
                                    <i class="fas fa-fw fa-edit"></i> Editar
                                  </a>
                                </li>
                            </ul>
                            </div>
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