<?php

require('../includes/connection.php');
require('session.php');
if (isset($_POST['btnlogin'])) {


  $users = trim($_POST['user']);
  $upass = trim($_POST['password']);
  $h_upass = sha1($upass);
if ($upass == ''){
     ?>    <script type="text/javascript">
                alert("Falta la contraseña");
                window.location = "login.php";
                </script>
        <?php
}else{
//create some sql statement             
        $sql = "SELECT ID,e.FIRST_NAME,e.LAST_NAME,e.GENDER,e.EMAIL,e.PHONE_NUMBER,j.JOB_TITLE,CITY,t.TYPE
        FROM  `users` u
        join `employee` e on e.EMPLOYEE_ID=u.EMPLOYEE_ID
        join `job` j on e.JOB_ID=j.JOB_ID
        join `type` t ON t.TYPE_ID=u.TYPE_ID
        WHERE  `USERNAME` ='" . $users . "' AND  `PASSWORD` =  '" . $h_upass . "'";
        $result = $db->query($sql);

        if ($result){
        //get the number of results based n the sql statement
        //check the number of result, if equal to one   
        //IF theres a result
            if ( $result->num_rows > 0) {
                //store the result to a array and passed to variable found_user
                $found_user  = mysqli_fetch_array($result);
                //fill the result to session variable
                $_SESSION['MEMBER_ID']  = $found_user['ID']; 
                $_SESSION['FIRST_NAME'] = $found_user['FIRST_NAME']; 
                $_SESSION['LAST_NAME']  =  $found_user['LAST_NAME'];  
                $_SESSION['GENDER']  =  $found_user['GENDER'];
                $_SESSION['EMAIL']  =  $found_user['EMAIL'];
                $_SESSION['PHONE_NUMBER']  =  $found_user['PHONE_NUMBER'];
                $_SESSION['JOB_TITLE']  =  $found_user['JOB_TITLE'];
                $_SESSION['CITY']  =  $found_user['CITY']; 
                $_SESSION['TYPE']  =  $found_user['TYPE'];
                $AAA = $_SESSION['MEMBER_ID'];

        //this part is the verification if admin or user ka
        if ($_SESSION['TYPE']!='Admin'){
           
             ?>    <script type="text/javascript">
                      //then it will be redirected to index.php
                      alert("Sitio restrigido");
                      window.location = "logout.php";
                  </script>
             <?php        
           
        }if ($_SESSION['TYPE']=='Admin'){
           
             ?>    <script type="text/javascript">
                      //then it will be redirected to index.php
                      alert("<?php echo  $_SESSION['FIRST_NAME']; ?> Bienvenido!");
                      window.location = "index.php";
                  </script>
             <?php        
           
        }

            } else {
            //IF theres no result
              ?>
                <script type="text/javascript">
                alert("¡Nombre de usuario o contraseña no registrados! Póngase en contacto con su administrador.");
                window.location = "login.php";
                </script>
              <?php

            }

         } else {
                 # code...
        echo "Error: " . $sql . "<br>" . $db->error;
        }
        
    }       
} 
 $db->close();
?>