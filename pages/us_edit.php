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
/*$sql = "SELECT DISTINCT TYPE, TYPE_ID FROM type";
$result = mysqli_query($db, $sql) or die ("Bad SQL: $sql");

$opt = "<select class='form-control' name='type'>";
  while ($row = mysqli_fetch_assoc($result)) {
    $opt .= "<option value='".$row['TYPE_ID']."'>".$row['TYPE']."</option>";
  }*/


$sql = "SELECT DISTINCT JOB_ID, JOB_TITLE FROM job";
$result = mysqli_query($db, $sql) or die ("Bad SQL: $sql");

$opt = "<select class='form-control' name='puesto'>";
  while ($row = mysqli_fetch_assoc($result)) {
    $opt .= "<option value='".$row['JOB_ID']."'>".$row['JOB_TITLE']."</option>";
  }
$opt .= "</select>";

        $query = "SELECT ID, e.FIRST_NAME, e.LAST_NAME, USERNAME, PASSWORD, j.JOB_TITLE, t.TYPE
                      FROM users u
                      join employee e on u.EMPLOYEE_ID = e.EMPLOYEE_ID
                      join job j on e.JOB_ID=j.JOB_ID
                      join type t on u.TYPE_ID=t.TYPE_ID
                      WHERE ID =".$_GET['id'];
        $result = mysqli_query($db, $query) or die(mysqli_error($db));
          while($row = mysqli_fetch_array($result))
          {  
      $zz= $row['ID'];
      $a= $row['FIRST_NAME'];
      $b=$row['LAST_NAME'];
      $d=$row['USERNAME'];
      $e=$row['PASSWORD'];
      $h=$row['JOB_TITLE'];
      $l=$row['TYPE'];
 
          }
            $id = $_GET['id'];
      ?>


<?php

// JOB SELECT OPTION TAB
$sql = "SELECT DISTINCT TYPE, TYPE_ID FROM type";
$result = mysqli_query($db, $sql) or die ("Bad SQL: $sql");

$opt2 = "<select class='form-control' name='type'>";
  while ($row = mysqli_fetch_assoc($result)) {
    $opt2 .= "<option value='".$row['TYPE_ID']."'>".$row['TYPE']."</option>";
  }

$opt2 .= "</select>";
?>




  <center><div class="card shadow mb-4 col-xs-12 col-md-8 border-bottom-primary">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Editar Cuenta de Usuario</h4>
            </div>
            <div class="card-body" style="align-self: center;">
      

            <form role="form" method="post" action="us_edit1.php">
              <input type="hidden" name="id" value="<?php echo $zz; ?>" />

              <div class="form-group row text-left text-warning">
                <div class="col-sm-6" style="padding-top: 5px;">
                 Nombre:
                </div>
                <div class="col-sm-6">
                 <?php echo $a; ?> <?php echo $b; ?>
                </div>
              </div>

              <div class="form-group row text-left text-warning">
                <div class="col-sm-6" style="padding-top: 5px;">
                 Usuario:
                </div>
                <div class="col-sm-6">
                  <input class="form-control" placeholder="Usuario" name="username" value="<?php echo $d; ?>" required>
                </div>
              </div>
              <div class="form-group row text-left text-warning">
                <div class="col-sm-6" style="padding-top: 5px;">
                 Contraseña:
                </div>
                <div class="col-sm-6">
                  <input type="password" class="form-control" placeholder="Contraseña" name="password" value="" required>
                </div>
              </div>

            
<!--

             <div class="form-group row text-left text-warning">
                <div class="col-sm-6" style="padding-top: 5px;">
                 Tipo de cuenta:
                </div>
                <div class="col-sm-6">
    
                  <select class='form-control' name='type' required>
                    <option value="2">Usuario</option>
                    <option value="3">Encargado</option>

                  </select>


                </div>
              </div>
-->



        </div>
       <hr>
            <div class="row">
              <div class="col-sm-6">
                  <a  type="button" class="btn btn-primary bg-gradient-primary btn-block" onclick="goBack()" style="color: #fff;" > <i class="fas fa-flip-horizontal fa-fw fa-share"></i> Volver </a>
              </div>
         <div class="col-6" >
         <button type="submit" class="btn btn-danger bg-gradient-danger btn-block"><i class="fa fa-edit fa-fw"></i>Actualizar</button>  
 
              </div>
            </div>
              <br>
              </form>  
    
          </div></center>
<script>
  function goBack() {
  window.history.back();
}
</script>

<?php
include'../includes/footer.php';
?>