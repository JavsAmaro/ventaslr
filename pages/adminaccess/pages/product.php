<?php
include'../includes/connection.php';
include'../includes/sidebar.php';


 $location = "No elegida";

$sql = "SELECT DISTINCT LOCATION_ID, CITY FROM location";
$result = mysqli_query($db, $sql) or die ("Bad SQL: $sql");

$opt = "<select class='form-control' name='location' required>
      <option value='' disabled selected hidden>Seleccionar Sucursal</option>";
  while ($row = mysqli_fetch_assoc($result)) {
    $opt .= "<option value='".$row['CITY']."'>".$row['CITY']." </option>";
  }

$opt .= "</select>";



  date_default_timezone_set('America/Mexico_City');

$script_tz = date_default_timezone_get();
            $today = date("j-n-Y"); 


  $query = 'SELECT ID, t.TYPE
            FROM users u
            JOIN type t ON t.TYPE_ID=u.TYPE_ID WHERE ID = '.$_SESSION['MEMBER_ID'].'';
  $result = mysqli_query($db, $query) or die (mysqli_error($db));
  
  while ($row = mysqli_fetch_assoc($result)) {
            $Aa = $row['TYPE'];
                   
if ($Aa=='User'){
           
             ?>    <script type="text/javascript">
                      //then it will be redirected
                      alert("¡Página restringida! Serás redirigido a POS");
                      window.location = "pos.php";
                  </script>
             <?php   }if ($Aa=='Encargado'){
           
             ?> <script type="text/javascript">
                      //then it will be redirected
                      alert("¡Página restringida! Serás redirigido a tu panel de administrador");
                      window.location = "product-encargado.php";
                  </script>
                         <?php }
           
}   
            ?>


<?php
 if(isset($_POST['submit'])) {
      $location = $_POST['location'];

  }


$sql = "SELECT DISTINCT CNAME, CATEGORY_ID FROM category order by CNAME asc";
$result = mysqli_query($db, $sql) or die ("Bad SQL: $sql");

$aaa = "<select class='form-control' name='category' required>
        <option disabled selected hidden>Seleccionar Categoría</option>";
  while ($row = mysqli_fetch_assoc($result)) {
    $aaa .= "<option value='".$row['CATEGORY_ID']."'>".$row['CNAME']."</option>";
  }

$aaa .= "</select>";
?>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

<style type="text/css">
  div.dataTables_wrapper {
        margin-bottom: 3em;
    }


    #sucursal {
  display: block;
}

#didi{
  display: none;
}

#uber{
  display: none;
}
#sin_delantal{
  display: none;
}

</style>

<script type="text/javascript">
  

  $(document).ready(function() {
    $('table.display').DataTable();
} );

  function init(){
  var x = document.getElementById("sucursal");
    var y = document.getElementById("didi");
    var z = document.getElementById("uber");
    var a = document.getElementById("sin_delantal");
    x.style.display = "block";
    y.style.display = "none";
    z.style.display = "none";  

}

function myFunctionB1() {
    var x = document.getElementById("sucursal");
    var y = document.getElementById("didi");
    var z = document.getElementById("uber");
    var a = document.getElementById("sin_delantal");
    if (x.style.display === "none") {
        x.style.display = "block";
        y.style.display = "none";
        z.style.display = "none";  
        a.style.display = "none";
    } else {
        x.style.display = "none";
        y.style.display = "none";
        z.style.display = "none";
        a.style.display = "none";
    }
    
}

function myFunctionB2() {
    var x = document.getElementById("sucursal");
    var y = document.getElementById("didi");
    var z = document.getElementById("uber");
    var a = document.getElementById("sin_delantal");
    if (y.style.display === "none") {
        y.style.display = "block";
        x.style.display = "none";
        z.style.display = "none"; 
        a.style.display = "none";
    } else {
        x.style.display = "none";
        y.style.display = "none";
        z.style.display = "none"; 
        a.style.display = "none";
    }
}

