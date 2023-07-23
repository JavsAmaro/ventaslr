<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
?>
            <?php
             $nombreImg=$_FILES['image']['name'];
             $nombreContrato=$_FILES['contrato']['name'];

    $ruta=$_FILES['image']['tmp_name'];
   /* $destino="img/".$nombreImg;*/
$target_Path = "img/";
$target_Path = $target_Path.basename( $_FILES['image']['name'] );
move_uploaded_file( $_FILES['image']['tmp_name'], $target_Path );


$ruta2=$_FILES['contrato']['tmp_name'];
   /* $destino="img/".$nombreImg;*/
$target_Path2 = "img/";
$target_Path2 = $target_Path2.basename( $_FILES['contrato']['name'] );
move_uploaded_file( $_FILES['contrato']['tmp_name'], $target_Path2 );



              $fname = $_POST['firstname'];
              $lname = $_POST['lastname'];
              $gen = $_POST['gender'];
              $email = $_POST['email'];
              $phone = $_POST['phonenumber'];
              $jobb = $_POST['jobs'];
              $hdate = $_POST['hireddate'];
              /*$prov = $_POST['province'];*/
              $sueldo = $_POST['sueldo'];
              $sucursal = $_POST['city'];
              $direccion = $_POST['direccion'];


switch($_GET['action']){
                case 'add':     
                    $query1 = "INSERT INTO employee 
                    (EMPLOYEE_ID, FIRST_NAME, LAST_NAME,GENDER, EMAIL, PHONE_NUMBER, JOB_ID, HIRED_DATE, SUELDO, CITY, DIRECCION, INE, CONTRATO) VALUES (Null,'{$fname}','{$lname}','{$gen}','{$email}','{$phone}','{$jobb}','{$hdate}','{$sueldo}','{$sucursal}', '{$direccion}','{$nombreImg}', '{$nombreContrato}')";
                   $res1=mysqli_query($db,$query1)or die ('Error al actualizar la base de datos');
              }
            ?>


<?php
if ($_SESSION['TYPE'] == 'Admin'){
             ?>    <script type="text/javascript">
                  window.location = "employee.php";
                  </script>
             <?php   } if ($_SESSION['TYPE'] == 'Encargado'){?>
                  <script type="text/javascript">
                window.location = "employee-encargado.php";
                  </script><?php   }?>


              <script type="text/javascript">
                      alert("Corte realizado con exito con éxito.");

              </script>





          </div>

<?php
include'../includes/footer.php';
?>