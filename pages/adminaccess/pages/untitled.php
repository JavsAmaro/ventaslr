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
            
            <center><div class="card shadow mb-4 col-xs-12 col-md-8 border-bottom-primary">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Editar Transaccion</h4>
            </div><a  type="button" class="btn btn-primary bg-gradient-primary btn-block" href="customer.php?"> <i class="fas fa-flip-horizontal fa-fw fa-share"></i> Volver </a>
            <div class="card-body">
         
            <form role="form" method="post" action="cust_edit1.php">
              <input type="hidden" name="id" value="<?php echo $zz; ?>" />
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Numero de Items:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" placeholder=" Numero de Items:" name="numofitems" value="<?php echo $i; ?>" required>
                </div>
              </div>
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Total:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="Total" name="grandtotal" value="<?php echo $a; ?>" required>
                </div>
              </div>
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Efectivo:
                </div>
                <div class="col-sm-9">
                   <input class="form-control" placeholder="Efectivo" name="CASH" value="<?php echo $b; ?>" required>
                </div>
              </div>
              <hr>

                <button type="submit" class="btn btn-warning btn-block"><i class="fa fa-edit fa-fw"></i>Actualizar</button> 
              </form>  
          </div>
  </div>

<?php
include'../includes/footer.php';
?>