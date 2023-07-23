<!-- Employee select and script -->


<?php

   date_default_timezone_set('America/Mexico_City');

$script_tz = date_default_timezone_get();
            $today = date("Y-m-d H:i:s"); 


$sqlforjob = "SELECT DISTINCT JOB_TITLE, JOB_ID FROM job order by JOB_ID asc";
$result = mysqli_query($db, $sqlforjob) or die ("Bad SQL: $sqlforjob");

$job = "<select class='form-control' name='jobs' required>
        <option value='' disabled selected hidden>Vacante</option>";
  while ($row = mysqli_fetch_assoc($result)) {
    $job .= "<option value='".$row['JOB_ID']."'>".$row['JOB_TITLE']."</option>";
  }

$job .= "</select>";


?>

<?php
$sqlforsuc = "SELECT DISTINCT CITY, LOCATION_ID FROM location order by LOCATION_ID asc";
$result = mysqli_query($db, $sqlforsuc) or die ("Bad SQL: $sqlforsuc");

$suc = "<select class='form-control' name='city' required>
        <option value='' disabled selected hidden>Sucursal</option>";
  while ($row = mysqli_fetch_assoc($result)) {
    $suc .= "<option value='".$row['CITY']."'>".$row['CITY']."</option>";
  }

$suc .= "</select>";
?>

<?php
$sqlforprov = "SELECT DISTINCT COMPANY_NAME FROM supplier WHERE TYPE LIKE 1 order by SUPPLIER_ID asc";
$result = mysqli_query($db, $sqlforprov) or die ("Bad SQL: $sqlforprov");

$prov = "<select class='form-control' name='proveedor' required>
        <option value='sin proveedor' disabled selected hidden>Proveedor</option>";
  while ($row = mysqli_fetch_assoc($result)) {
    $prov .= "<option value='".$row['COMPANY_NAME']."'>".$row['COMPANY_NAME']."</option>";
  }

$prov .= "</select>";
?>


<?php
$sqlforprov2 = "SELECT DISTINCT COMPANY_NAME FROM supplier WHERE TYPE LIKE 2 order by SUPPLIER_ID asc";
$result = mysqli_query($db, $sqlforprov2) or die ("Bad SQL: $sqlforprov2");

$prov2 = "<select class='form-control' name='proveedor' required>
        <option value='sin proveedor' disabled selected hidden>Proveedor</option>";
  while ($row = mysqli_fetch_assoc($result)) {
    $prov2 .= "<option value='".$row['COMPANY_NAME']."'>".$row['COMPANY_NAME']."</option>";
  }

$prov2 .= "</select>";
?>


<?php
/*
$sqlforprov3 = "SELECT DISTINCT NAME, QTY_STOCK FROM product WHERE CITY LIKE '{$_SESSION['CITY']}' order by NAME asc";
$result = mysqli_query($db, $sqlforprov3) or die ("Bad SQL: $sqlforprov3");

$prov3 = "<select class='form-control' name='producto' required>
        <option value='sin producto' disabled selected hidden>Producto</option>";
  while ($row = mysqli_fetch_assoc($result)) {
    $prov3 .= "<option value='".$row['NAME']."'>".$row['NAME']."-".$row['QTY_STOCK']." pz.</option>";
  }

$prov3 .= "</select>";*/
?>


<?php

//ALMACEN PRODUCTOS


$sqlforprov4 = "SELECT DISTINCT NAME, QTY_STOCK FROM almacen WHERE CITY LIKE '{$_SESSION['CITY']}' order by NAME asc";
$result = mysqli_query($db, $sqlforprov4) or die ("Bad SQL: $sqlforprov4");

$prov4 = "<select class='form-control' name='producto' required>
        <option value='sin producto' disabled selected hidden>Almacen</option>";
  while ($row = mysqli_fetch_assoc($result)) {
    //$prov4 .= "<option value='".$row['NAME']."'>".$row['NAME']."-".$row['QTY_STOCK']." pz.</option>";
    $prov4 .= "<option value='".$row['NAME']."'>".$row['NAME']."</option>";
  }

$prov4 .= "</select>";

?>




<script>  
window.onload = function() {  

  // ---------------
  // basic usage
  // ---------------
  var $ = new City();
  $.showProvinces("#province");
  $.showCities("#city");

  // ------------------
  // additional methods 
  // -------------------

  // will return all provinces 
  console.log($.getProvinces());
  
  // will return all cities 
  console.log($.getAllCities());
  
  // will return all cities under specific province (e.g Batangas)
  console.log($.getCities("Batangas")); 
  
}
</script>
<!-- end of Employee select and script -->

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">¿Listo para salir?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body"><?php echo  $_SESSION['FIRST_NAME']; ?> ¿Estás seguro de que quieres cerrar sesión?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <a class="btn btn-primary modal" style="color: #fff !important" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>


    <!-- Customer Modal-->
  <div class="modal fade" id="corteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Añadir movimiento</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form role="form" method="post" action="cortes_transac2.php?action=add">
            <!--
            <div class="form-group">
              <input class="form-control" placeholder="Tipo de Acción" name="accion" required>
            </div>
