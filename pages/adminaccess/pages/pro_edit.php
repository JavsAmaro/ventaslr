<?php
include'../includes/connection.php';
include'../includes/sidebar_encargado.php';
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
$sql = "SELECT DISTINCT CNAME, CATEGORY_ID FROM category order by CNAME asc";
$result = mysqli_query($db, $sql) or die ("Bad SQL: $sql");

$opt = "<select class='form-control' name='category' required>";
  while ($row = mysqli_fetch_assoc($result)) {
    $opt .= "<option value='".$row['CATEGORY_ID']."'>".$row['CNAME']."</option>";
  }

$opt .= "</select>";

  $query = 'SELECT PRODUCT_ID,PRODUCT_CODE, NAME, DESCRIPTION, IMAGENES, QTY_STOCK, PRICE, c.CNAME FROM product p join category c on p.CATEGORY_ID=c.CATEGORY_ID WHERE PRODUCT_ID ='.$_GET['id'];
  $result = mysqli_query($db, $query) or die(mysqli_error($db));
    while($row = mysqli_fetch_array($result))
    { 
      $imageURL = $row['IMAGENES'];                
  
      $zz = $row['PRODUCT_ID'];
      $zzz = $row['QTY_STOCK'];
      $A = $row['NAME'];
      $B = $row['DESCRIPTION'];
      $C = $row['PRICE'];
      $D = $row['CNAME'];
    }
      $id = $_GET['id'];
?>

  <center><div class="card shadow mb-4 col-xs-12 col-md-8 border-bottom-primary">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Editar Producto</h4>
            </div>
            
            <div class="card-body">

            <form role="form" method="post" action="pro_edit1.php"  enctype="multipart/form-data">
              <input type="hidden" name="id" value="<?php echo $zz; ?>" />
              
          <div class="row">
            <div class="col-6">
<img src="img/<?php echo $imageURL; ?>" alt="" style="width: 60%;" />
 <!--          <div class="form-group">
            <input type="file" class="form-control" id="image" name="image" value="<?php echo $imageURL; ?>" multiple>
           </div>
-->
              </div>

            <div class="col-6">

              <div class="form-group row text-left text-warning">
                <div class="col-sm-6" style="padding-top: 5px;">
                 Cantidad en stock:
                </div>
                <div class="col-sm-6">
                  <input class="form-control" placeholder="Product Code" value="<?php echo $zzz; ?>" readonly>
                </div>
              </div>
              <div class="form-group row text-left text-warning">
                <div class="col-sm-6" style="padding-top: 5px;">
                 Nombre del Producto:
                </div>
                <div class="col-sm-6">
                  <input class="form-control" placeholder="Product Name" name="prodname" value="<?php echo $A; ?>" required>
                </div>
              </div>
              <div class="form-group row text-left text-warning">
                <div class="col-sm-6" style="padding-top: 5px;">
                 Descripción:
                </div>
                <div class="col-sm-6">
                   <textarea class="form-control" placeholder="Description" name="description"><?php echo $B; ?></textarea>
                </div>
              </div>
              <div class="form-group row text-left text-warning">
                <div class="col-sm-6" style="padding-top: 5px;">
                 Precio:
                </div>
                <div class="col-sm-6">
                  <input class="form-control" placeholder="Price" name="price" value="<?php echo $C; ?>" required>
                </div>
              </div>
              <div class="form-group row text-left text-warning">
                <div class="col-sm-6" style="padding-top: 5px;">
                 Categoría:
                </div>
                <div class="col-sm-6">
                   <?php
                    echo $opt;
                   ?>
                </div>
              </div>
            </div>
          </div>

              <hr>

              <div class="row">
                <div class="col-6">
                  <a onclick="goBack()" style="color: #fff;" type="button" class="btn btn-warning btn-block">Volver</a>
                </div>
                <div class="col-6">
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