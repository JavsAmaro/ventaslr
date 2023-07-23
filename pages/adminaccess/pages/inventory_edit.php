<?php
include'../includes/connection.php';
include'../includes/topp.php';
 
  $query = 'SELECT * FROM cortes WHERE ID_CORTE ='.$_GET['id'];
  $result = mysqli_query($db, $query) or die(mysqli_error($db));
    while($row = mysqli_fetch_array($result))
    {   
      $zz= $row['ID_CORTE'];
      $i= $row['TIPO'];
      $a=$row['MONTO'];
      $b=$row['DATE'];
      $c=$row['DESCRIPCION'];
    }  
      $id = $_GET['id'];
?>
            
            <center><div class="card shadow mb-4 col-xs-12 col-md-8 border-bottom-primary">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Editar transacción</h4>
            </div>
            <div class="card-body">
         
            <form role="form" method="post" action="cortes_edit1.php">
              <input type="hidden" name="id" value="<?php echo $zz; ?>" />
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Tipo:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="tipo" name="tipo" value="<?php echo $i; ?>" required>
                </div>
              </div>
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Monto:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="Monto" name="monto" value="<?php echo $a; ?>" required>
                </div>
              </div>
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Fecha:
                </div>
                <div class="col-sm-9">
                   <input class="form-control" placeholder="Fecha AAAA-MM-DD" name="date" value="<?php echo $b; ?>" readonly="readonly">
                </div>
              </div>
             <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Descripcion:
                </div>
                <div class="col-sm-9">
                   <input class="form-control" placeholder="Descripcion" name="descripcion" value="<?php echo $c; ?>" required>
                </div>
              </div>


              <hr>

          <div class="row">
            <div class="col-6">
 <a  type="button" class="btn btn-primary bg-gradient-primary btn-block" onclick="goBack()" style="color: #fff;"> <i class="fas fa-flip-horizontal fa-fw fa-share"></i> Volver </a>
</div>
       <div class="col-6" >




          <button type="submit" class="btn btn-danger bg-gradient-danger btn-block"><i class="fa fa-edit fa-fw"></i>Actualizar</button> 
        </div>

</div>



              </form>  
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