function myFunctionB3() {
    var x = document.getElementById("sucursal");
    var y = document.getElementById("didi");
    var z = document.getElementById("uber");
    var a = document.getElementById("sin_delantal");
    if (z.style.display === "none") {
        z.style.display = "block";
        x.style.display = "none";
        y.style.display = "none";
        a.style.display = "none";
    } else {
        x.style.display = "none";
        y.style.display = "none";
        z.style.display = "none";
        a.style.display = "none";
    }
}

function myFunctionB4() {
    var x = document.getElementById("sucursal");
    var y = document.getElementById("didi");
    var z = document.getElementById("uber");
    var a = document.getElementById("sin_delantal");
    if (a.style.display === "none") {
        a.style.display = "block";
        x.style.display = "none";
        z.style.display = "none";
        y.style.display = "none";

    } else {
        x.style.display = "none";
        y.style.display = "none";
        z.style.display = "none";
        a.style.display = "none";
    }
}



init();

</script>


 <input type="hidden" name="date" value="<?php echo $today; ?>">
 <div  style="text-align: -webkit-center;">
<button type="B1"  class="btn btn-primary  " style="border-radius: 0px;" onclick="myFunctionB1()">Sucursal</button>
  <button type="B2"  class="btn btn-primary " style="border-radius: 0px;" onclick="myFunctionB2()">DIDI</button>
  <button type="B3"  class="btn btn-primary " style="border-radius: 0px;" onclick="myFunctionB3()">UBER</button>
  <button type="B3"  class="btn btn-primary " style="border-radius: 0px;" onclick="myFunctionB4()">SIN DELANTAL</button>
</div>
<br>
 
  <div class="card-header py-3">     
          <div class="card-header py-3 row">

            <div class="card-header py-12 col-sm-6 col-md-4">
             <h4 class="m-2 font-weight-bold text-primary">Añadir Producto &nbsp;<a  href="#" data-toggle="modal" data-target="#aModal" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a></h4>
            </div>


            <div class="card-header py-12 col-sm-6 col-md-4">
              
              <form action="" method="POST" style="display: flex;">
               <?php
                  echo $opt;
                ?>

                <input style="margin: 0px 10px;" type="submit" name="submit" value="Buscar">
              </form>

            </div>


            <div class="card-header py-12 col-sm-6 col-md-4">
                  <span class="m-2 font-weight-bold " style="float: right;">Sucursal <?php echo  $location;?> </span>
            </div>
            </div> 


  </div>


            


<div class="card shadow mb-4" id="sucursal">
  
            <div class="card-body">
              <div class="table-responsive">
                 <h4 class="m-2 font-weight-bold text-primary">Sucursal </h4>
                <table class="table table-bordered display" width="100%" cellspacing="0"> 
               <thead>
                   <tr>
                      <th>Imagen</th>
                     <th>Nombre</th>
                     <th>Precio </th>
                     <th>Categoria</th>
                     <th>Acción</th>
                   </tr>
               </thead>
          <tbody>

