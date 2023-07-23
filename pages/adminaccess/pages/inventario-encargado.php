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

  date_default_timezone_set('America/Mexico_City');

$script_tz = date_default_timezone_get();
 $today = date("Y-m-d");


$lunes = DateTime::createFromFormat("yy-m-d", $today);
$lunes->modify('Last Monday');
$lunes = $lunes->format('Y-m-d');

$domingo = DateTime::createFromFormat("yy-m-d", $today);
$domingo->modify('next sunday');
$domingo = $domingo->format('Y-m-d');


$firstDay = date('Y-m-01',strtotime($today));

$lastDay = date('Y-m-t',strtotime($today));


if(isset($_POST['submit'])) {
      $firstDay = $_POST['date'];
      $lastDay = $_POST['date2'];

  }




            $ayer =date('Y-m-d H:i:s',strtotime("-1 days"));//////dia anterior

            $manana =date('Y-m-d H:i:s',strtotime("+1 days"));//////dia anterior
         
            $primerLunes =date($firstDay);//////dia anterior
            //$quintoDomingo =date($lastDay);//////dia anterior

            //$primerDomingo =date($firstDay,strtotime("+2 days"));//////dia anterior



$datetime1 = new DateTime($firstDay);
$datetime2 = new DateTime($lastDay);

$interval = $datetime1->diff($datetime2);

$semanas=$interval->format('%a') / 7;

//echo floor ($semanas);



$primerDomingo = DateTime::createFromFormat("Y-m-d", $primerLunes);
$primerDomingo->modify('+6 days');
$primerDomingo = $primerDomingo->format('Y-m-d');


$segundoLunes = DateTime::createFromFormat("Y-m-d", $primerLunes);
$segundoLunes->modify('+7 days');
$segundoLunes = $segundoLunes->format('Y-m-d');


$segundoDomingo = DateTime::createFromFormat("Y-m-d", $primerLunes);
$segundoDomingo->modify('+13 days');
$segundoDomingo = $segundoDomingo->format('Y-m-d');

$tercerLunes = DateTime::createFromFormat("Y-m-d", $primerLunes);
$tercerLunes->modify('+14 days');
$tercerLunes = $tercerLunes->format('Y-m-d');


$tercerDomingo = DateTime::createFromFormat("Y-m-d", $primerLunes);
$tercerDomingo->modify('+20 days');
$tercerDomingo = $tercerDomingo->format('Y-m-d');

$cuartoLunes = DateTime::createFromFormat("Y-m-d", $primerLunes);
$cuartoLunes->modify('+21 days');
$cuartoLunes = $cuartoLunes->format('Y-m-d');

$cuartoDomingo = DateTime::createFromFormat("Y-m-d", $primerLunes);
$cuartoDomingo->modify('+27 days');
$cuartoDomingo = $cuartoDomingo->format('Y-m-d');

$quintoLunes = DateTime::createFromFormat("Y-m-d", $primerLunes);
$quintoLunes->modify('+28 days');
$quintoLunes = $quintoLunes->format('Y-m-d');


$quintoDomingo = DateTime::createFromFormat("Y-m-d", $primerLunes);
$quintoDomingo->modify('+34 days');
$quintoDomingo = $quintoDomingo->format('Y-m-d');



              $ventaMes=0;
              $ventaSemana1=0;
              $ventaSemana2=0;
              $ventaSemana3=0;
              $ventaSemana4=0;
              $ventaSemana5=0;
              $gastosSemana1=0;
              $gastosSemana2=0;
              $gastosSemana3=0;
              $gastosSemana4=0;
              $gastosSemana5=0;

              $Totalcajas=0;



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
    alert("Restricted Page! You will be redirected to POS");
    window.location = "pos.php";
  </script>
<?php
  }           
}
            ?>
            

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>


<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<style>
  div.dataTables_wrapper {
        margin-bottom: 3em;
    }

#dia{
  display: block;
}

#semana{
  display: none;
}

#mes{
  display: none;
}


.submenu {
height: 50px; 
width:100%; /*full width*/
    text-align:center;
    display:table;
}

.submenu:hover{
background-color: #500D76;

}
 

 .submenu h4{
  margin:0;
    padding:0;
    vertical-align:middle; /*middle centred*/
    display:table-cell;
    font-weight: 800;
}


 .submenu:hover h4{
 color: #fff!important;
}

