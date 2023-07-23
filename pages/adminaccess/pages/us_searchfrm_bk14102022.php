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
    alert("Pagina Restringida! Serás redireccionado a POS");
    window.location = "pos.php";
  </script>
<?php
  }           
}
  $query2 = 'SELECT ID, e.FIRST_NAME, e.LAST_NAME, e.GENDER, e.SUELDO, e.DIRECCION, e.INE, e.CONTRATO, e.HOJA_SALIDA, USERNAME, PASSWORD, e.EMAIL, PHONE_NUMBER, j.JOB_TITLE, e.HIRED_DATE, t.TYPE
            FROM users u
            join employee e on u.EMPLOYEE_ID = e.EMPLOYEE_ID
            join job j on e.JOB_ID=j.JOB_ID
            join type t on u.TYPE_ID=t.TYPE_ID
            WHERE ID ='.$_GET['id'];

  $result2 = mysqli_query($db, $query2) or die(mysqli_error($db));
    while($row = mysqli_fetch_array($result2))
    {   
      $zz= $row['ID'];
      $a= $row['FIRST_NAME'];
      $b=$row['LAST_NAME'];
      $c=$row['GENDER'];
      $d=$row['USERNAME'];
      $e=$row['PASSWORD'];
      $f=$row['EMAIL'];
      $g=$row['PHONE_NUMBER'];
      $h=$row['JOB_TITLE'];
      $i=$row['HIRED_DATE'];
      $j=$row['SUELDO'];
      $k=$row['DIRECCION'];
      $l=$row['TYPE'];
      $imageURL = $row["INE"];   
      $contratoURL = $row["CONTRATO"];              
      $salidaURL = $row["HOJA_SALIDA"]; 




    }
    $id = $_GET['id'];
?>
          <center><div class="card shadow mb-4 col-xs-12 col-md-8 border-bottom-primary">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Detalles de <?php echo $a; ?></h4>
            </div>
            <div class="card-body">
                
                    <div class="form-group row text-left">
                      <div class="col-sm-6 text-primary">
                        <h5>
                          Nombre<br>
                        </h5>
                      </div>
                      <div class="col-sm-6">
                        <h5>
                          : <?php echo $a; ?> <?php echo $b; ?> <br>
                        </h5>
                      </div>
                    </div>
                    <div class="form-group row text-left">
                      <div class="col-sm-6 text-primary">
                        <h5>
                          Género<br>
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
                          Usuario<br>
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
                          Email<br>
                        </h5>
                      </div>
                      <div class="col-sm-6">
                        <h5>
                          : <?php echo $f; ?> <br>
                        </h5>
                      </div>
                    </div>
                    <div class="form-group row text-left">
                      <div class="col-sm-6 text-primary">
                        <h5>
                          Contacto #<br>
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
                          Dirección <br>
                        </h5>
                      </div>
                      <div class="col-sm-6">
                        <h5>
                          : <?php echo $k; ?> <br>
                        </h5>
                      </div>
                    </div>


                    <div class="form-group row text-left">
                      <div class="col-sm-6 text-primary">
                        <h5>
                          Sueldo base #<br>
                        </h5>
                      </div>
                      <div class="col-sm-6">
                        <h5>
                          : <?php echo $j; ?> <br>
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
                          : <?php echo $h; ?> <br>
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
                          : <?php echo $i; ?> <br>
                        </h5>
                      </div>
                    </div>
                    <div class="form-group row text-left">
                      <div class="col-sm-6 text-primary">
                        <h5>
                          Tipo de Cuenta<br>
                        </h5>
                      </div>
                      <div class="col-sm-6">
                        <h5>
                          : <?php echo $l; ?> <br>
                        </h5>
                      </div>
                    </div>

                   <div class="form-group row text-left">

                      <div class="col-sm-4" id="image-description" style="text-align-last: center;">
                        <a href="img/<?php echo $imageURL ?>" >
                          <h5>Ver INE</h5>
                        
                        </a>

                      </div>
                     <div class="col-sm-4" id="contrato-description" style="text-align-last: center;">
                        <a href="img/<?php echo $contratoURL ?>">
                          <h5>Ver Contrato</h5>
                        
                        </a>

                      </div>
                     
                    <div class="col-sm-4" id="hoja_salida-link" style="text-align-last: center;">
                        <a href="img/<?php echo $salidaURL ?>">
                          <h5>Ver Hoja de Salida</h5>
                          </a>

                      </div>

                    <div class="col-sm-12" id="sin-documentacion" style="text-align-last: center;">
                          <h5>El usuario no tiene Documentación</h5>

                      </div>
                 </div>

            <div class="row">
              <div class="col-sm-6" id="admin">
                   <a onclick="goBack()" style="color: #fff;" type="button" class="btn btn-primary bg-gradient-primary btn-block"> <i class="fas fa-flip-horizontal fa-fw fa-share"></i> Volver </a>

              </div>
              
              <div class="col-6" >

                  <a  href="us_del.php?varname=<?php echo $id ?>" type="button" class="btn btn-danger bg-gradient-danger btn-block" > <i class="fas fa-fw fa-ban"></i>Eliminar</a>
         
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

if (hoja_salida == 0 && contrato == 0 && ine == 0) {
    document.getElementById('sin-documentacion').style.display = 'block';
} else {
    document.getElementById('sin-documentacion').style.display = 'none';
}

function goBack() {
  window.history.back();
}

</script>



<?php
include'../includes/footer.php';
?>