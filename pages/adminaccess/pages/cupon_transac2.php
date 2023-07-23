<?php
include'../includes/connection.php';
include'../includes/topp.php';
?>

      
          <!-- Page Content -->
          <div class="col-lg-12">
 
            <?php
        date_default_timezone_set('America/Mexico_City');

$script_tz = date_default_timezone_get();
              $codigo = $_POST['codigo'];
              /*$fecha = $_POST['fecha'];*/
              $descripcion = $_POST['descripcion'];
              $descuento = $_POST['descuento'];
              $sucursal = $_SESSION['CITY'];


              $fecha = date('Y-m-d h:i:s', time());  

             switch($_GET['action']){
                case 'add':     
                    $query = "INSERT INTO cupones
                    (ID_CUPON, CODIGO, DATE, DESCRIPCION, DESCUENTO, CITY)
                    VALUES (Null,'{$codigo}','{$fecha}','{$descripcion}','{$descuento}','{$sucursal}')";

                    mysqli_query($db,$query)or die ('Error al actualizar la base de datos');

                break;

              }



            ?>





              <script type="text/javascript">

      alert("Cupón registrado con exito.");

                window.location = "cupones.php";
              </script>
          </div>

<?php
include'../includes/footer.php';
?>