.ui-datepicker-calendar tr td:first-child a {
        background:red;
      color: #fff;
}
/* Thursday */
.ui-datepicker-calendar tr td:first-child + td  a {
  color: #fff;
    background:green;

}

</style>
















<script type="text/javascript">
  
  $(document).ready(function() {
    $('table.display').DataTable();
} );
  
  function init(){
  var x = document.getElementById("dia");
    var y = document.getElementById("semana");
    var z = document.getElementById("mes");
    x.style.display = "block";
    y.style.display = "none";
    z.style.display = "none";  

}

function myFunctionB1() {
    var x = document.getElementById("dia");
    var y = document.getElementById("semana");
    var z = document.getElementById("mes");
    if (x.style.display === "none") {
        x.style.display = "block";
        y.style.display = "none";
        z.style.display = "none";   
    } else {
        x.style.display = "none";
        y.style.display = "none";
        z.style.display = "none";        
    }
    
}

function myFunctionB2() {
    var x = document.getElementById("dia");
    var y = document.getElementById("semana");
    var z = document.getElementById("mes");
    if (y.style.display === "none") {
        y.style.display = "block";
        x.style.display = "none";
        z.style.display = "none";  
    } else {
        x.style.display = "none";
        y.style.display = "none";
        z.style.display = "none";        
    }
}

function myFunctionB3() {
    var x = document.getElementById("dia");
    var y = document.getElementById("semana");
    var z = document.getElementById("mes");
    if (z.style.display === "none") {
        z.style.display = "block";
        x.style.display = "none";
        y.style.display = "none";
    } else {
        x.style.display = "none";
        y.style.display = "none";
        z.style.display = "none";        
    }
}

init();

</script>



          <input type="hidden" name="date" value="<?php echo $today; ?>">
<br>

   <table class="table table-bordered"  width="100%" cellspacing="0"> 
                  <tr  >
                    <td colspan="4" style="background-color: #FA4616; color:#FFF; text-align: center;" > <h1>Inventario Mensual</h1>

             <form action="" method="POST">

              <div class="row" style="justify-content: center;">
                <input class="date" style="width: 20%; margin: 0px 10px;" type="text" id="date" name="date" placeholder="Fecha Inicio <?php echo date("d-m-Y", strtotime($firstDay) ); ?>" autocomplete="off" required >

                <input class="date2" style="width: 20%; margin: 0px 10px;"  type="text" id="date2" name="date2" placeholder="Fecha Final <?php echo date("d-m-Y", strtotime($lastDay) ); ?>" autocomplete="off" required >



                <input style="margin: 0px 10px;" class="btn btn-primary bg-gradient-primary" type="submit" name="submit" value="Buscar">

                <a href="reporte_ventas/index.php?fd=<?php echo date("Y-m-d", strtotime($firstDay)); ?> & ld=<?php echo date("Y-m-d", strtotime($lastDay)); ?> & cd=<?php echo $_SESSION['CITY']; ?> & pd=<?php echo date("Y-m-d", strtotime($primerDomingo)); ?> & sl=<?php echo date("Y-m-d", strtotime($segundoLunes)); ?> & sd=<?php echo date("Y-m-d", strtotime($segundoDomingo)); ?> & tl=<?php echo date("Y-m-d", strtotime($tercerLunes)); ?> & td=<?php echo date("Y-m-d", strtotime($tercerDomingo)); ?> & cl=<?php echo date("Y-m-d", strtotime($cuartoLunes)); ?>& cud=<?php echo date("Y-m-d", strtotime($cuartoDomingo)); ?> & ql=<?php echo date("Y-m-d", strtotime($quintoLunes)); ?> & qd=<?php echo date("Y-m-d", strtotime($quintoDomingo)); ?>" style="width: 15%;margin: 0px 10px;" type="button" class="btn btn-block btn-success"> <i class="fa fa-download"></i> Descargar Excel </a>






              </div>



              </form>




              <script type="text/javascript">
              $( "#date" ).datepicker({

                  dateFormat: 'yy-mm-dd',
                  altFormat : "yy-mm-dd",
                  altField  : '#alternate',
                  onSelect  : function() {
                  
                      // proof
                      console.log( $('#alternate').val() );
                  }

                         


              });

              $( "#date2" ).datepicker({
                  dateFormat: 'yy-mm-dd',
                  altFormat : "yy-mm-dd",
                  altField  : '#alternate2',
                  onSelect  : function() {
                  
                      // proof
                      console.log( $('#alternate2').val() );
                  }
              });

              </script>


                    </td>
                  </tr>

        </table>




  <div  style="text-align: -webkit-center;">
