<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
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
                      alert("¡Página restringida! Serás redirizgido a POS");
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
                        <th>Sucursal</th>
                       <th>Venta Total</th>
                        <th>Productos Totales</th>
                       <th>Acción</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php  

                     $query = "SELECT location.CITY, SUM(GRANDTOTAL) as GRANDTOTAL, SUM(NUMOFITEMS) as NUMOFITEMS FROM transaction INNER JOIN location WHERE transaction.CITY = location.CITY GROUP BY location.CITY";

                      //$query = "SELECT * FROM customer WHERE CITY  LIKE '{$_SESSION['CITY']}%'"; SUM(GRANDTOTAL) as GRANDTOTAL

                  //$query = "SELECT * FROM transaction INNER JOIN customer WHERE transaction.CUST_ID = customer.CUST_ID AND customer.CITY LIKE '{$_SESSION['CITY']}%' GROUP BY customer.CUST_ID ";               


                      $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
                      while ($row = mysqli_fetch_assoc($result)) {


                      echo '<tr>';
                      echo '<td>'. $row['CITY'].'</td>';
                      echo '<td>'. number_format($row['GRANDTOTAL'], 2, '.', ',').'</td>';
                      echo '<td>'. number_format($row['NUMOFITEMS']).'</td>';
                      echo '<td align="right"> <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary" href="sucursal_searchfrm.php?action=edit & id='.$row['CITY'] . '"><i class="fas fa-fw fa-list-alt"></i> Detalles</a>
                            <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary dropdown no-arrow" data-toggle="dropdown" style="color:white;">
                              ... <span class="caret"></span></a>
                            <ul class="dropdown-menu text-center" role="menu">
                                <li>
                                  <a type="button" class="btn btn-warning bg-gradient-warning btn-block" style="border-radius: 0px;" href="cust_edit.php?action=edit & id='.$row['CITY']. '">
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