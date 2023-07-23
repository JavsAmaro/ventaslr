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

// JOB SELECT OPTION TAB
$sql = "SELECT DISTINCT JOB_TITLE, JOB_ID FROM job";
$result = mysqli_query($db, $sql) or die ("Bad SQL: $sql");

$opt = "<select class='form-control' name='job' required>";
  while ($row = mysqli_fetch_assoc($result)) {
    $opt .= "<option value='".$row['JOB_ID']."'>".$row['JOB_TITLE']."</option>";
  }

$opt .= "</select>";
 $query = 'SELECT EMPLOYEE_ID, FIRST_NAME, LAST_NAME, EMAIL, PHONE_NUMBER, SUELDO,CITY, DIRECCION,GENDER, j.JOB_TITLE, HIRED_DATE FROM employee e join job j on j.JOB_ID=e.JOB_ID WHERE EMPLOYEE_ID ='.$_GET['id'];



 /*
        $query = 'SELECT EMPLOYEE_ID, FIRST_NAME, LAST_NAME, EMAIL, PHONE_NUMBER, SUELDO, DIRECCION, j.JOB_TITLE, HIRED_DATE, l.PROVINCE, l.CITY FROM employee e join location l on l.LOCATION_ID=e.LOCATION_ID join job j on j.JOB_ID=e.JOB_ID WHERE EMPLOYEE_ID ='.$_GET['id'];
*/


        $result = mysqli_query($db, $query) or die(mysqli_error($db));
          while($row = mysqli_fetch_array($result))
          {   
            $zz = $row['EMPLOYEE_ID'];
            $fname = $row['FIRST_NAME'];
            $lname = $row['LAST_NAME'];
            $email = $row['EMAIL'];
            $phone = $row['PHONE_NUMBER'];
            $jobb = $row['JOB_TITLE'];
            $hdate = $row['HIRED_DATE'];
            $direccion = $row['DIRECCION'];
            $sueldo=$row['SUELDO'];
            $genero=$row['GENDER'];

          }
            $id = $_GET['id'];
     ?>


  <center><div class="card shadow mb-4 col-xs-12 col-md-8 border-bottom-primary">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Editar Empleado</h4>
            </div>
            <div class="card-body">
          
            <form role="form" method="post" action="emp_edit1.php" enctype="multipart/form-data">
              <input type="hidden" name="id" value="<?php echo $zz; ?>" />
              <div class="form-group row text-left text-primary">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Nombre:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="Nombre" name="firstname" value="<?php echo $fname; ?>" required>
                </div>
              </div>
              <div class="form-group row text-left text-primary">
                <div class="col-sm-3" style="padding-top: 5px;">
                Apellido:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="Apellido" name="lastname" value="<?php echo $lname; ?>" required>
                </div>
              </div>
              <div class="form-group row text-left text-primary">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Genero:
                </div>
                <div class="col-sm-9">
                  <select class='form-control' name='gender' required>
                    <option value="<?php echo $genero;?>" disabled selected hidden><?php echo $genero; ?></option>
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                    <option value="Otro">Otro</option>
                    
                  </select>
                </div>
              </div>
              <div class="form-group row text-left text-primary">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Email:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
                </div>
              </div>
              <div class="form-group row text-left text-primary">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Teléfono:
                </div>
                <div class="col-sm-9">
                   <input class="form-control" placeholder="Teléfono" name="phone" value="<?php echo $phone; ?>" required>
                </div>
              </div>

              <div class="form-group row text-left text-primary">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Puesto:
                </div>
                <div class="col-sm-9">
                <div class="form-group">
                <?php
                  echo $opt;
                ?>
              </div>            

                </div>
              </div>
              <div class="form-group row text-left text-primary">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Fecha de contratación:
                </div>
                <div class="col-sm-9">
                  <input placeholder="Hired Date" type="date" id="FromDate" name="hireddate" value="<?php echo $hdate; ?>" class="form-control" required>
                </div>
              </div>
              
              <div class="form-group row text-left text-primary">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Direccion:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" name="direccion" value="<?php echo $direccion; ?>" required>
                </div>
              </div>

                    <div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                          Sueldo<br>
                      </div>
                      <div class="col-sm-9">
                  <input class="form-control" placeholder="Sueldo" name="sueldo" value="<?php echo $sueldo; ?>" required>
                    </div>
                </div>


                    <div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                          Agregar hoja salida<br>
                      </div>
                      <div class="col-sm-9">
                  <input type="file" class="form-control" id="image" name="image" >
                    </div>
                </div>

              <hr>
              <div class="row">

              <div class="col-6">
              <a  type="button" class="btn btn-primary bg-gradient-primary btn-block" onclick="goBack()" style="color: #fff;"> <i class="fas fa-flip-horizontal fa-fw fa-share"></i> Volver </a>
              </div>

              <div class="col-6">
                <button type="submit" class="btn btn-danger bg-gradient-danger btn-block"><i class="fa fa-edit fa-fw"></i>Actualizar</button> 
              </div>
          </div>


              </form>  
                    
            </div>
          </div></center>
<script>
function goBack() {
  window.history.back();
}
</script>
<?php
include'../includes/footer.php';
?>