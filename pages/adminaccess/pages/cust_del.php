<?php
include'../includes/connection.php';
include'../includes/sidebar.php';


$cust_id = $_GET['varname'];
?>


<?php  

                 $query = "SELECT * FROM customer WHERE CITY  LIKE '{$_SESSION['CITY']}%' AND DIRECCION LIKE '*' ";

                  //$query = "SELECT * FROM transaction INNER JOIN customer WHERE transaction.CUST_ID = customer.CUST_ID AND customer.CITY LIKE '{$_SESSION['CITY']}%' GROUP BY customer.CUST_ID ";               


                      $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
                      while ($row = mysqli_fetch_assoc($result)) {
                       $sucursal=$row['CUST_ID'];
                      }
                    ?>


<?php
          $query = "UPDATE transaction set CUST_ID = '{$sucursal}' WHERE CUST_ID = '{$cust_id}'";
          $result = mysqli_query($db, $query) or die(mysqli_error($db));        
               //break;
 
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

          $query = "DELETE FROM customer WHERE CUST_ID = '{$cust_id}'";
          $result = mysqli_query($db, $query) or die(mysqli_error($db));        
               //break;
 
?>





<script type="text/javascript">
alert("Cliente eliminado con éxito.");
window.location = "customer-encargado.php";</script>   