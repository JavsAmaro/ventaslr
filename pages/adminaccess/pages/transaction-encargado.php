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



             $ventaDia = 0;  
             $caja=0;
              $ingreso=0;
              $compras=0;
              $gastos=0;
              $totalEfectivo =0;
              $cortedecaja=0;
              $corte =0;
              $Totalcaja=0;
              $pagos=0;
              $retiro=0;
              $cancelacion=0;
              $cierredecaja=0;
            $ventaDia =0;
              //metodos de pago
              $efectivo=1;
              $tarjeta=2;
              $didi=2;
              $uber=3;
              $sindelantal=4;
              $rappi=5;
              $ubertarjeta=4;
              $sdefectivo=5;
              $sdtarjeta=6;
              $didiefectivo=7;
              $diditarjeta=8;
              $rappiefectivo=9;
              $rappitarjeta=10;
              $retiros_caja=0;


              $PagoEfectivo=0;
              $PagoTarjeta=0;
              $pagouber=0;
              $pagoubertarjeta=0;
              $pagosdefectivo=0;
              $pagosdtarjeta=0;
              $pagodidiefectivo=0;
              $pagodiditarjeta=0;
              $pagorappiefectivo=0;
              $pagorappitarjeta=0;

              $renta=0;
              $telefono=0;
              $agua=0;
              $impuestos=0;
              $otrosGastos=0;
              $pagos_caja=0;
              $pagos_tc=0;

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









<?php
                    $query = "SELECT * FROM transaction WHERE date(DATE)  LIKE '{$today}%' AND CITY LIKE '{$_SESSION['CITY']}%'";

                       $result = mysqli_query($db, $query) or die (mysqli_error($db));
                      while ($row = mysqli_fetch_assoc($result)) {

                  $ventaDia +=  $row['GRANDTOTAL'];

                      }
  ?>

<?php     
      $query = "SELECT * FROM transaction WHERE METODO_PAGO LIKE '{$efectivo}%' AND date(DATE)  LIKE '{$today}%' AND CITY LIKE '{$_SESSION['CITY']}%' ";
       $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
      while ($row = mysqli_fetch_assoc($result)) {
      $PagoEfectivo +=  $row['GRANDTOTAL'];

        }
?>
<?php     
      $query = "SELECT * FROM transaction WHERE METODO_PAGO LIKE '{$efectivo}%' AND date(DATE)  LIKE '{$today}%' AND CITY LIKE '{$_SESSION['CITY']}%' ";
       $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
      while ($row = mysqli_fetch_assoc($result)) {
      $PagoEfectivo +=  $row['GRANDTOTAL'];

        }
?>

<?php    
       $query = "SELECT * FROM transaction WHERE date(DATE)  LIKE '{$today}%' AND METODO_PAGO LIKE '{$tarjeta}%' AND CITY LIKE '{$_SESSION['CITY']}%'";
        $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
                      while ($row = mysqli_fetch_assoc($result)) {
         $PagoTarjeta +=  $row['GRANDTOTAL'];

                      }
     
?>

<!-------    Formas de Pago     --------->
<?php     
      $query = "SELECT * FROM transaction WHERE  METODO_PAGO LIKE '{$efectivo}%' AND INTERMEDIARIO LIKE'{$uber}%' AND date(DATE)  LIKE '{$today}%' AND CITY LIKE '{$_SESSION['CITY']}%'";
       $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
      while ($row = mysqli_fetch_assoc($result)) {
      $pagouber +=  $row['GRANDTOTAL'];

        }
?>
<?php     
      $query = "SELECT * FROM transaction WHERE  METODO_PAGO LIKE '{$tarjeta}%' AND INTERMEDIARIO LIKE'{$uber}%' AND date(DATE)  LIKE '{$today}%' AND CITY LIKE '{$_SESSION['CITY']}%'";
       $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
      while ($row = mysqli_fetch_assoc($result)) {
      $pagoubertarjeta +=  $row['GRANDTOTAL'];

        }
?>

<?php     
      $query = "SELECT * FROM transaction WHERE  METODO_PAGO LIKE '{$efectivo}%' AND INTERMEDIARIO LIKE'{$sindelantal}%' AND date(DATE)  LIKE '{$today}%' AND CITY LIKE '{$_SESSION['CITY']}%'";
       $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
      while ($row = mysqli_fetch_assoc($result)) {
      $pagosdefectivo +=  $row['GRANDTOTAL'];

        }
?>


<?php     
      $query = "SELECT * FROM transaction WHERE METODO_PAGO LIKE '{$tarjeta}%' AND INTERMEDIARIO LIKE'{$sindelantal}%'  AND date(DATE)  LIKE '{$today}%' AND CITY LIKE '{$_SESSION['CITY']}%'";
       $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
      while ($row = mysqli_fetch_assoc($result)) {
      $pagosdtarjeta +=  $row['GRANDTOTAL'];

        }
?>


<?php     
      $query = "SELECT * FROM transaction WHERE  METODO_PAGO LIKE '{$efectivo}%' AND INTERMEDIARIO LIKE'{$didi}%'  AND date(DATE)  LIKE '{$today}%' AND CITY LIKE '{$_SESSION['CITY']}%'";
       $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
      while ($row = mysqli_fetch_assoc($result)) {
      $pagodidiefectivo +=  $row['GRANDTOTAL'];

        }
?>

<?php     
      $query = "SELECT * FROM transaction WHERE  METODO_PAGO LIKE '{$tarjeta}%' AND INTERMEDIARIO LIKE'{$didi}%'  AND date(DATE)  LIKE '{$today}%' AND CITY LIKE '{$_SESSION['CITY']}%'";
       $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
      while ($row = mysqli_fetch_assoc($result)) {
      $pagodiditarjeta +=  $row['GRANDTOTAL'];

        }
