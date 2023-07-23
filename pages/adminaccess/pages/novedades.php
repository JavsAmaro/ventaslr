<?php
include'../includes/connection.php';
include'../includes/sidebar_encargado.php';

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

 
init();

</script>             

<div class="card shadow mb-4" id="sucursal">
  
            <div class="card-body">
              <div class="table-responsive">
                 <h4 class="m-2 font-weight-bold text-primary">Novedades </h4>
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

   $query = "SELECT * FROM ofertas ORDER BY FECHA_PUBLICACION DESC ";

        $result = mysqli_query($db, $query) or die (mysqli_error($db));

      
            while ($row = mysqli_fetch_assoc($result)) {
              
                  //$imageURL = 'img/'.$row["PORTADA"];                
                echo '<tr>';



               echo '<td style="width:10%">';


               if( $row['PORTADA'] == null)
                           {
                             echo '<img src="clientes/lr-logo.jpg" alt="" style="width: 100px;height: 100px;" />';

                           }if($row['PORTADA'] != null)
                           {
                             echo '<img src="clientes/'.$row['PORTADA'].'" alt="" style="width: 100px;height: 100px;" />';
                           }
               echo '</td">';



//                echo '<td>'. $row['IMAGENES'].'</td>';
                echo '<td style="width:75%"> <strong>'. $row['TITULO'].  '</strong> <br>'. $row['DESCRIPCION'].'<br>'. date("d-m-Y", strtotime($row['FECHA_PUBLICACION']) ).'</td>';



                      echo '<td align="right " style="width:15%"> <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary" href="novedades_searchfrm.php?action=edit & id='.$row['ID_OFERTA'] . '"><i class="fas fa-fw fa-list-alt"></i> VER</a>
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
