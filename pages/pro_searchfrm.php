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
    alert("Restricted Page! You will be redirected to POS");
    window.location = "pos.php";
  </script>
<?php
  }           
}
            ?>
          <center><div class="card shadow mb-4 col-xs-12 col-md-8 border-bottom-primary">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Detalle del producto</h4>            
            </div>

            <div class="card-body"><br>

          <?php 
            $query = 'SELECT PRODUCT_ID, PRODUCT_CODE, NAME, IMAGENES, DESCRIPTION, QTY_STOCK, COUNT(`ON_HAND`) AS "ON_HAND",PRICE, c.CNAME FROM product p join category c on p.CATEGORY_ID=c.CATEGORY_ID WHERE PRODUCT_ID ='.$_GET['id'];
            $result = mysqli_query($db, $query) or die(mysqli_error($db));
              while($row = mysqli_fetch_array($result))
              {                    
                $imageURL = $row["IMAGENES"];                
                 $zz= $row['QTY_STOCK'];
                $zzz= $row['PRODUCT_CODE'];
                $i= $row['NAME'];
                $a=$row['DESCRIPTION'];
                $c=$row['PRICE'];
                $d=$row['CNAME'];
              }
              $id = $_GET['id'];
          ?>




          <div class="row">
            <div class="col-6">
<img src="img/<?php echo $imageURL; ?>" alt="" style="width: 60%;" />
              </div>

            <div class="col-6">


                  <div class="form-group row text-left">
                      <div class="col-sm-6 text-primary">
                        <h5>
                         Existencia del Producto<br>
                        </h5>
                      </div>
                      <div class="col-sm-6">
                        <h5>
                          : <?php echo $zz; ?><br>
                        </h5>
                      </div>
                    </div>
                    <div class="form-group row text-left">
                      <div class="col-sm-6 text-primary">
                        <h5>
                          Nombre del producto<br>
                        </h5>
                      </div>
                      <div class="col-sm-6">
                        <h5>
                          : <?php echo $i; ?> <br>
                        </h5>
                      </div>
                    </div>
                  <div class="form-group row text-left">
                      <div class="col-sm-6 text-primary">
                        <h5>
                          Descipción<br>
                        </h5>
                      </div>
                      <div class="col-sm-6">
                        <h5>
                          : <?php echo $a; ?><br>
                        </h5>
                      </div>
                    </div>
                  <div class="form-group row text-left">
                      <div class="col-sm-6 text-primary">
                        <h5>
                          Precio<br>
                        </h5>
                      </div>
                      <div class="col-sm-6">
                        <h5>
                          : <?php echo $c; ?><br>
                        </h5>
                      </div>
                    </div>
                  <div class="form-group row text-left">
                      <div class="col-sm-6 text-primary">
                        <h5>
                          Categoría<br>
                        </h5>
                      </div>
                      <div class="col-sm-6">
                        <h5>
                          : <?php echo $d; ?><br>
                        </h5>
                      </div>
                    </div>
          
                   </div>
                 </div>     

                </div>

<div class="row">
  <div class="col-6">
     <a onclick="goBack()" style="color: #fff;" type="button" class="btn btn-primary bg-gradient-primary btn-block"> <i class="fas fa-flip-horizontal fa-fw fa-share"></i> Volver</a>
  </div>
  <div class="col-6">
<a  href="#" data-toggle="modal" data-target="#eliminarModal" type="button" class="btn btn-danger" style="width: inherit;border-radius: 5px;"><i class="fas fa-fw fa-ban"></i>Eliminar</a>
   </div>

</div>
<br>
          </div>

      </center>





<!-- User Account Modal-->
  <div class="modal fade" id="eliminarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">¿Confirma que quiere eliminar este producto ?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">

             <a  href="pro_del.php?varname=<?php echo $id ?>" type="button" class="btn btn-danger" style="display: block;" > <i class="fas fa-fw fa-ban"></i>Eliminar</a>


   
        </div>
      </div>
    </div>
  </div>




<script>
function goBack() {
  window.history.back();
}
</script>
<?php
include'../includes/footer.php';
?>