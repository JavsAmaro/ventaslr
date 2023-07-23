<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
    $id = $_GET['id'];

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
            
<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Sucursales &nbsp;<a  href="#" data-toggle="modal" data-target="#sucursalModal" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a></h4>
            </div>
            
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">      
                  <thead>
                      <tr>

                        <th>Telefono</th>
                        <th>Fecha</th>
                        <th>Cliente</th>
                        <th>ID venta</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                        <th>Pago</th>
                        <th>Metodo Pago</th>
                        <th>Metodo Compra</th>
                        <th>Acción</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php  

                    // $query = "SELECT * FROM transaction INNER JOIN customer WHERE transaction.CUST_ID = customer.CUST_ID AND transaction.CITY LIKE '{$_SESSION['CITY']}%'";


                    $query = "SELECT * FROM transaction INNER JOIN customer WHERE transaction.CUST_ID = customer.CUST_ID AND transaction.CITY LIKE '{$id}%'";
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
                      echo '<td>'. $row['TRANS_D_ID'].'</td>';
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
                              <a type="button" class="btn btn-primary bg-gradient-primary" href="trans_searchfrmHoy.php?action=edit & id='.$row['TRANS_ID'] . '"><i class="fas fa-fw fa-list-alt"></i> Detalles</a>
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