-->       <div class="form-group">

            <select class='form-control' name='tipo' required onchange="yesnoCheck(this);">
                    <option value="" disabled selected hidden>Seleccionar Movimiento</option>
                    <option value="1">Fondo Extra de Caja</option>
                    <option value="2">Pagos a proveedores</option>
                    <option value="3">Retiro</option>
                 <!--<option value="5">Cancelación</option>-->
                    <option value="4">Cierre de Caja</option>
                    <option value="5">Cierre de Caja del Día Anterior</option>


            </select>
          </div>

            <div class="form-group" id="ifYes" style="display: none;">
                            <?php
                              echo $prov;
                            ?>
            </div>

            <div class="form-group">
              <input class="form-control" placeholder="Monto" name="monto" required>
            </div>
              <input class="form-control" type="hidden" placeholder="Fecha" name="fecha" value="<?php echo $today ?>" required>
        <div class="form-group">
              <input class="form-control" placeholder="Descripcion" name="descripcion" required>
            </div>


            <hr>
            <button type="submit" class="btn btn-success"><i class="fa fa-check fa-fw"></i>Guardar</button>
            <button type="reset" class="btn btn-danger"><i class="fa fa-times fa-fw"></i>Reset</button>
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>      
          </form>  
        </div>
      </div>
    </div>
  </div>








   <!-- Customer Modal-->
  <div class="modal fade" id="cuponModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Añadir Cupón</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form role="form" method="post" action="cupon_transac2.php?action=add">


            <div class="form-group">
              <input class="form-control" placeholder="Código" name="codigo" required>
            </div>


        <div class="form-group">
              <input class="form-control" placeholder="Descripcion" name="descripcion" required>
            </div>



        <div class="form-group">
              <input class="form-control" placeholder="Descuento" name="descuento" required>
            </div>




            <input class="form-control" type="hidden" placeholder="Fecha" name="fecha" value="<?php echo $today ?>" required>



            <hr>
            <button type="submit" class="btn btn-success"><i class="fa fa-check fa-fw"></i>Guardar</button>
            <button type="reset" class="btn btn-danger"><i class="fa fa-times fa-fw"></i>Reset</button>
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>      
          </form>  
        </div>
      </div>
    </div>
  </div>











    <!-- Customer Modal-->
  <div class="modal fade" id="inventarioModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar inventario</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form role="form" method="post" action="inventario_transac2.php?action=add">
            
            <div class="form-group">
            <select class='form-control' name='tipo' required onchange="yesnoCheck(this);">
                    <option value="" disabled selected hidden>Movimiento de Inventario</option>
                    <option value="1">Agregar</option>
                    <option hidden value="2">Quitar</option>
            </select>
          </div>


            <div class="form-group">
                            <?php
                              //echo $prov3;
                              echo $prov4;
                            ?> 
          </div>

            <div class="form-group">
              <input class="form-control" placeholder="Cantidad" name="monto" required>
            </div>
            <?php 
              //<input class="form-control" type="" placeholder="Fecha" name="fecha" value="<?php echo $today = date("Y-m-d H:i:s"); " required>?>
            
            <input class="form-control" hidden type="" placeholder="Fecha" name="fecha" value="<?php echo $today = date("d-m-Y H:i:s"); ?>" required>
            <hr>
            <button type="submit" class="btn btn-success"><i class="fa fa-check fa-fw"></i>Guardar</button>
            <button type="reset" class="btn btn-danger"><i class="fa fa-times fa-fw"></i>Reset</button>
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>      
          </form>  
        </div>
      </div>
    </div>
  </div>








<script type="text/javascript">
  function yesnoCheck(that) {
    if (that.value == "2") {
        document.getElementById("ifYes").style.display = "block";
    } else {
        document.getElementById("ifYes").style.display = "none";
    }
}
</script>



    <!-- Agregar Gastos Extra  MODAL-->
  <div class="modal fade" id="corteExtraModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Añadir movimiento</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form role="form" method="post" action="cortes_transac2.php?action=add">
            <!--
            <div class="form-group">
              <input class="form-control" placeholder="Tipo de Acción" name="accion" required>
            </div>
