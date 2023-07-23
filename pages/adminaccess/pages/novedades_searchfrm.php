<?php
include'../includes/connection.php';
include'../includes/sidebar.php';


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
    alert("Restricted Page! You will be redirected to POS");
    window.location = "pos.php";
  </script>
<?php
  }           
}
?>
          <center>

 <br>

          <?php 

             $query = 'SELECT * FROM ofertas  WHERE ID_OFERTA ='.$_GET['id'];
            $result = mysqli_query($db, $query) or die(mysqli_error($db));
              while($row = mysqli_fetch_array($result))
              {   


                $portada = $row["PORTADA"];          
                $titulo= $row['TITULO'];
                $fecha= $row['FECHA_PUBLICACION'];
                $descripcion= $row['DESCRIPCION'];
                $caducidad= $row['CADUCIDAD'];
                $contenido=$row['CONTENIDO'];
                $tipo=$row['TYPE'];

              }
              $id = $_GET['id'];
          ?>
          <div class="row">
            <div class="col-12">

                <br>


              <div class="col-sm-12">
                <h5><strong><?php echo $titulo; ?></strong>
                </h5>
              </div>
                 <div class="col-sm-12" style="text-align: -webkit-left;">
                    <h5>Tipo: <?php echo  $tipo; ?> <br>
                    </h5>
                </div> 
                 <div class="col-sm-12" style="text-align: -webkit-left;">
                    <h5>Vigencia desde: <?php echo  date("d-m-Y", strtotime($fecha) ) ; ?> <br>
                    </h5>
                </div> 

                 <div class="col-sm-12" style="text-align: -webkit-left;">
                    <h5>Vigencia hasta: <?php echo  date("d-m-Y", strtotime($caducidad) ) ; ?> <br>
                    </h5>
                </div> 
                <div class="col-sm-12" style="text-align: -webkit-left;">
                    <h5>Descripcion: <?php echo $descripcion; ?><br>
                    </h5>
                </div>

                <div class="col-sm-12" style="text-align: -webkit-left;">
                  <h5> Contenido: <?php echo $contenido; ?> <br>
                  </h5>
                </div> 
             <div class="col-sm-12">         
                 <?php 
                      if( $portada == null)
                           {
                             echo '<img src="clientes/lr-logo.jpg" alt=""  style="width: 20%;"/>';

                           }if($portada != null)
                           {
                             echo '<img src="clientes/'. $portada.'" alt="" style=" width: -webkit-fill-available;" />';
                           }
                      ?>
              </div> 
                <br>       
                   </div>
                 </div>

 <div class="col-12">
     <a onclick="goBack()" style="color: #fff;" type="button" class="btn btn-primary bg-gradient-primary btn-block">Volver</a>
  </div>



 </div>

<div class="row">


      </center>
<script>
function goBack() {
  window.history.back();
}
</script>
<?php
include'../includes/footer.php';
?>