<?php                  

   $query = "SELECT PRODUCT_ID, IMAGENES, PRODUCT_CODE, NAME, PRICE, CNAME, DATE_STOCK_IN FROM product p join category c on p.CATEGORY_ID=c.CATEGORY_ID WHERE (CITY LIKE '{$location}%') AND (c.CATEGORY_ID LIKE 1 OR c.CATEGORY_ID LIKE 2 OR c.CATEGORY_ID LIKE 3 OR c.CATEGORY_ID LIKE 4 OR c.CATEGORY_ID LIKE 5 OR c.CATEGORY_ID LIKE 6 OR c.CATEGORY_ID LIKE 7) ORDER BY c.CATEGORY_ID ";

        $result = mysqli_query($db, $query) or die (mysqli_error($db));

      
            while ($row = mysqli_fetch_assoc($result)) {
                  $imageURL = 'img/'.$row["IMAGENES"];                
                echo '<tr>';
               echo '<td><img src="img/'. $row['IMAGENES'].'" alt="" width="100" height="100" /></td>';
//                echo '<td>'. $row['IMAGENES'].'</td>';
                echo '<td>'. $row['NAME'].'</td>';
                echo '<td>'. $row['PRICE'].'</td>';
                echo '<td>'. $row['CNAME'].'</td>';
                      echo '<td align="right"> <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary" href="pro_searchfrm.php?action=edit & id='.$row['PRODUCT_ID'] . '"><i class="fas fa-fw fa-list-alt"></i> Details</a>
                            <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary dropdown no-arrow" data-toggle="dropdown" style="color:white;">
                              ... <span class="caret"></span></a>
                            <ul class="dropdown-menu text-center" role="menu">
                                <li>
                                  <a type="button" class="btn btn-warning bg-gradient-warning btn-block" style="border-radius: 0px;" href="pro_edit.php?action=edit & id='.$row['PRODUCT_ID']. '">
                                    <i class="fas fa-fw fa-edit"></i> Edit
                                  </a>
                                </li>
                            </ul>
                            </div>
                          </div> </td>';
                echo '</tr> ';
                        }
?> 
                                    
                         </tbody>
                     </table>
               </div>
           </div>
 </div>


<div class="card shadow mb-4" id="didi">
  
            <div class="card-body">
              <div class="table-responsive">
                 <h4 class="m-2 font-weight-bold text-primary">DIDI </h4>
                <table class="table table-bordered display" width="100%" cellspacing="0"> 
               <thead>
                   <tr>

                      <th>Imagen</th>
                     <th>Nombre</th>
                     <th>Precio </th>
                     <th>Categoria</th>
                     <th>Acción</th>
                   </tr>
               </thead>
          <tbody>

<?php                  

   $query = "SELECT PRODUCT_ID, IMAGENES, PRODUCT_CODE, NAME, PRICE, CNAME, DATE_STOCK_IN FROM product p join category c on p.CATEGORY_ID=c.CATEGORY_ID WHERE (CITY  LIKE '{$location}%') AND (c.CATEGORY_ID LIKE 10 OR c.CATEGORY_ID LIKE 11 OR c.CATEGORY_ID LIKE 12 OR c.CATEGORY_ID LIKE 13 OR c.CATEGORY_ID LIKE 14 OR c.CATEGORY_ID LIKE 15 OR c.CATEGORY_ID LIKE 16) ORDER BY c.CATEGORY_ID ";

        $result = mysqli_query($db, $query) or die (mysqli_error($db));

      
            while ($row = mysqli_fetch_assoc($result)) {
                  $imageURL = 'img/'.$row["IMAGENES"];                
                echo '<tr>';
               echo '<td><img src="img/'. $row['IMAGENES'].'" alt="" width="100" height="100" /></td>';
                echo '<td>'. $row['NAME'].'</td>';
                echo '<td>'. $row['PRICE'].'</td>';
                echo '<td>'. $row['CNAME'].'</td>';
                      echo '<td align="right"> <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary" href="pro_searchfrm.php?action=edit & id='.$row['PRODUCT_ID'] . '"><i class="fas fa-fw fa-list-alt"></i> Details</a>
                            <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary dropdown no-arrow" data-toggle="dropdown" style="color:white;">
                              ... <span class="caret"></span></a>
                            <ul class="dropdown-menu text-center" role="menu">
                                <li>
                                  <a type="button" class="btn btn-warning bg-gradient-warning btn-block" style="border-radius: 0px;" href="pro_edit.php?action=edit & id='.$row['PRODUCT_ID']. '">
                                    <i class="fas fa-fw fa-edit"></i> Edit
                                  </a>
                                </li>
                            </ul>
                            </div>
                          </div> </td>';
                echo '</tr> ';
                        }