-->            <div class="form-group">

            <select class='form-control' name='tipo' required onchange="yesnoCheck2(this);"> 
                    <option value="" disabled selected hidden>Seleccionar Movimiento</option>
                     <option value="1">Fondo Extra de Caja</option>
                    <option value="2">Pagos a proveedores</option>
                    <option value="3">Retiro</option>
                 <!--<option value="5">Cancelación</option>-->
                    <option value="4">Cierre de Caja</option>
                    <option value="5">Cierre de Caja del Día Anterior</option>


            </select>
          </div>

             <div class="form-group" id="ifYes2" style="display: none;">
                            <?php
                              echo $prov2;
                            ?>
            </div>
            <div class="form-group">
              <input class="form-control" placeholder="Monto" name="monto" required>
            </div>
        <div class="form-group">

               <!--<input class="date" style="width: 20%;" type="text" name="fecha" placeholder="Fecha <?php echo $today ?>" autocomplete="off" required >
-->

      <input type="date" id="fecha" name="fecha" value="<?php echo $today ?>">

              <script type="text/javascript">
              $( "#fecha" ).datepicker({
                  dateFormat: 'yy-mm-dd',
                  altFormat : "yy-mm-dd",
                  altField  : '#alternate',
                  onSelect  : function() {
                  
                      // proof
                      console.log( $('#alternate').val() );
                  }
              });
              </script>
            </div>

        <div class="form-group">
              <input class="form-control" placeholder="Descripcion" name="descripcion" required>
            </div>


            <hr>
            <button type="submit" class="btn btn-success"><i class="fa fa-check fa-fw"></i>Guardar</button>
            <button type="reset" class="btn btn-danger"><i class="fa fa-times fa-fw"></i>Reset</button>
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>      
          </form>  
        </div>
      </div>
    </div>
  </div>

