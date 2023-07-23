<?php
include'../includes/connection.php';
include'../includes/sidebar_encargado.php';

  $query = 'SELECT ID, t.TYPE
            FROM users u
            JOIN type t ON t.TYPE_ID=u.TYPE_ID WHERE ID = '.$_SESSION['MEMBER_ID'].'';
  $result = mysqli_query($db, $query) or die (mysqli_error($db));
  
  while ($row = mysqli_fetch_assoc($result)) {
            $Aa = $row['TYPE'];
                   
  if ($Aa=='User'){
?>
  <script type="text/javascript">
    //then it will be redirected
    alert("¡Página restringida! Serás redirigido a POS");
    window.location = "pos.php";
  </script>
<?php
  }           
}
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
             <?php   }
                         
           
}   
  $query = 'SELECT * FROM customer WHERE CUST_ID ='.$_GET['id'];
  $result = mysqli_query($db, $query) or die(mysqli_error($db));
    while($row = mysqli_fetch_array($result))
    {   
      $zz= $row['CUST_ID'];
      $i= $row['FIRST_NAME'];
      $a=$row['LAST_NAME'];
      $b=$row['PHONE_NUMBER'];
      $c=$row['DIRECCION'];
    }
    $id = $_GET['id'];
?>
  
<?php
    $query = 'SELECT SUM(NUMOFITEMS) as NUMOFITEMS, SUM(GRANDTOTAL) as GRANDTOTAL FROM transaction  WHERE CUST_ID ='.$_GET['id'];
  $result = mysqli_query($db, $query) or die(mysqli_error($db));
    while($row = mysqli_fetch_array($result))
    {   
      $NumOfItems= $row['NUMOFITEMS'];
      $sumaGrandtotal= $row['GRANDTOTAL'];
    }
    $id = $_GET['id'];
?>          
            <center><div class="card shadow mb-4 col-xs-12 col-md-8 border-bottom-primary">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Detalles del Cliente</h4>
            </div>
         
            <div class="card-body">
              <div class="row">

                 <div class="table-responsive col-sm-12 col-lg-7">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">        
                  <thead>
                      <tr>
                       <th>Fecha</th>
                        <th>Items</th>
                        <th>Pago</th>
                        <th>Consumo</th>
                        <th>Método de Pago</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php  

                    $query = 'SELECT * FROM transaction WHERE CUST_ID ='.$_GET['id'];

                      //$query = "SELECT * FROM customer WHERE CITY  LIKE '{$_SESSION['CITY']}%'"; SUM(GRANDTOTAL) as GRANDTOTAL

                  //$query = "SELECT * FROM transaction INNER JOIN customer WHERE transaction.CUST_ID = customer.CUST_ID AND customer.CITY LIKE '{$_SESSION['CITY']}%' GROUP BY customer.CUST_ID ";               


                      $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
                      while ($row = mysqli_fetch_assoc($result)) {


                      echo '<tr>';
                      echo '<td>'. $row['DATE'].'</td>';
                      echo '<td>'. $row['NUMOFITEMS'].'</td>';
                      echo '<td>'. $row['CASH'].'</td>';
                      echo '<td>'. $row['GRANDTOTAL'].'</td>';
                       if($row['METODO_PAGO'] == "1")
                           {
                             echo '<td>Efectivo';
                           }if($row['METODO_PAGO'] == "2"){
                             echo '<td> Tarjeta';
                           } 
                           '</td>';

                      echo '</tr> ';
                      }
                    ?>


            </tbody>
                </table>

            </div>

                <div class="col-sm-12 col-lg-5">

                    <div class="form-group row text-left">

                      <div class="col-sm-6 text-primary" style="text-align:right;">
                        <h5>
                          Nombre completo<br>
                        </h5>
                      </div>

                      <div class="col-sm-6">
                        <h5>
                          : <?php echo $i; ?> <?php echo $a; ?> <br>
                        </h5>
                      </div>

                    </div>

                    <div class="form-group row text-left">

                      <div class="col-sm-6 text-primary" style="text-align: right;">
                        <h5>
                          Contacto #<br>
                        </h5>
                      </div>

                      <div class="col-sm-6">
                        <h5>
                          : <?php echo $b; ?> <br>
                        </h5>
                      </div>
                      
                    </div>
                     
                     <div class="form-group row text-left">

                      <div class="col-sm-6 text-primary" style="text-align: right;">
                        <h5>
                          Direccion <br>
                        </h5>
                      </div>

                      <div class="col-sm-6">
                        <h5>
                          : <?php echo $c; ?> <br>
                        </h5>
                      </div>
                      
                    </div>




                    <div class="form-group row text-left">

                      <div class="col-sm-6 text-primary" style="text-align: right;">
                        <h5>
                          Numero de items #<br>
                        </h5>
                      </div>

                      <div class="col-sm-6">
                        <h5>
                          : <?php echo $NumOfItems; ?> <br>
                        </h5>
                      </div>
                      
                    </div>



                    <div class="form-group row text-left">

                      <div class="col-sm-6 text-primary" style="text-align: right;">
                        <h5>
                          Compras<br>
                        </h5>
                      </div>

                      <div class="col-sm-6">
                        <h5>
                          : $<?php echo $sumaGrandtotal; ?> <br>
                        </h5>
                      </div>
                      
                    </div>

                  </div>
           </div>

           <br>




            <div class="row">
              <div class="col-sm-12 col-lg-6" id="encargado">
                   <a onclick="goBack()" style="color: #fff;" type="button" class="btn btn-primary bg-gradient-primary btn-block"> <i class="fas fa-flip-horizontal fa-fw fa-share"></i> Volver </a>
              </div>

           <div class="col-sm-12 col-lg-6" >

         <a  href="cust_del.php?varname=<?php echo $id ?>" type="button" class="btn btn-danger bg-gradient-danger btn-block" > <i class="fas fa-fw fa-ban"></i>Eliminar</a>
         
        </div>

            </div>
<script>
function goBack() {
  window.history.back();
}
</script>
<?php
include'../includes/footer.php';
?>