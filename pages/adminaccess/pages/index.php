

<?php
//--NO BORRAR ------------------------------------------------------>
include'../includes/connection.php';
include'../includes/sidebar.php';
//--NO BORRAR ------------------------------------------------------>
?>



<?php  //-------------VALIDACION DE CUENTA DEL SUPERUSUARIO---------------------------------------

                $query = 'SELECT ID, t.TYPE
                          FROM users u
                          JOIN type t ON t.TYPE_ID=u.TYPE_ID WHERE ID = '.$_SESSION['MEMBER_ID'].'';
                $result = mysqli_query($db, $query) or die (mysqli_error($db));
      
                while ($row = mysqli_fetch_assoc($result)) {
                          $Aa = $row['TYPE'];
                   
if ($Aa!='Admin'){
           
             ?>    <script type="text/javascript">
                      //then it will be redirected
                      alert("¡Página restringida!");
                      window.location = "logout.php";
                  </script>
             <?php   }
                }   
  //-------------VALIDACION DE CUENTA DEL SUPERUSUARIO---------------------------------------
            ?>




<?php //-------------------------FECHAS---------------------------------------\\ 
  date_default_timezone_set('America/Mexico_City');

  $script_tz = date_default_timezone_get();
  $today = date("Y-m"); 

if(isset($_POST['submit'])) {
  $today = $_POST['date'];  }

  $firstDay = date('Y-m-1',strtotime($today));

  $lastDay = date('Y-m-t',strtotime($today));

  $showdate = date('F-Y',strtotime($today));
$contador=0;
$primerDomingo = DateTime::createFromFormat("Y-m-d", $firstDay);
$primerDomingo->modify('+6 days');
$primerDomingo = $primerDomingo->format('Y-m-d');


$segundoLunes = DateTime::createFromFormat("Y-m-d", $firstDay);
$segundoLunes->modify('+7 days');
$segundoLunes = $segundoLunes->format('Y-m-d');


$segundoDomingo = DateTime::createFromFormat("Y-m-d", $firstDay);
$segundoDomingo->modify('+13 days');
$segundoDomingo = $segundoDomingo->format('Y-m-d');

$tercerLunes = DateTime::createFromFormat("Y-m-d", $firstDay);
$tercerLunes->modify('+14 days');
$tercerLunes = $tercerLunes->format('Y-m-d');


$tercerDomingo = DateTime::createFromFormat("Y-m-d", $firstDay);
$tercerDomingo->modify('+20 days');
$tercerDomingo = $tercerDomingo->format('Y-m-d');

$cuartoLunes = DateTime::createFromFormat("Y-m-d", $firstDay);
$cuartoLunes->modify('+21 days');
$cuartoLunes = $cuartoLunes->format('Y-m-d');

$cuartoDomingo = DateTime::createFromFormat("Y-m-d", $firstDay);
$cuartoDomingo->modify('+27 days');
$cuartoDomingo = $cuartoDomingo->format('Y-m-d');

$quintoLunes = DateTime::createFromFormat("Y-m-d", $firstDay);
$quintoLunes->modify('+28 days');
$quintoLunes = $quintoLunes->format('Y-m-d');


$quintoDomingo = DateTime::createFromFormat("Y-m-d", $firstDay);
$quintoDomingo->modify('+34 days');
$quintoDomingo = $quintoDomingo->format('Y-m-d');
//-------------------------FECHAS---------------------------------------\\ 
?>


<style type="text/css">

html{
    font-size: 62.5%;
}
body{
    font-size: 16px; /* 1rem = 10px*/
}
  .table td, .table th {
    padding: .5rem;
}
</style>