?> 
                                    
                         </tbody>
                     </table>
               </div>
           </div>
 </div>




<div class="card shadow mb-4" id="uber">
  
            <div class="card-body">
              <div class="table-responsive">
                 <h4 class="m-2 font-weight-bold text-primary">UBER </h4>
                <table class="table table-bordered display" width="100%" cellspacing="0"> 
               <thead>
                   <tr>

                      <th>Imagen</th>
                     <th>Nombre</th>
                     <th>Precio </th>
                     <th>Categoria</th>
                     <th>Acción</th>
                   </tr>
               </thead>
          <tbody>

<?php                  

   $query = "SELECT PRODUCT_ID, IMAGENES, PRODUCT_CODE, NAME, PRICE, CNAME, DATE_STOCK_IN FROM product p join category c on p.CATEGORY_ID=c.CATEGORY_ID WHERE (CITY LIKE '{$location}%') AND (c.CATEGORY_ID LIKE 20 OR c.CATEGORY_ID LIKE 21 OR c.CATEGORY_ID LIKE 22 OR c.CATEGORY_ID LIKE 23 OR c.CATEGORY_ID LIKE 24 OR c.CATEGORY_ID LIKE 25 OR c.CATEGORY_ID LIKE 26) ORDER BY c.CATEGORY_ID ";

        $result = mysqli_query($db, $query) or die (mysqli_error($db));

      
            while ($row = mysqli_fetch_assoc($result)) {
                  $imageURL = 'img/'.$row["IMAGENES"];                
                echo '<tr>';
               echo '<td><img src="img/'. $row['IMAGENES'].'" alt="" width="100" height="100" /></td>';
                echo '<td>'. $row['NAME'].'</td>';
                echo '<td>'. $row['PRICE'].'</td>';
                echo '<td>'. $row['CNAME'].'</td>';
                      echo '<td align="right"> <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary" href="pro_searchfrm.php?action=edit & id='.$row['PRODUCT_ID'] . '"><i class="fas fa-fw fa-list-alt"></i> Details</a>
                            <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary dropdown no-arrow" data-toggle="dropdown" style="color:white;">
                              ... <span class="caret"></span></a>
                            <ul class="dropdown-menu text-center" role="menu">
                                <li>
                                  <a type="button" class="btn btn-warning bg-gradient-warning btn-block" style="border-radius: 0px;" href="pro_edit.php?action=edit & id='.$row['PRODUCT_ID']. '">
                                    <i class="fas fa-fw fa-edit"></i> Edit
                                  </a>
                                </li>
                            </ul>
                            </div>
                          </div> </td>';
                echo '</tr> ';
                        }
?> 
                                    
                         </tbody>
                     </table>
               </div>
           </div>
 </div>



<div class="card shadow mb-4" id="sin_delantal">
  
            <div class="card-body">
              <div class="table-responsive">
                 <h4 class="m-2 font-weight-bold text-primary">Sin Delantal </h4>
                <table class="table table-bordered display" width="100%" cellspacing="0"> 
               <thead>
                   <tr>

                      <th>Imagen</th>
                     <th>Nombre</th>
                     <th>Precio </th>
                     <th>Categoria</th>
                     <th>Acción</th>
                   </tr>
               </thead>
          <tbody>

