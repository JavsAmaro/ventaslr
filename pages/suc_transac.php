<?php
include'../includes/connection.php';
?>
          <!-- Page Content -->
          <div class="col-lg-12">
            <?php
              $name = $_POST['city'];
              $pn = $_POST['phonenumber'];
              $direccion = $_POST['direccion'];
       
              switch($_GET['action']){
                case 'add':     
                     $query = "INSERT INTO location
                              (LOCATION_ID, CITY, PHONE_NUMBER, EMAIL)
                              VALUES (Null, '{$name}', '{$pn}', '{$direccion}')";
                    mysqli_query($db,$query)or die ('Error in updating location in Database');


                    $query2 = "INSERT INTO `transaction_details`
                               (`ID`, `TRANS_D_ID`, `PRODUCTS`, `QTY`, `PRICE`, `EMPLOYEE`, `ROLE`)
                               VALUES (Null, 0, 0, 0,0, 0, 0)";

                    mysqli_query($db,$query2)or die (mysqli_error($db));


                    $query111 = "INSERT INTO `transaction`
                               (`TRANS_ID`, `CUST_ID`, `NUMOFITEMS`, `GRANDTOTAL`, `CASH`, `DATE`, `TRANS_D_ID`, `METODO_PAGO`,`INTERMEDIARIO`,`CITY`,`CANT_CAJAS`,`COMENTARIOS`)
                               VALUES (Null,Null,0,0,0,0,0,0, 0,'{$name}',0,Null)";
                    mysqli_query($db,$query111)or die (mysqli_error($db));

                   

                break;
              }
            ?>

              <script type="text/javascript">
               window.location = "sucursal.php";
              </script>
          </div>

<?php
include'../includes/footer.php';
?>
