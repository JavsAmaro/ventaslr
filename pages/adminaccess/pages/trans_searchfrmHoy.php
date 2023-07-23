<?php
include'../includes/connection.php';
include'../includes/topp.php';
  date_default_timezone_set('America/Mexico_City');

$script_tz = date_default_timezone_get();
            $today = date("j-n-Y"); 


  $query = 'SELECT * FROM transaction WHERE TRANS_ID ='.$_GET['id'];
  $result = mysqli_query($db, $query) or die(mysqli_error($db));
    while($row = mysqli_fetch_array($result))
    {   
      $zz= $row['CUST_ID'];
      $i= $row['NUMOFITEMS'];
      $a=$row['GRANDTOTAL'];
      $b=$row['CASH'];
      $c=$row['INTERMEDIARIO'];
      $d=$row['METODO_PAGO'];
      $cajas=$row['CANT_CAJAS'];

      $motivo_cancelacion=$row['MOTIVO_CANCEL'];
      $fechahoy= $row['DATE'];
      $trans_d_id=$row['TRANS_D_ID'];


    }
    $id = $_GET['id'];
?>

<?php

  $query3 = "SELECT * FROM customer WHERE CUST_ID = '{$zz}%'";
  $result3 = mysqli_query($db, $query3) or die(mysqli_error($db));
 
while($row = mysqli_fetch_array($result3))
    {   
      $nombre= $row['FIRST_NAME'];
      $apellido= $row['LAST_NAME'];
      $telefono=$row['PHONE_NUMBER'];
      $direccion=$row['DIRECCION'];


    }  
      ?>
           
            <center><div class="card shadow mb-4 col-xs-12 col-md-8 border-bottom-primary">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Detalles de la Transacción </h4>
            </div>
           
       
<br>
       <div class="row">
            <div class="card-body col-7">






               <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">        
                  <thead>
                      <tr>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                      </tr>
                  </thead>
                  <tbody>


                  <?php


$query2 = 'SELECT * FROM transaction_details,transaction WHERE transaction.TRANS_D_ID = transaction_details.TRANS_D_ID AND TRANS_ID ='.$_GET['id'];

  $res = mysqli_query($db, $query2) or die(mysqli_error($db));
    while ($row = mysqli_fetch_assoc($res)) {
                      echo '<tr>';
                      echo '<td>'. $row['PRODUCTS'].'</td>';
                      echo '<td>'. $row['PRICE'].'</td>';
                      echo '<td>'. $row['QTY'].'</td>';

                      echo '</tr>';

      }  


?>

   </tbody>
</table>  
</div>
</div>

</div>
     <div class="col-5" style="margin: auto;">  
                
                    <div class="form-group row text-left">

                      <div class="col-6 text-primary">
                        <h5>
                          Nombre del cliente<br>
                        </h5>
                      </div>

                      <div class="col-6">
                        <h5>
                     : <?php echo $nombre; ?> <?php echo $apellido; ?>
                        <br>
                        </h5>
                      </div>

                    </div>
                 <div class="form-group row text-left">

                      <div class="col-6 text-primary">
                        <h5>
                          Telefono del Cliente<br>
                        </h5>
                      </div>

                      <div class="col-6">
                        <h5>
                     : <?php echo $telefono; ?>
                        <br>
                        </h5>
                      </div>

                    </div>

                  <div class="form-group row text-left">
                      <div class="col-6 text-primary">
                        <h5>
                          Dirección del Cliente<br>
                        </h5>
                      </div>

                      <div class="col-6">
                        <h5>
                     : <?php echo $direccion; ?>
                        <br>
                        </h5>
                      </div>

                    </div>


                    <div class="form-group row text-left">

                      <div class="col-6 text-primary">
                        <h5>
                          Cantidad de items<br>
                        </h5>
                      </div>

                      <div class="col-6">
                        <h5>
                     : <?php echo $i; ?>
                        <br>
                        </h5>
                      </div>

                    </div>
                    <div class="form-group row text-left">

                      <div class="col-6 text-primary">
                        <h5>
                          Total Pagado <br>
                        </h5>
                      </div>

                      <div class="col-6">
                        <h5>
                          : <?php echo $a; ?> <br>
                        </h5>
                      </div>
                      
                    </div>



                    <div class="form-group row text-left">

                      <div class="col-6 text-primary">
                        <h5>
                          Cantidad con que se pagó <br>
                        </h5>
                      </div>

                      <div class="col-6">
                        <h5>
                          : <?php echo $b; ?> <br>
                        </h5>
                      </div>
                      
                    </div>


                    <div class="form-group row text-left">

                      <div class="col-6 text-primary">
                        <h5>
                          Motivo de Cancelacion<br>
                        </h5>
                      </div>

                      <div class="col-6">
                        <h5>
                          : <?php echo $motivo_cancelacion; ?> <br>
                        </h5>
                      </div>
                      
                    </div>




                    <div class="form-group row text-left">

                      <div class="col-6 text-primary">
                        <h5>
                          Metodo de pago<br>
                        </h5>
                      </div>

                      <div class="col-6">
                        <h5>
                          : <?php 
                          if($d == "1")
                           {
                             echo 'Efectivo';
                           }if($d == "2"){
                             echo 'Tarjeta';
                           } 
                           ?> <br>
                        </h5>
                      </div>
                      
                    </div>


                    <div class="form-group row text-left">

                      <div class="col-6 text-primary">
                        <h5>
                          Intermediario<br>
                        </h5>
                      </div>

                      <div class="col-6">
                        <h5>
                          : <?php 
                          if($c == "1")
                           {
                             echo 'Sucursal';
                           }if($c == "2"){
                             echo ' DIDI';
                           } if($c == "3"){
                             echo ' UBER';
                           }if($c == "4"){
                             echo ' Sin Delantal';
                           } if($c == "5"){
                             echo ' Rappi';
                           }

                           ?> <br>
                        </h5>
                      </div>
                      
                    </div>

            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-6">
 <a onclick="goBack()" style="color: #fff;" type="button" class="btn btn-primary bg-gradient-primary btn-block"> <i class="fas fa-flip-horizontal fa-fw fa-share"></i> Volver </a>
</div>
       <div class="col-6" >
         <a  href="#" data-toggle="modal"  id="myTextField"  value="Truck" data-target="#aModal" type="button" class="btn btn-danger bg-gradient-danger btn-block" > <i class="fas fa-fw fa-ban"></i>Cancelar</a>
        
        </div>

</div>

 <br>
          </div>



  <!-- Product Modal-->
  <div class="modal fade" id="aModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Motivo Canselación</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">x</span>
          </button>

        </div>
        <div class="modal-body">

          <form role="form" method="post" action="trans_del.php?action=edit & id='.$row['TRANS_ID']. '" enctype="multipart/form-data">
 

           <div class="form-group">
             <input type="text"  class="form-control" placeholder="Ingrese motivo" name="motivo_cancelacion" required>
           </div>
            <input type="hidden"  name="id_transac" value="<?php echo $id?>">

            <input type="hidden" name="cajas" value="<?php echo $cajas?>">

            <input type="hidden" name="trans_d_id" value="<?php echo $trans_d_id?>">

            <hr>
            <button type="submit" class="btn btn-success"><i class="fa fa-check fa-fw"></i>Guardar</button>
            <button type="reset" class="btn btn-danger"><i class="fa fa-times fa-fw"></i>Reset</button>
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>      
          </form>  
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