<?php
include'../includes/connection.php';
include'../includes/sidebar.php';


  date_default_timezone_set('America/Mexico_City');
$script_tz = date_default_timezone_get();
 $today = date("Y-m-d", time());


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
$datetime3 = new DateTime($today);

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



              $ventaSemana1Cuernavaca=0;
              $ventaSemana1Estanzuela=0;
              $ventaSemana1Fresnos=0;
              $ventaSemana1Koala=0;
              $ventaSemana1Merida=0;
              $ventaSemana1Nexxus=0;
              $ventaSemana1NuevoLaredo=0;
              $ventaSemana1PuertadeHierro=0;
              $ventaSemana1LasPuentes  =0;
              $ventaSemana1SantaLuz=0;
              $ventaSemana1Sendero=0;
              $ventaSemana1Tejeria=0;
              $ventaSemana1VistaHermosa=0;
              $ventaSemana1Huinala=0;
              $ventaSemana1Altabrisa=0;
              $ventaSemana1HombresIlustres=0;

  $ventaSemana2Cuernavaca=0;
              $ventaSemana2Estanzuela=0;
              $ventaSemana2Fresnos=0;
              $ventaSemana2Koala=0;
              $ventaSemana2Merida=0;
              $ventaSemana2Nexxus=0;
              $ventaSemana2NuevoLaredo=0;
              $ventaSemana2PuertadeHierro=0;
              $ventaSemana2LasPuentes  =0;
              $ventaSemana2SantaLuz=0;
              $ventaSemana2Sendero=0;
              $ventaSemana2Tejeria=0;
              $ventaSemana2VistaHermosa=0;
              $ventaSemana2Huinala=0;
              $ventaSemana2Altabrisa=0;
              $ventaSemana2HombresIlustres=0;



          $ventaSemana3Cuernavaca=0;
              $ventaSemana3Estanzuela=0;
              $ventaSemana3Fresnos=0;
              $ventaSemana3Koala=0;
              $ventaSemana3Merida=0;
              $ventaSemana3Nexxus=0;
              $ventaSemana3NuevoLaredo=0;
              $ventaSemana3PuertadeHierro=0;
              $ventaSemana3LasPuentes  =0;
              $ventaSemana3SantaLuz=0;
              $ventaSemana3Sendero=0;
              $ventaSemana3Tejeria=0;
              $ventaSemana3VistaHermosa=0;
              $ventaSemana3Huinala=0;
              $ventaSemana3Altabrisa=0;
              $ventaSemana3HombresIlustres=0;



  $ventaSemana4Cuernavaca=0;
              $ventaSemana4Estanzuela=0;
              $ventaSemana4Fresnos=0;
              $ventaSemana4Koala=0;
              $ventaSemana4Merida=0;
              $ventaSemana4Nexxus=0;
              $ventaSemana4NuevoLaredo=0;
              $ventaSemana4PuertadeHierro=0;
              $ventaSemana4LasPuentes  =0;
              $ventaSemana4SantaLuz=0;
              $ventaSemana4Sendero=0;
              $ventaSemana4Tejeria=0;
              $ventaSemana4VistaHermosa=0;
              $ventaSemana4Huinala=0;
              $ventaSemana4Altabrisa=0;
              $ventaSemana4HombresIlustres=0;



  $ventaSemana5Cuernavaca=0;
              $ventaSemana5Estanzuela=0;
              $ventaSemana5Fresnos=0;
              $ventaSemana5Koala=0;
              $ventaSemana5Merida=0;
              $ventaSemana5Nexxus=0;
              $ventaSemana5NuevoLaredo=0;
              $ventaSemana5PuertadeHierro=0;
              $ventaSemana5LasPuentes  =0;
              $ventaSemana5SantaLuz=0;
              $ventaSemana5Sendero=0;
              $ventaSemana5Tejeria=0;
              $ventaSemana5VistaHermosa=0;
              $ventaSemana5Huinala=0;
              $ventaSemana5Altabrisa=0;
              $ventaSemana5HombresIlustres=0;



$ventaSemanaTCuernavaca=0;
              $ventaSemanaTEstanzuela=0;
              $ventaSemanaTFresnos=0;
              $ventaSemanaTKoala=0;
              $ventaSemanaTMerida=0;
              $ventaSemanaTNexxus=0;
              $ventaSemanaTNuevoLaredo=0;
              $ventaSemanaTPuertadeHierro=0;
              $ventaSemanaTLasPuentes  =0;
              $ventaSemanaTSantaLuz=0;
              $ventaSemanaTSendero=0;
              $ventaSemanaTTejeria=0;
              $ventaSemanaTVistaHermosa=0;
              $ventaSemanaTHuinala=0;
              $ventaSemanaTAltabrisa=0;
              $ventaSemanaTHombresIlustres=0;

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
    alert("Pagina restringida, volverá al Punto de Venta");
    window.location = "pos.php";
  </script>
