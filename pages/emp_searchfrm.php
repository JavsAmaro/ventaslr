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
  $query = 'SELECT EMPLOYEE_ID, FIRST_NAME, LAST_NAME,GENDER, EMAIL, PHONE_NUMBER, INE, SUELDO, CITY, DIRECCION, CONTRATO, HOJA_SALIDA, j.JOB_TITLE, HIRED_DATE FROM employee e join job j on j.JOB_ID=e.JOB_ID WHERE e.EMPLOYEE_ID ='.$_GET['id'];
/*
    $query = 'SELECT EMPLOYEE_ID, FIRST_NAME, LAST_NAME,GENDER, EMAIL, PHONE_NUMBER, SUELDO, j.JOB_TITLE, HIRED_DATE, l.PROVINCE, l.CITY FROM employee e join location l on e.LOCATION_ID = l.LOCATION_ID join job j on j.JOB_ID=e.JOB_ID WHERE e.EMPLOYEE_ID ='.$_GET['id'];

*/

  $result = mysqli_query($db, $query) or die(mysqli_error($db));
    while($row = mysqli_fetch_array($result))
    {   
      $zz= $row['EMPLOYEE_ID'];
      $i= $row['FIRST_NAME'];
      $ii=$row['LAST_NAME'];
      $iii=$row['GENDER'];
      $a=$row['EMAIL'];
      $b=$row['PHONE_NUMBER'];
      $c=$row['JOB_TITLE'];
      $d=$row['HIRED_DATE'];
      $h=$row['SUELDO'];
      $g=$row['DIRECCION'];
      $imageURL = $row["INE"];   
      $contratoURL = $row["CONTRATO"];              
      $salidaURL = $row["HOJA_SALIDA"]; 
      $sucursal = $row["CITY"];              
             

   


    }
      $id = $_GET['id'];

?>
          <center><div class="card shadow mb-4 col-xs-12 col-md-8 border-bottom-primary">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Detalle del Empleado</h4>
            </div>
            
            <div class="card-body">
          

                
                    <div class="form-group row text-left">
                      <div class="col-sm-6 text-primary">
                        <h5>
                          Nombre Completo<br>
                        </h5>
                      </div>
                      <div class="col-sm-6">
                        <h5>
                          : <?php echo $i; ?> <?php echo $ii; ?> <br>
                        </h5>
                      </div>
                    </div>
                    <div class="form-group row text-left">
                      <div class="col-sm-6 text-primary">
                        <h5>
                          Genero<br>
                        </h5>
                      </div>
                      <div class="col-sm-6">
                        <h5>
                          : <?php echo $iii; ?> <br>
                        </h5>
                      </div>
                    </div>
                    <div class="form-group row text-left">
                      <div class="col-sm-6 text-primary">
                        <h5>
                          Email<br>
                        </h5>
                      </div>
                      <div class="col-sm-6">
                        <h5>
                          : <?php echo $a; ?> <br>
                        </h5>
                      </div>
                    </div>
                    <div class="form-group row text-left">
                      <div class="col-sm-6 text-primary">
                        <h5>
                          Télefono #<br>
                        </h5>
                      </div>
                      <div class="col-sm-6">
                        <h5>
                          : <?php echo $b; ?> <br>
                        </h5>
                      </div>
                    </div>
                    <div class="form-group row text-left">
                      <div class="col-sm-6 text-primary">
                        <h5>
                          Rol<br>
                        </h5>
                      </div>
                      <div class="col-sm-6">
                        <h5>
                          : <?php echo $c; ?> <br>
                        </h5>
                      </div>
                    </div>
                    <div class="form-group row text-left">
                      <div class="col-sm-6 text-primary">
                        <h5>
                          Fecha de Contratación<br>
                        </h5>
                      </div>
                      <div class="col-sm-6">
                        <h5>
                          : <?php echo $d; ?> <br>
                        </h5>
                      </div>
                    </div>

                    <div class="form-group row text-left">
                      <div class="col-sm-6 text-primary">
                        <h5>
                          Sueldo<br>
                        </h5>
                      </div>
                      <div class="col-sm-6">
                        <h5>
                          : <?php echo $h; ?> <br>
                        </h5>
                      </div>
                    </div>
                    <div class="form-group row text-left">
                      <div class="col-sm-6 text-primary">
                        <h5>
                          Dirección<br>
                        </h5>
                      </div>
                      <div class="col-sm-6">
                        <h5>
                          : <?php echo $g; ?> <br>
                        </h5>
                      </div>
                    </div>
                    
                    <div class="form-group row text-left">
                      <div class="col-sm-6 text-primary">
                        <h5>
                          Sucursal<br>
                        </h5>
                      </div>
                      <div class="col-sm-6">
                        <h5>
                          : <?php echo $sucursal; ?> <br>
                        </h5>
                      </div>
                    </div>

                   <div class="form-group row text-left">

                      <div class="col-sm-4" id="image-description">
                        <a href="img/<?php echo $imageURL ?>" >
                          <h5>Ver INE</h5>
                        
                        </a>
                          <br>
                      </div>
                     <div class="col-sm-4" id="contrato-description">
                        <a href="img/<?php echo $contratoURL ?>">
                          <h5>Ver Contrato</h5>
                        
                        </a>
                          <br>
                      </div>
                     
                    <div class="col-sm-4" id="hoja_salida-link">
                        <a href="img/<?php echo $salidaURL ?>">
                          <h5>Ver Hoja de Salida</h5>
                          </a>
                          <br>
                      </div>

                    </div>


      <div class="row">
        
        <div class="col-6" id="admin">
          <a onclick="goBack()" style="color: #fff;" type="button" class="btn btn-primary bg-gradient-primary btn-block"> <i class="fas fa-flip-horizontal fa-fw fa-share"></i> Volver </a>
        </div>

        <div class="col-6">
                   <a  href="emp_del.php?varname=<?php echo $id ?>" type="button" class="btn btn-danger bg-gradient-danger btn-block" > <i class="fas fa-fw fa-ban"></i>Eliminar</a>
        </div>

      </div>



                      </div>
                    </div>

          </div>
          </div>

<script type="text/javascript">
  
var ine = '<?php echo $imageURL; ?>';
var contrato = '<?php echo $contratoURL; ?>';
var hoja_salida = '<?php echo $salidaURL; ?>';


//ine = null;


if (ine != 0) {
    document.getElementById('image-description').style.display = 'block';
} else {
    document.getElementById('image-description').style.display = 'none';
}


if (contrato != 0) {
    document.getElementById('contrato-description').style.display = 'block';
} else {
    document.getElementById('contrato-description').style.display = 'none';
}


if (hoja_salida != 0) {
    document.getElementById('hoja_salida-link').style.display = 'block';
} else {
    document.getElementById('hoja_salida-link').style.display = 'none';
}


function goBack() {
  window.history.back();
}
</script>




<?php
include'../includes/footer.php';
?>