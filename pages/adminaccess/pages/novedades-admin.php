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

<script type="text/javascript">
  

  $(document).ready(function() {
    $('table.display').DataTable();
} );


init();

</script>
<div class="card shadow mb-4" id="sucursal">
  
            <div class="card-body">
              <div class="table-responsive">

             <h4 class="m-2 font-weight-bold text-primary">Añadir Novedad &nbsp;<a  href="#" data-toggle="modal" data-target="#aModal" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a></h4>


                <table class="table table-bordered display" width="100%" cellspacing="0"> 
               <thead>
                   <tr>
                      <th>Portada</th>
                     <th>Informacion</th>
                      <th>Publicacion</th>
                     <th>Tipo</th>
                     <th>Acción</th>
                   </tr>
               </thead>
          <tbody>

<?php                  

   $query = "SELECT * FROM ofertas ORDER BY FECHA_PUBLICACION DESC ";

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
                             echo '<img src="clientes/'.$row['PORTADA'].'" alt="" style="width: 100px;height: 100px;" />';
                           }
               echo '</td">';



//                echo '<td>'. $row['IMAGENES'].'</td>';
                echo '<td style="width:35%"> <strong>'. $row['TITULO'].  '</strong> <br>'. $row['DESCRIPCION'].'</td>';
                echo '<td >'. date("d-m-Y", strtotime($row['FECHA_PUBLICACION']) ).'</td>';

                echo '<td >'. $row['TYPE'].'</td>';




                      echo '<td align="right " style="width:15%"> <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary" href="novedades_searchfrm.php?action=edit & id='.$row['ID_OFERTA'] . '"><i class="fas fa-fw fa-list-alt"></i> VER</a>
                            <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary dropdown no-arrow" data-toggle="dropdown" style="color:white;">
                              ... <span class="caret"></span></a>
                            <ul class="dropdown-menu text-center" role="menu">
                              


                                <li>
                                  <a type="button" class="btn btn-warning bg-gradient-warning btn-block" style="border-radius: 0px;" href="novedades_edit.php?action=edit & id='.$row['ID_OFERTA']. '">
                                    <i class="fas fa-fw fa-edit"></i> Editar
                                  </a>
                                </li>


                                <li>
                                  <a type="button" class="btn btn-danger bg-gradient-danger btn-block" style="border-radius: 0px;" href="novedades_del.php?varname='.$row['ID_OFERTA']. '">
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
<?php
include'../includes/footer.php';
?>

  <!-- Product Modal--->
  <div class="modal fade" id="aModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Añadir Novedad</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form role="form" method="post" action="novedades_transac.php?action=add" enctype="multipart/form-data">
             <div class="form-group">
             <input class="form-control" placeholder="Titulo" name="titulo" required>
           </div>

           <div class="form-group">
             <textarea  cols="50" class="form-control" placeholder="Descripción" name="descripcion" required></textarea>
           </div>

          <div class="form-group">
             <textarea  cols="50" class="form-control" placeholder="Contenido" name="contenido" required></textarea>
           </div>

           <div class="form-group">
            Portada
            <input type="file" class="form-control" id="image" name="image" multiple>
           </div>
           <div class="form-group">
            Fecha de publicacion
            <input type="datetime-local" name="fecha" required>
           </div>
           <div class="form-group">
            Fecha de caducidad
            <input type="datetime-local" name="caducidad" required>
           </div>
          

          <div class="form-group">
          <select name="tipo" required>
            <option value="novedad">Novedad</option>
            <option value="cupon">Cupon</option>
            <option value="dinamica">Dinamica</option>
          </select>
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
