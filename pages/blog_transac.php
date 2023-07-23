<?php
include'../includes/connection.php';
?>





          <!-- Page Content -->
          <div class="col-lg-12">
            <?php

             $imageURL=$_FILES['image']['name'];

    $ruta=$_FILES['image']['tmp_name'];
   /* $destino="img/".$imageURL;*/
$target_Path = "img/";
$target_Path = $target_Path.basename( $_FILES['image']['name'] );
move_uploaded_file( $_FILES['image']['tmp_name'], $target_Path );

;                
                 $titulo=  $_POST['titulo'];
                $fecha=  $_POST['fecha'];
                $descripcion=  $_POST['descripcion'];
                $contenido= $_POST['contenido'];
                $link= $_POST['link'];

              switch($_GET['action']){
                case 'add':  
                    $query = "INSERT INTO blog
                              (BLOG_ID, TITULO, FECHA_PUBLICACION, DESCRIPCION, CONTENIDO, LINK, PORTADA)
                              VALUES (Null,'{$titulo}','{$fecha}','{$descripcion}','{$contenido}','{$link}','{$imageURL}')";

                    mysqli_query($db,$query)or die ('Error in updating product in Database '.$query);
                break;
              }




            ?>
              <script type="text/javascript">window.location = "blog-admin.php";</script>
          </div>

<?php
include'../includes/footer.php';
?>