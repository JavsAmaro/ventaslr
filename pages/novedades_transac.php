<?php
include'../includes/connection.php';
?>
          <!-- Page Content -->
          <div class="col-lg-12">
            <?php

             $imageURL=$_FILES['image']['name'];
             $ruta=$_FILES['image']['tmp_name'];
    $target_Path = "clientes/";
    $target_Path = $target_Path.basename( $_FILES['image']['name'] );
    move_uploaded_file( $_FILES['image']['tmp_name'], $target_Path );

                $titulo=  $_POST['titulo'];
                $fecha=  $_POST['fecha'];
                $caducidad=  $_POST['caducidad'];
                $descripcion=  $_POST['descripcion'];
                $contenido= $_POST['contenido'];
                $tipo= $_POST['tipo'];




              switch($_GET['action']){
                case 'add':  
                    $query = "INSERT INTO ofertas
                              (ID_OFERTA, TITULO, FECHA_PUBLICACION,CADUCIDAD, DESCRIPCION, CONTENIDO, PORTADA,TYPE)
                              VALUES (Null,'{$titulo}','{$fecha}','{$caducidad}','{$descripcion}','{$contenido}','{$imageURL}','{$tipo}')";

                    mysqli_query($db,$query)or die ('Error in updating product in Database '.$query);
                break;
              }




            ?>
<script type="text/javascript">
  alert("Novedad realizada con exito.");
  window.location = "novedades-admin.php";</script>
</div>

<?php
include'../includes/footer.php';
?>