?>

<?php     
      $query = "SELECT * FROM transaction WHERE METODO_PAGO LIKE '{$efectivo}%' AND INTERMEDIARIO LIKE'{$rappi}%'  AND date(DATE)  LIKE '{$today}%' AND CITY LIKE '{$_SESSION['CITY']}%'";
       $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
      while ($row = mysqli_fetch_assoc($result)) {
      $pagorappiefectivo +=  $row['GRANDTOTAL'];

        }
?>


<?php     
      $query = "SELECT * FROM transaction WHERE METODO_PAGO LIKE '{$tarjeta}%' AND INTERMEDIARIO LIKE'{$rappi}%'  AND date(DATE)  LIKE '{$today}%' AND CITY LIKE '{$_SESSION['CITY']}%'";
       $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
      while ($row = mysqli_fetch_assoc($result)) {
      $pagorappitarjeta +=  $row['GRANDTOTAL'];

        }
?>


<?php  
//       $query = "SELECT * FROM cortes WHERE date(DATE)  LIKE '{$today}%'";

       $query = "SELECT * FROM cortes WHERE date(DATE)  LIKE '{$manana}%' AND CITY  LIKE '{$_SESSION['CITY']}%'";
       $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
        while ($row = mysqli_fetch_assoc($result)) {

           if ($row['TIPO'] == 4){
      $Totalcaja +=  $row['MONTO'];
        }



         }

     ?>


<?php  
//       $query = "SELECT * FROM cortes WHERE date(DATE)  LIKE '{$today}%'";

       $query = "SELECT * FROM cortes WHERE date(DATE)  LIKE '{$today}%' AND CITY  LIKE '{$_SESSION['CITY']}%'";
       $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
        while ($row = mysqli_fetch_assoc($result)) {
         
 if ($row['TIPO'] == 1 ){
        $ingreso +=  $row['MONTO'];
        }

         if ($row['TIPO'] == 2){
        $compras +=  $row['MONTO'];
        }
         if ($row['TIPO'] == 3){
        $retiro +=  $row['MONTO'];
        }
/*
         if ($row['TIPO'] == 5){
        $cancelacion +=  $row['MONTO'];
        }
*/
 if ($row['TIPO'] == 4){
//  el monto se le resta al total de las ventas dejando solo el monto 
        $corte +=  $row['MONTO'];
        }
         }
     ?>






<?php       //Seccion semana 1
if (floor ($semanas) >= 0) {

                      $query = "SELECT * FROM transaction WHERE date(DATE)  >= '{$primerLunes}%' AND date(DATE) <= '{$primerDomingo}%' AND CITY LIKE '{$_SESSION['CITY']}%'";
                      $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
                      while ($row = mysqli_fetch_assoc($result)) {
                  $ventaSemana1 +=  $row['GRANDTOTAL'];
                      }
            }
?>

<?php   
            if (floor ($semanas) >= 0){

                      $query = "SELECT * FROM cortes WHERE date(DATE)  >= '{$primerLunes}%' AND date(DATE) <= '{$primerDomingo}%' AND CITY LIKE '{$_SESSION['CITY']}%'";
                      $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
                      while ($row = mysqli_fetch_assoc($result)) {

                           if (($row['TIPO'] == 3)||($row['TIPO'] == 2)){
                  //  el monto se le resta al total de las ventas dejando solo el monto 
                           $gastosSemana1 +=  $row['MONTO'];
                          }
                      }

                      /*
                    $query2 = "SELECT PROVEEDOR, DESCRIPCION, SUM(MONTO) as MONTO_CAJA FROM cortes
                      INNER JOIN supplier WHERE supplier.COMPANY_NAME = cortes.PROVEEDOR AND date(DATE) BETWEEN '{$primerLunes}%' AND '{$primerDomingo}%' AND TIPO LIKE '2' AND supplier.TYPE LIKE '1' AND  cortes.CITY  LIKE '{$_SESSION['CITY']}%' GROUP BY supplier.COMPANY_NAME";
                      $result2 = mysqli_query($db, $query2) or die (mysqli_error($db));
        
                      while ($row = mysqli_fetch_assoc($result2)) {
                       if (($row['TIPO'] == 3)){

                      $gastosSemana1 +=  $row['MONTO_CAJA'];

                      }
                  }*/

            }

?>



<?php 

      //Seccion semana2  
      if (floor ($semanas) >= 1){

                      $query = "SELECT * FROM transaction WHERE date(DATE)  >= '{$segundoLunes}%' AND date(DATE) <= '{$segundoDomingo}%' AND CITY LIKE '{$_SESSION['CITY']}%'";
                      $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
                      while ($row = mysqli_fetch_assoc($result)) {
                  $ventaSemana2 +=  $row['GRANDTOTAL'];
                      }
        }
?>

<?php    
            if (floor ($semanas) >= 1){

                      $query = "SELECT * FROM cortes WHERE date(DATE)  >= '{$segundoLunes}%' AND date(DATE) <= '{$segundoDomingo}%' AND CITY LIKE '{$_SESSION['CITY']}%'";
                      $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
                      while ($row = mysqli_fetch_assoc($result)) {

                           if (($row['TIPO'] == 3)||($row['TIPO'] == 2)){
                  //  el monto se le resta al total de las ventas dejando solo el monto 
                           $gastosSemana2 +=  $row['MONTO'];
                          }
                      }

/*
                      $query2 = "SELECT PROVEEDOR, DESCRIPCION, SUM(MONTO) as MONTO_CAJA FROM cortes
                      INNER JOIN supplier WHERE supplier.COMPANY_NAME = cortes.PROVEEDOR AND date(DATE) BETWEEN '{$segundoLunes}%' AND '{$segundoDomingo}%' AND TIPO LIKE '2' AND supplier.TYPE LIKE '1' AND  cortes.CITY  LIKE '{$_SESSION['CITY']}%' GROUP BY supplier.COMPANY_NAME";
                      $result2 = mysqli_query($db, $query2) or die (mysqli_error($db));
        
                      while ($row = mysqli_fetch_assoc($result2)) {
                      $gastosSemana2 +=  $row['MONTO_CAJA'];

                      }*/

            }
