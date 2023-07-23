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
                          <th>Nombre del proveedor</th>
                          <th>Descripción</th>
                          <th>Monto</th>
                          <th>Fecha</th>
                          <th>Acción</th>

                      </tr>
                  </thead>
                  <tbody>
                    <?php                  
                      $query = "SELECT * FROM cortes WHERE PROVEEDOR LIKE '{$id}%' AND date(DATE) BETWEEN '{$fd}%' AND '{$ld}%' AND TIPO LIKE '2' AND CITY LIKE '{$_SESSION['CITY']}%'";
                      $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
                      while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>';
                        echo '<td>'. $row['PROVEEDOR'].'</td>';
                        echo '<td>'. $row['DESCRIPCION'].'</td>';
                        echo '<td>'. $row['MONTO'].'</td>';
                        echo '<td>'. $row['DATE'].'</td>';
                       echo '<td align="right"> <div class="btn-group">
                              <a type="button" class="btn btn-danger bg-gradient-danger" href="cortes_del.php? id='.$row['ID_CORTE'] . '"><i class="fas fa-fw fa-list-alt"></i> Eliminar</a>

                          </div> </td>';
                        echo '</tr>';
      
                     }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
      
      <div class="row">
        <div class="col-6" id="admin">
          <a onclick="goBack()" style="color: #fff;" type="button" class="btn btn-primary bg-gradient-primary btn-block"> <i class="fas fa-flip-horizontal fa-fw fa-share"></i> Volver </a>
        </div>

  <br>
      </div>
  <br>






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