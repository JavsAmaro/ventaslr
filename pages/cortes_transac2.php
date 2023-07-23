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
              $proveedor = $_POST['proveedor'];
            $manana =date('Y-m-d',strtotime("+1 days"));//////dia anterior
 if ($tipo == 4) {



              switch($_GET['action']){
                case 'add':     
                    $query = "INSERT INTO cortes
                    (ID_CORTE, TIPO, MONTO, DATE, DESCRIPCION, CITY)
                    VALUES (Null,'{$tipo}','{$monto}','{$manana}','{$descripcion}','{$sucursal}')";

                    mysqli_query($db,$query)or die ('Error al actualizar la base de datos');
                break;
              }

 }elseif ($tipo == 5) {



              switch($_GET['action']){
                case 'add':     
                    $query = "INSERT INTO cortes
                    (ID_CORTE, TIPO, MONTO, DATE, DESCRIPCION, CITY)
                    VALUES (Null,4,'{$monto}','{$fecha}','{$descripcion}','{$sucursal}')";

                    mysqli_query($db,$query)or die ('Error al actualizar la base de datos');
                break;
              }

 } elseif ($tipo == 2) {



              switch($_GET['action']){
                case 'add':     
                    $query = "INSERT INTO cortes
                    (ID_CORTE, TIPO, MONTO, DATE, DESCRIPCION, PROVEEDOR, CITY)
                    VALUES (Null,'{$tipo}','{$monto}','{$fecha}','{$descripcion}', '{$proveedor}','{$sucursal}')";

                    mysqli_query($db,$query)or die ('this al actualizar la base de datos');
                break;
              }

 }else{

              switch($_GET['action']){
                case 'add':     
                    $query = "INSERT INTO cortes
                    (ID_CORTE, TIPO, MONTO, DATE, DESCRIPCION, CITY)
                    VALUES (Null,'{$tipo}','{$monto}','{$fecha}','{$descripcion}','{$sucursal}')";

                    mysqli_query($db,$query)or die ('Error al actualizar la base de datos');
                break;
              }
 }


            ?>





              <script type="text/javascript">

      alert("Corte realizado con exito.");

                window.location = "cortes.php";
              </script>
          </div>

<?php
include'../includes/footer.php';
?>