?>



<?php       //Seccion semana3  
              if (floor ($semanas) >= 2){

                      $query = "SELECT * FROM transaction WHERE date(DATE)  >= '{$tercerLunes}%' AND date(DATE) <= '{$tercerDomingo}%' AND CITY LIKE '{$_SESSION['CITY']}%'";
                      $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
                      while ($row = mysqli_fetch_assoc($result)) {
                  $ventaSemana3 +=  $row['GRANDTOTAL'];
                      }
            }
?>





<?php          if (floor ($semanas) >= 2){
        
                      $query = "SELECT * FROM cortes WHERE date(DATE)  >= '{$tercerLunes}%' AND date(DATE) <= '{$tercerDomingo}%' AND CITY LIKE '{$_SESSION['CITY']}%'";
                      $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
                      while ($row = mysqli_fetch_assoc($result)) {

                           if (($row['TIPO'] == 3)||($row['TIPO'] == 2)){
                  //  el monto se le resta al total de las ventas dejando solo el monto 
                           $gastosSemana3 +=  $row['MONTO'];
                          }
                      }
                   }
?>








<?php      //Seccion semana4  
if (floor ($semanas) >= 3){

                      $query = "SELECT * FROM transaction WHERE date(DATE)  >= '{$cuartoLunes}%' AND date(DATE) <= '{$cuartoDomingo}%' AND CITY LIKE '{$_SESSION['CITY']}%'";
                      $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
                      while ($row = mysqli_fetch_assoc($result)) {
                  $ventaSemana4 +=  $row['GRANDTOTAL'];
                      }
              }
?>


<?php
if (floor ($semanas) >= 3){

                      $query = "SELECT * FROM cortes WHERE date(DATE)  >= '{$cuartoLunes}%' AND date(DATE) <= '{$cuartoDomingo}%' AND CITY LIKE '{$_SESSION['CITY']}%'";
                      $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
                      while ($row = mysqli_fetch_assoc($result)) {

                           if (($row['TIPO'] == 3)||($row['TIPO'] == 2)){

                           $gastosSemana4 +=  $row['MONTO'];
                          }
                      }
                    }

?>









<?php       //Seccion semana5  
if (floor ($semanas) >= 4){


                      $query = "SELECT * FROM transaction WHERE date(DATE)  >= '{$quintoLunes}%' AND date(DATE) <= '{$lastDay}%' AND CITY LIKE '{$_SESSION['CITY']}%'";
                      $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
                      while ($row = mysqli_fetch_assoc($result)) {
                  $ventaSemana5 +=  $row['GRANDTOTAL'];
                      }
}


?>


<?php
if (floor ($semanas) >= 4){

                      $query = "SELECT * FROM cortes WHERE date(DATE)  >= '{$quintoLunes}%' AND date(DATE) <= '{$lastDay}%' AND CITY LIKE '{$_SESSION['CITY']}%'";
                      $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
                      while ($row = mysqli_fetch_assoc($result)) {

                           if (($row['TIPO'] == 3)||($row['TIPO'] == 2)){

                           $gastosSemana5 +=  $row['MONTO'];
                          }
                      }
                    }

?>








<?php                  
                      $query = "SELECT * FROM transaction WHERE date(DATE)  >= '{$firstDay}%' AND date(DATE) <= '{$lastDay}%' AND CITY LIKE '{$_SESSION['CITY']}%'";
                      $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
                      while ($row = mysqli_fetch_assoc($result)) {
                  $ventaMes +=  $row['GRANDTOTAL'];

                      }
?>


<?php    /*              
                      $query = "SELECT * FROM transaction WHERE date(DATE)  >= '{$firstDay}%' AND date(DATE) <= '{$lastDay}%' AND CITY LIKE '{$_SESSION['CITY']}%'";
                      $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
                      while ($row = mysqli_fetch_assoc($result)) {
                  $ventaMes +=  $row['GRANDTOTAL'];

                      }*/
?>


<?php                  
                      $query = "SELECT SUM(CANT_CAJAS) AS Totalcajas FROM transaction WHERE date(DATE)  >= '{$firstDay}%' AND date(DATE) <= '{$lastDay}%' AND CITY LIKE '{$_SESSION['CITY']}%'";
                      $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
                      while ($row = mysqli_fetch_assoc($result)) {
                  $Totalcajas +=  $row['Totalcajas'];

                      }
?>





 <?php  



$fondo=$ingreso;


$totalEfectivo = $PagoEfectivo+$pagouber+$pagosdefectivo+$pagodidiefectivo+$pagorappiefectivo;

$totalTarjeta= $PagoTarjeta+$pagoubertarjeta+$pagosdtarjeta+$pagodiditarjeta+$pagorappitarjeta;

$totalPagos = $totalEfectivo+$totalTarjeta;

$salidaEfectivo=$retiro+$compras;

//$caja =  ($fondo+$PagoEfectivo)-($salidaEfectivo);
$caja=$PagoEfectivo+$fondo+$corte-$retiro-$compras;
$totalcorte=$caja-$Totalcaja;
$fondoInicial=$corte+$fondo;


