<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
?>
          <!-- Page Content -->
          <div class="col-lg-12">
            <?php
              $numofitems = $_POST['numofitems'];
              $grandtotal = $_POST['grandtotal'];
              $cash = $_POST['cash'];
              
              


        
              switch($_GET['action']){
                case 'add':     
                    $query = "INSERT INTO transaction
                    (CUST_ID, NUMOFITEMS, GRANDTOTAL, CASH)
                    VALUES (Null,'{$numofitems}','{$grandtotal}','{$cash}')";
                    mysqli_query($db,$query)or die ('Error al actualizar la base de datos');
                break;
              }
            ?>
              <script type="text/javascript">
                window.location = "pedidos.php";
              </script>
          </div>

<?php
include'../includes/footer.php';
?>