<script type="text/javascript">
  function yesnoCheck2(that) {
    if (that.value == "2") {
        document.getElementById("ifYes2").style.display = "block";
    } else {
        document.getElementById("ifYes2").style.display = "none";
    }
}
</script>


 <!-- Sucursal Modal-->
  <div class="modal fade" id="sucursalModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Añadir Sucursal</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form role="form" method="post" action="suc_transac.php?action=add">
            <div class="form-group">
              <input class="form-control" placeholder="Nombre" name="city" required>
            </div>
             <div class="form-group">
              <input class="form-control" placeholder="Teléfono" name="phonenumber" required>
            </div>
            <div class="form-group">
              <input class="form-control" placeholder="Dirección" name="direccion" required>
            </div>
                    

            <hr>
            <button type="submit" class="btn btn-success"><i class="fa fa-check fa-fw"></i>Guardar</button>
            <button type="reset" class="btn btn-danger"><i class="fa fa-times fa-fw"></i>Reset</button>
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>      
          </form>  
        </div>
      </div>
    </div>
  </div>







  <!-- Customer Modal-->
  <div class="modal fade" id="customerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Añadir Cliente</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form role="form" method="post" action="cust_transac.php?action=add">
            <div class="form-group">
              <input class="form-control" placeholder="Nombre" name="firstname" required>
            </div>
            <div class="form-group">
              <input class="form-control" placeholder="Apellido" name="lastname" required>
            </div>
            <div class="form-group">
              <input class="form-control" placeholder="Teléfono" name="phonenumber" required>
            </div>
            <div class="form-group">
              <input class="form-control" placeholder="Dirección" name="direccion" >
            </div>
            <div class="form-group">
              <input class="form-control" placeholder="Email" name="email" required>
            </div>

            <div class="form-group">
              <input class="form-control" placeholder="Contraseña" name="password" required>
            </div>
            <div class="form-group">
              <input class="form-control" type="date" name="cumple" value="2020-01-01">
            </div>
             <input class="form-control" type="hidden" name="sucursal" value="<?php echo $_SESSION['CITY'];?>">
            

            <hr>
            <button type="submit" class="btn btn-success"><i class="fa fa-check fa-fw"></i>Guardar</button>
            <button type="reset" class="btn btn-danger"><i class="fa fa-times fa-fw"></i>Reset</button>
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>      
          </form>  
        </div>
      </div>
    </div>
  </div>












  <!-- Customer Modal-->
  <div class="modal fade" id="poscustomerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Añadir Cliente</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form role="form" method="post" action="cust_pos_trans.php?action=add">
            <div class="form-group">
              <input class="form-control" placeholder="Nombre" name="firstname" required>
            </div>
            <div class="form-group">
              <input class="form-control" placeholder="Apellido" name="lastname" required>
            </div>
            <div class="form-group">
              <input class="form-control" placeholder="Teléfono" name="phonenumber" required>
            </div>

             <div class="form-group">
              <input class="form-control" placeholder="Dirección" name="direccion" required>
            </div>
            <hr>
           <div class="form-group">
              <input class="form-control" placeholder="Email" name="email" >
            </div>

              <div class="form-group">
                <input type="password" class="form-control" placeholder="Password" name="password" >
              </div>
            <div class="form-group">
              <input class="form-control" type="date" name="cumple" value="2020-01-01">
            </div>



       <input type="hidden" id="city" name="city" value="<?php echo  $_SESSION['CITY'];?>" />
            <hr>
            <button type="submit" class="btn btn-success"><i class="fa fa-check fa-fw"></i>Guardar</button>
            <button type="reset" class="btn btn-danger"><i class="fa fa-times fa-fw"></i>Reset</button>
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>      
          </form>  
        </div>
      </div>
    </div>
  </div>
  <!-- Employee Modal-->
  <div class="modal fade" id="employeeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Añadir Empleado</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form role="form" method="post" action="emp_transac.php?action=add" enctype="multipart/form-data">          
              <div class="form-group">
                <input class="form-control" placeholder="Nombre" name="firstname" required>
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="Apellido" name="lastname" required>
              </div>
              <div class="form-group">
                  <select class='form-control' name='gender' required>
                    <option value="" disabled selected hidden>Seleccionar Género</option>
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                    <option value="Otro">Otro</option>

                  </select>
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="Email" name="email" required>
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="Teléfono" name="phonenumber" required>
              </div>
              
              <div class="form-group">
                <input class="form-control" placeholder="Dirección" name="direccion" required>
              </div>


              <div class="form-group">
                <input class="form-control" placeholder="Sueldo Inicial" name="sueldo" required>
              </div>
              <div class="form-group">
                <?php
                  echo $job;
                ?>
              </div>
              <div class="form-group">
                <input placeholder="Fecha de contratación" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="FromDate" name="hireddate" class="form-control" />
              </div>

         <div class="form-group" style="display: flex;">
           <div class="col-4">Agregar INE </div>  <div class="col-8"><input type="file" class="form-control" id="image" name="image" º></div>
           </div>


         <div class="form-group" style="display: flex;">
           <div class="col-4">Agregar Contrato </div>  <div class="col-8"><input type="file" class="form-control" id="contrato" name="contrato" º></div>
           </div>


           <input type="hidden" id="city" name="city" value="<?php echo  $_SESSION['CITY'];?>" />

             <hr>
            <button type="submit" class="btn btn-success"><i class="fa fa-check fa-fw"></i>Guardar</button>
            <button type="reset" class="btn btn-danger"><i class="fa fa-times fa-fw"></i>Reset</button>
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>      
          </form>  
        </div>
      </div>
    </div>
  </div>





 <!-- Employee Modal ADMIN-->
  <div class="modal fade" id="employeeModalAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Añadir Empleado</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form role="form" method="post" action="emp_transac.php?action=add" enctype="multipart/form-data">          
              <div class="form-group">
                <input class="form-control" placeholder="Nombre" name="firstname" required>
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="Apellido" name="lastname" required>
              </div>
              <div class="form-group">
                  <select class='form-control' name='gender' required>
                    <option value="" disabled selected hidden>Seleccionar Género</option>
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                    <option value="Otro">Otro</option>

                  </select>
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="Email" name="email" required>
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="Teléfono" name="phonenumber" required>
              </div>
              
              <div class="form-group">
                <input class="form-control" placeholder="Dirección" name="direccion" required>
              </div>


              <div class="form-group">
                <input class="form-control" placeholder="Sueldo Inicial" name="sueldo" required>
              </div>
              <div class="form-group">
                <?php
                  echo $job;
                ?>
              </div>

               <div class="form-group">
                <?php
                  echo $suc;
                ?>
              </div>
              <div class="form-group">
                <input placeholder="Fecha de contratación" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="FromDate" name="hireddate" class="form-control" />
              </div>

         <div class="form-group" style="display: flex;">
           <div class="col-4">Agregar INE </div>  <div class="col-8"><input type="file" class="form-control" id="image" name="image" º></div>
           </div>


         <div class="form-group" style="display: flex;">
           <div class="col-4">Agregar Contrato </div>  <div class="col-8"><input type="file" class="form-control" id="contrato" name="contrato" º></div>
           </div>

<!--
           <input type="hidden" id="city" name="city" value="<?php echo  $_SESSION['CITY'];?>" />-->

             <hr>
            <button type="submit" class="btn btn-success"><i class="fa fa-check fa-fw"></i>Guardar</button>
            <button type="reset" class="btn btn-danger"><i class="fa fa-times fa-fw"></i>Reset</button>
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>      
          </form>  
        </div>
      </div>
    </div>
  </div>



  <!-- Delete Modal-->
  <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="DeleteModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Confirmar Borrado</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">¿Estás seguro de que quieres eliminar?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <a class="btn btn-danger btn-ok">Borar</a>
        </div>
      </div>
    </div>
  </div>
    <script>
        $('#confirm-delete').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
            
            $('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
        });
    </script>