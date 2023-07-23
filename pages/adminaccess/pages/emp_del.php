<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
$emp_id = $_GET['varname'];
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
         $query = "DELETE FROM employee WHERE EMPLOYEE_ID = '{$emp_id}'";
          $result = mysqli_query($db, $query) or die(mysqli_error($db));
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