<div class="card shadow mb-4">
            <div class="card-header" style="display: -webkit-inline-box; -webkit-box-pack: justify;">
              <h4 class="m-2 font-weight-bold text-primary">Sucursales &nbsp;<a  href="#" data-toggle="modal" data-target="#sucursalModal" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a></h4>
                <form action="" method="POST">

                  <input type="month" id="date" name="date" value="<?php echo $today; ?>" required>
                <input type="submit" name="submit" value="Buscar">
              </form>
            </div>
            
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">        
                  <thead>
                      <tr>
                        <th>Sucursal</th>
                       <th>Semana 1 
                        <br> (<?php echo date("d-m-Y", strtotime($firstDay) ); ?> <br>/ <?php echo date("d-m-Y", strtotime($primerDomingo) ); ?>)
                                             </th>
                       <th>Semana 2 
                        <br>(<?php echo date("d-m-Y", strtotime($segundoLunes) ); ?><br>/ <?php echo date("d-m-Y", strtotime($segundoDomingo) ); ?>)</th>

                        <th>Semana 3<br>(<?php echo date("d-m-Y", strtotime($tercerLunes) ); ?><br>/<?php echo date("d-m-Y", strtotime($tercerDomingo) ); ?>)</th>
                        <th>Semana 4
                          <br>(<?php echo date("d-m-Y", strtotime($cuartoLunes) ); ?><br>/<?php echo date("d-m-Y", strtotime($cuartoDomingo) ); ?>)</th>

                        <th >Semana 5<br>(<?php echo date("d-m-Y", strtotime($quintoLunes) ); ?> <br>/<?php echo date("d-m-Y", strtotime($lastDay) ); ?>)</th>
                       <th>Venta Mensual</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php  

                     $query = "SELECT location.CITY, SUM(GRANDTOTAL) as GRANDTOTAL, SUM(NUMOFITEMS) as NUMOFITEMS FROM transaction INNER JOIN location WHERE transaction.CITY = location.CITY GROUP BY location.CITY";            


                      $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
            while ($row = mysqli_fetch_assoc($result)) {
              if($contador%2==0)
              {
              echo '<tr style="background-color: #FA4616;color: #FFF;">';
              }else{
               echo '<tr>';
              }
             echo '<td>'. $row['CITY'].'</td>';
                     $city=$row['CITY'];
//Venta Semana 1
            echo '<td>';
                    $query1 = "SELECT SUM(GRANDTOTAL) as GRANDTOTAL1 FROM transaction WHERE CITY LIKE '{$row['CITY']}%' AND date(DATE) BETWEEN '{$firstDay}%' AND '{$primerDomingo}%'";            

                      $result1 = mysqli_query($db, $query1) or die (mysqli_error($db));
        
                      while ($row = mysqli_fetch_assoc($result1)) {

                      echo number_format($row['GRANDTOTAL1'], 2, '.', ',');
                      }
            echo '</td>';

//Venta Semana 2

            echo '<td>';
                    $query2 = "SELECT SUM(GRANDTOTAL) as GRANDTOTAL1 FROM transaction WHERE CITY LIKE '{$city}%' AND date(DATE) BETWEEN '{$segundoLunes}%' AND '{$segundoDomingo}%'";            


                      $result1 = mysqli_query($db, $query2) or die (mysqli_error($db));
        
                      while ($row = mysqli_fetch_assoc($result1)) {

                      echo number_format($row['GRANDTOTAL1'], 2, '.', ',');
                      }
            echo '</td>';

//Venta Semana 3

            echo '<td>';
                    $query3 = "SELECT SUM(GRANDTOTAL) as GRANDTOTAL1 FROM transaction WHERE CITY LIKE '{$city}%' AND date(DATE) BETWEEN '{$tercerLunes}%' AND '{$tercerDomingo}%'";            


                      $result3 = mysqli_query($db, $query3) or die (mysqli_error($db));
        
                      while ($row = mysqli_fetch_assoc($result3)) {

                      echo number_format($row['GRANDTOTAL1'], 2, '.', ',');
                      }
            echo '</td>';

//Venta Semana 4
            echo '<td>';
                    $query4 = "SELECT SUM(GRANDTOTAL) as GRANDTOTAL1 FROM transaction WHERE CITY LIKE '{$city}%' AND date(DATE) BETWEEN '{$cuartoLunes}%' AND '{$cuartoDomingo}%'";            
                      $result4 = mysqli_query($db, $query4) or die (mysqli_error($db));
                      while ($row = mysqli_fetch_assoc($result4)) {
                      echo number_format($row['GRANDTOTAL1'], 2, '.', ',');
                      }
            echo '</td>';


//Venta Semana 5
            echo '<td>';
                    $query5 = "SELECT SUM(GRANDTOTAL) as GRANDTOTAL1 FROM transaction WHERE CITY LIKE '{$city}%' AND date(DATE) BETWEEN '{$quintoLunes}%' AND '{$lastDay}%'";            
                      $result5 = mysqli_query($db, $query5) or die (mysqli_error($db));
                      while ($row = mysqli_fetch_assoc($result5)) {
                      echo number_format($row['GRANDTOTAL1'], 2, '.', ',');
                      }
            echo '</td>';
//Venta Mensual
            echo '<td>';
                    $query2 = "SELECT SUM(GRANDTOTAL) as GRANDTOTAL1 FROM transaction WHERE CITY LIKE '{$city}%' AND date(DATE) BETWEEN '{$firstDay}%' AND '{$lastDay}%'";            


                      $result1 = mysqli_query($db, $query2) or die (mysqli_error($db));
        
                      while ($row = mysqli_fetch_assoc($result1)) {

                      echo number_format($row['GRANDTOTAL1'], 2, '.', ',');
                      }
            echo '</td>';
            echo '</tr> ';
            $contador=++$contador;
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