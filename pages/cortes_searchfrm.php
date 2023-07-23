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
            
            <center><div class="card shadow mb-4 col-xs-12 col-md-8 ">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Detalles del Movimiento</h4>
            </div>
    
                <br>

                    <div class="form-group row text-left">

                      <div class="col-sm-6 text-primary">
                        <h5>
                          Tipo de Movimiento<br>
                        </h5>
                      </div>

                      <div class="col-sm-6">
                        <h5>
                          :
                        <?php
                          if ($i == 1) {
                            echo "Fondo Extra de Caja";
                          }
                          if ($i == 2) {
                            echo "Pagos a proveedores";
                          }
                          if ($i == 3) {
                            echo "Retiro";
                          }
                          if ($i == 4) {
                            echo "Cierre de Caja";
                          }
                          if ($i == 5) {
                            echo "Cierre de Caja del Día Anterior";
                          }
                          if ($i == 6) {
                            echo "Renta";
                          }
                          if ($i == 7) {
                            echo "Telefono";
                          }
                          if ($i == 8) {
                            echo "Agua";
                          } 
                         if ($i == 9) {
                            echo "Impuestos";
                          }
                          if ($i == 10) {
                            echo "Otros Gastos";
                          }
                            ?>
                          </h5>
                      </div>

                    </div>

                     <div class="form-group row text-left">

                      <div class="col-sm-6 text-primary">
                        <h5>
                        Monto del Movimiento<br>
                        </h5>
                      </div>

                      <div class="col-sm-6">
                        <h5>
                          : <?php echo $a; ?> <br>
                        </h5>
                      </div>

                    </div>



                    <div class="form-group row text-left">

                      <div class="col-sm-6 text-primary">
                        <h5>
                          Fecha<br>
                        </h5>
                      </div>

                      <div class="col-sm-6">
                        <h5>
                          : <?php echo date("d-m-Y H:i:s", strtotime($b) ); ?> <br>
                        </h5>
                      </div>
                      
                    </div>
                    <div class="form-group row text-left">

                      <div class="col-sm-6 text-primary">
                        <h5>
                          Descripcion<br>
                        </h5>
                      </div>

                      <div class="col-sm-6">
                        <h5>
                          : <?php echo $c; ?> <br>
                        </h5>
                      </div>
                      
                    </div>

                    <div class="row">
  <div class="col-4">
            <a onclick="goBack()" style="color: #fff;"  type="button" class="btn btn-primary bg-gradient-primary btn-block"> <i class="fas fa-flip-horizontal fa-fw fa-share"></i> Volver </a>
  </div>

  <div class="col-4">
                <form action="imprimir_cortes.php" method="post">
               <input type="hidden" name="id_corte" value="<?php echo $zz; ?>" />

               <input type="submit" class="btn btn-success btn-block bg-gradient-success" value="Imprimir" />
              </form>
  </div>


  <div class="col-4">
<?php echo '<a type="button" class="btn btn-danger bg-gradient-danger btn-block" href="cortes_del.php?action=edit & id='.$id. '"><i class="fas fa-fw fa-ban"></i> Eliminar</a>'?>
  </div>






<br>
</div><br>

            </div>


<script>
function goBack() {
  window.history.back();
}
</script>


<?php
include'../includes/footer.php';
?>