//operaciones por semana

$utilidadSemana1=$ventaSemana1-$gastosSemana1;
$utilidadSemana2=$ventaSemana2-$gastosSemana2;
$utilidadSemana3=$ventaSemana3-$gastosSemana3;
$utilidadSemana4=$ventaSemana4-$gastosSemana4;
$utilidadSemana5=$ventaSemana5-$gastosSemana5;


$ventaMes = $ventaSemana1+$ventaSemana2+$ventaSemana3+$ventaSemana4+$ventaSemana5;

$gastoMes=$gastosSemana1+$gastosSemana2+$gastosSemana3+$gastosSemana4+$gastosSemana5;

$utilidadMes =$ventaMes-$gastoMes;

$gastoTotal=$gastoMes;

$utilidadTotal= $ventaMes - $gastoTotal;
                    ?>



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

           
  <div  style="text-align: -webkit-center;">
<button type="B1"  class="btn btn-primary  " style="border-radius: 0px;" onclick="myFunctionB1()">Movimientos del día</button>
  <button type="B2"  class="btn btn-primary " style="border-radius: 0px;" onclick="myFunctionB2()">Movimientos de la semana</button>
  <button type="B3"  class="btn btn-primary " style="border-radius: 0px;" onclick="myFunctionB3()">Movimientos del mes</button>

