<?php
include'../includes/connection.php';
include'../includes/topp.php';
           $id = $_GET['id'];
           $fd = $_GET['fd'];
           $ld = $_GET['ld'];
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
            ?>
            
            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Procuctos&nbsp;</h4>
            </div>
            
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
                  <thead>
                        <tr>
                          <th>Nombre del producto</th>
                          <th>Intermediario</th>
                          <th>Cantidad</th>
                          <th>Precio unitario</th>
                          <th>Total</th>
                        </tr>
                     </thead>
                    <tbody>
                    <?php    

                    //AND date(t2.DATE) BETWEEN '{$firstDay}%' AND '{$lastDay}%'

                    $query = "SELECT t1.PRODUCTS, t1.TRANS_D_ID,t1.PRICE,t2.INTERMEDIARIO, SUM(QTY) as QTY  
                    FROM transaction_details t1 
                    INNER JOIN transaction t2
                            ON t1.TRANS_D_ID = t2.TRANS_D_ID WHERE t2.CITY LIKE '{$_SESSION['CITY']}%' AND t1.PRODUCTS LIKE '{$id}%' AND date(t2.DATE) BETWEEN '{$fd}%' AND '{$ld}%'
                     GROUP BY t2.INTERMEDIARIO";

                        $result = mysqli_query($db, $query) or die (mysqli_error($db));
                        while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>';
                        echo '<td>'. $row['PRODUCTS'].'</td>';

                      if ($row['INTERMEDIARIO']== "1") {
                      echo '<td>Sucursal</td>';
                      }
                     if ($row['INTERMEDIARIO']== "2") {
                      echo '<td>DIDI</td>';
                      }
                     if ($row['INTERMEDIARIO'] == "3") {
                      echo '<td>UBER</td>';
                      }
                      if ($row['INTERMEDIARIO'] == "4") {
                      echo '<td>Sin Delantal</td>';
                      }
                      if ($row['INTERMEDIARIO']== "5") {
                      echo '<td>Rappi</td>';
                      }

                        echo '<td>'. $row['QTY'].'</td>';
                        echo '<td>'. $row['PRICE'].'</td>';

                        $total=$row['QTY']*$row['PRICE'];
                      
                        echo '<td>'. $total.'</td>';


                        echo '</tr>';
                        }
                    ?> 
                                    
                    </tbody>
                </table>
              </div>
                    <div class="row">
        
        <div class="col-6" id="admin">
          <a onclick="goBack()" style="color: #fff;" type="button" class="btn btn-primary bg-gradient-primary btn-block"> <i class="fas fa-flip-horizontal fa-fw fa-share"></i> Volver </a>
        </div>

      </div>
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