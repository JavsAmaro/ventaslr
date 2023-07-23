<?php
include'../includes/connection.php';
include'../includes/sidebar.php';

 $sucursal = "No elegida";

$sql = "SELECT DISTINCT LOCATION_ID, CITY FROM location";
$result = mysqli_query($db, $sql) or die ("Bad SQL: $sql");

$opt = "<select class='form-control' name='location' required>
      <option value='' disabled selected hidden>Seleccionar Sucursal</option>";
  while ($row = mysqli_fetch_assoc($result)) {
    $opt .= "<option value='".$row['CITY']."'>".$row['CITY']." </option>";
  }

$opt .= "</select>";


?>





<?php 

                $query = 'SELECT ID, t.TYPE
                          FROM users u
                          JOIN type t ON t.TYPE_ID=u.TYPE_ID WHERE ID = '.$_SESSION['MEMBER_ID'].'';
                $result = mysqli_query($db, $query) or die (mysqli_error($db));
      
                while ($row = mysqli_fetch_assoc($result)) {
                          $Aa = $row['TYPE'];
                   
if ($Aa=='User'){
           
             ?>    <script type="text/javascript">
                      //then it will be redirected
                      alert("¡Página restringida! Serás redirigido a POS");
                      window.location = "pos.php";
                  </script>
             <?php   }if ($Aa=='Encargado'){
           
             ?> <script type="text/javascript">
                      //then it will be redirected
                      alert("¡Página restringida! Serás redirigido a tu panel de administrador");
                      window.location = "customer-encargado.php";
                  </script>
                         <?php }
           
}   
            ?>
            


<?php



 if(isset($_POST['submit'])) {
      $sucursal = $_POST['location'];

  }


?>

          <div class="card shadow mb-4">
            <div class="card-header py-3 row">

            <div class="card-header py-12 col-sm-6 col-md-4">

              <h4 class="m-2 font-weight-bold text-primary">Cliente&nbsp;<a  href="#" data-toggle="modal" data-target="#customerModal" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a></h4>
            </div>


            <div class="card-header py-12 col-sm-6 col-md-4">
              
              <form action="" method="POST" style="display: flex;">
               <?php
                  echo $opt;
                ?>

                <input style="margin: 0px 10px;" type="submit" name="submit" value="Buscar">
              </form>

            </div>


            <div class="card-header py-12 col-sm-6 col-md-4">
                  <span class="m-2 font-weight-bold " style="float: right;">Sucursal <?php echo  $sucursal;?> </span>
            </div>
            </div> 




            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">        
                  <thead>
                      <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Télefono</th>
                        <th>Dirección</th>
                        <th>Consumo</th>
                        <th># Items</th>

                       <th>Acción</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php  

                     $query = "SELECT customer.CUST_ID, FIRST_NAME, LAST_NAME, PHONE_NUMBER, DIRECCION, SUM(GRANDTOTAL) as GRANDTOTAL, SUM(NUMOFITEMS) as NUMOFITEMS FROM transaction INNER JOIN customer WHERE transaction.CUST_ID = customer.CUST_ID AND transaction.CITY LIKE '{$sucursal}%' GROUP BY customer.CUST_ID";

                      //$query = "SELECT * FROM customer WHERE CITY  LIKE '{$_SESSION['CITY']}%'"; SUM(GRANDTOTAL) as GRANDTOTAL

                  //$query = "SELECT * FROM transaction INNER JOIN customer WHERE transaction.CUST_ID = customer.CUST_ID AND customer.CITY LIKE '{$_SESSION['CITY']}%' GROUP BY customer.CUST_ID ";               


                      $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
                      while ($row = mysqli_fetch_assoc($result)) {


                      echo '<tr>';
                      echo '<td>'. $row['FIRST_NAME'].'</td>';
                      echo '<td>'. $row['LAST_NAME'].'</td>';
                      echo '<td>'. $row['PHONE_NUMBER'].'</td>';
                      echo '<td>'. $row['DIRECCION'].'</td>';
                      echo '<td>'. $row['GRANDTOTAL'].'</td>';
                      echo '<td>'. $row['NUMOFITEMS'].'</td>';
                      echo '<td align="right"> <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary" href="cust_searchfrm.php?action=edit & id='.$row['CUST_ID'] . '"><i class="fas fa-fw fa-list-alt"></i> Detalles</a>
                            <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary dropdown no-arrow" data-toggle="dropdown" style="color:white;">
                              ... <span class="caret"></span></a>
                            <ul class="dropdown-menu text-center" role="menu">
                                <li>
                                  <a type="button" class="btn btn-warning bg-gradient-warning btn-block" style="border-radius: 0px;" href="cust_edit.php?action=edit & id='.$row['CUST_ID']. '">
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