</div>
<br>
  <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Agregar Movimientos Extra &nbsp;<a  href="#" data-toggle="modal" data-target="#corteExtraModal" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a></h4>
  </div>
            

 <div class="card shadow mb-4" id="dia">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Movimientos De Hoy &nbsp;</h4>
            </div>
            
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered display" width="100%" cellspacing="0">        
                  <thead>
                      <tr>
                       <th>Fecha</th>
                        <th>Tipo de accion</th>
                        <th>Monto</th>
                        <th>Descripcion</th>
                        <th>Acción</th>
                      </tr>
                  </thead>
                  <tbody>
                                       <?php                  
                      $query = "SELECT * FROM cortes WHERE DATE LIKE '{$today}%' AND CITY LIKE '{$_SESSION['CITY']}%'";
                      $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
                      while ($row = mysqli_fetch_assoc($result)) {
                      echo '<tr>';
                      echo '<td>'. date("d-m-Y H:i:s", strtotime($row['DATE'])).'</td>';
                      echo '<td>';
                          if ($row['TIPO'] == 1) {
                            echo "Fondo Extra de Caja";
                          }
                          if ($row['TIPO'] == 2) {
                            echo "Pagos a proveedores";
                          }
                          if ($row['TIPO'] == 3) {
                            echo "Retiro";
                          }
                          if ($row['TIPO'] == 4) {
                            echo "Cierre de Caja";
                          }
                          if ($row['TIPO'] == 5) {
                            echo "Cierre de Caja del Día Anterior";
                          }

                     echo '</td>';
                      echo '<td>'. number_format($row['MONTO'], 2, '.', ',').'</td>';
                      echo '<td>'. $row['DESCRIPCION'].'</td>';
      
                      echo '<td align="right"> <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary" href="cortes_searchfrm.php?action=edit & id='.$row['ID_CORTE'] . '"><i class="fas fa-fw fa-list-alt"></i> Detalles</a>
                            <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary dropdown no-arrow" data-toggle="dropdown" style="color:white;">
                              ... <span class="caret"></span></a>
                            <ul class="dropdown-menu text-center" role="menu">
                                <li>
                                  <a type="button" class="btn btn-warning bg-gradient-warning btn-block" style="border-radius: 0px;" href="cortes_edit.php?action=edit & id='.$row['ID_CORTE']. '">
                                    <i class="fas fa-fw fa-edit"></i> Editar
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


      
            <div class="card shadow mb-4" id="semana">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Movimientos De La Semana &nbsp;</h4>
            </div>
            
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered display" width="100%" cellspacing="0">        
                  <thead>
                      <tr>
                       <th>Fecha</th>
                        <th>Tipo de accion</th>
                        <th>Monto</th>
                        <th>Descripcion</th>
                        <th>Acción</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php                  
                      $query = "SELECT * FROM cortes WHERE date(DATE) BETWEEN '{$lunes}%' AND '{$domingo}%' AND CITY LIKE '{$_SESSION['CITY']}%'";
                      $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
                      while ($row = mysqli_fetch_assoc($result)) {
                      echo '<tr>';
                      echo '<td>'. date("d-m-Y H:i:s", strtotime($row['DATE'])).'</td>';
                      if ($row['TIPO']== "1") {
                      echo '<td>Fondo Extra de caja</td>';
                      }
                     if ($row['TIPO']== "2") {
                      echo '<td>Pagos a proveedores</td>';
                      }
                     if ($row['TIPO'] == "3") {
                      echo '<td>Retiro</td>';
                      }
                      if ($row['TIPO'] == "4") {
                      echo '<td>Cierre de caja</td>';
                      }
                      if ($row['TIPO']== "5") {
                      echo '<td>Cierre de Caja del Día Anterior</td>';
                      }
                      
                      echo '<td>'. number_format($row['MONTO'], 2, '.', ',').'</td>';
                      echo '<td>'. $row['DESCRIPCION'].'</td>';


                      echo '<td align="right"> <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary" href="cortes_searchfrm.php?action=edit & id='.$row['ID_CORTE'] . '"><i class="fas fa-fw fa-list-alt"></i> Detalles</a>
                            <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary dropdown no-arrow" data-toggle="dropdown" style="color:white;">
                              ... <span class="caret"></span></a>
                            <ul class="dropdown-menu text-center" role="menu">
                                <li>
                                  <a type="button" class="btn btn-warning bg-gradient-warning btn-block" style="border-radius: 0px;" href="cortes_edit.php?action=edit & id='.$row['ID_CORTE']. '">
                                    <i class="fas fa-fw fa-edit"></i> Editar
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





            <div class="card shadow mb-4" id="mes">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Movimientos Del Mes &nbsp;</h4>
            </div>
            
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered display" width="100%" cellspacing="0">        
                  <thead>
                      <tr>
                       <th>Fecha</th>
                        <th>Tipo de accion</th>
                        <th>Monto</th>
                        <th>Descripcion</th>
                        <th>Acción</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php                  
                      $query = "SELECT * FROM cortes WHERE date(DATE)  > '{$firstDay}%' AND DATE <= '{$today}%' AND CITY LIKE '{$_SESSION['CITY']}%'";
                      $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
                      while ($row = mysqli_fetch_assoc($result)) {
                      echo '<tr>';
                      echo '<td>'. date("d-m-Y H:i:s", strtotime($row['DATE'])).'</td>';
                      if ($row['TIPO']== "1") {
                      echo '<td>Fondo Extra de caja</td>';
                      }
                     if ($row['TIPO']== "2") {
                      echo '<td>Pagos a proveedores</td>';
                      }
                     if ($row['TIPO'] == "3") {
                      echo '<td>Retiro</td>';
                      }
                      if ($row['TIPO'] == "4") {
                      echo '<td>Cierre de caja</td>';
                      }
                      if ($row['TIPO']== "5") {
                      echo '<td>Cierre de Caja del Día Anterior</td>';
                      }

                      echo '<td>'. number_format($row['MONTO'], 2, '.', ',').'</td>';
                      echo '<td>'. $row['DESCRIPCION'].'</td>';


                      echo '<td align="right"> <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary" href="cortes_searchfrm.php?action=edit & id='.$row['ID_CORTE'] . '"><i class="fas fa-fw fa-list-alt"></i> Detalles</a>
                            <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary dropdown no-arrow" data-toggle="dropdown" style="color:white;">
                              ... <span class="caret"></span></a>
                            <ul class="dropdown-menu text-center" role="menu">
                                <li>
                                  <a type="button" class="btn btn-warning bg-gradient-warning btn-block" style="border-radius: 0px;" href="cortes_edit.php?action=edit & id='.$row['ID_CORTE']. '">
                                    <i class="fas fa-fw fa-edit"></i> Editar
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



                <div class="col-sm-6 col-md-12">

                <table class="table table-bordered"  width="100%" cellspacing="0"> 
                  <tr  >
                    <td colspan="4" style="background-color: #FA4616; color:#FFF; text-align: center;" > <h1>Utilidad Mensual</h1>

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
                  <tr>
                     <td style="font-weight: 800;"></td>
                     <td style="font-weight: 800;">Venta Semanal</td>
                     <td style="font-weight: 800;">Gasto Semanal</td>
                     <td style="font-weight: 800;">Utilidad Semanal</td>

                  </tr>
                    <tr  id="semana1" style="display: none">
                     <td style="background-color: #500D76; color: #fff;">Semana 1 (<?php echo date("d-m-Y", strtotime($firstDay) ); ?> / <?php echo date("d-m-Y", strtotime($primerDomingo) ); ?>)</td>
                     <td >$ <?php echo number_format($ventaSemana1, 2, '.', ','); ?></td>
                     <td >$ <?php echo number_format($gastosSemana1, 2, '.', ','); ?></td>
                     <td >$ <?php echo number_format($utilidadSemana1, 2, '.', ','); ?></td>

                  </tr> 
                   <tr  id="semana2" style="display: none">
                     <td style="background-color: #500D76; color: #fff;">Semana 2 (<?php echo date("d-m-Y", strtotime($segundoLunes) ); ?> / <?php echo date("d-m-Y", strtotime($segundoDomingo) ); ?>)</td>
                     <td >$ <?php echo number_format($ventaSemana2, 2, '.', ','); ?></td>
                     <td >$ <?php echo number_format($gastosSemana2, 2, '.', ','); ?></td>
                     <td >$ <?php echo number_format($utilidadSemana2, 2, '.', ','); ?></td>
                  </tr> 

                   <tr  id="semana3" style="display: none">
                     <td style="background-color: #500D76; color: #fff;">Semana 3 (<?php echo date("d-m-Y", strtotime($tercerLunes) ); ?> / <?php echo date("d-m-Y", strtotime($tercerDomingo) ); ?>)</td>
                     <td >$ <?php echo number_format($ventaSemana3, 2, '.', ','); ?></td>
                     <td >$ <?php echo number_format($gastosSemana3, 2, '.', ','); ?></td>
                     <td >$ <?php echo number_format($utilidadSemana3, 2, '.', ','); ?></td>
                  </tr> 


                   <tr  id="semana4" style="display: none">
                     <td style="background-color: #500D76; color: #fff;">Semana 4  (<?php echo date("d-m-Y", strtotime($cuartoLunes) ); ?> / <?php echo date("d-m-Y", strtotime($cuartoDomingo) ); ?>)</td>
                     <td >$ <?php echo number_format($ventaSemana4, 2, '.', ','); ?></td>
                     <td >$ <?php echo number_format($gastosSemana4, 2, '.', ','); ?></td>
                     <td >$ <?php echo number_format($utilidadSemana4, 2, '.', ','); ?></td>
                  </tr> 

                 <tr id="semana5" style="display: none">
                     <td style="background-color: #500D76; color: #fff;">Semana 5  (<?php echo date("d-m-Y", strtotime($quintoLunes) ); ?> / <?php echo date("d-m-Y", strtotime($quintoDomingo) ); ?>)</td>
                     <td >$ <?php echo number_format($ventaSemana5, 2, '.', ','); ?></td>
                     <td >$ <?php echo number_format($gastosSemana5, 2, '.', ','); ?></td>
                    <td >$ <?php echo number_format($utilidadSemana5, 2, '.', ','); ?></td>

                  </tr>

                  <tr id="masSemanas" style="display: none">
                     <td style="background-color: #500D76; color: #fff;">Total de Semanas <?php echo floor ($semanas)?> (<?php echo date("d-m-Y", strtotime($firstDay) ); ?> / <?php echo date("d-m-Y", strtotime($lastDay) ); ?>)</td>
                     <td >$ <?php echo number_format($ventaSemana5, 2, '.', ','); ?></td>
                     <td >$ <?php echo number_format($gastosSemana5, 2, '.', ','); ?></td>
                     <td >$ <?php echo number_format($utilidadSemana5, 2, '.', ','); ?></td>

                  </tr>


 <?php
if (floor ($semanas) == 0){
             ?>    <script type="text/javascript">
                   document.getElementById('semana1').style.display = 'revert';
                  </script>
                  <?php   }
                  ?>

                   <?php
if (floor ($semanas) == 1){
             ?>    <script type="text/javascript">
                  document.getElementById('semana1').style.display = 'revert';
                  document.getElementById('semana2').style.display = 'revert';
                  </script>
                  <?php   }
                  ?>

                   <?php
if (floor ($semanas) == 2){
             ?>    <script type="text/javascript">
                   document.getElementById('semana1').style.display = 'revert';
                   document.getElementById('semana2').style.display = 'revert';
                   document.getElementById('semana3').style.display = 'revert';
                  </script>
                  <?php   }
                  ?>

                   <?php
if (floor ($semanas) == 3){
             ?>    <script type="text/javascript">
                    document.getElementById('semana1').style.display = 'revert';
                   document.getElementById('semana2').style.display = 'revert';
                   document.getElementById('semana3').style.display = 'revert';
                   document.getElementById('semana4').style.display = 'revert';
                  </script>
             <?php  } ?>

 <?php
if (floor ($semanas) == 4){
             ?>    <script type="text/javascript">
                   document.getElementById('semana1').style.display = 'revert';
                   document.getElementById('semana2').style.display = 'revert';
                   document.getElementById('semana3').style.display = 'revert';
                   document.getElementById('semana4').style.display = 'revert';
                   document.getElementById('semana5').style.display = 'revert';
                  </script>
             <?php  } ?>


           <?php
if (floor ($semanas) > 4){
             ?>    <script type="text/javascript">
                    document.getElementById('masSemanas').style.display = 'revert';
                  </script>
             <?php  } ?>   
                  


                   <tr style="background-color: #FFCC01; color: #fff" >
                     <td >Total</td>
                     <td style="color: #500D76;">$<?php echo number_format( $ventaMes, 2, '.', ','); ?></td>
                     <td style="color: red;">$<?php echo number_format($gastoMes, 2, '.', ','); ?></td>
                     <td style="color: #239B56;">$<?php echo number_format($utilidadMes, 2, '.', ','); ?></td>

                  </tr> 



<!-- Salidas de efectivo   -->

   <tr>
                    <td colspan="4" style="background-color: #FA4616; color: #fff; text-align: center;" > <h7><b>RETIROS DE EFECTIVO</b></h7></td>
                  </tr>
                  <tr>
                     <th>Descripcion</th>
                     <th> </th>
                     <th>Acción </th>
                     <th>Monto</th>
                  </tr>

                    <?php                  
                      $query = "SELECT ID_CORTE, TIPO, PROVEEDOR, DESCRIPCION, CITY, MONTO FROM cortes
                     WHERE date(DATE) BETWEEN '{$firstDay}%' AND '{$lastDay}%' AND TIPO LIKE '3' AND  CITY LIKE '{$_SESSION['CITY']}%'";
                      $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
                      while ($row = mysqli_fetch_assoc($result)) {
                      echo '<tr>';    
                      echo '<td>'. $row['DESCRIPCION'].'</td>';
                      echo '<td> </td>';

                      echo '<td align="right"> <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary" href="detalle_retiros.php?fd='.$firstDay.' & ld='.$lastDay.' & id='.$row['ID_CORTE'].'"><i class="fas fa-fw fa-list-alt"></i> Detalles</a>                   </td>';


                      echo '<td>'. number_format($row['MONTO'], 2, '.', ',').'</td>';

                      echo '</tr> ';
                      $retiros_caja +=  $row['MONTO'];

                      }
                    ?>
 <tr>
                     <th></th>
                     <th></th>
                     <th></th>
                     <th>$<?php echo number_format($retiros_caja, 2, '.', ','); ?></th>
                  </tr>






                  <tr>
                    <td colspan="4" style="background-color: #500D76; color:#FFF; text-align: center;" > <h7><b>PAGOS A PROVEEDORES EN CAJA</b></h7></td>
                  </tr>
                  <tr>
                     <th>Proveedor</th>
                     <th>Descripcion</th>
                     <th> </th>
                     <th>Monto</th>
                  </tr>

                    <?php                  
                      $query = "SELECT PROVEEDOR, DESCRIPCION, SUM(MONTO) as MONTO_CAJA FROM cortes
                      INNER JOIN supplier WHERE supplier.COMPANY_NAME = cortes.PROVEEDOR AND date(DATE) BETWEEN '{$firstDay}%' AND '{$lastDay}%' AND TIPO LIKE '2' AND supplier.TYPE LIKE '1' AND  cortes.CITY  LIKE '{$_SESSION['CITY']}%' GROUP BY supplier.COMPANY_NAME";
                      $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
                      while ($row = mysqli_fetch_assoc($result)) {
                      echo '<tr>';    
                      echo '<td>'. $row['PROVEEDOR'].'</td>';
                      echo '<td>'. $row['DESCRIPCION'].'</td>';


                      echo '<td align="right"> <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary" href="detalle_pagos_tc.php?fd='.$firstDay.' & ld='.$lastDay.' & id='.$row['PROVEEDOR'].'"><i class="fas fa-fw fa-list-alt"></i> Detalles</a>                   </td>';

                      echo '<td>'. number_format($row['MONTO_CAJA'], 2, '.', ',').'</td>';

                      echo '</tr> ';
                      $pagos_caja +=  $row['MONTO_CAJA'];

                      }
                    ?>
 <tr>
                     <th></th>
                     <th></th>
                     <th></th>
                     <th>$<?php echo number_format($pagos_caja, 2, '.', ','); ?></th>
                  </tr>


                  <tr>
                    <td colspan="4" style="background-color: #239B56; color:#FFF; text-align: center;" > <h7><b>PAGOS CON TC</b></h7></td>
                  </tr>
                  <tr>
                     <th>Proveedor</th>
                     <th>Descripcion</th>
                     <th> </th>
                     <th>Monto</th>
                  </tr>

                    <?php                  
                      $query = "SELECT PROVEEDOR, DESCRIPCION, SUM(MONTO) as MONTO_TC FROM cortes
                      INNER JOIN supplier WHERE supplier.COMPANY_NAME = cortes.PROVEEDOR AND date(DATE) BETWEEN '{$firstDay}%' AND '{$lastDay}%' AND TIPO LIKE '2' AND supplier.TYPE LIKE '2' AND cortes.CITY  LIKE '{$_SESSION['CITY']}%' GROUP BY supplier.COMPANY_NAME";
                      $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
                      while ($row = mysqli_fetch_assoc($result)) {
                      echo '<tr>';    
                      echo '<td>'. $row['PROVEEDOR'].'</td>';
                      echo '<td>'. $row['DESCRIPCION'].'</td>';
                      echo '<td align="right"> <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary" href="detalle_pagos_tc.php?fd='.$firstDay.' & ld='.$lastDay.' & id='.$row['PROVEEDOR'].'"><i class="fas fa-fw fa-list-alt"></i> Detalles</a>                   </td>';

                      echo '<td>'. number_format($row['MONTO_TC'], 2, '.', ',').'</td>';

                      echo '</tr> ';


                            $pagos_tc +=  $row['MONTO_TC'];

                      }
                    ?>


                  <tr>
                     <th>TOTAL</th>
                     <th></th>
                     <th></th>
                     <th>$<?php echo number_format($pagos_tc, 2, '.', ','); ?></th>
                  </tr>
                    <?php                  
                    $gastoFinal=$pagos_tc+$gastoTotal;
                    $utilidadFinal=$utilidadTotal-$pagos_tc;

                    ?>


<!--
                  <tr>
                     <th></th>
                     <th>Utilidad Mensual</th>
                     <th>Venta Mensual </th>
                     <th>Gasto Mensual</th>
                  </tr>


                 <tr style="background-color: #FFCC01; color: #000;">
                     <td >Total</td>
                     <td >$<?php echo $utilidadFinal; ?></td>
                     <td >$<?php echo $ventaMes; ?></td>
                     <td >$<?php echo $gastoFinal; ?></td>
                  </tr> 
-->



                    </table>
                </div>

            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Transacción</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
               <thead>
                   <tr>
                     <th>Número Teléfonico</th>
                     <th>Cliente</th>
                     <th># de Items</th>
                     <th>Monto</th>
                     <th>Pago</th>
                     <th>Metodo Pago</th>
                     <th>Metodo Compra</th>

                     <th>Fecha</th>
                     <th>Vendedor</th>

                     <th>Acción</th>



                   </tr>
               </thead>
          <tbody>

<?php  

        




    $query = "SELECT *, FIRST_NAME, LAST_NAME, PHONE_NUMBER
              FROM transaction T
              JOIN customer C ON T.`CUST_ID`=C.`CUST_ID`
              JOIN transaction_details TD ON TD.`TRANS_D_ID`=T.`TRANS_D_ID`

               AND T.CITY LIKE '{$_SESSION['CITY']}%' AND date(T.DATE) BETWEEN '{$firstDay}%' AND '{$lastDay}%'
              GROUP BY T.TRANS_D_ID ASC";
        $result = mysqli_query($db, $query) or die (mysqli_error($db));
      
            while ($row = mysqli_fetch_assoc($result)) {
                                 
                echo '<tr>';
                echo '<td>'. $row['PHONE_NUMBER'].'</td>';
                echo '<td>'. $row['FIRST_NAME'].' '. $row['LAST_NAME'].'</td>';
                echo '<td>'. $row['NUMOFITEMS'].'</td>';
                echo '<td>'. $row['GRANDTOTAL'].'</td>';
                echo '<td>'. $row['CASH'].'</td>';



                
                         if($row['METODO_PAGO'] == "1")
                           {
                             echo '<td>Efectivo';
                           }if($row['METODO_PAGO'] == "2"){
                             echo '<td> Tarjeta';
                           } 
                           '</td>';

                           if($row['INTERMEDIARIO'] == "1")
                           {
                             echo '<td>Sucursal';
                           }if($row['INTERMEDIARIO'] == "2"){
                             echo '<td> DIDI';
                           } if($row['INTERMEDIARIO'] == "3"){
                             echo '<td> UBER';
                           }if($row['INTERMEDIARIO'] == "4"){
                             echo '<td> Sin Delantal';
                           } if($row['INTERMEDIARIO'] == "5"){
                             echo '<td> Rappi';
                           }  

                           '</td>';

echo '<td>'. date("d-m-Y H:i:s", strtotime($row['DATE'])).'</td>';

                echo '<td>'. $row['EMPLOYEE'].'</td>';

                       echo '<td align="right"> <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary" href="trans_searchfrm.php?action=edit & id='.$row['TRANS_ID'] . '"><i class="fas fa-fw fa-list-alt"></i> Detalles</a>
                            <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary dropdown no-arrow" data-toggle="dropdown" style="color:white;">
                              ... <span class="caret"></span></a>
                            <ul class="dropdown-menu text-center" role="menu">
                                <li>
                                  <a type="button" class="btn btn-warning bg-gradient-warning btn-block" style="border-radius: 0px;" href="trans_edit.php?action=edit & id='.$row['TRANS_ID']. '">
                                    <i class="fas fa-fw fa-edit"></i> Editar
                                  </a>
                                </li>
                            </ul>
                            </div>
                          </div> </td>';
                      echo '</tr> ';
                        
//$sumatotalf=$sumatotalf+$row['GRANDTOTAL'];


                        }

                                             // echo $sumatotalf;

?> 
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                  </div>














            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Ventas por vendedor</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
               <thead>
                   <tr>
                     <th>Empleado</th>
                     
                    <th>Acción</th>
                   </tr>
               </thead>
          <tbody>

<?php  


/*   
   $query = "SELECT *
              FROM transaction T
              JOIN transaction_details TD ON TD.`TRANS_D_ID`=T.`TRANS_D_ID`
               AND T.CITY LIKE '{$_SESSION['CITY']}%' AND date(T.DATE) BETWEEN '{$firstDay}%' AND '{$lastDay}%' 
               GROUP BY TD.TRANS_D_ID ASC";
*/

    $query = "SELECT *
              FROM transaction T
              JOIN transaction_details TD ON TD.`TRANS_D_ID`=T.`TRANS_D_ID`
               AND T.CITY LIKE '{$_SESSION['CITY']}%' AND date(T.DATE) BETWEEN '{$firstDay}%' AND '{$lastDay}%' 
               GROUP BY TD.EMPLOYEE ASC";





        $result = mysqli_query($db, $query) or die (mysqli_error($db));
      
            while ($row = mysqli_fetch_assoc($result)) {
                                 
                echo '<tr>';
                echo '<td>'. $row['EMPLOYEE'].'</td>';
     
                    echo '<td align="right"> <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary" href="detalle_vendedor.php?fd='.$firstDay.' & ld='.$lastDay.' & id='.$row['EMPLOYEE'].'"><i class="fas fa-fw fa-list-alt"></i> Detalles</a>
                              

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











               <div class="card shadow mb-4">
            <div class="card-header py-3 row">
              <div class="col-sm-6">
              <h4 class="font-weight-bold text-primary">Productos vendidos </h4>
              </div>
              <div class="col-sm-6">
               <h4 class="font-weight-bold text-primary" style="text-align-last: right;">Total de pizzas vendidas: &nbsp; <?php echo $Totalcajas; ?></h4>
              </div>

            </div>
            
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered display" width="100%" cellspacing="0">        
                   <thead>
                      <tr>
                        <th>Nombre producto</th>
                        <th>Cantidad</th>
                        <th>Precio unitario</th>
                        <th>Ventas</th>
                        <th>Acción</th>

                       </tr>
                  </thead>
                  <tbody>
                    <?php  

                    
                    /* $query = "SELECT t1.PRODUCTS,  t1.TRANS_D_ID,t1.PRICE, SUM(QTY) as QTY  
                     FROM transaction_details t1 
                     INNER JOIN product p
                            ON t1.PRODUCTS = p.NAME   
                    INNER JOIN transaction t2
                            ON t1.TRANS_D_ID = t2.TRANS_D_ID WHERE t2.CITY LIKE '{$_SESSION['CITY']}%' AND date(t2.DATE) BETWEEN '{$firstDay}%' AND '{$lastDay}%'
                     GROUP BY p.NAME";*/

                  $query = "SELECT t1.PRODUCTS,  t1.TRANS_D_ID,t1.PRICE, SUM(QTY) as QTY  
                     FROM transaction_details t1 
                    INNER JOIN transaction t2
                            ON t1.TRANS_D_ID = t2.TRANS_D_ID WHERE t2.CITY LIKE '{$_SESSION['CITY']}%' AND date(t2.DATE) BETWEEN '{$firstDay}%' AND '{$lastDay}%'
                     GROUP BY t1.PRODUCTS";


                      $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
                      while ($row = mysqli_fetch_assoc($result)) {


                    echo '<tr>';
                     echo '<td>'. $row['PRODUCTS'].'</td>';
                     echo '<td>'. $row['QTY'].'</td>';
                     echo '<td>'. $row['PRICE'].'</td>';
                     $precioTotal=$row['PRICE']*$row['QTY'];
                      echo '<td>'. number_format($precioTotal, 2, '.', ',').'</td>';

                             echo '<td align="right"> <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary" href="detalle_ventas.php?fd='.$firstDay.' & ld='.$lastDay.' & id='.$row['PRODUCTS'].'"><i class="fas fa-fw fa-list-alt"></i> Detalles</a>

                           </td>';



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
