<?php
include'../includes/connection.php';
include'../includes/topp.php';
?>
      
          <!-- Page Content -->
          <div class="col-lg-12">
            <?php
              $tipo = $_POST['tipo'];
              $monto = $_POST['monto'];
              $fecha = $_POST['fecha'];
              $descripcion = $_POST['descripcion'];

        
              switch($_GET['action']){
                case 'add':     
                    $query = "INSERT INTO cortes
                    (ID_CORTE, TIPO, MONTO, DATE, DESCRIPCION)
                    VALUES (Null,$tipo,monto,fecha)";
                    mysqli_query($db,$query)or die ('Error al actualizar la base de datos');
                break;
              }
            ?>
              <script type="text/javascript">
                window.location = "cortes.php";
              </script>
          </div>

<?php
include'../includes/footer.php';
?>