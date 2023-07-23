<?php
include'../includes/connection.php';
include'../includes/topp.php';

  
  $query = 'SELECT * FROM transaction WHERE TRANS_ID ='.$_GET['id'];
  $result = mysqli_query($db, $query) or die(mysqli_error($db));
    while($row = mysqli_fetch_array($result))
    {   
      $zz= $row['CUST_ID'];
      $i= $row['NUMOFITEMS'];
      $a=$row['GRANDTOTAL'];
      $b=$row['CASH'];

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
    }  


      ?>



            
            <center><div class="card shadow mb-4 col-xs-12 col-md-8 border-bottom-primary">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Editar Transacción</h4>
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
                      echo '</tr>';

      }  


?>

   </tbody>
</table>  
</div>
</div>

</div>
     <div class="col-5" style="margin: auto;">   
                  <form role="form" method="post" action="trans_edit1.php">
              <input type="hidden" name="id" value="<?php echo $zz; ?>" />
               <div class="form-group row text-left text-warning">
                <div class="col-6" style="padding-top: 5px;">
                 Nombre del Cliente:
                </div>
                <div class="col-6">
                  <input class="form-control" placeholder=" Nombre del Cliente" name="numofitems" value="<?php echo $nombre; ?> <?php echo $apellido; ?>" required>
                </div>
              </div>
             <div class="form-group row text-left text-warning">
                <div class="col-6" style="padding-top: 5px;">
                 Telefono del Cliente:
                </div>
                <div class="col-6">
                  <input class="form-control" placeholder=" Nombre del Cliente" name="numofitems" value="<?php echo $telefono; ?>" required>
                </div>
              </div>

              <div class="form-group row text-left text-warning">
                <div class="col-6" style="padding-top: 5px;">
                 Numero de Items:
                </div>
                <div class="col-6">
                  <input class="form-control" placeholder=" Numero de Items:" name="numofitems" value="<?php echo $i; ?>" required>
                </div>
              </div>
              <div class="form-group row text-left text-warning">
                <div class="col-6" style="padding-top: 5px;">
                 Total:
                </div>
                <div class="col-6">
                  <input class="form-control" placeholder="Total" name="grandtotal" value="<?php echo $a; ?>" required>
                </div>
              </div>
              <div class="form-group row text-left text-warning">
                <div class="col-6" style="padding-top: 5px;">
                 Efectivo:
                </div>
                <div class="col-6">
                   <input class="form-control" placeholder="Efectivo" name="cash" value="<?php echo $b; ?>" required>
                </div>
              </div>

              <hr>
</div> 
</div>

          <div class="row">
            <div class="col-6">
              <a  type="button" class="btn btn-primary bg-gradient-primary btn-block" onclick="goBack()" style="color: #fff;"> <i class="fas fa-flip-horizontal fa-fw fa-share"></i> Volver </a>

            </div>
       <div class="col-6" >
          <button type="submit" class="btn btn-danger bg-gradient-danger btn-block"><i class="fa fa-edit fa-fw"></i>Actualizar</button> 
        </div>

</div>



              
              </form>  
<br>

          </div>
<script>
function goBack() {
  window.history.back();
}
</script>
<?php
include'../includes/footer.php';
?>