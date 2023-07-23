<?php
include'../includes/connection.php';
include'../includes/topp.php';
?>
<?php 

$corteid=$_GET['id'];
/*
	if (!isset($_GET['do']) || $_GET['do'] != 1) {
						
    	switch ($_GET['action']) {
    		case 'edit':
    			$query = 'DELETE FROM cortes WHERE ID_CORTE = ' . $_GET['id'];
    			$result = mysqli_query($db, $query) or die(mysqli_error($db));				
            ?>
				
            <?php
    			//break;
            }
	}*/



    $query = "DELETE FROM cortes WHERE ID_CORTE LIKE '{$corteid}'";
    
     $result = mysqli_query($db, $query) or die (mysqli_error($db));


?> 

<?php

if ($_SESSION['TYPE'] == 'Admin'){
             ?>    <script type="text/javascript">
                  window.location = "cortes.php";
                  </script>
             <?php   } if ($_SESSION['TYPE'] == 'Encargado'){?>
                  <script type="text/javascript">
                window.location = "transaction-encargado.php";
                  </script><?php   }

                  ?>


              <script type="text/javascript">

   alert("Movimiento eliminado con éxito.");

              </script>