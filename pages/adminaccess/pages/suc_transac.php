<?php
include'../includes/connection.php';
?>

            <?php
            //Recoje el dato enviado por el modal (nombre de la nueva sucursal)
            $nombre=  $_POST['sucursal'];

              switch($_GET['action']){
                case 'add':  

// query0 es un contador para validar que no se repita el nombre de la sucursal
                  $query0 = "SELECT count(*) AS total_duplicados FROM (
                  SELECT CITY FROM location WHERE CITY LIKE '{$nombre}%'
                  GROUP BY CITY HAVING COUNT(CITY) > 1) as ver";
                  $result0 = mysqli_query($db, $query0) or die (mysqli_error($db));
                    while ($row0 = mysqli_fetch_assoc($result0)) {
                         $total_duplicados= $row0['total_duplicados'];
                     }
                          

                if ($total_duplicados==0){

                // esta query inserta el nombre de la sucursal a la base de datos 
                    $query = "INSERT INTO location
                              (LOCATION_ID, CITY)
                              VALUES (Null,'{$nombre}')";

                    mysqli_query($db,$query)or die ('Error in updating product in Database 1'.$query);

                // esta query inserta una transaccion vacia en la base de datos para hacer valida la creacion 

                    $query2 = "INSERT INTO transaction
                              (TRANS_ID, CITY, NUMOFITEMS, GRANDTOTAL, CASH, METODO_PAGO, INTERMEDIARIO, CANT_CAJAS)
                              VALUES (Null,'{$nombre}',0,0,0,0,0,0)";
                           
                    mysqli_query($db,$query2)or die ('Error in updating product in Database 2'.$query2);
                    

                }else{?>

                <script type="text/javascript" >
                  alert("Nombre de sucursal ya existente")
                </script>
                
                
                <?php

                }
                break;
              }
            ?>

              <script type="text/javascript">window.location = "index.php";</script>
          </div>

<?php
//include'../includes/footer.php';
?>