<?php                  

   $query = "SELECT PRODUCT_ID, IMAGENES, PRODUCT_CODE, NAME, PRICE, CNAME, DATE_STOCK_IN FROM product p join category c on p.CATEGORY_ID=c.CATEGORY_ID WHERE (CITY  LIKE '{$location}%') AND (c.CATEGORY_ID LIKE 30 OR c.CATEGORY_ID LIKE 31 OR c.CATEGORY_ID LIKE 32 OR c.CATEGORY_ID LIKE 33 OR c.CATEGORY_ID LIKE 34 OR c.CATEGORY_ID LIKE 35 OR c.CATEGORY_ID LIKE 36) ORDER BY c.CATEGORY_ID ";

        $result = mysqli_query($db, $query) or die (mysqli_error($db));

      
            while ($row = mysqli_fetch_assoc($result)) {
                  $imageURL = 'img/'.$row["IMAGENES"];                
                echo '<tr>';
               echo '<td><img src="img/'. $row['IMAGENES'].'" alt="" width="100" height="100" /></td>';
                echo '<td>'. $row['NAME'].'</td>';
                echo '<td>'. $row['PRICE'].'</td>';
                echo '<td>'. $row['CNAME'].'</td>';
                      echo '<td align="right"> <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary" href="pro_searchfrm.php?action=edit & id='.$row['PRODUCT_ID'] . '"><i class="fas fa-fw fa-list-alt"></i> Details</a>
                            <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary dropdown no-arrow" data-toggle="dropdown" style="color:white;">
                              ... <span class="caret"></span></a>
                            <ul class="dropdown-menu text-center" role="menu">
                                <li>
                                  <a type="button" class="btn btn-warning bg-gradient-warning btn-block" style="border-radius: 0px;" href="pro_edit.php?action=edit & id='.$row['PRODUCT_ID']. '">
                                    <i class="fas fa-fw fa-edit"></i> Edit
                                  </a>
                                </li>
                            </ul>
                            </div>
                          </div> </td>';
                echo '</tr> ';
                        }
?> 
                                    
                         </tbody>
                     </table>
               </div>
           </div>
 </div>





<?php
include'../includes/footer.php';
?>

  <!-- Product Modal-->
  <div class="modal fade" id="aModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Añadir Producto</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form role="form" method="post" action="pro_transac.php?action=add" enctype="multipart/form-data">
             <div class="form-group">
             <input class="form-control" placeholder="Nombre" name="name" required>
           </div>
            <!--
           <div class="form-group">
             <input class="form-control" placeholder="Codigo del Producto" name="prodcode" required>
           </div>-->
           <div class="form-group">
            <input type="file" class="form-control" id="image" name="image" multiple>
           </div>
          
           <div class="form-group">
             <textarea rows="5" cols="50" class="form-control" placeholder="Descripción" name="description" required></textarea>
           </div>
           <!--
           <div class="form-group">
             <input type="number"  min="1" max="999999999" class="form-control" placeholder="Cantidad" name="quantity" required>
           </div>

           <div class="form-group">
             <input type="number"  min="1" max="999999999" class="form-control" placeholder="En Mano" name="onhand" required>
           </div>
-->

          <input class="form-control" type="hidden" name="quantity" value="1" required>
          <input class="form-control" type="hidden" name="onhand" value="1" required>




           <div class="form-group">
             <input type="number"  min="1" max="9999999999" class="form-control" placeholder="Precio" name="price" required>
           </div>

           <div class="form-group">
           <select class='form-control' name='cant_cajas' required>
                <option >Cantidad de cajas</option>
                <option >0</option>
                <option >1</option>
                <option >2</option>
            </select>
           </div>

       <input type="hidden" id="city" name="city" value="<?php echo  $_SESSION['CITY'];?>" />

           <div class="form-group">
             <?php
               echo $aaa;
             ?>
           </div>
           <!--<div class="form-group">-->
             <?php
              /* echo $sup;*/
             ?>
           <!--</div>
           <div class="form-group">


             <input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control" placeholder="Fecha en Stock" name="datestock" required>
           </div>-->

<input type="hidden" name="datestock" value="<?php echo $today;?>">
            <hr>
            <button type="submit" class="btn btn-success"><i class="fa fa-check fa-fw"></i>Guardar</button>
            <button type="reset" class="btn btn-danger"><i class="fa fa-times fa-fw"></i>Reset</button>
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>      
          </form>  
        </div>
      </div>
    </div>
  </div>