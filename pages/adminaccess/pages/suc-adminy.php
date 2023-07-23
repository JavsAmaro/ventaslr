<?php
include'../includes/connection.php';
include'../includes/sidebar.php';

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
?>
  <script type="text/javascript">
    //then it will be redirected
    alert("¡Página restringida! Serás redirigido a POS");
    window.location = "pos.php";
  </script>
<?php
  }           
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
/*
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
}*/



init();

</script>

<!---
 <input type="hidden" name="date" value="<?php echo $today; ?>">
 <div  style="text-align: -webkit-center;">
<button type="B1"  class="btn btn-primary  " style="border-radius: 0px;" onclick="myFunctionB1()">Sucursal</button>
  <button type="B2"  class="btn btn-primary " style="border-radius: 0px;" onclick="myFunctionB2()">DIDI</button>
  <button type="B3"  class="btn btn-primary " style="border-radius: 0px;" onclick="myFunctionB3()">UBER</button>
  <button type="B3"  class="btn btn-primary " style="border-radius: 0px;" onclick="myFunctionB4()">Rappi</button>
</div>
<br>

  <div class="card-header py-3">
    <div class="row">
      <div class="col-6">
              <h4 class="m-2 font-weight-bold text-primary">Añadir Producto &nbsp;<a  href="#" data-toggle="modal" data-target="#aModal" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a></h4>
      </div>
      <div class="col-6" style="text-align: -webkit-right;">
        <h4 class="m-2 font-weight-bold text-primary" >
              <a  href="#" data-toggle="modal" data-target="#inventarioModal" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a>&nbsp;Inventario </h4>
      </div>
</div>

  </div>
--->
                            







<div class="card shadow mb-4" id="sucursal">
  
            <div class="card-body">
              <div class="table-responsive">

             <h4 class="m-2 font-weight-bold text-primary">Añadir Blog &nbsp;<a  href="#" data-toggle="modal" data-target="#aModal" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a></h4>


                <table class="table table-bordered display" width="100%" cellspacing="0"> 
               <thead>
                   <tr>
                      <th>Portada</th>
                     <th>Informacion</th>
                     <th>Acción</th>
                   </tr>
               </thead>
          <tbody>

