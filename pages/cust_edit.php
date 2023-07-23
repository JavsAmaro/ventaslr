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
  $query = 'SELECT * FROM customer WHERE CUST_ID ='.$_GET['id'];
  $result = mysqli_query($db, $query) or die(mysqli_error($db));
    while($row = mysqli_fetch_array($result))
    {   
      $zz= $row['CUST_ID'];
      $i= $row['FIRST_NAME'];
      $a=$row['LAST_NAME'];
      $b=$row['PHONE_NUMBER'];
      $c=$row['DIRECCION'];

    }  
      $id = $_GET['id'];
?>
            
            <center><div class="card shadow mb-4 col-xs-12 col-md-8 border-bottom-primary">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Editar Cliente</h4>
            </div>
            <div class="card-body">
         
            <form role="form" method="post" action="cust_edit1.php">
              <input type="hidden" name="id" value="<?php echo $zz; ?>" />
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Nombre:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="First Name" name="firstname" value="<?php echo $i; ?>" required>
                </div>
              </div>
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Apellido:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="Last Name" name="lastname" value="<?php echo $a; ?>" required>
                </div>
              </div>
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Contacto #:
                </div>
                <div class="col-sm-9">
                   <input class="form-control" placeholder="Phone Number" name="phone" value="<?php echo $b; ?>" required>
                </div>
              </div>

                <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Dirección:
                </div>
                <div class="col-sm-9">
                   <input class="form-control" placeholder="Direccion" name="direccion" value="<?php echo $c; ?>" required>
                </div>
              </div>



              <hr>
              <div class="row">

            <div class="col-6">
              <a  type="button" class="btn btn-primary bg-gradient-primary btn-block" onclick="back()" style="color: #fff"> <i class="fas fa-flip-horizontal fa-fw fa-share"></i> Volver </a>
            </div>
            <div class="col-6">
                <button type="submit" class="btn btn-danger bg-gradient-danger btn-block"><i class="fa fa-edit fa-fw"></i>Actualizar</button> 
            </div>
              </div>
              </form>  
          </div>
  </div>


<script type="text/javascript">
      function back(){
        history.back();
      }
    </script>

<?php
include'../includes/footer.php';
?>