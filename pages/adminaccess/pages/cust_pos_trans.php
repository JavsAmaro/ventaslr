<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
?><?php 

                $query = 'SELECT ID, t.TYPE
                          FROM users u
                          JOIN type t ON t.TYPE_ID=u.TYPE_ID WHERE ID = '.$_SESSION['MEMBER_ID'].'';
                $result = mysqli_query($db, $query) or die (mysqli_error($db));
      
                while ($row = mysqli_fetch_assoc($result)) {
                          $Aa = $row['TYPE'];
                   
if ($Aa=='User'){
           
             ?>    <script type="text/javascript">
                      //then it will be redirected
                      alert("¡Página restringida! Serás redirigido a POS");
                      window.location = "pos.php";
                  </script>
             <?php   }
                         
           
}   
            ?>
          <!-- Page Content -->
          <div class="col-lg-12">
            <?php
              $fname = $_POST['firstname'];
              $lname = $_POST['lastname'];
              $pn = $_POST['phonenumber'];
              $direccion = $_POST['direccion'];
              $email = $_POST['email'];
              $pass = $_POST['password'];
              $cumple = $_POST['cumple'];


              $city = $_POST['city'];

        
              switch($_GET['action']){
                case 'add':     
                    $query = "INSERT INTO customer
                    (CUST_ID, FIRST_NAME, LAST_NAME, PHONE_NUMBER, DIRECCION,EMAIL,PASSWORD,CUMPLE,CITY)
                    VALUES (Null,'{$fname}','{$lname}','{$pn}','{$direccion}','{$email}',sha1('{$pass}'),'{$cumple}','{$city}')";
                    mysqli_query($db,$query)or die ('Error al actualizar la base de datos');
                break;
              }
            ?>
              <script type="text/javascript">
                window.location = "pos.php";
              </script>
          </div>

<?php
include'../includes/footer.php';
?>