<?php                  

   $query = "SELECT * FROM blog ORDER BY FECHA_PUBLICACION DESC ";

        $result = mysqli_query($db, $query) or die (mysqli_error($db));

      
            while ($row = mysqli_fetch_assoc($result)) {
              
                  //$imageURL = 'img/'.$row["PORTADA"];                
                echo '<tr>';



               echo '<td style="width:10%">';


               if( $row['PORTADA'] == null)
                           {
                             echo '<img src="img/lr-logo.jpg" alt="" style="width: 100px;height: 100px;" />';

                           }if($row['PORTADA'] != null)
                           {
                             echo '<img src="img/'.$row['PORTADA'].'" alt="" style="width: 100px;height: 100px;" />';
                           }
               echo '</td">';



//                echo '<td>'. $row['IMAGENES'].'</td>';
                echo '<td style="width:75%"> <strong>'. $row['TITULO'].  '</strong> <br>'. $row['DESCRIPCION'].'<br>'. date("d-m-Y", strtotime($row['FECHA_PUBLICACION']) ).'</td>';




                      echo '<td align="right " style="width:15%"> <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary" href="blog_searchfrm.php?action=edit & id='.$row['BLOG_ID'] . '"><i class="fas fa-fw fa-list-alt"></i> VER</a>
                            <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary dropdown no-arrow" data-toggle="dropdown" style="color:white;">
                              ... <span class="caret"></span></a>
                            <ul class="dropdown-menu text-center" role="menu">
                                <li>


                                  <a type="button" class="btn btn-success bg-gradient-success btn-block" style="border-radius: 0px;width: 220px;" href="'.$row['LINK']. '">
                                    <i class="fas fa-external-link-alt"></i> Ir a Contenido
                                  </a>

                             
                                </li>


                                <li>
                                  <a type="button" class="btn btn-warning bg-gradient-warning btn-block" style="border-radius: 0px;" href="blog_edit.php?action=edit & id='.$row['BLOG_ID']. '">
                                    <i class="fas fa-fw fa-edit"></i> Editar
                                  </a>
                                </li>


                                <li>
                                  <a type="button" class="btn btn-danger bg-gradient-danger btn-block" style="border-radius: 0px;" href="blog_del.php?varname='.$row['BLOG_ID']. '">
                                    <i class="fas fa-trash-alt"></i> Eliminar
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




<!--

<div class="card shadow mb-4" id="didi">
  
            <div class="card-body">
              <div class="table-responsive">
                 <h4 class="m-2 font-weight-bold text-primary">DIDI </h4>
                <table class="table table-bordered display" width="100%" cellspacing="0"> 
               <thead>
                   <tr>

                      <th>Imagen</th>
                     <th>Nombre</th>
                     <th>Cantidad</th>
                     <th>Precio </th>
                     <th>Categoria</th>

                     <th>Acción</th>
                   </tr>
               </thead>
          <tbody>

<?php                  

   $query = "SELECT PRODUCT_ID, IMAGENES, QTY_STOCK, PRODUCT_CODE, NAME, CITY, PRICE, CNAME, DATE_STOCK_IN FROM product p join category c on p.CATEGORY_ID=c.CATEGORY_ID WHERE c.CATEGORY_ID LIKE 10 OR c.CATEGORY_ID LIKE 11 OR c.CATEGORY_ID LIKE 12 OR c.CATEGORY_ID LIKE 13 OR c.CATEGORY_ID LIKE 14 OR c.CATEGORY_ID LIKE 15 OR c.CATEGORY_ID LIKE 16 OR c.CATEGORY_ID LIKE 17 ORDER BY c.CATEGORY_ID ";

        $result = mysqli_query($db, $query) or die (mysqli_error($db));

      
            while ($row = mysqli_fetch_assoc($result)) {
                if ($row['CITY'] == $_SESSION['CITY']) {
                  $imageURL = 'img/'.$row["IMAGENES"];                
                echo '<tr>';
               echo '<td><img src="img/'. $row['IMAGENES'].'" alt="" width="100" height="100" /></td>';
                echo '<td>'. $row['NAME'].'</td>';
                  if(($row['QTY_STOCK'] <= "15")&&($row['QTY_STOCK'] > "0"))
                           {
                             echo '<td class="text-warning">'. $row['QTY_STOCK'].'</td>';
                           }if($row['QTY_STOCK'] > "15")
                           {
                             echo '<td class="text-success">'. $row['QTY_STOCK'].'</td>';
                           } if($row['QTY_STOCK'] <= "0")
                           {
                             echo '<td class="text-danger">'. $row['QTY_STOCK'].'</td>';
                           } 


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
                     <th>Cantidad</th>
                     <th>Precio </th>
                     <th>Categoria</th>
                     <th>Acción</th>
                   </tr>
               </thead>
          <tbody>

<?php                  

   $query = "SELECT PRODUCT_ID, IMAGENES, QTY_STOCK, PRODUCT_CODE, NAME, CITY, PRICE, CNAME, DATE_STOCK_IN FROM product p join category c on p.CATEGORY_ID=c.CATEGORY_ID WHERE c.CATEGORY_ID LIKE 20 OR c.CATEGORY_ID LIKE 21 OR c.CATEGORY_ID LIKE 22 OR c.CATEGORY_ID LIKE 23 OR c.CATEGORY_ID LIKE 24 OR c.CATEGORY_ID LIKE 25 OR c.CATEGORY_ID LIKE 26 OR c.CATEGORY_ID LIKE 27 ORDER BY c.CATEGORY_ID ";

        $result = mysqli_query($db, $query) or die (mysqli_error($db));

      
            while ($row = mysqli_fetch_assoc($result)) {
                if ($row['CITY'] == $_SESSION['CITY']) {
                  $imageURL = 'img/'.$row["IMAGENES"];                
                echo '<tr>';
               echo '<td><img src="img/'. $row['IMAGENES'].'" alt="" width="100" height="100" /></td>';
                echo '<td>'. $row['NAME'].'</td>';
                  if(($row['QTY_STOCK'] <= "15")&&($row['QTY_STOCK'] > "0"))
                           {
                             echo '<td class="text-warning">'. $row['QTY_STOCK'].'</td>';
                           }if($row['QTY_STOCK'] > "15")
                           {
                             echo '<td class="text-success">'. $row['QTY_STOCK'].'</td>';
                           } if($row['QTY_STOCK'] <= "0")
                           {
                             echo '<td class="text-danger">'. $row['QTY_STOCK'].'</td>';
                           } 
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
                 <h4 class="m-2 font-weight-bold text-primary">Rappi</h4>
                <table class="table table-bordered display" width="100%" cellspacing="0"> 
               <thead>
                   <tr>

                      <th>Imagen</th>
                     <th>Nombre</th>
                     <th>Cantidad</th>
                     <th>Precio </th>
                     <th>Categoria</th>
                     <th>Acción</th>
                   </tr>
               </thead>
          <tbody>

<?php                  

   $query = "SELECT PRODUCT_ID, IMAGENES,QTY_STOCK, PRODUCT_CODE, NAME, CITY, PRICE, CNAME, DATE_STOCK_IN FROM product p join category c on p.CATEGORY_ID=c.CATEGORY_ID WHERE c.CATEGORY_ID LIKE 40 OR c.CATEGORY_ID LIKE 41 OR c.CATEGORY_ID LIKE 42 OR c.CATEGORY_ID LIKE 44 OR c.CATEGORY_ID LIKE 44 OR c.CATEGORY_ID LIKE 45 OR c.CATEGORY_ID LIKE 46 OR c.CATEGORY_ID LIKE 47
    ORDER BY c.CATEGORY_ID ";

        $result = mysqli_query($db, $query) or die (mysqli_error($db));

      
            while ($row = mysqli_fetch_assoc($result)) {
             if ($row['CITY'] == $_SESSION['CITY']) {
                  $imageURL = 'img/'.$row["IMAGENES"];                
                echo '<tr>';
               echo '<td><img src="img/'. $row['IMAGENES'].'" alt="" width="100" height="100" /></td>';
                echo '<td>'. $row['NAME'].'</td>';
                  if(($row['QTY_STOCK'] <= "15")&&($row['QTY_STOCK'] > "0"))
                           {
                             echo '<td class="text-warning">'. $row['QTY_STOCK'].'</td>';
                           }if($row['QTY_STOCK'] > "15")
                           {
                             echo '<td class="text-success">'. $row['QTY_STOCK'].'</td>';
                           } if($row['QTY_STOCK'] <= "0")
                           {
                             echo '<td class="text-danger">'. $row['QTY_STOCK'].'</td>';
                           } 
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
                      }
?> 
                                    
                         </tbody>
                     </table>
               </div>
           </div>
 </div>
--->




<?php
include'../includes/footer.php';
?>

  <!-- Product Modal--->
  <div class="modal fade" id="aModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Añadir Blog</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form role="form" method="post" action="blog_transac.php?action=add" enctype="multipart/form-data">
             <div class="form-group">
             <input class="form-control" placeholder="Titulo" name="titulo" required>
           </div>

           <div class="form-group">
            Portada
            <input type="file" class="form-control" id="image" name="image" multiple>
           </div>
           <div class="form-group">
            <input type="datetime-local" name="fecha">
           </div>
          
           <div class="form-group">
             <textarea  cols="50" class="form-control" placeholder="Descripción" name="descripcion" required></textarea>
           </div>

          <div class="form-group">
             <textarea  cols="50" class="form-control" placeholder="Contenido" name="contenido" required></textarea>
           </div>

                     <div class="form-group">
             <textarea  cols="50" class="form-control" placeholder="Link" name="link" required></textarea>
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
