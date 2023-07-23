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
    alert("¡Página restringida! Serás redirigido a POS");
    window.location = "pos.php";
  </script>
<?php
  }           
}


  $query = 'SELECT * FROM ofertas WHERE ID_OFERTA ='.$_GET['id'];
  $result = mysqli_query($db, $query) or die(mysqli_error($db));
    while($row = mysqli_fetch_array($result))
    { 
      $imageURL = $row['PORTADA'];                
  
      $titulo = $row['TITULO'];
      $fecha_publicacion = $row['FECHA_PUBLICACION'];
      $caducidad = $row['CADUCIDAD'];
      $descripcion = $row['DESCRIPCION'];
      $contenido = $row['CONTENIDO'];
      $tipo = $row['TYPE'];

    }
      $id = $_GET['id'];
?>

  <center><div class="card shadow col-xs-12 col-md-12 border-bottom-primary">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Editar Producto</h4>
            </div>
            
            <div class="card-body">

            <form role="form" method="post" action="novedades_edit1.php"  enctype="multipart/form-data">
              <input type="hidden" name="id" value="<?php echo $id; ?>" />
              
          <div class="row">
            <div class="col-12">
<img src="img/<?php echo $imageURL; ?>" alt="" style="width: 60%;" />

              </div>

            <div class="col-12">

              <div class="form-group row text-left text-warning">
                <div class="col-sm-12" style="padding-top: 5px;">
                Titulo<br> 
                  <input class="form-control" placeholder="titulo" name="titulo" value="<?php echo $titulo; ?>" >
                </div>
              </div>
            <div class="form-group row text-left text-warning">
                <div class="col-sm-12">
                  Descripcion:<br>
                  <input class="form-control" placeholder="descripcion" name="descripcion" value="<?php echo $descripcion; ?>" required>
                </div>
              </div>
            <div class="form-group row text-left text-warning">
                <div class="col-sm-12">
                  Contenido:<br>
                  <input class="form-control" placeholder="contenido" name="contenido" value="<?php echo $contenido; ?>" required>
                </div>
              </div>

              <div class="form-group row text-left text-warning">
                <div class="col-sm-12" style="padding-top: 5px;">
                 Fecha publicacion<br>                 
                  <input class="form-control" type="datetime-local" placeholder="<?php echo $fecha_publicacion; ?>" name="fecha_publicacion" value="<?php echo $fecha_publicacion; ?>" > 
                </div>
              </div>
              <div class="form-group row text-left text-warning">
                <div class="col-sm-12" style="padding-top: 5px;">
                 Fecha Salida<br>                 
                  <input class="form-control" type="datetime-local" placeholder="<?php echo $caducidad; ?>" name="caducidad" value="<?php echo $caducidad; ?>" > 
                </div>
              </div>
              <div class="form-group row text-left text-warning">
                <div class="col-sm-12" style="padding-top: 5px;">
                 Tipo:<br>                
                   

          <select name="tipo" required>
            <option value="<?php echo $tipo; ?>"><?php echo $tipo; ?></option>
            <option value="novedad">Novedad</option>
            <option value="cupon">Cupon</option>
            <option value="dinamica">Dinamica</option>
          </select>


                </div>
              </div>
            </div>
          </div>

              <hr>

              <div class="row">
                <div class="col-12">
                  <a onclick="goBack()" style="color: #fff;" type="button" class="btn btn-warning btn-block">Volver</a>
                </div>
                <div class="col-12">
                <button type="submit" class="btn btn-danger bg-gradient-danger btn-block"><i class="fa fa-edit fa-fw"></i>Actualizar</button>    
              </div>
              </div>

              </form>  
            </div>
          </div></center>
<script>
function goBack() {
  window.history.back();
}
</script>
<?php
include'../includes/footer.php';
?>