<?php
  }  

  if ($Aa=='Encargado'){
?>
  <script type="text/javascript">
    //then it will be redirected
    alert("Bienvenido al panel de Administrador");
    window.location = "admin_sucursal.php";
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



<?php       //Seccion semana 1


if (floor ($semanas) >= 0) {

  $query = "SELECT * FROM transaction WHERE date(DATE)  >= '{$primerLunes}%' AND date(DATE) <= '{$primerDomingo}%' AND CITY LIKE 'Cuernavaca'";
  $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
    while ($row = mysqli_fetch_assoc($result)) {
      $ventaSemana1Cuernavaca +=  (int)$row['GRANDTOTAL'];
    }
     $query2 = "SELECT * FROM transaction WHERE date(DATE)  >= '{$primerLunes}%' AND date(DATE) <= '{$primerDomingo}%' AND CITY LIKE 'Estanzuela'";
  $result2 = mysqli_query($db, $query2) or die (mysqli_error($db));
        
    while ($row = mysqli_fetch_assoc($result2)) {
      $ventaSemana1Estanzuela +=  (int)$row['GRANDTOTAL'];
    }
                 
$query3 = "SELECT * FROM transaction WHERE date(DATE)  >= '{$primerLunes}%' AND date(DATE) <= '{$primerDomingo}%' AND CITY LIKE 'Fresnos'";
  $result3 = mysqli_query($db, $query3) or die (mysqli_error($db));
        
    while ($row = mysqli_fetch_assoc($result3)) {
      $ventaSemana1Fresnos +=  (int)$row['GRANDTOTAL'];
    }

$query4 = "SELECT * FROM transaction WHERE date(DATE)  >= '{$primerLunes}%' AND date(DATE) <= '{$primerDomingo}%' AND CITY LIKE 'Koala'";
  $result4 = mysqli_query($db, $query4) or die (mysqli_error($db));
        
    while ($row = mysqli_fetch_assoc($result4)) {
      $ventaSemana1Koala +=  (int)$row['GRANDTOTAL'];
    }

$query5 = "SELECT * FROM transaction WHERE date(DATE)  >= '{$primerLunes}%' AND date(DATE) <= '{$primerDomingo}%' AND CITY LIKE 'Merida'";
  $result5 = mysqli_query($db, $query5) or die (mysqli_error($db));
        
    while ($row = mysqli_fetch_assoc($result5)) {
      $ventaSemana1Merida +=  (int)$row['GRANDTOTAL'];
    }
$query6 = "SELECT * FROM transaction WHERE date(DATE)  >= '{$primerLunes}%' AND date(DATE) <= '{$primerDomingo}%' AND CITY LIKE 'Nexxus'";
  $result6 = mysqli_query($db, $query6) or die (mysqli_error($db));
        
    while ($row = mysqli_fetch_assoc($result6)) {
      $ventaSemana1Nexxus +=  (int)$row['GRANDTOTAL'];
    }

$query7 = "SELECT * FROM transaction WHERE date(DATE)  >= '{$primerLunes}%' AND date(DATE) <= '{$primerDomingo}%' AND CITY LIKE 'Nuevo Laredo'";
  $result7 = mysqli_query($db, $query7) or die (mysqli_error($db));
        
    while ($row = mysqli_fetch_assoc($result7)) {
      $ventaSemana1NuevoLaredo +=  (int)$row['GRANDTOTAL'];
    }


$query8 = "SELECT * FROM transaction WHERE date(DATE)  >= '{$primerLunes}%' AND date(DATE) <= '{$primerDomingo}%' AND CITY LIKE 'Puerta de Hierro'";
  $result8 = mysqli_query($db, $query8) or die (mysqli_error($db));
        
    while ($row = mysqli_fetch_assoc($result8)) {
      $ventaSemana1PuertadeHierro +=  (int)$row['GRANDTOTAL'];
    }


    $query9 = "SELECT * FROM transaction WHERE date(DATE)  >= '{$primerLunes}%' AND date(DATE) <= '{$primerDomingo}%' AND CITY LIKE 'Las Puentes'";
  $result9 = mysqli_query($db, $query9) or die (mysqli_error($db));
        
    while ($row = mysqli_fetch_assoc($result9)) {
      $ventaSemana1LasPuentes   +=  (int)$row['GRANDTOTAL'];
    }


    $query10 = "SELECT * FROM transaction WHERE date(DATE)  >= '{$primerLunes}%' AND date(DATE) <= '{$primerDomingo}%' AND CITY LIKE 'Santa Luz'";
  $result10 = mysqli_query($db, $query10) or die (mysqli_error($db));
        
    while ($row = mysqli_fetch_assoc($result10)) {
      $ventaSemana1SantaLuz +=  (int)$row['GRANDTOTAL'];
    }



    $query11 = "SELECT * FROM transaction WHERE date(DATE)  >= '{$primerLunes}%' AND date(DATE) <= '{$primerDomingo}%' AND CITY LIKE 'Sendero'";
  $result11 = mysqli_query($db, $query11) or die (mysqli_error($db));
        
    while ($row = mysqli_fetch_assoc($result11)) {
      $ventaSemana1Sendero +=  (int)$row['GRANDTOTAL'];
    }


    $query12 = "SELECT * FROM transaction WHERE date(DATE)  >= '{$primerLunes}%' AND date(DATE) <= '{$primerDomingo}%' AND CITY LIKE 'Tejeria'";
  $result12 = mysqli_query($db, $query12) or die (mysqli_error($db));
        
    while ($row = mysqli_fetch_assoc($result12)) {
      $ventaSemana1Tejeria +=  (int)$row['GRANDTOTAL'];
    }



    $query13 = "SELECT * FROM transaction WHERE date(DATE)  >= '{$primerLunes}%' AND date(DATE) <= '{$primerDomingo}%' AND CITY LIKE 'Vista Hermosa'";
  $result13 = mysqli_query($db, $query13) or die (mysqli_error($db));
        
    while ($row = mysqli_fetch_assoc($result13)) {
      $ventaSemana1VistaHermosa +=  (int)$row['GRANDTOTAL'];
    }


    $query14 = "SELECT * FROM transaction WHERE date(DATE)  >= '{$primerLunes}%' AND date(DATE) <= '{$primerDomingo}%' AND CITY LIKE 'Huinala'";
  $result14 = mysqli_query($db, $query14) or die (mysqli_error($db));
        
    while ($row = mysqli_fetch_assoc($result14)) {
      $ventaSemana1Huinala +=  (int)$row['GRANDTOTAL'];
    }

    $query15 = "SELECT * FROM transaction WHERE date(DATE)  >= '{$primerLunes}%' AND date(DATE) <= '{$primerDomingo}%' AND CITY LIKE 'Altabrisa'";
  $result15 = mysqli_query($db, $query15) or die (mysqli_error($db));
        
    while ($row = mysqli_fetch_assoc($result15)) {
      $ventaSemana1Altabrisa +=  (int)$row['GRANDTOTAL'];
    }

    $query16 = "SELECT * FROM transaction WHERE date(DATE)  >= '{$primerLunes}%' AND date(DATE) <= '{$primerDomingo}%' AND CITY LIKE 'Hombres Ilustres'";
  $result16 = mysqli_query($db, $query16) or die (mysqli_error($db));
        
    while ($row = mysqli_fetch_assoc($result15)) {
      $ventaSemana1HombresIlustres  +=  (int)$row['GRANDTOTAL'];
    }



  }
?>





<?php 

      //Seccion semana2  
      if (floor ($semanas) >= 1){


                  $query = "SELECT * FROM transaction WHERE date(DATE)  >= '{$segundoLunes}%' AND date(DATE) <= '{$segundoDomingo}%' AND CITY LIKE 'Cuernavaca'";
                    $result = mysqli_query($db, $query) or die (mysqli_error($db));
                          
                      while ($row = mysqli_fetch_assoc($result)) {
                        $ventaSemana2Cuernavaca +=  (int)$row['GRANDTOTAL'];
                      }

                       $query2 = "SELECT * FROM transaction WHERE date(DATE)  >= '{$segundoLunes}%' AND date(DATE) <= '{$segundoDomingo}%' AND CITY LIKE 'Estanzuela'";
                    $result2 = mysqli_query($db, $query2) or die (mysqli_error($db));
                          
                      while ($row = mysqli_fetch_assoc($result2)) {
                        $ventaSemana2Estanzuela +=  (int)$row['GRANDTOTAL'];
                      }
                                   
                  $query3 = "SELECT * FROM transaction WHERE date(DATE)  >= '{$segundoLunes}%' AND date(DATE) <= '{$segundoDomingo}%' AND CITY LIKE 'Fresnos'";
                    $result3 = mysqli_query($db, $query3) or die (mysqli_error($db));
                          
                      while ($row = mysqli_fetch_assoc($result3)) {
                        $ventaSemana2Fresnos +=  (int)$row['GRANDTOTAL'];
                      }

                  $query4 = "SELECT * FROM transaction WHERE date(DATE)  >= '{$segundoLunes}%' AND date(DATE) <= '{$segundoDomingo}%' AND CITY LIKE 'Koala'";
                    $result4 = mysqli_query($db, $query4) or die (mysqli_error($db));
                          
                      while ($row = mysqli_fetch_assoc($result4)) {
                        $ventaSemana2Koala +=  (int)$row['GRANDTOTAL'];
                      }

                  $query5 = "SELECT * FROM transaction WHERE date(DATE)  >= '{$segundoLunes}%' AND date(DATE) <= '{$segundoDomingo}%' AND CITY LIKE 'Merida'";
                    $result5 = mysqli_query($db, $query5) or die (mysqli_error($db));
                          
                      while ($row = mysqli_fetch_assoc($result5)) {
                        $ventaSemana2Merida +=  (int)$row['GRANDTOTAL'];
                      }
                  $query6 = "SELECT * FROM transaction WHERE date(DATE)  >= '{$segundoLunes}%' AND date(DATE) <= '{$segundoDomingo}%' AND CITY LIKE 'Nexxus'";
                    $result6 = mysqli_query($db, $query6) or die (mysqli_error($db));
                          
                      while ($row = mysqli_fetch_assoc($result6)) {
                        $ventaSemana2Nexxus +=  (int)$row['GRANDTOTAL'];
                      }

                  $query7 = "SELECT * FROM transaction WHERE date(DATE)  >= '{$segundoLunes}%' AND date(DATE) <= '{$segundoDomingo}%' AND CITY LIKE 'Nuevo Laredo'";
                    $result7 = mysqli_query($db, $query7) or die (mysqli_error($db));
                          
                      while ($row = mysqli_fetch_assoc($result7)) {
                        $ventaSemana2NuevoLaredo +=  (int)$row['GRANDTOTAL'];
                      }


                  $query8 = "SELECT * FROM transaction WHERE date(DATE)  >= '{$segundoLunes}%' AND date(DATE) <= '{$segundoDomingo}%' AND CITY LIKE 'Puerta de Hierro'";
                    $result8 = mysqli_query($db, $query8) or die (mysqli_error($db));
                          
                      while ($row = mysqli_fetch_assoc($result8)) {
                        $ventaSemana2PuertadeHierro +=  (int)$row['GRANDTOTAL'];
                      }


                      $query9 = "SELECT * FROM transaction WHERE date(DATE)  >= '{$segundoLunes}%' AND date(DATE) <= '{$segundoDomingo}%' AND CITY LIKE 'Las Puentes'";
                    $result9 = mysqli_query($db, $query9) or die (mysqli_error($db));
                          
                      while ($row = mysqli_fetch_assoc($result9)) {
                        $ventaSemana2LasPuentes   +=  (int)$row['GRANDTOTAL'];
                      }


                      $query10 = "SELECT * FROM transaction WHERE date(DATE)  >= '{$segundoLunes}%' AND date(DATE) <= '{$segundoDomingo}%' AND CITY LIKE 'Santa Luz'";
                    $result10 = mysqli_query($db, $query10) or die (mysqli_error($db));
                          
                      while ($row = mysqli_fetch_assoc($result10)) {
                        $ventaSemana2SantaLuz +=  (int)$row['GRANDTOTAL'];
                      }



                      $query11 = "SELECT * FROM transaction WHERE date(DATE)  >= '{$segundoLunes}%' AND date(DATE) <= '{$segundoDomingo}%' AND CITY LIKE 'Sendero'";
                    $result11 = mysqli_query($db, $query11) or die (mysqli_error($db));
                          
                      while ($row = mysqli_fetch_assoc($result11)) {
                        $ventaSemana2Sendero +=  (int)$row['GRANDTOTAL'];
                      }


                      $query12 = "SELECT * FROM transaction WHERE date(DATE)  >= '{$segundoLunes}%' AND date(DATE) <= '{$segundoDomingo}%' AND CITY LIKE 'Tejeria'";
                    $result12 = mysqli_query($db, $query12) or die (mysqli_error($db));
                          
                      while ($row = mysqli_fetch_assoc($result12)) {
                        $ventaSemana2Tejeria +=  (int)$row['GRANDTOTAL'];
                      }



                      $query13 = "SELECT * FROM transaction WHERE date(DATE)  >= '{$segundoLunes}%' AND date(DATE) <= '{$segundoDomingo}%' AND CITY LIKE 'Vista Hermosa'";
                    $result13 = mysqli_query($db, $query13) or die (mysqli_error($db));
                          
                      while ($row = mysqli_fetch_assoc($result13)) {
                        $ventaSemana2VistaHermosa +=  (int)$row['GRANDTOTAL'];
    }



                      $query14 = "SELECT * FROM transaction WHERE date(DATE)  >= '{$segundoLunes}%' AND date(DATE) <= '{$segundoDomingo}%' AND CITY LIKE 'Huinala'";
                    $result14 = mysqli_query($db, $query14) or die (mysqli_error($db));
                          
                      while ($row = mysqli_fetch_assoc($result14)) {
                        $ventaSemana2Huinala +=  (int)$row['GRANDTOTAL']; }


                    $query15 = "SELECT * FROM transaction WHERE date(DATE)  >= '{$segundoLunes}%' AND date(DATE) <= '{$segundoDomingo}%' AND CITY LIKE 'Altabrisa'";
                    $result15 = mysqli_query($db, $query15) or die (mysqli_error($db));
                          
                      while ($row = mysqli_fetch_assoc($result15)) {
                        $ventaSemana2Altabrisa +=  (int)$row['GRANDTOTAL']; }

                    $query16 = "SELECT * FROM transaction WHERE date(DATE)  >= '{$segundoLunes}%' AND date(DATE) <= '{$segundoDomingo}%' AND CITY LIKE 'Hombres Ilustres  '";
                    $result16 = mysqli_query($db, $query16) or die (mysqli_error($db));
                          
                      while ($row = mysqli_fetch_assoc($result16)) {
                        $ventaSemana2HombresIlustres +=  (int)$row['GRANDTOTAL']; }


       }





?>


<?php       //Seccion semana3  
              if (floor ($semanas) >= 2){

                      $query = "SELECT * FROM transaction WHERE date(DATE)  >= '{$tercerLunes}%' AND date(DATE) <= '{$tercerDomingo}%' AND CITY LIKE 'Cuernavaca'";
                      $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
                      while ($row = mysqli_fetch_assoc($result)) {
                  $ventaSemana3Cuernavaca +=  (int)$row['GRANDTOTAL'];
                      }



                       $query2 = "SELECT * FROM transaction WHERE date(DATE)  >= '{$tercerLunes}%' AND date(DATE) <= '{$tercerDomingo}%' AND CITY LIKE 'Estanzuela'";
                    $result2 = mysqli_query($db, $query2) or die (mysqli_error($db));
                          
                      while ($row = mysqli_fetch_assoc($result2)) {
                        $ventaSemana3Estanzuela +=  (int)$row['GRANDTOTAL'];
                      }
                                   
                  $query3 = "SELECT * FROM transaction WHERE date(DATE)  >= '{$tercerLunes}%' AND date(DATE) <= '{$tercerDomingo}%' AND CITY LIKE 'Fresnos'";
                    $result3 = mysqli_query($db, $query3) or die (mysqli_error($db));
                          
                      while ($row = mysqli_fetch_assoc($result3)) {
                        $ventaSemana3Fresnos +=  (int)$row['GRANDTOTAL'];
                      }

                  $query4 = "SELECT * FROM transaction WHERE date(DATE)  >= '{$tercerLunes}%' AND date(DATE) <= '{$tercerDomingo}%' AND CITY LIKE 'Koala'";
                    $result4 = mysqli_query($db, $query4) or die (mysqli_error($db));
                          
                      while ($row = mysqli_fetch_assoc($result4)) {
                        $ventaSemana3Koala +=  (int)$row['GRANDTOTAL'];
                      }

                  $query5 = "SELECT * FROM transaction WHERE date(DATE)  >= '{$tercerLunes}%' AND date(DATE) <= '{$tercerDomingo}%' AND CITY LIKE 'Merida'";
                    $result5 = mysqli_query($db, $query5) or die (mysqli_error($db));
                          
                      while ($row = mysqli_fetch_assoc($result5)) {
                        $ventaSemana3Merida +=  (int)$row['GRANDTOTAL'];
                      }
                  $query6 = "SELECT * FROM transaction WHERE date(DATE)  >= '{$tercerLunes}%' AND date(DATE) <= '{$tercerDomingo}%' AND CITY LIKE 'Nexxus'";
                    $result6 = mysqli_query($db, $query6) or die (mysqli_error($db));
                          
                      while ($row = mysqli_fetch_assoc($result6)) {
                        $ventaSemana3Nexxus +=  (int)$row['GRANDTOTAL'];
                      }

                  $query7 = "SELECT * FROM transaction WHERE date(DATE)  >= '{$tercerLunes}%' AND date(DATE) <= '{$tercerDomingo}%' AND CITY LIKE 'Nuevo Laredo'";
                    $result7 = mysqli_query($db, $query7) or die (mysqli_error($db));
                          
                      while ($row = mysqli_fetch_assoc($result7)) {
                        $ventaSemana3NuevoLaredo +=  (int)$row['GRANDTOTAL'];
                      }


                  $query8 = "SELECT * FROM transaction WHERE date(DATE)  >= '{$tercerLunes}%' AND date(DATE) <= '{$tercerDomingo}%' AND CITY LIKE 'Puerta de Hierro'";
                    $result8 = mysqli_query($db, $query8) or die (mysqli_error($db));
                          
                      while ($row = mysqli_fetch_assoc($result8)) {
                        $ventaSemana3PuertadeHierro +=  (int)$row['GRANDTOTAL'];
                      }


                      $query9 = "SELECT * FROM transaction WHERE date(DATE)  >= '{$tercerLunes}%' AND date(DATE) <= '{$tercerDomingo}%' AND CITY LIKE 'Las Puentes'";
                    $result9 = mysqli_query($db, $query9) or die (mysqli_error($db));
                          
                      while ($row = mysqli_fetch_assoc($result9)) {
                        $ventaSemana3LasPuentes   +=  (int)$row['GRANDTOTAL'];
                      }


                      $query10 = "SELECT * FROM transaction WHERE date(DATE)  >= '{$tercerLunes}%' AND date(DATE) <= '{$tercerDomingo}%' AND CITY LIKE 'Santa Luz'";
                    $result10 = mysqli_query($db, $query10) or die (mysqli_error($db));
                          
                      while ($row = mysqli_fetch_assoc($result10)) {
                        $ventaSemana3SantaLuz +=  (int)$row['GRANDTOTAL'];
                      }



                      $query11 = "SELECT * FROM transaction WHERE date(DATE)  >= '{$tercerLunes}%' AND date(DATE) <= '{$tercerDomingo}%' AND CITY LIKE 'Sendero'";
                    $result11 = mysqli_query($db, $query11) or die (mysqli_error($db));
                          
                      while ($row = mysqli_fetch_assoc($result11)) {
                        $ventaSemana3Sendero +=  (int)$row['GRANDTOTAL'];
                      }


                      $query12 = "SELECT * FROM transaction WHERE date(DATE)  >= '{$tercerLunes}%' AND date(DATE) <= '{$tercerDomingo}%' AND CITY LIKE 'Tejeria'";
                    $result12 = mysqli_query($db, $query12) or die (mysqli_error($db));
                          
                      while ($row = mysqli_fetch_assoc($result12)) {
                        $ventaSemana3Tejeria +=  (int)$row['GRANDTOTAL'];
                      }



                      $query13 = "SELECT * FROM transaction WHERE date(DATE)  >= '{$tercerLunes}%' AND date(DATE) <= '{$tercerDomingo}%' AND CITY LIKE 'Vista Hermosa'";
                    $result13 = mysqli_query($db, $query13) or die (mysqli_error($db));
                          
                      while ($row = mysqli_fetch_assoc($result13)) {
                        $ventaSemana3VistaHermosa +=  (int)$row['GRANDTOTAL'];
                    }

                      $query14 = "SELECT * FROM transaction WHERE date(DATE)  >= '{$tercerLunes}%' AND date(DATE) <= '{$tercerDomingo}%' AND CITY LIKE 'Huinala'";
                    $result14 = mysqli_query($db, $query14) or die (mysqli_error($db));
                          
                      while ($row = mysqli_fetch_assoc($result14)) {
                        $ventaSemana3Huinala +=  (int)$row['GRANDTOTAL'];
                    }


                    $query15 = "SELECT * FROM transaction WHERE date(DATE)  >= '{$tercerLunes}%' AND date(DATE) <= '{$tercerDomingo}%' AND CITY LIKE 'Altabrisa'";
                    $result15 = mysqli_query($db, $query15) or die (mysqli_error($db));
                          
                      while ($row = mysqli_fetch_assoc($result15)) {
                        $ventaSemana3Altabrisa +=  (int)$row['GRANDTOTAL'];
                    }
                    $query16 = "SELECT * FROM transaction WHERE date(DATE)  >= '{$tercerLunes}%' AND date(DATE) <= '{$tercerDomingo}%' AND CITY LIKE 'Hombres Ilustres'";
                    $result16 = mysqli_query($db, $query16) or die (mysqli_error($db));
                          
                      while ($row = mysqli_fetch_assoc($result16)) {
                        $ventaSemana3HombresIlustres +=  (int)$row['GRANDTOTAL'];
                    }


  }


?>



<?php       //Seccion semana4  
if (floor ($semanas) >= 3){

                      $query = "SELECT * FROM transaction WHERE date(DATE)  >= '{$cuartoLunes}%' AND date(DATE) <= '{$cuartoDomingo}%' AND CITY LIKE 'Cuernavaca'";
                      $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
                      while ($row = mysqli_fetch_assoc($result)) {
                  $ventaSemana4Cuernavaca +=  (int)$row['GRANDTOTAL'];
                      }
              }





                       $query2 = "SELECT * FROM transaction WHERE date(DATE)  >= '{$cuartoLunes}%' AND date(DATE) <= '{$cuartoDomingo}%' AND CITY LIKE 'Estanzuela'";
                    $result2 = mysqli_query($db, $query2) or die (mysqli_error($db));
                          
                      while ($row = mysqli_fetch_assoc($result2)) {
                        $ventaSemana4Estanzuela +=  (int)$row['GRANDTOTAL'];
                      }
                                   
                  $query3 = "SELECT * FROM transaction WHERE date(DATE)  >= '{$cuartoLunes}%' AND date(DATE) <= '{$cuartoDomingo}%' AND CITY LIKE 'Fresnos'";
                    $result3 = mysqli_query($db, $query3) or die (mysqli_error($db));
                          
                      while ($row = mysqli_fetch_assoc($result3)) {
                        $ventaSemana4Fresnos +=  (int)$row['GRANDTOTAL'];
                      }

                  $query4 = "SELECT * FROM transaction WHERE date(DATE)  >= '{$cuartoLunes}%' AND date(DATE) <= '{$cuartoDomingo}%' AND CITY LIKE 'Koala'";
                    $result4 = mysqli_query($db, $query4) or die (mysqli_error($db));
                          
                      while ($row = mysqli_fetch_assoc($result4)) {
                        $ventaSemana4Koala +=  (int)$row['GRANDTOTAL'];
                      }

                  $query5 = "SELECT * FROM transaction WHERE date(DATE)  >= '{$cuartoLunes}%' AND date(DATE) <= '{$cuartoDomingo}%' AND CITY LIKE 'Merida'";
                    $result5 = mysqli_query($db, $query5) or die (mysqli_error($db));
                          
                      while ($row = mysqli_fetch_assoc($result5)) {
                        $ventaSemana4Merida +=  (int)$row['GRANDTOTAL'];
                      }
                  $query6 = "SELECT * FROM transaction WHERE date(DATE)  >= '{$cuartoLunes}%' AND date(DATE) <= '{$cuartoDomingo}%' AND CITY LIKE 'Nexxus'";
                    $result6 = mysqli_query($db, $query6) or die (mysqli_error($db));
                          
                      while ($row = mysqli_fetch_assoc($result6)) {
                        $ventaSemana4Nexxus +=  (int)$row['GRANDTOTAL'];
                      }

                  $query7 = "SELECT * FROM transaction WHERE date(DATE)  >= '{$cuartoLunes}%' AND date(DATE) <= '{$cuartoDomingo}%' AND CITY LIKE 'Nuevo Laredo'";
                    $result7 = mysqli_query($db, $query7) or die (mysqli_error($db));
                          
                      while ($row = mysqli_fetch_assoc($result7)) {
                        $ventaSemana4NuevoLaredo +=  (int)$row['GRANDTOTAL'];
                      }


                  $query8 = "SELECT * FROM transaction WHERE date(DATE)  >= '{$cuartoLunes}%' AND date(DATE) <= '{$cuartoDomingo}%' AND CITY LIKE 'Puerta de Hierro'";
                    $result8 = mysqli_query($db, $query8) or die (mysqli_error($db));
                          
                      while ($row = mysqli_fetch_assoc($result8)) {
                        $ventaSemana4PuertadeHierro +=  (int)$row['GRANDTOTAL'];
                      }


                      $query9 = "SELECT * FROM transaction WHERE date(DATE)  >= '{$cuartoLunes}%' AND date(DATE) <= '{$cuartoDomingo}%' AND CITY LIKE 'Las Puentes'";
                    $result9 = mysqli_query($db, $query9) or die (mysqli_error($db));
                          
                      while ($row = mysqli_fetch_assoc($result9)) {
                        $ventaSemana4LasPuentes   +=  (int)$row['GRANDTOTAL'];
                      }


                      $query10 = "SELECT * FROM transaction WHERE date(DATE)  >= '{$cuartoLunes}%' AND date(DATE) <= '{$cuartoDomingo}%' AND CITY LIKE 'Santa Luz'";
                    $result10 = mysqli_query($db, $query10) or die (mysqli_error($db));
                          
                      while ($row = mysqli_fetch_assoc($result10)) {
                        $ventaSemana4SantaLuz +=  (int)$row['GRANDTOTAL'];
                      }



                      $query11 = "SELECT * FROM transaction WHERE date(DATE)  >= '{$cuartoLunes}%' AND date(DATE) <= '{$cuartoDomingo}%' AND CITY LIKE 'Sendero'";
                    $result11 = mysqli_query($db, $query11) or die (mysqli_error($db));
                          
                      while ($row = mysqli_fetch_assoc($result11)) {
                        $ventaSemana4Sendero +=  (int)$row['GRANDTOTAL'];
                      }


                      $query12 = "SELECT * FROM transaction WHERE date(DATE)  >= '{$cuartoLunes}%' AND date(DATE) <= '{$cuartoDomingo}%' AND CITY LIKE 'Tejeria'";
                    $result12 = mysqli_query($db, $query12) or die (mysqli_error($db));
                          
                      while ($row = mysqli_fetch_assoc($result12)) {
                        $ventaSemana4Tejeria +=  (int)$row['GRANDTOTAL'];
                      }



                      $query13 = "SELECT * FROM transaction WHERE date(DATE)  >= '{$cuartoLunes}%' AND date(DATE) <= '{$cuartoDomingo}%' AND CITY LIKE 'Vista Hermosa'";
                    $result13 = mysqli_query($db, $query13) or die (mysqli_error($db));
                          
                      while ($row = mysqli_fetch_assoc($result13)) {
                        $ventaSemana4VistaHermosa +=  (int)$row['GRANDTOTAL'];
    }

                      $query14 = "SELECT * FROM transaction WHERE date(DATE)  >= '{$cuartoLunes}%' AND date(DATE) <= '{$cuartoDomingo}%' AND CITY LIKE 'Huinala'";
                    $result14 = mysqli_query($db, $query14) or die (mysqli_error($db));
                          
                      while ($row = mysqli_fetch_assoc($result14)) {
                        $ventaSemana4Huinala +=  (int)$row['GRANDTOTAL'];
    }


                      $query15 = "SELECT * FROM transaction WHERE date(DATE)  >= '{$cuartoLunes}%' AND date(DATE) <= '{$cuartoDomingo}%' AND CITY LIKE 'Altabrisa'";
                    $result15 = mysqli_query($db, $query15) or die (mysqli_error($db));
                          
                      while ($row = mysqli_fetch_assoc($result15)) {
                        $ventaSemana4Altabrisa +=  (int)$row['GRANDTOTAL'];
    }

                          $query16 = "SELECT * FROM transaction WHERE date(DATE)  >= '{$cuartoLunes}%' AND date(DATE) <= '{$cuartoDomingo}%' AND CITY LIKE 'Hombres Ilustres'";
                    $result16 = mysqli_query($db, $query16) or die (mysqli_error($db));
                          
                      while ($row = mysqli_fetch_assoc($result16)) {
                        $ventaSemana4HombresIlustres +=  (int)$row['GRANDTOTAL'];
    }


?>






<?php       //Seccion semana5  
if (floor ($semanas) >= 4){


                      $query = "SELECT * FROM transaction WHERE date(DATE)  >= '{$quintoLunes}%' AND date(DATE) <= '{$lastDay}%' AND CITY LIKE 'Cuernavaca'";
                      $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
                      while ($row = mysqli_fetch_assoc($result)) {
                  $ventaSemana5Cuernavaca +=  (int)$row['GRANDTOTAL'];
                      }

                       $query2 = "SELECT * FROM transaction WHERE date(DATE)  >= '{$quintoLunes}%' AND date(DATE) <= '{$lastDay}%' AND CITY LIKE 'Estanzuela'";
                    $result2 = mysqli_query($db, $query2) or die (mysqli_error($db));
                          
                      while ($row = mysqli_fetch_assoc($result2)) {
                        $ventaSemana5Estanzuela +=  (int)$row['GRANDTOTAL'];
                      }
                                   
                  $query3 = "SELECT * FROM transaction WHERE date(DATE)  >= '{$quintoLunes}%' AND date(DATE) <= '{$lastDay}%' AND CITY LIKE 'Fresnos'";
                    $result3 = mysqli_query($db, $query3) or die (mysqli_error($db));
                          
                      while ($row = mysqli_fetch_assoc($result3)) {
                        $ventaSemana5Fresnos +=  (int)$row['GRANDTOTAL'];
                      }

                  $query4 = "SELECT * FROM transaction WHERE date(DATE)  >= '{$quintoLunes}%' AND date(DATE) <= '{$lastDay}%' AND CITY LIKE 'Koala'";
                    $result4 = mysqli_query($db, $query4) or die (mysqli_error($db));
                          
                      while ($row = mysqli_fetch_assoc($result4)) {
                        $ventaSemana5Koala +=  (int)$row['GRANDTOTAL'];
                      }

                  $query5 = "SELECT * FROM transaction WHERE date(DATE)  >= '{$quintoLunes}%' AND date(DATE) <= '{$lastDay}%' AND CITY LIKE 'Merida'";
                    $result5 = mysqli_query($db, $query5) or die (mysqli_error($db));
                          
                      while ($row = mysqli_fetch_assoc($result5)) {
                        $ventaSemana5Merida +=  (int)$row['GRANDTOTAL'];
                      }
                  $query6 = "SELECT * FROM transaction WHERE date(DATE)  >= '{$quintoLunes}%' AND date(DATE) <= '{$lastDay}%' AND CITY LIKE 'Nexxus'";
                    $result6 = mysqli_query($db, $query6) or die (mysqli_error($db));
                          
                      while ($row = mysqli_fetch_assoc($result6)) {
                        $ventaSemana5Nexxus +=  (int)$row['GRANDTOTAL'];
                      }

                  $query7 = "SELECT * FROM transaction WHERE date(DATE)  >= '{$quintoLunes}%' AND date(DATE) <= '{$lastDay}%' AND CITY LIKE 'Nuevo Laredo'";
                    $result7 = mysqli_query($db, $query7) or die (mysqli_error($db));
                          
                      while ($row = mysqli_fetch_assoc($result7)) {
                        $ventaSemana5NuevoLaredo +=  (int)$row['GRANDTOTAL'];
                      }


                  $query8 = "SELECT * FROM transaction WHERE date(DATE)  >= '{$quintoLunes}%' AND date(DATE) <= '{$lastDay}%' AND CITY LIKE 'Puerta de Hierro'";
                    $result8 = mysqli_query($db, $query8) or die (mysqli_error($db));
                          
                      while ($row = mysqli_fetch_assoc($result8)) {
                        $ventaSemana5PuertadeHierro +=  (int)$row['GRANDTOTAL'];
                      }


                      $query9 = "SELECT * FROM transaction WHERE date(DATE)  >= '{$quintoLunes}%' AND date(DATE) <= '{$lastDay}%' AND CITY LIKE 'Las Puentes'";
                    $result9 = mysqli_query($db, $query9) or die (mysqli_error($db));
                          
                      while ($row = mysqli_fetch_assoc($result9)) {
                        $ventaSemana5LasPuentes   +=  (int)$row['GRANDTOTAL'];
                      }


                      $query10 = "SELECT * FROM transaction WHERE date(DATE)  >= '{$quintoLunes}%' AND date(DATE) <= '{$lastDay}%' AND CITY LIKE 'Santa Luz'";
                    $result10 = mysqli_query($db, $query10) or die (mysqli_error($db));
                          
                      while ($row = mysqli_fetch_assoc($result10)) {
                        $ventaSemana5SantaLuz +=  (int)$row['GRANDTOTAL'];
                      }



                      $query11 = "SELECT * FROM transaction WHERE date(DATE)  >= '{$quintoLunes}%' AND date(DATE) <= '{$lastDay}%' AND CITY LIKE 'Sendero'";
                    $result11 = mysqli_query($db, $query11) or die (mysqli_error($db));
                          
                      while ($row = mysqli_fetch_assoc($result11)) {
                        $ventaSemana5Sendero +=  (int)$row['GRANDTOTAL'];
                      }


                      $query12 = "SELECT * FROM transaction WHERE date(DATE)  >= '{$quintoLunes}%' AND date(DATE) <= '{$lastDay}%' AND CITY LIKE 'Tejeria'";
                    $result12 = mysqli_query($db, $query12) or die (mysqli_error($db));
                          
                      while ($row = mysqli_fetch_assoc($result12)) {
                        $ventaSemana5Tejeria +=  (int)$row['GRANDTOTAL'];
                      }



                      $query13 = "SELECT * FROM transaction WHERE date(DATE)  >= '{$quintoLunes}%' AND date(DATE) <= '{$lastDay}%' AND CITY LIKE 'Vista Hermosa'";
                    $result13 = mysqli_query($db, $query13) or die (mysqli_error($db));
                          
                      while ($row = mysqli_fetch_assoc($result13)) {
                        $ventaSemana5VistaHermosa +=  (int)$row['GRANDTOTAL'];
                  }


                      $query14 = "SELECT * FROM transaction WHERE date(DATE)  >= '{$quintoLunes}%' AND date(DATE) <= '{$lastDay}%' AND CITY LIKE 'Huinala'";
                    $result14 = mysqli_query($db, $query14) or die (mysqli_error($db));
                          
                      while ($row = mysqli_fetch_assoc($result14)) {
                        $ventaSemana5Huinala +=  (int)$row['GRANDTOTAL'];
                  }





                      $query15 = "SELECT * FROM transaction WHERE date(DATE)  >= '{$quintoLunes}%' AND date(DATE) <= '{$lastDay}%' AND CITY LIKE 'Altabrisa'";
                    $result15 = mysqli_query($db, $query15) or die (mysqli_error($db));
                          
                      while ($row = mysqli_fetch_assoc($result15)) {
                        $ventaSemana5Altabrisa +=  (int)$row['GRANDTOTAL'];
                  }

                      $query16 = "SELECT * FROM transaction WHERE date(DATE)  >= '{$quintoLunes}%' AND date(DATE) <= '{$lastDay}%' AND CITY LIKE 'Hombres Ilustres'";
                    $result16 = mysqli_query($db, $query16) or die (mysqli_error($db));
                          
                      while ($row = mysqli_fetch_assoc($result16)) {
                        $ventaSemana5HombresIlustres  +=  (int)$row['GRANDTOTAL'];
                  }


}


?>



<?php   /*
if (floor ($semanas) >= 5){*/               

                      $query = "SELECT * FROM transaction WHERE date(DATE)  >= '{$firstDay}%' AND date(DATE) <= '{$lastDay}%' AND CITY LIKE 'Cuernavaca'";
                      $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
                      while ($row = mysqli_fetch_assoc($result)) {
                  $ventaSemanaTCuernavaca +=  (int)$row['GRANDTOTAL'];
                      }





                       $query2 = "SELECT * FROM transaction WHERE date(DATE)  >= '{$firstDay}%' AND date(DATE) <= '{$lastDay}%' AND CITY LIKE 'Estanzuela'";
                    $result2 = mysqli_query($db, $query2) or die (mysqli_error($db));
                          
                      while ($row = mysqli_fetch_assoc($result2)) {
                        $ventaSemanaTEstanzuela +=  (int)$row['GRANDTOTAL'];
                      }
                                   
                  $query3 = "SELECT * FROM transaction WHERE date(DATE)  >= '{$firstDay}%' AND date(DATE) <= '{$lastDay}%' AND CITY LIKE 'Fresnos'";
                    $result3 = mysqli_query($db, $query3) or die (mysqli_error($db));
                          
                      while ($row = mysqli_fetch_assoc($result3)) {
                        $ventaSemanaTFresnos +=  (int)$row['GRANDTOTAL'];
                      }

                  $query4 = "SELECT * FROM transaction WHERE date(DATE)  >= '{$firstDay}%' AND date(DATE) <= '{$lastDay}%' AND CITY LIKE 'Koala'";
                    $result4 = mysqli_query($db, $query4) or die (mysqli_error($db));
                          
                      while ($row = mysqli_fetch_assoc($result4)) {
                        $ventaSemanaTKoala +=  (int)$row['GRANDTOTAL'];
                      }

                  $query5 = "SELECT * FROM transaction WHERE date(DATE)  >= '{$firstDay}%' AND date(DATE) <= '{$lastDay}%' AND CITY LIKE 'Merida'";
                    $result5 = mysqli_query($db, $query5) or die (mysqli_error($db));
                          
                      while ($row = mysqli_fetch_assoc($result5)) {
                        $ventaSemanaTMerida +=  (int)$row['GRANDTOTAL'];
                      }
                  $query6 = "SELECT * FROM transaction WHERE date(DATE)  >= '{$firstDay}%' AND date(DATE) <= '{$lastDay}%' AND CITY LIKE 'Nexxus'";
                    $result6 = mysqli_query($db, $query6) or die (mysqli_error($db));
                          
                      while ($row = mysqli_fetch_assoc($result6)) {
                        $ventaSemanaTNexxus +=  (int)$row['GRANDTOTAL'];
                      }

                  $query7 = "SELECT * FROM transaction WHERE date(DATE)  >= '{$firstDay}%' AND date(DATE) <= '{$lastDay}%' AND CITY LIKE 'Nuevo Laredo'";
                    $result7 = mysqli_query($db, $query7) or die (mysqli_error($db));
                          
                      while ($row = mysqli_fetch_assoc($result7)) {
                        $ventaSemanaTNuevoLaredo +=  (int)$row['GRANDTOTAL'];
                      }


                  $query8 = "SELECT * FROM transaction WHERE date(DATE)  >= '{$firstDay}%' AND date(DATE) <= '{$lastDay}%' AND CITY LIKE 'Puerta de Hierro'";
                    $result8 = mysqli_query($db, $query8) or die (mysqli_error($db));
                          
                      while ($row = mysqli_fetch_assoc($result8)) {
                        $ventaSemanaTPuertadeHierro +=  (int)$row['GRANDTOTAL'];
                      }


                      $query9 = "SELECT * FROM transaction WHERE date(DATE)  >= '{$firstDay}%' AND date(DATE) <= '{$lastDay}%' AND CITY LIKE 'Las Puentes'";
                    $result9 = mysqli_query($db, $query9) or die (mysqli_error($db));
                          
                      while ($row = mysqli_fetch_assoc($result9)) {
                        $ventaSemanaTLasPuentes   +=  (int)$row['GRANDTOTAL'];
                      }


                      $query10 = "SELECT * FROM transaction WHERE date(DATE)  >= '{$firstDay}%' AND date(DATE) <= '{$lastDay}%' AND CITY LIKE 'Santa Luz'";
                    $result10 = mysqli_query($db, $query10) or die (mysqli_error($db));
                          
                      while ($row = mysqli_fetch_assoc($result10)) {
                        $ventaSemanaTSantaLuz +=  (int)$row['GRANDTOTAL'];
                      }



                      $query11 = "SELECT * FROM transaction WHERE date(DATE)  >= '{$firstDay}%' AND date(DATE) <= '{$lastDay}%' AND CITY LIKE 'Sendero'";
                    $result11 = mysqli_query($db, $query11) or die (mysqli_error($db));
                          
                      while ($row = mysqli_fetch_assoc($result11)) {
                        $ventaSemanaTSendero +=  (int)$row['GRANDTOTAL'];
                      }


                      $query12 = "SELECT * FROM transaction WHERE date(DATE)  >= '{$firstDay}%' AND date(DATE) <= '{$lastDay}%' AND CITY LIKE 'Tejeria'";
                    $result12 = mysqli_query($db, $query12) or die (mysqli_error($db));
                          
                      while ($row = mysqli_fetch_assoc($result12)) {
                        $ventaSemanaTTejeria +=  (int)$row['GRANDTOTAL'];
                      }



                      $query13 = "SELECT * FROM transaction WHERE date(DATE)  >= '{$firstDay}%' AND date(DATE) <= '{$lastDay}%' AND CITY LIKE 'Vista Hermosa'";
                    $result13 = mysqli_query($db, $query13) or die (mysqli_error($db));
                          
                      while ($row = mysqli_fetch_assoc($result13)) {
                        $ventaSemanaTVistaHermosa +=  (int)$row['GRANDTOTAL'];
                    }
                     $query14 = "SELECT * FROM transaction WHERE date(DATE)  >= '{$firstDay}%' AND date(DATE) <= '{$lastDay}%' AND CITY LIKE 'Huinala'";
                    $result14 = mysqli_query($db, $query14) or die (mysqli_error($db));
                          
                      while ($row = mysqli_fetch_assoc($result14)) {
                        $ventaSemanaTHuinala +=  (int)$row['GRANDTOTAL'];
                    }


                    $query15 = "SELECT * FROM transaction WHERE date(DATE)  >= '{$firstDay}%' AND date(DATE) <= '{$lastDay}%' AND CITY LIKE 'Altabrisa'";
                    $result15 = mysqli_query($db, $query15) or die (mysqli_error($db));
                          
                      while ($row = mysqli_fetch_assoc($result15)) {
                        $ventaSemanaTHuinala +=  (int)$row['GRANDTOTAL'];
                    }

                    $query16 = "SELECT * FROM transaction WHERE date(DATE)  >= '{$firstDay}%' AND date(DATE) <= '{$lastDay}%' AND CITY LIKE 'Hombres Ilustres'";
                    $result16 = mysqli_query($db, $query16) or die (mysqli_error($db));
                          
                      while ($row = mysqli_fetch_assoc($result16)) {
                        $ventaSemanaTHombresIlustres  +=  (int)$row['GRANDTOTAL'];
                    }

 /* }*/
?>




<?php  /* 

                      $query = "SELECT * FROM transaction WHERE date(DATE) LIKE '{$hoy}%' AND CITY LIKE 'Cuernavaca'";
                      $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
                      while ($row = mysqli_fetch_assoc($result)) {
                  $ventaHoyCuernavaca +=  (int)$row['GRANDTOTAL'];
                      }





                       $query2 = "SELECT * FROM transaction WHERE date(DATE) LIKE '{$hoy}%' AND CITY LIKE 'Estanzuela'";
                    $result2 = mysqli_query($db, $query2) or die (mysqli_error($db));
                          
                      while ($row = mysqli_fetch_assoc($result2)) {
                        $ventaHoyEstanzuela +=  (int)$row['GRANDTOTAL'];
                      }
                                   
                  $query3 = "SELECT * FROM transaction WHERE date(DATE) LIKE '{$hoy}%' AND CITY LIKE 'Fresnos'";
                    $result3 = mysqli_query($db, $query3) or die (mysqli_error($db));
                          
                      while ($row = mysqli_fetch_assoc($result3)) {
                        $ventaHoyFresnos +=  (int)$row['GRANDTOTAL'];
                      }

                  $query4 = "SELECT * FROM transaction WHERE date(DATE) LIKE '{$hoy}%' AND CITY LIKE 'Koala'";
                    $result4 = mysqli_query($db, $query4) or die (mysqli_error($db));
                          
                      while ($row = mysqli_fetch_assoc($result4)) {
                        $ventaHoyKoala +=  (int)$row['GRANDTOTAL'];
                      }

                  $query5 = "SELECT * FROM transaction WHERE date(DATE) LIKE '{$hoy}%' AND CITY LIKE 'Merida'";
                    $result5 = mysqli_query($db, $query5) or die (mysqli_error($db));
                          
                      while ($row = mysqli_fetch_assoc($result5)) {
                        $ventaHoyMerida +=  (int)$row['GRANDTOTAL'];
                      }
                  $query6 = "SELECT * FROM transaction WHERE date(DATE) LIKE '{$hoy}%' AND CITY LIKE 'Nexxus'";
                    $result6 = mysqli_query($db, $query6) or die (mysqli_error($db));
                          
                      while ($row = mysqli_fetch_assoc($result6)) {
                        $ventaHoyNexxus +=  (int)$row['GRANDTOTAL'];
                      }

                  $query7 = "SELECT * FROM transaction WHERE date(DATE) LIKE '{$hoy}%' AND CITY LIKE 'Nuevo Laredo'";
                    $result7 = mysqli_query($db, $query7) or die (mysqli_error($db));
                          
                      while ($row = mysqli_fetch_assoc($result7)) {
                        $ventaHoyNuevoLaredo +=  (int)$row['GRANDTOTAL'];
                      }


                  $query8 = "SELECT * FROM transaction WHERE date(DATE) LIKE '{$hoy}%' AND CITY LIKE 'Puerta de Hierro'";
                    $result8 = mysqli_query($db, $query8) or die (mysqli_error($db));
                          
                      while ($row = mysqli_fetch_assoc($result8)) {
                        $ventaHoyPuertadeHierro +=  (int)$row['GRANDTOTAL'];
                      }


                      $query9 = "SELECT * FROM transaction WHERE date(DATE) LIKE '{$hoy}%' AND CITY LIKE 'Las Puentes'";
                    $result9 = mysqli_query($db, $query9) or die (mysqli_error($db));
                          
                      while ($row = mysqli_fetch_assoc($result9)) {
                        $ventaHoyLasPuentes   +=  (int)$row['GRANDTOTAL'];
                      }


                      $query10 = "SELECT * FROM transaction WHERE date(DATE) LIKE '{$hoy}%' AND CITY LIKE 'Santa Luz'";
                    $result10 = mysqli_query($db, $query10) or die (mysqli_error($db));
                          
                      while ($row = mysqli_fetch_assoc($result10)) {
                        $ventaHoySantaLuz +=  (int)$row['GRANDTOTAL'];
                      }



                      $query11 = "SELECT * FROM transaction WHERE date(DATE) LIKE '{$hoy}%' AND CITY LIKE 'Sendero'";
                    $result11 = mysqli_query($db, $query11) or die (mysqli_error($db));
                          
                      while ($row = mysqli_fetch_assoc($result11)) {
                        $ventaHoySendero +=  (int)$row['GRANDTOTAL'];
                      }


                      $query12 = "SELECT * FROM transaction WHERE date(DATE) LIKE '{$hoy}%' AND CITY LIKE 'Tejeria'";
                    $result12 = mysqli_query($db, $query12) or die (mysqli_error($db));
                          
                      while ($row = mysqli_fetch_assoc($result12)) {
                        $ventaHoyTejeria +=  (int)$row['GRANDTOTAL'];
                      }



                      $query13 = "SELECT * FROM transaction WHERE date(DATE) LIKE '{$hoy}%' AND CITY LIKE 'Vista Hermosa'";
                    $result13 = mysqli_query($db, $query13) or die (mysqli_error($db));
                          
                      while ($row = mysqli_fetch_assoc($result13)) {
                        $ventaHoyVistaHermosa +=  (int)$row['GRANDTOTAL'];
                      }


                      $query14 = "SELECT * FROM transaction WHERE date(DATE) LIKE '{$hoy}%' AND CITY LIKE 'Huinala'";
                    $result14 = mysqli_query($db, $query14) or die (mysqli_error($db));
                          
                      while ($row = mysqli_fetch_assoc($result14)) {
                        $ventaHoyHuinala +=  (int)$row['GRANDTOTAL'];
                      }


                      $query15 = "SELECT * FROM transaction WHERE date(DATE) LIKE '{$hoy}%' AND CITY LIKE 'Altabrisa'";
                    $result15 = mysqli_query($db, $query15) or die (mysqli_error($db));
                          
                      while ($row = mysqli_fetch_assoc($result15)) {
                        $ventaHoyAltabrisa +=  (int)$row['GRANDTOTAL'];
                      }
*/

?>

          <input type="hidden" name="date" value="<?php echo $today; ?>">
<br>       
                <div class="col-sm-6 col-md-12">

                <table class="table table-bordered"  width="100%" cellspacing="0"> 
                  <tr >
                    <td colspan="4" style="background-color: #FA4616;color:#FFF; text-align: center;" > <h1>Ganancias Mensuales</h1>

             <form action="" method="POST">

              <div class="row" style="justify-content: center;">
                <input class="date" style="width: 20%; margin: 0px 10px;" type="text" id="date" name="date" placeholder="Fecha Inicio <?php echo date("d-m-Y", strtotime($firstDay) ); ?>" autocomplete="off" required >

                <input class="date2" style="width: 20%; margin: 0px 10px;"  type="text" id="date2" name="date2" placeholder="Fecha Final <?php echo date("d-m-Y", strtotime($lastDay) ); ?>" autocomplete="off" required >



                <input style="margin: 0px 10px;" class="btn btn-primary bg-gradient-primary" type="submit" name="submit" value="Buscar">
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

               $( "#date3" ).datepicker({
                  dateFormat: 'yy-mm-dd',
                  altFormat : "yy-mm-dd",
                  altField  : '#alternate3',
                  onSelect  : function() {
                  
                      // proof
                      console.log( $('#alternate3').val() );
                  }
              });


              </script>
                    </td>
                  </tr>
            </table>








<div style="display: flex;overflow-x: scroll;">

  <table>
    <tbody>
                     <tr style="font-weight: 800;">
                      <td style="background-color: #500D76; color: #fff;width: 155px;height: 80px;">Sucursal</td>
                    </tr>
                     <tr style="font-weight: 800;"><td>Altabrisa</td></tr>

                     <tr style="font-weight: 800;background-color: #FA4616;opacity: 0.7;color: #FFF;"><td>Cuernavaca</td></tr>
                     <tr style="font-weight: 800;"><td>Estanzuela</td></tr>
                     <tr style="font-weight: 800;background-color: #FA4616;opacity: 0.7;color: #FFF;"><td>Fresnos</td></tr>
                     <tr style="font-weight: 800;background-color: #FA4616;opacity: 0.7;color: #FFF;"><td>Hombres Ilustres  </td></tr>
                     <tr style="font-weight: 800;"><td>Koala</td></tr>
                     <tr style="font-weight: 800;background-color: #FA4616;opacity: 0.7;color: #FFF;"><td>Merida</td></tr>
                     <tr style="font-weight: 800;"><td>Nexxus</td></tr>
                     <tr style="font-weight: 800;background-color: #FA4616;opacity: 0.7;color: #FFF;"><td>Nuevo Laredo</td></tr>
                     <tr style="font-weight: 800;"><td>Puerta de Hierro </td></tr>
                     <tr style="font-weight: 800;background-color: #FA4616;opacity: 0.7;color: #FFF;"><td>Las Puentes</td></tr>
                     <tr style="font-weight: 800;"><td>Santa Luz</td></tr>
                     <tr style="font-weight: 800;background-color: #FA4616;opacity: 0.7;color: #FFF;"><td>Sendero</td></tr>
                     <tr style="font-weight: 800;"><td>Tejeria</td></tr>
                     <tr style="font-weight: 800;background-color: #FA4616;opacity: 0.7;color: #FFF;"><td>Vista Hermosa</td></tr>
                     <tr style="font-weight: 800;">
                      <td>Huinala</td></tr>
    </tbody>
</table>



<div id="semana1" style="display: none;text-align: right;">
  <table >
    <tbody>
                     <tr style="font-weight: 800;">
                      <td style="background-color: #500D76; color: #fff;width: 155px;height: 80px;">Semana 1<br> (<?php echo date("d-m-Y", strtotime($firstDay) ); ?> <br>/ <?php echo date("d-m-Y", strtotime($primerDomingo) ); ?>)</td></tr>
                      <tr style="font-weight: 800;"><td>$ <?php echo number_format($ventaSemana1Altabrisa, 2, '.', ','); ?></td></tr>

                     <tr style="font-weight: 800;background-color: #FA4616;opacity: 0.7;color: #FFF;"><td>$ <?php echo number_format($ventaSemana1Cuernavaca, 2, '.', ','); ?></td></tr>
                     <tr style="font-weight: 800;"><td>$ <?php echo number_format($ventaSemana1Estanzuela, 2, '.', ','); ?></td></tr>
                     <tr style="font-weight: 800;background-color: #FA4616;opacity: 0.7;color: #FFF;"><td>$ <?php echo number_format($ventaSemana1Fresnos, 2, '.', ','); ?></td></tr>
                       <tr style="font-weight: 800;background-color: #FA4616;opacity: 0.7;color: #FFF;"><td>$ <?php echo number_format($ventaSemana1HombresIlustres, 2, '.', ','); ?></td></tr>

                     <tr style="font-weight: 800;"><td>$ <?php echo number_format($ventaSemana1Koala, 2, '.', ','); ?></td></tr>
                     <tr style="font-weight: 800;background-color: #FA4616;opacity: 0.7;color: #FFF;"><td>$ <?php echo number_format($ventaSemana1Merida, 2, '.', ','); ?></td></tr>
                     <tr style="font-weight: 800;"><td>$ <?php echo number_format($ventaSemana1Nexxus, 2, '.', ','); ?></td></tr>
                     <tr style="font-weight: 800;background-color: #FA4616;opacity: 0.7;color: #FFF;"><td>$ <?php echo number_format($ventaSemana1NuevoLaredo, 2, '.', ','); ?></td></tr>
                     <tr style="font-weight: 800;"><td>$ <?php echo number_format($ventaSemana1PuertadeHierro, 2, '.', ','); ?></td></tr>
                     <tr style="font-weight: 800;background-color: #FA4616;opacity: 0.7;color: #FFF;"><td>$ <?php echo number_format($ventaSemana1LasPuentes , 2, '.', ','); ?></td></tr>
                     <tr style="font-weight: 800;"><td>$ <?php echo number_format($ventaSemana1SantaLuz, 2, '.', ','); ?></td></tr>
                     <tr style="font-weight: 800;background-color: #FA4616;opacity: 0.7;color: #FFF;"><td>$ <?php echo number_format($ventaSemana1Sendero, 2, '.', ','); ?></td></tr>
                     <tr style="font-weight: 800;"><td>$ <?php echo number_format($ventaSemana1Tejeria, 2, '.', ','); ?></td></tr>
                     <tr style="font-weight: 800;background-color: #FA4616;opacity: 0.7;color: #FFF;"><td>$ <?php echo number_format($ventaSemana1VistaHermosa, 2, '.', ','); ?></td></tr>
                     <tr style="font-weight: 800;"><td>$ <?php echo number_format($ventaSemana1Huinala, 2, '.', ','); ?></td></tr>
    </tbody>
</table>
</div>

<div id="semana2" style="display: none;text-align: right;">
<table >
    <tbody>
                     <tr style="font-weight: 800;">
                      <td style="background-color: #500D76; color: #fff;width: 155px;height: 80px;">Semana 2<br>(<?php echo date("d-m-Y", strtotime($segundoLunes) ); ?><br>/ <?php echo date("d-m-Y", strtotime($segundoDomingo) ); ?>)</td>
                     </tr>
                      <tr style="font-weight: 800;"><td>$ <?php echo number_format($ventaSemana2Altabrisa, 2, '.', ','); ?></td></tr>

                     <tr style="font-weight: 800;background-color: #FA4616;opacity: 0.7;color: #FFF;"><td>$ <?php echo number_format($ventaSemana2Cuernavaca, 2, '.', ','); ?></td></tr>
                     <tr style="font-weight: 800;"><td>$ <?php echo number_format($ventaSemana2Estanzuela, 2, '.', ','); ?></td></tr>
                     <tr style="font-weight: 800;background-color: #FA4616;opacity: 0.7;color: #FFF;"><td>$ <?php echo number_format($ventaSemana2Fresnos, 2, '.', ','); ?></td></tr>
                     <tr style="font-weight: 800;background-color: #FA4616;opacity: 0.7;color: #FFF;"><td>$ <?php echo number_format($ventaSemana2HombresIlustres, 2, '.', ','); ?></td></tr>
                     <tr style="font-weight: 800;"><td>$ <?php echo number_format($ventaSemana2Koala, 2, '.', ','); ?></td></tr>
                     <tr style="font-weight: 800;background-color: #FA4616;opacity: 0.7;color: #FFF;"><td>$ <?php echo number_format($ventaSemana2Merida, 2, '.', ','); ?></td></tr>
                     <tr style="font-weight: 800;"><td>$ <?php echo number_format($ventaSemana2Nexxus, 2, '.', ','); ?></td></tr>
                     <tr style="font-weight: 800;background-color: #FA4616;opacity: 0.7;color: #FFF;"><td>$ <?php echo number_format($ventaSemana2NuevoLaredo, 2, '.', ','); ?></td></tr>
                     <tr style="font-weight: 800;"><td>$ <?php echo number_format($ventaSemana2PuertadeHierro, 2, '.', ','); ?></td></tr>
                     <tr style="font-weight: 800;background-color: #FA4616;opacity: 0.7;color: #FFF;"><td>$ <?php echo number_format($ventaSemana2LasPuentes , 2, '.', ','); ?></td></tr>
                     <tr style="font-weight: 800;"><td>$ <?php echo number_format($ventaSemana2SantaLuz, 2, '.', ','); ?></td></tr>
                     <tr style="font-weight: 800;background-color: #FA4616;opacity: 0.7;color: #FFF;"><td>$ <?php echo number_format($ventaSemana2Sendero, 2, '.', ','); ?></td></tr>
                     <tr style="font-weight: 800;"><td>$ <?php echo number_format($ventaSemana2Tejeria, 2, '.', ','); ?></td></tr>
                     <tr style="font-weight: 800;background-color: #FA4616;opacity: 0.7;color: #FFF;"><td>$ <?php echo number_format($ventaSemana2VistaHermosa, 2, '.', ','); ?></td></tr>
                    <tr style="font-weight: 800;"><td>$ <?php echo number_format($ventaSemana2Huinala, 2, '.', ','); ?></td></tr>
    </tbody>
</table>
</div>

<div id="semana3" style="display: none;text-align: right;">

<table >
    <tbody>
                     <tr style="font-weight: 800;">
                      <td style="background-color: #500D76; color: #fff;width: 155px;height: 80px;">Semana 3<br>(<?php echo date("d-m-Y", strtotime($tercerLunes) ); ?><br>/<?php echo date("d-m-Y", strtotime($tercerDomingo) ); ?>)</td>
                    </tr>
                     <tr style="font-weight: 800;"><td>$ <?php echo number_format($ventaSemana3Altabrisa, 2, '.', ','); ?></td></tr>

                    <tr style="font-weight: 800;background-color: #FA4616;opacity: 0.7;color: #FFF;"><td>$ <?php echo number_format($ventaSemana3Cuernavaca, 2, '.', ','); ?></td></tr>
                     <tr style="font-weight: 800;"><td>$ <?php echo number_format($ventaSemana3Estanzuela, 2, '.', ','); ?></td></tr>
                     <tr style="font-weight: 800;background-color: #FA4616;opacity: 0.7;color: #FFF;"><td>$ <?php echo number_format($ventaSemana3Fresnos, 2, '.', ','); ?></td></tr>
                     <tr style="font-weight: 800;background-color: #FA4616;opacity: 0.7;color: #FFF;"><td>$ <?php echo number_format($ventaSemana3HombresIlustres, 2, '.', ','); ?></td></tr>

                     <tr style="font-weight: 800;"><td>$ <?php echo number_format($ventaSemana3Koala, 2, '.', ','); ?></td></tr>
                     <tr style="font-weight: 800;background-color: #FA4616;opacity: 0.7;color: #FFF;"><td>$ <?php echo number_format($ventaSemana3Merida, 2, '.', ','); ?></td></tr>
                     <tr style="font-weight: 800;"><td>$ <?php echo number_format($ventaSemana3Nexxus, 2, '.', ','); ?></td></tr>
                     <tr style="font-weight: 800;background-color: #FA4616;opacity: 0.7;color: #FFF;"><td>$ <?php echo number_format($ventaSemana3NuevoLaredo, 2, '.', ','); ?></td></tr>
                     <tr style="font-weight: 800;"><td>$ <?php echo number_format($ventaSemana3PuertadeHierro, 2, '.', ','); ?></td></tr>
                     <tr style="font-weight: 800;background-color: #FA4616;opacity: 0.7;color: #FFF;"><td>$ <?php echo number_format($ventaSemana3LasPuentes , 2, '.', ','); ?></td></tr>
                     <tr style="font-weight: 800;"><td>$ <?php echo number_format($ventaSemana3SantaLuz, 2, '.', ','); ?></td></tr>
                     <tr style="font-weight: 800;background-color: #FA4616;opacity: 0.7;color: #FFF;"><td>$ <?php echo number_format($ventaSemana3Sendero, 2, '.', ','); ?></td></tr>
                     <tr style="font-weight: 800;"><td>$ <?php echo number_format($ventaSemana3Tejeria, 2, '.', ','); ?></td></tr>
                     <tr style="font-weight: 800;background-color: #FA4616;opacity: 0.7;color: #FFF;"><td>$ <?php echo number_format($ventaSemana3VistaHermosa, 2, '.', ','); ?></td></tr>
                     <tr style="font-weight: 800;"><td>$ <?php echo number_format($ventaSemana3Huinala, 2, '.', ','); ?></td></tr>
    </tbody>
</table>
</div>
<div id="semana4" style="display: none;text-align: right;">

<table >
    <tbody>
                     <tr style="font-weight: 800;">

                      <td style="background-color: #500D76; color: #fff;width: 155px;height: 80px;">Semana 4<br>(<?php echo date("d-m-Y", strtotime($cuartoLunes) ); ?><br>/<?php echo date("d-m-Y", strtotime($cuartoDomingo) ); ?>)</td>
                    </tr>
                      
                      <tr style="font-weight: 800;"><td>$ <?php echo number_format($ventaSemana4Altabrisa, 2, '.', ','); ?></td></tr>

                     <tr style="font-weight: 800;background-color: #FA4616;opacity: 0.7;color: #FFF;"><td>$ <?php echo number_format($ventaSemana4Cuernavaca, 2, '.', ','); ?></td></tr>
                     <tr style="font-weight: 800;"><td>$ <?php echo number_format($ventaSemana4Estanzuela, 2, '.', ','); ?></td></tr>
                     <tr style="font-weight: 800;background-color: #FA4616;opacity: 0.7;color: #FFF;"><td>$ <?php echo number_format($ventaSemana4Fresnos, 2, '.', ','); ?></td></tr>
                      <tr style="font-weight: 800;background-color: #FA4616;opacity: 0.7;color: #FFF;"><td>$ <?php echo number_format($ventaSemana4HombresIlustres, 2, '.', ','); ?></td></tr>

                     <tr style="font-weight: 800;"><td>$ <?php echo number_format($ventaSemana4Koala, 2, '.', ','); ?></td></tr>
                     <tr style="font-weight: 800;background-color: #FA4616;opacity: 0.7;color: #FFF;"><td>$ <?php echo number_format($ventaSemana4Merida, 2, '.', ','); ?></td></tr>
                     <tr style="font-weight: 800;"><td>$ <?php echo number_format($ventaSemana4Nexxus, 2, '.', ','); ?></td></tr>
                     <tr style="font-weight: 800;background-color: #FA4616;opacity: 0.7;color: #FFF;"><td>$ <?php echo number_format($ventaSemana4NuevoLaredo, 2, '.', ','); ?></td></tr>
                     <tr style="font-weight: 800;"><td>$ <?php echo number_format($ventaSemana4PuertadeHierro, 2, '.', ','); ?></td></tr>
                     <tr style="font-weight: 800;background-color: #FA4616;opacity: 0.7;color: #FFF;"><td>$ <?php echo number_format($ventaSemana4LasPuentes , 2, '.', ','); ?></td></tr>
                     <tr style="font-weight: 800;"><td>$ <?php echo number_format($ventaSemana4SantaLuz, 2, '.', ','); ?></td></tr>
                     <tr style="font-weight: 800;background-color: #FA4616;opacity: 0.7;color: #FFF;"><td>$ <?php echo number_format($ventaSemana4Sendero, 2, '.', ','); ?></td></tr>
                     <tr style="font-weight: 800;"><td>$ <?php echo number_format($ventaSemana4Tejeria, 2, '.', ','); ?></td></tr>
                     <tr style="font-weight: 800;background-color: #FA4616;opacity: 0.7;color: #FFF;"><td>$ <?php echo number_format($ventaSemana4VistaHermosa, 2, '.', ','); ?></td></tr>
                     <tr style="font-weight: 800;"><td>$ <?php echo number_format($ventaSemana4Huinala, 2, '.', ','); ?></td></tr>
    </tbody>
</table>
</div>

<div id="semana5" style="display: none;text-align: right;">

<table>
    <tbody>
                     <tr style="font-weight: 800;">
                      <td style="background-color: #500D76; color: #fff;width: 155px;height: 80px;">Semana 5<br>(<?php echo date("d-m-Y", strtotime($quintoLunes) ); ?> <br>/<?php echo date("d-m-Y", strtotime($quintoDomingo) ); ?>)</td>
                    </tr>
                    <tr style="font-weight: 800;"><td>$ <?php echo number_format($ventaSemana5Altabrisa, 2, '.', ','); ?></td></tr>
                     <tr style="font-weight: 800;background-color: #FA4616;opacity: 0.7;color: #FFF;"><td>$ <?php echo number_format($ventaSemana5Cuernavaca, 2, '.', ','); ?></td></tr>
                     <tr style="font-weight: 800;"><td>$ <?php echo number_format($ventaSemana5Estanzuela, 2, '.', ','); ?></td></tr>
                     <tr style="font-weight: 800;background-color: #FA4616;opacity: 0.7;color: #FFF;"><td>$ <?php echo number_format($ventaSemana5Fresnos, 2, '.', ','); ?></td></tr>
                      <tr style="font-weight: 800;background-color: #FA4616;opacity: 0.7;color: #FFF;"><td>$ <?php echo number_format($ventaSemana5HombresIlustres, 2, '.', ','); ?></td></tr>

                     <tr style="font-weight: 800;"><td>$ <?php echo number_format($ventaSemana5Koala, 2, '.', ','); ?></td></tr>
                     <tr style="font-weight: 800;background-color: #FA4616;opacity: 0.7;color: #FFF;"><td>$ <?php echo number_format($ventaSemana5Merida, 2, '.', ','); ?></td></tr>
                     <tr style="font-weight: 800;"><td>$ <?php echo number_format($ventaSemana5Nexxus, 2, '.', ','); ?></td></tr>
                     <tr style="font-weight: 800;background-color: #FA4616;opacity: 0.7;color: #FFF;"><td>$ <?php echo number_format($ventaSemana5NuevoLaredo, 2, '.', ','); ?></td></tr>
                     <tr style="font-weight: 800;"><td>$ <?php echo number_format($ventaSemana5PuertadeHierro, 2, '.', ','); ?></td></tr>
                     <tr style="font-weight: 800;background-color: #FA4616;opacity: 0.7;color: #FFF;"><td>$ <?php echo number_format($ventaSemana5LasPuentes , 2, '.', ','); ?></td></tr>
                     <tr style="font-weight: 800;"><td>$ <?php echo number_format($ventaSemana5SantaLuz, 2, '.', ','); ?></td></tr>
                     <tr style="font-weight: 800;background-color: #FA4616;opacity: 0.7;color: #FFF;"><td>$ <?php echo number_format($ventaSemana5Sendero, 2, '.', ','); ?></td></tr>
                     <tr style="font-weight: 800;"><td>$ <?php echo number_format($ventaSemana5Tejeria, 2, '.', ','); ?></td></tr>
                     <tr style="font-weight: 800;background-color: #FA4616;opacity: 0.7;color: #FFF;"><td>$ <?php echo number_format($ventaSemana5VistaHermosa, 2, '.', ','); ?></td></tr>
                     <tr style="font-weight: 800;"><td>$ <?php echo number_format($ventaSemana5Huinala, 2, '.', ','); ?></td></tr>
    </tbody>
</table>
</div>
<div id="masSemanas" style="text-align: right;">
<table >
    <tbody>
                     <tr style="font-weight: 800;">
                      <td style="background-color: #500D76; color: #fff;width: 155px;height: 80px;">Total de Semanas<br>(<?php echo date("d-m-Y", strtotime($firstDay) ); ?> <br>/<?php echo date("d-m-Y", strtotime($lastDay) ); ?>)</td>
                    </tr>
                     <tr style="font-weight: 800;"><td>$ <?php echo number_format($ventaSemanaTAltabrisa, 2, '.', ','); ?></td></tr>


                     <tr style="font-weight: 800;background-color: #FA4616;opacity: 0.7;color: #FFF;"><td>$ <?php echo number_format($ventaSemanaTCuernavaca, 2, '.', ','); ?></td></tr>
                     <tr style="font-weight: 800;"><td>$ <?php echo number_format($ventaSemanaTEstanzuela, 2, '.', ','); ?></td></tr>
                     <tr style="font-weight: 800;background-color: #FA4616;opacity: 0.7;color: #FFF;"><td>$ <?php echo number_format($ventaSemanaTFresnos, 2, '.', ','); ?></td></tr>
                     <tr style="font-weight: 800;background-color: #FA4616;opacity: 0.7;color: #FFF;"><td>$ <?php echo number_format($ventaSemanaTHombresIlustres, 2, '.', ','); ?></td></tr>

                     <tr style="font-weight: 800;"><td>$ <?php echo number_format($ventaSemanaTKoala, 2, '.', ','); ?></td></tr>
                     <tr style="font-weight: 800;background-color: #FA4616;opacity: 0.7;color: #FFF;"><td>$ <?php echo number_format($ventaSemanaTMerida, 2, '.', ','); ?></td></tr>
                     <tr style="font-weight: 800;"><td>$ <?php echo number_format($ventaSemanaTNexxus, 2, '.', ','); ?></td></tr>
                     <tr style="font-weight: 800;background-color: #FA4616;opacity: 0.7;color: #FFF;"><td>$ <?php echo number_format($ventaSemanaTNuevoLaredo, 2, '.', ','); ?></td></tr>
                     <tr style="font-weight: 800;"><td>$ <?php echo number_format($ventaSemanaTPuertadeHierro, 2, '.', ','); ?></td></tr>
                     <tr style="font-weight: 800;background-color: #FA4616;opacity: 0.7;color: #FFF;"><td>$ <?php echo number_format($ventaSemanaTLasPuentes , 2, '.', ','); ?></td></tr>
                     <tr style="font-weight: 800;"><td>$ <?php echo number_format($ventaSemanaTSantaLuz, 2, '.', ','); ?></td></tr>
                     <tr style="font-weight: 800;background-color: #FA4616;opacity: 0.7;color: #FFF;"><td>$ <?php echo number_format($ventaSemanaTSendero, 2, '.', ','); ?></td></tr>
                     <tr style="font-weight: 800;"><td>$ <?php echo number_format($ventaSemanaTTejeria, 2, '.', ','); ?></td></tr>
                     <tr style="font-weight: 800;background-color: #FA4616;opacity: 0.7;color: #FFF;"><td>$ <?php echo number_format($ventaSemanaTVistaHermosa, 2, '.', ','); ?></td></tr>
                     <tr style="font-weight: 800;"><td>$ <?php echo number_format($ventaSemanaTHuinala, 2, '.', ','); ?></td></tr>
    </tbody>
</table>
</div>

<!---
<div style="text-align: right;">
<table >
    <tbody>
                     <tr style="font-weight: 800;">
                      <td style="background-color: #500D76; color: #fff;width: 155px;height: 80px;">Total Hoy<br><?php echo date("d-m-Y", strtotime($hoy) ); ?> <br></td>
                    </tr>
                    <tr style="font-weight: 800;"><td>$ <?php echo number_format($ventaHoyAltabrisa, 2, '.', ','); ?></td></tr>


                     <tr style="font-weight: 800;background-color: #FA4616;opacity: 0.7;color: #FFF;"><td>$ <?php echo number_format($ventaHoyCuernavaca, 2, '.', ','); ?></td></tr>
                     <tr style="font-weight: 800;"><td>$ <?php echo number_format($ventaHoyEstanzuela, 2, '.', ','); ?></td></tr>
                     <tr style="font-weight: 800;background-color: #FA4616;opacity: 0.7;color: #FFF;"><td>$ <?php echo number_format($ventaHoyFresnos, 2, '.', ','); ?></td></tr>
                     <tr style="font-weight: 800;"><td>$ <?php echo number_format($ventaHoyKoala, 2, '.', ','); ?></td></tr>
                     <tr style="font-weight: 800;background-color: #FA4616;opacity: 0.7;color: #FFF;"><td>$ <?php echo number_format($ventaHoyMerida, 2, '.', ','); ?></td></tr>
                     <tr style="font-weight: 800;"><td>$ <?php echo number_format($ventaHoyNexxus, 2, '.', ','); ?></td></tr>
                     <tr style="font-weight: 800;background-color: #FA4616;opacity: 0.7;color: #FFF;"><td>$ <?php echo number_format($ventaHoyNuevoLaredo, 2, '.', ','); ?></td></tr>
                     <tr style="font-weight: 800;"><td>$ <?php echo number_format($ventaHoyPuertadeHierro, 2, '.', ','); ?></td></tr>
                     <tr style="font-weight: 800;background-color: #FA4616;opacity: 0.7;color: #FFF;"><td>$ <?php echo number_format($ventaHoyLasPuentes , 2, '.', ','); ?></td></tr>
                     <tr style="font-weight: 800;"><td>$ <?php echo number_format($ventaHoySantaLuz, 2, '.', ','); ?></td></tr>
                     <tr style="font-weight: 800;background-color: #FA4616;opacity: 0.7;color: #FFF;"><td>$ <?php echo number_format($ventaHoySendero, 2, '.', ','); ?></td></tr>
                     <tr style="font-weight: 800;"><td>$ <?php echo number_format($ventaHoyTejeria, 2, '.', ','); ?></td></tr>
                     <tr style="font-weight: 800;background-color: #FA4616;opacity: 0.7;color: #FFF;"><td>$ <?php echo number_format($ventaHoyVistaHermosa, 2, '.', ','); ?></td></tr>
                     <tr style="font-weight: 800;"><td>$ <?php echo number_format($ventaHoyHuinala, 2, '.', ','); ?></td></tr>
    </tbody>
</table>
</div>

---->


</div>



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
           /*
if (floor ($semanas) > 4){
             ?>    <script type="text/javascript">
                    document.getElementById('masSemanas').style.display = 'revert';
                  </script>
             <?php  } 
             */
             ?>  


<?php
include'../includes/footer.php';
?>
