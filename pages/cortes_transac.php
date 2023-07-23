<?php
include'../includes/connection.php';
include'../includes/topp.php';
?>

      
          <!-- Page Content -->
          <div class="col-lg-12">
 
            <?php
        date_default_timezone_set('America/Mexico_City');

$script_tz = date_default_timezone_get();

              $tipo = $_POST['tipo'];
              $fecha = $_POST['fecha'];
              $monto = $_POST['monto'];
              $descripcion = $_POST['descripcion'];
              $sucursal = $_SESSION['CITY'];
            $manana =date($today+1);//////dia anterior
echo $manana;

              switch($_GET['action']){
                case 'add':     
                    $query = "INSERT INTO cortes
                    (ID_CORTE, TIPO, MONTO, DATE, DESCRIPCION, CITY)
                    VALUES (Null,'{$tipo}','{$monto}','{$fecha}','{$descripcion}','{$sucursal}')";

                    mysqli_query($db,$query)or die ('Error al actualizar la base de datos');
                break;
              }
            ?>

              <script type="text/javascript">
      alert("Corte realizado con exito con éxito.");

                window.location = "transaction-encargado.php";
              </script>
          </div>

<?php
include'../includes/footer.php';
?>