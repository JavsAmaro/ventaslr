<?php
include'../includes/connection.php';
?>
          <!-- Page Content -->
          <div class="col-lg-12">
            <?php

             $nombreImg=$_FILES['image']['name'];

    $ruta=$_FILES['image']['tmp_name'];
   /* $destino="img/".$nombreImg;*/
$target_Path = "img/";
$target_Path = $target_Path.basename( $_FILES['image']['name'] );
move_uploaded_file( $_FILES['image']['tmp_name'], $target_Path );


              //$pc = $_POST['prodcode'];
              $name = $_POST['name'];
              $desc = $_POST['description'];
              $qty = $_POST['quantity'];
              $oh = $_POST['onhand'];
              $pr = $_POST['price']; 
              $cc = $_POST['cant_cajas']; 
              $cat = $_POST['category'];
              $dats = $_POST['datestock']; 
              $sucursal = $_POST['city']; 

              switch($_GET['action']){
                case 'add':  
                for($i=0; $i < $qty; $i++){ //aqui va el ciclo de cuantas veces se va a realizar
                    $query = "INSERT INTO product
                              (PRODUCT_ID, NAME, DESCRIPTION, QTY_STOCK, ON_HAND, PRICE, CATEGORY_ID, DATE_STOCK_IN, IMAGENES, CANT_CAJAS, CITY)
                              VALUES (Null,'{$name}','{$desc}',1,1,'{$pr}','{$cat}','{$dats}','{$nombreImg}','{$cc}','{$sucursal}')";

                              /*
                               $query = "INSERT INTO product
                              (PRODUCT_ID, PRODUCT_CODE, NAME, DESCRIPTION, QTY_STOCK, ON_HAND, PRICE, CATEGORY_ID, SUPPLIER_ID, DATE_STOCK_IN, IMAGENES, CANT_CAJAS)
                              VALUES (Null,'{$pc}','{$name}','{$desc}',1,1,{$pr},{$cat},{$supp},'{$dats}','{$nombreImg}','{$cc}')";*/



                    mysqli_query($db,$query)or die ('Error in updating product in Database '.$query);
                    }
                break;
              }




            ?>
              <script type="text/javascript">window.location = "product.php";</script>
          </div>

<?php
include'../includes/footer.php';
?>