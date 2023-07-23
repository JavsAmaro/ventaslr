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


?><?php 

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

            <div class="card-headerpy-12 col-sm-6 col-md-4">
              <h4 class="m-2 font-weight-bold text-primary">Empleado&nbsp;<a  href="#" data-toggle="modal" data-target="#employeeModalAdmin" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a></h4>
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
                          <th>Teléfono</th>
                          <th>Rol</th>
                          <th>Accion</th>
                        </tr>
                     </thead>
                    <tbody>
                    <?php                  
                      //  $query = 'SELECT EMPLOYEE_ID, FIRST_NAME, LAST_NAME, j.JOB_TITLE FROM employee e JOIN job j ON e.JOB_ID=j.JOB_ID';

                       $query = "SELECT * FROM employee INNER JOIN job WHERE employee.JOB_ID = job.JOB_ID AND employee.CITY LIKE '{$sucursal}%'";

                        $result = mysqli_query($db, $query) or die (mysqli_error($db));
                        while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>';
                        echo '<td>'. $row['FIRST_NAME'].'</td>';
                        echo '<td>'. $row['LAST_NAME'].'</td>';
                        echo '<td>'. $row['PHONE_NUMBER'].'</td>';
                        echo '<td>'. $row['JOB_TITLE'].'</td>';

                      echo '<td align="right"> <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary" href="emp_searchfrm.php?action=edit & id='.$row['EMPLOYEE_ID'] . '"><i class="fas fa-fw fa-list-alt"></i> Detalles</a>
                            <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary dropdown no-arrow" data-toggle="dropdown" style="color:white;">
                              ... <span class="caret"></span></a>
                            <ul class="dropdown-menu text-center" role="menu">
                                <li>
                                  <a type="button" class="btn btn-warning bg-gradient-warning btn-block" style="border-radius: 0px;" href="emp_edit.php?action=edit & id='.$row['EMPLOYEE_ID']. '">
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