<button type="B1"  class="btn btn-primary  " style="border-radius: 0px;" onclick="myFunctionB1()">Movimientos del día</button>
  <button type="B2"  class="btn btn-primary " style="border-radius: 0px;" onclick="myFunctionB2()">Movimientos de la semana</button>
  <button type="B3"  class="btn btn-primary " style="border-radius: 0px;" onclick="myFunctionB3()">Movimientos del mes</button>

</div>
<br>
  <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Agregar a Inventario &nbsp;<a  href="#" data-toggle="modal" data-target="#inventarioModal" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a></h4>
  </div>
            

 <div class="card shadow mb-4" id="dia">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Inventario De Hoy &nbsp;</h4>
            </div>
            
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered display" width="100%" cellspacing="0">        
                  <thead>
                      <tr>
                       <th>Fecha</th>
                        <th>Unidades</th>
                        <th>Tipo de accion</th>
                        <th>Producto</th>
                      </tr>
                  </thead>
                  <tbody>
                                       <?php                  
                      $query = "SELECT * FROM inventory WHERE date(DATE) LIKE '{$today}%' AND CITY LIKE '{$_SESSION['CITY']}%'";
                      $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
                      while ($row = mysqli_fetch_assoc($result)) {
                      echo '<tr>';
                      echo '<td>'. date("d-m-Y H:i:s", strtotime($row['DATE'])).'</td>';
                      echo '<td>'.($row['CANTIDAD']).'</td>';

                      echo '<td>';
                          if ($row['TIPO'] == 1) {
                            echo "AGREGÓ";
                          }
                          if ($row['TIPO'] == 2) {
                            echo "QUITÓ";
                          }
                        

                     echo '</td>';
                      echo '<td>'.($row['PRODUCTO']).'</td>';
      
                     echo '</tr> ';
                      }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>


      
            <div class="card shadow mb-4" id="semana">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Inventario De La Semana &nbsp;</h4>
            </div>
            




            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered display" width="100%" cellspacing="0">        
                  <thead>
                      <tr>
                       <th>Fecha</th>
                        <th>Unidades</th>
                        <th>Tipo de accion</th>
                        <th>Producto</th>
                      </tr>
                  </thead>
                  <tbody>
                                       <?php                  
                      $query = "SELECT * FROM inventory WHERE date(DATE) BETWEEN '{$lunes}%' AND '{$domingo}%' AND CITY LIKE '{$_SESSION['CITY']}%'";
                      $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
                      while ($row = mysqli_fetch_assoc($result)) {
                      echo '<tr>';
                      echo '<td>'. date("d-m-Y H:i:s", strtotime($row['DATE'])).'</td>';
                      echo '<td>'.($row['CANTIDAD']).'</td>';

                      echo '<td>';
                          if ($row['TIPO'] == 1) {
                            echo "AGREGÓ";
                          }
                          if ($row['TIPO'] == 2) {
                            echo "QUITÓ";
                          }
                        

                     echo '</td>';
                      echo '<td>'.($row['PRODUCTO']).'</td>';
      
  
                      echo '</tr> ';
                      }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>





            <div class="card shadow mb-4" id="mes">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Inventario Del Mes &nbsp;</h4>
            </div>
            
  
                      <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered display" width="100%" cellspacing="0">        
                  <thead>
                      <tr>
                       <th>Fecha</th>
                        <th>Unidades</th>
                        <th>Tipo de accion</th>
                        <th>Producto</th>
                      </tr>
                  </thead>
                  <tbody>
                                       <?php                  
                      $query = "SELECT * FROM inventory WHERE date(DATE) BETWEEN '{$firstDay}%' AND '{$today}%' AND CITY LIKE '{$_SESSION['CITY']}%'";
                      $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
                      while ($row = mysqli_fetch_assoc($result)) {
                      echo '<tr>';
                      echo '<td>'. date("d-m-Y H:i:s", strtotime($row['DATE'])).'</td>';
                      echo '<td>'.($row['CANTIDAD']).'</td>';

                      echo '<td>';
                          if ($row['TIPO'] == 1) {
                            echo "AGREGÓ";
                          }
                          if ($row['TIPO'] == 2) {
                            echo "QUITÓ";
                          }
                        

                     echo '</td>';
                      echo '<td>'.($row['PRODUCTO']).'</td>';
   
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
