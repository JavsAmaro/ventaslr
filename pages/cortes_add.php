<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
?>
<?php    echo "<div style='text-align-last: right;'>";

          echo "Hoy es : "; 
          $today = date("j-n-Y"); 
          echo $today; 
         echo "</div>";
?>             
            <center><div class="card shadow mb-4 col-xs-12 col-md-8 border-bottom-primary">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Agegar corte</h4>
            </div>
            <a href="cortes.php" type="button" class="btn btn-primary bg-gradient-primary">Volver</a>
            <div class="card-body">
                        <div class="table-responsive">
                        <form role="form" method="post" action="cortes_transac.php?action=add">
                          <div class="form-group">
                  <select class='form-control' name='tipo' required>
                    <option value="" disabled selected hidden>Seleccionar Movimiento</option>
                    <option value="1">Abrir caja</option>
                    <option value="2">Corte de caja</option>
                    <option value="3">Pago </option>

                  </select>

<!--
                           <div class="form-group">
                              <input class="form-control" placeholder="tipo" name="tipo" required>
                            </div>

                              <ul>
                              <input type="checkbox" value="1" name="chkl" checked /> Abrir Caja
                              <input type="checkbox" value="2" name="chkl" /> Corte de caja
                              </ul>
                            -->
                            </div>
                            <div class="form-group">
                              <input class="form-control" placeholder="monto" name="monto" required>
                            </div>
                            <div class="form-group">
                              <input class="form-control" placeholder="Fecha: AAAA-MM-DD" name="fecha" value="<?php echo $today;?>"required>
                            </div>
                             <div class="form-group">
                              <input class="form-control" placeholder="Descripción" name="descripcion" required>
                            </div>

                            <hr>

                            <button type="submit" class="btn btn-success btn-block"><i class="fa fa-check fa-fw"></i>Guardar</button>
                            <button type="reset" class="btn btn-danger btn-block"><i class="fa fa-times fa-fw"></i>Reset</button>
                            
                        </form>  
                      </div>
            </div>
          </div></center>
<?php
include'../includes/footer.php';
?>