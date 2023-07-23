<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
/*
	if (!isset($_GET['do']) || $_GET['do'] != 1) {
						
    	switch ($_GET['type']) {
    		case 'user':
    			$query = 'DELETE FROM users WHERE ID = ' . $_GET['id'];
    			$result = mysqli_query($db, $query) or die(mysqli_error($db));				
            ?>
    			<script type="text/javascript">alert("User Successfully Deleted.");window.location = "user.php";</script>					
            <?php
    			//break;
            }
	}*/
$emp_id = $_GET['varname'];
echo $emp_id;

?>
<?php 
              $query = 'SELECT ID, t.TYPE
                          FROM users u
                          JOIN type t ON t.TYPE_ID=u.TYPE_ID WHERE ID = '.$_SESSION['MEMBER_ID'].'';
                $result = mysqli_query($db, $query) or die (mysqli_error($db));
      
                while ($row = mysqli_fetch_assoc($result)) {
                          $Aa = $row['TYPE'];            
if ($Aa=='User'){
           
             ?>    <script type="text/javascript">
                      //then it will be redirected
                      alert("¡Página restringida! Serás redirigido a Caja");
                      window.location = "pos.php";
                  </script>
             <?php   }                       
           
}
         $query = "DELETE FROM users WHERE ID = '{$emp_id}'";
          $result = mysqli_query($db, $query) or die(mysqli_error($db));
?>




<?php
if ($_SESSION['TYPE'] == 'Admin'){
             ?>    <script type="text/javascript">
                  window.location = "user.php";
                  </script>
             <?php   } if ($_SESSION['TYPE'] == 'Encargado'){?>
                  <script type="text/javascript">
                window.location = "user-encargado.php";
                  </script><?php   }?>


              <script type="text/javascript">
    alert("Movimiento eliminado con éxito.");

              </script>

?>