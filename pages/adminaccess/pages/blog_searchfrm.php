<?php
include'../includes/connection.php';
include'../includes/sidebar_encargado.php';

  date_default_timezone_set('America/Mexico_City');

$script_tz = date_default_timezone_get();
            $today = date("j-n-Y"); 


  $query = 'SELECT ID, t.TYPE
            FROM users u
            JOIN type t ON t.TYPE_ID=u.TYPE_ID WHERE ID = '.$_SESSION['MEMBER_ID'].'';
  $result = mysqli_query($db, $query) or die (mysqli_error($db));
  
  while ($row = mysqli_fetch_assoc($result)) {
            $Aa = $row['TYPE'];
                   
  if ($Aa=='User'){
?>
  <script type="text/javascript">
    //then it will be redirected
    alert("¡Página restringida! Serás redirigido a POS");
    window.location = "pos.php";
  </script>
<?php
  }           
}
        ?>
          <center><div class="card shadow mb-4 col-xs-12 col-md-12 border-bottom-primary">

            <div class="card-body"><br>

          <?php 

             $query = 'SELECT * FROM blog WHERE BLOG_ID ='.$_GET['id'];


            $result = mysqli_query($db, $query) or die(mysqli_error($db));
              while($row = mysqli_fetch_array($result))
              {   


                $portada = $row["PORTADA"];                
                 $titulo= $row['TITULO'];
                $fecha= $row['FECHA_PUBLICACION'];
                $descripcion= $row['DESCRIPCION'];
                $contenido=$row['CONTENIDO'];
                $imagen=$row['IMAGEN'];





              }
              $id = $_GET['id'];
          ?>




          <div class="row">


            <div class="col-12">
                     <div class="col-sm-12">


                        <h5>
                       <strong>  Titulo: <?php echo $titulo; ?></strong>
                        </h5>
                      </div>

                      <div class="col-sm-12" style="text-align: -webkit-left;">
                        <h5>
                          <?php echo $descripcion; ?><br>
                        </h5>
                      </div>
                      <div class="col-sm-12" style="text-align: -webkit-left;">
                        <h5>
                          Fecha: <?php echo  date("d-m-Y", strtotime($fecha) ) ; ?> <br>
                        </h5>
                      </div> 


                      <div class="col-sm-12" style="text-align: -webkit-left;">
                        <h5>
                          <?php echo $contenido; ?> <br>
                        </h5>
                      </div> <br>

                      <div class="col-sm-12">
                        <!--
                        <iframe src="<?php echo $link; ?>" width="100%" height="1020px"></iframe>
                      -->
          
            <?php 

               if( $portada == null)
                           {
                             echo '<img src="../../ventas/pages/img/lr-logo.jpg" alt=""  style="width: 20%;"/>';

                           }if($portada != null)
                           {
                             echo '<img src="../../ventas/pages/img/'.$portada.'" style="width: -webkit-fill-available;" />';
                           } ?>

                      </div>



          
                   </div>
                 </div>     

                </div>

<div class="row">
  <div class="col-6">
     <a onclick="goBack()" style="color: #fff;" type="button" class="btn btn-primary bg-gradient-primary btn-block"> <i class="fas fa-flip-horizontal fa-fw fa-share"></i> Volver</a>
  </div>
  <div class="col-6">
 <a  href="<?php echo $link ?>" type="button" class="btn btn-primary btn-block" > <i class="fas fa-external-link-alt"></i> Ver link</a>
   </div>

</div>
<br>
          </div>

      </center>
<script>
function goBack() {
  window.history.back();
}
</script>
<?php
include'../includes/footer.php';
?>