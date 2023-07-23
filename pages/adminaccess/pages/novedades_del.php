<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
$id = $_GET['varname'];
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
         $query = "DELETE FROM ofertas WHERE ID_OFERTA = '{$id}'";
          $result = mysqli_query($db, $query) or die(mysqli_error($db));
?>
<script type="text/javascript">
alert("Novedad eliminada con éxito.");
window.location = "novedades-admin.php";</script>  


