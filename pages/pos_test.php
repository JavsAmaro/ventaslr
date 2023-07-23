  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
  <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
  <?php
  include'../includes/connection.php';
  ?>

<style>
.menu-sucursales{
    width: 18%;
    color: #FA4613;
    /* background-color: #E6E6E6; */
    padding-right: 15px!important;

    font-size: 30px;
    font-weight: 900;
    font-family: sans-serif;
}
.nav-tabs {
    border-bottom: 1px solid #ddd;
    place-content: center;
}

.nav>li>a:focus, .nav>li>a:hover {
  color: #fff!important;
    text-decoration: none;
    background-color: #551088;
}

.h4, h4 {
    font-size: 1.5rem!important;
}
.menu-sucursales:focus{
width: 18%;
    color: #fff;
    background-color:#fa4617;
    margin: 0 7px;

}

.show {
     display: contents!important;
}
.btn-info {
    color: #fff;
    background-color: #fa4617 !important;
    border-color: #fa4617 !important;
}
.btn-info:hover {
    color: #fff;
    background-color: red !important;
    border-color: red !important;
}

 a {
    color: black !important;
    text-decoration: none;
}

.modal a {
    color: #fff !important;
    text-decoration: none;
    color: #fff;
}

.modal a:hover {
    color: #fff !important;
    text-decoration: none;
    background-color: red!important;
    border-color: red!important;
}


a:hover {
    /* color: red !important; */
    text-decoration: none;
    color: red!important;
}

.level1 a {
    color: #fff !important;
    text-decoration: none;
}
.level1 li {
height: auto;

}
.level1 a:hover  {
    color: #fff !important;
    text-decoration: none;
    background-color: #fa4617;
}

.level1 a:focus  {
    color: #fff !important;
    text-decoration: none;
    background-color: #fa4617;
}

.a:active  {
    color: #fff !important;
    text-decoration: none;
    background-color: #fa4617;
}


.btn-primary {
    color: #fff;
    background-color:#5cb85c !important;
    border-color: #5cb85c !important;
}


li.level1 {
    font-size: 20px;
    list-style-type: none;
    margin: 5px;
    background-color: #500D76;
    color: #fff;
    width: 150px;
    text-align: -webkit-center;
    height: 40px;
    /* margin: auto; */
    vertical-align: middle;
}

li.level1:hover {
 
    background-color: #FA4616!important;

}




.nav-tabs>li>a:hover {
    background-color: #fa4617!important;
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
li.current {
    color: #fff !important;
    text-decoration: none;
    background-color: #FA4616!important;}

.nav>li>a:focus, .nav>li>a:hover {
    text-decoration: none;
    background-color: #FA4616!important;
}

.nav-tabs>li>a:hover {
   border-color: #FA4616!important;
}

.center{
font: 100% open sans, sans-serif;
margin:0;
padding:0;
}
#sucursal{
display:block;
}

#didi{
display:none;


}

#uber{
display:none;


}
#rappi{
display:none;
}
</style>

  <?php    

   date_default_timezone_set('America/Mexico_City');

$script_tz = date_default_timezone_get();
            $today = date("Y-m-d"); 
  $ayer =date($today,strtotime("-1 days"));//////dia anterior
            
            $manana =date($today,strtotime("+1 days"));//////dia anterior
             $caja=0;
              $ingreso=0;
              $compras=0;
              $gastos=0;
              $retiro=0;
              $corte =0;
              $pagos=0;
              $retiro=0;
              $cancelacion=0;
            $ventaDia =0;
              $retiro=0;
              $efectivo=1;
              $trajeta=2;
              $PagoEfectivo=0;
              $PagoTarjeta=0;
              $total=0;

              $salidaEfectivo=0;
              $Totalcaja=0;
              $totalcajas=0;
              $cajas_stock=0;
?> 

<?php

include'../includes/topp.php';
// session_start();
$product_ids = array();
//session_destroy();

//check if Add to Cart button has been submitted
if(filter_input(INPUT_POST, 'addpos')){
    if(isset($_SESSION['pointofsale'])){
        
        //keep track of how mnay products are in the shopping cart
        $count = count($_SESSION['pointofsale']);
        
        //create sequantial array for matching array keys to products id's
        $product_ids = array_column($_SESSION['pointofsale'], 'id');

        if (!in_array(filter_input(INPUT_GET, 'id'), $product_ids)){
        $_SESSION['pointofsale'][$count] = array
            (
                'id' => filter_input(INPUT_GET, 'id'),
                'name' => filter_input(INPUT_POST, 'name'),
                'price' => filter_input(INPUT_POST, 'price'),

                'ingrediente1' => filter_input(INPUT_POST, 'ingrediente1'),
                'ingrediente2' => filter_input(INPUT_POST, 'ingrediente2'),

                'category_id' => filter_input(INPUT_POST, 'category_id'),
                'description' => filter_input(INPUT_POST, 'description'),

                'quantity' => filter_input(INPUT_POST, 'quantity'),
                'cant_cajas' => filter_input(INPUT_POST, 'cant_cajas')

            );   
        }
        else { //product already exists, increase quantity
            //match array key to id of the product being added to the cart
            for ($i = 0; $i < count($product_ids); $i++){
                if ($product_ids[$i] == filter_input(INPUT_GET, 'id')){
                    //add item quantity to the existing product in the array
                    $_SESSION['pointofsale'][$i]['quantity'] += filter_input(INPUT_POST, 'quantity');
                    //$_SESSION['pointofsale'][$i]['cant_cajas'] += filter_input(INPUT_POST, 'cant_cajas');
                }
            }
        }
        
    }
    else { //if shopping cart doesn't exist, create first product with array key 0
        //create array using submitted form data, start from key 0 and fill it with values
        $_SESSION['pointofsale'][0] = array
        (
            'id' => filter_input(INPUT_GET, 'id'),
            'name' => filter_input(INPUT_POST, 'name'),
            'price' => filter_input(INPUT_POST, 'price'),

            'ingrediente1' => filter_input(INPUT_POST, 'ingrediente1'),
            'ingrediente2' => filter_input(INPUT_POST, 'ingrediente2'),

            'category_id' => filter_input(INPUT_POST, 'category_id'),
            'description' => filter_input(INPUT_POST, 'description'),

            'quantity' => filter_input(INPUT_POST, 'quantity'),
            'cant_cajas' => filter_input(INPUT_POST, 'cant_cajas')

        );
    }
}

if(filter_input(INPUT_GET, 'action') == 'delete'){
    //loop through all products in the shopping cart until it matches with GET id variable
    foreach($_SESSION['pointofsale'] as $key => $product){
        if ($product['id'] == filter_input(INPUT_GET, 'id')){
            //remove product from the shopping cart when it matches with the GET id
            unset($_SESSION['pointofsale'][$key]);
        }
    }
    //reset session array keys so they match with $product_ids numeric array
    $_SESSION['pointofsale'] = array_values($_SESSION['pointofsale']);
}
                    $query = "SELECT * FROM transaction WHERE date(DATE)  LIKE '{$today}%' AND CITY  LIKE '{$_SESSION['CITY']}%' ";

                       $result = mysqli_query($db, $query) or die (mysqli_error($db));
                      while ($row = mysqli_fetch_assoc($result)) {

       /*     
       if ($tipo == 1){
        $ingreso +=  $row['TIPO'];
        }
 if (($tipo == 2)||( $tipo == 3)){
        $retiro +=  $row['TIPO'];
        }*/

$ventaDia +=  $row['GRANDTOTAL']/**$row['NUMOFITEMS']*/;

                 /* $ventaDia += $row['GRANDTOTAL'];*/
                      }

pre_r($_SESSION);


function pre_r($array){
    echo '<pre>';
    print_r($array);
    echo '</pre>';

}
                ?>

<?php    
                      $query = "SELECT * FROM transaction WHERE date(DATE)  LIKE '{$today}%' AND METODO_PAGO LIKE '{$efectivo}%' AND CITY  LIKE '{$_SESSION['CITY']}%' ";
                      $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
                      while ($row = mysqli_fetch_assoc($result)) {
         $PagoEfectivo +=  $row['GRANDTOTAL'];

                      }
          ?>
        <?php    
                      $query = "SELECT * FROM transaction WHERE date(DATE)  LIKE '{$today}%' AND METODO_PAGO LIKE '{$trajeta}%' AND CITY  LIKE '{$_SESSION['CITY']}%' ";
                      $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
                      while ($row = mysqli_fetch_assoc($result)) {
         $PagoTarjeta +=  $row['GRANDTOTAL'];

                      }
          ?>

<?php  

       $query = "SELECT * FROM cortes WHERE date(DATE)  LIKE '{$manana}%' AND CITY  LIKE '{$_SESSION['CITY']}%'";
       $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
        while ($row = mysqli_fetch_assoc($result)) {

           if ($row['TIPO'] == 4){
      $Totalcaja +=  $row['MONTO'];
        }
         }
     ?>
     
           <?php                  
                      $query = "SELECT PROVEEDOR, DESCRIPCION, SUM(MONTO) as MONTO_TC FROM cortes
                      INNER JOIN supplier WHERE supplier.COMPANY_NAME = cortes.PROVEEDOR AND date(DATE) LIKE '{$today}%' AND TIPO LIKE '2' AND supplier.TYPE LIKE '1' AND  cortes.CITY  LIKE '{$_SESSION['CITY']}%' GROUP BY supplier.COMPANY_NAME";
                      $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
                      while ($row = mysqli_fetch_assoc($result)) {
     
                            $compras +=  $row['MONTO_TC'];

                      }
                    ?>
                    
<?php  

       $query = "SELECT * FROM cortes WHERE date(DATE)  LIKE '{$today}%' AND CITY  LIKE '{$_SESSION['CITY']}%'";
       $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
        while ($row = mysqli_fetch_assoc($result)) {
         
 if ($row['TIPO'] == 1){
        $ingreso +=  $row['MONTO'];
        }
/*
         if ($row['TIPO'] == 2){
        $compras +=  $row['MONTO'];
        }*/
         if ($row['TIPO'] == 3){
        $retiro +=  $row['MONTO'];
        }
 if ($row['TIPO'] == 4){
        $corte +=  $row['MONTO'];
        }




         }

     ?>


     <?php    
     /*
                      $query = "SELECT * FROM product WHERE NAME LIKE 'cajas' AND CITY  LIKE '{$_SESSION['CITY']}%' ";
                      $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
                      while ($row = mysqli_fetch_assoc($result)) {
         $cajas_stock +=  $row['QTY_STOCK'];

                      }*/
          ?>
    <?php    
    // CAJAS EN STOCK
                      $query = "SELECT * FROM almacen WHERE NAME LIKE 'CAJA' AND CITY  LIKE '{$_SESSION['CITY']}%' ";
                      $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
                      while ($row = mysqli_fetch_assoc($result)) {
         $cajas_stock +=  $row['QTY_STOCK'];

                      }
          ?>



      <?php  

        $fondo=$ingreso;

$salidaEfectivo=$retiro+$compras;

//$caja =  ($fondo+$PagoEfectivo)-($salidaEfectivo);
$caja=$PagoEfectivo+$fondo+$corte-$retiro-$compras;
$totalcorte=$caja-$Totalcaja;
$fondoInicial=$corte;

        ?>

             <div class="card shadow mb-4">
            <div class="card-header shadow py-3">

               
           

                 




<?php

/* <div class="col-12" style="text-align: center;">
                     <span class="m-3 font-weight-bold " style="color: #858796;font-size: 16px;    font-weight: 500 !important;">
                        Sucursal <?php echo  $_SESSION['CITY'];?> </span> </div> */
                        
?>
<?php
include 'cantidades.php';               
?>

              

              

                    <!-- <span class="m-2 font-weight-bold " style="color: #858796;font-size: 16px;font-weight: 500 !important;
"> Cajas en Stock &nbsp; <?php 
//CAJAS EN STOCK
 if(($cajas_stock < "500")&&($cajas_stock >= "250"))
                           {
                             echo '<span class="text-warning">'. $cajas_stock.'</span>';
                           }if($cajas_stock >= "500")
                           {
                             echo '<span class="text-success">'. $cajas_stock.'</span>';
                           } if($cajas_stock < "250")
                           {
                             echo '<span class="text-danger">'. $cajas_stock.'</span>';
                           } 
                           ?>
                           pza
              </span>?> -->

        



<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <div class="card shadow mb-4">
 <div class="card-header py-3">
<div class="container hidden">
<nav>
  <ul class="nav nav-tabs nav-pills" style="display: flex; justify-content: center;" id="myTab">
   <li class="level1 nav-item" style="height: auto;" onclick="portSucursal();">
    <input type="hidden" value="1"  />
    <a href="#" class="level1"  data-toggle="tab"  onclick="Download(this);save();" >
      Sucursal
    </a>
    </li>
   
      <li class="level1 nav-item" style="height: auto;" onclick="DIDIFunction();" >
         <input type="hidden" value="2" />

       <a href="#" class="level1"  data-toggle="tab" onclick="Download(this);save();" >
       DIDI
    </a>
    </li>
   <li class="level1 nav-item" style="height: auto;" onclick="UberFunction();">
      <input type="hidden" value="3" />
    <a href="#" class="level1"  data-toggle="tab" onclick="Download(this);save();">
      Uber
    </a>
    </li>
    <!--
     <li class="level1 nav-item" style="height: auto;" onclick="SDFunction();">
        <input type="hidden" value="4"  />

      <a href="#" class="level1"  data-toggle="tab" onclick="Download(this);save();">
      Sin Delantal
    </a>
    </li>-->

      <li class="level1 nav-item" style="height: auto;" onclick="RappiFunction();">
          <input type="hidden" value="5" />
          <a href="#" class="level1"  data-toggle="tab" onclick="Download(this);save();">
          Rappi
    </a>
</li>
  </ul>
</nav>
</div>

<div class="tab-content hidden">

  <div id="sucursal">
    
      <ul class="nav nav-tabs">
                              <li class="nav-item ">
                                <a class="nav-link " href="#individuales" data-toggle="tab">Pizza Individual</a>
                              </li>
                              <li class="nav-item ">
                                <a class="nav-link active show" href="#siempre_Listas" data-toggle="tab">Pizzas</a>
                              </li>

                              <li class="nav-item">
                                <a class="nav-link" href="#" data-target="#promos" data-toggle="tab">Promos</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#" data-target="#aderezo" data-toggle="tab">Aderezo</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#bebidas" data-toggle="tab">Bebidas</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#combos" data-toggle="tab">Combos</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#complementos" data-toggle="tab">Complementos</a>
                              </li>
                            
                               <li class="nav-item">
                                <a class="nav-link" href="#otros" data-toggle="tab">Otros</a>
                              </li>
                            </ul>
    </div>



    <div id="didi">
      <ul class="nav nav-tabs">

                              <li class="nav-item ">
                                <a class="nav-link" href="#didi_individuales" data-toggle="tab" aria-expanded="true">DIDI Pizzas Individual</a>
                              </li>

                              <li class="nav-item ">
                                <a class="nav-link" href="#didi_siempre_Listas" data-toggle="tab" aria-expanded="true">DIDI Pizzas</a>
                              </li>

                              <li class="nav-item">
                                <a class="nav-link" href="#" data-target="#didi_promos" data-toggle="tab"> DIDI Promos</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#" data-target="#didi_aderezo" data-toggle="tab">DIDI Aderezo</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#didi_bebidas" data-toggle="tab">DIDI Bebidas</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#didi_combos" data-toggle="tab">DIDI Combos</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#didi_complementos" data-toggle="tab">DIDI Complementos</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#didi_otros" data-toggle="tab">DIDI Otros</a>
                              </li>
              
    </ul>
  </div>

 <div id="uber">
     <ul class="nav nav-tabs">

                             
                              <li class="nav-item ">
                                <a class="nav-link" href="#uber_individuales" data-toggle="tab" aria-expanded="true">UBER Pizza Individual</a>
                              </li>
                              <li class="nav-item ">
                                <a class="nav-link" href="#uber_siempre_listas" data-toggle="tab" aria-expanded="true">UBER Pizzas</a>
                              </li>

                              <li class="nav-item">
                                <a class="nav-link" href="#" data-target="#uber_promos" data-toggle="tab"> UBER Promos</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#" data-target="#uber_aderezo" data-toggle="tab">UBER Aderezo</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#uber_bebidas" data-toggle="tab">UBER Bebidas</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#uber_combos" data-toggle="tab">UBER Combos</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#uber_complementos" data-toggle="tab">UBER Complementos</a>
                              </li>
                                <li class="nav-item">
                                <a class="nav-link" href="#uber_otros" data-toggle="tab">UBER Otros</a>
                              </li>

    </ul>
  </div>


   <div id="rappi">
      <ul class="nav nav-tabs">

                            <li class="nav-item ">
                                <a class="nav-link" href="#rappi_individuales" data-toggle="tab" aria-expanded="true">Rappi Pizza Indivual</a>
                              </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="#rappi_siempre_listas" data-toggle="tab" aria-expanded="true">Rappi Pizzas</a>
                              </li>

                              <li class="nav-item">
                                <a class="nav-link" href="#" data-target="#rappi_promos" data-toggle="tab"> Rappi Promos</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#" data-target="#rappi_aderezo" data-toggle="tab">Rappi Aderezo</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#rappi_bebidas" data-toggle="tab">Rappi Bebidas</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#rappi_combos" data-toggle="tab">Rappi Combos</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#rappi_complementos" data-toggle="tab">Rappi Complementos</a>
                              </li>
                                <li class="nav-item">
                                <a class="nav-link" href="#rappi_otros" data-toggle="tab">Rappi Otros</a>
                              </li>
           </ul>
  </div>

</div>
  </div> 

</div>



<script type="text/javascript">
/*var intermediario= document.getElementById('intermediario');*/
function Download(el) {

    document.getElementById('intermediario').value=($(el).siblings("input").val());  

 alert($(el).siblings("input").val());
}

var Rename = Download;



var selectedvalue = ''; 
var lasValue = 0;
  var lastCalled = null;

function callLastFunc(arg) {
  if (arg[0])
    return;

  if (lastCalled)
    lastCalled("byCallPrev");
  lastCalled = arg.callee;
}

function portSucursal() {
  var e = document.getElementById("sucursal").style;
	// alert(e);
  if(!e.display | e.display == "none"){
    e.display = "block";
//     document.getElementById('intermediario').value='1';  
       }
else{
  e.display = "none";
  }
  callLastFunc(arguments);
}
function DIDIFunction() {

  var e = document.getElementById("didi").style;
  if(!e.display | e.display == "none"){
    e.display = "block";
document.getElementById("sucursal").style.display = "none";

//   document.getElementById('intermediario').value='2';


  }
else{
  e.display = "none";
  }
  callLastFunc(arguments);
}

function UberFunction() {
  var e = document.getElementById("uber").style;
  if(!e.display | e.display == "none"){
    e.display = "block";
  //  document.getElementById('intermediario').value='3';
document.getElementById("sucursal").style.display = "none";

  }
else{
  e.display = "none";
  }
  callLastFunc(arguments);
}

function RappiFunction() {
  var e = document.getElementById("rappi").style;
  if(!e.display | e.display == "none"){
    e.display = "block";
    document.getElementById("sucursal").style.display = "none";

  //  document.getElementById('intermediario').value='5';

  }
else{
  e.display = "none";
  }
  callLastFunc(arguments);
}

$(document).ready(function(){
	// alert("tabs");
    $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
        localStorage.setItem('activeTab', $(e.target).attr('href'));

    });
	// alert("tabs 2");
    var activeTab = localStorage.getItem('activeTab');
    if(activeTab){
        $('#myTab a[href="' + activeTab + '"]').tab('show');
    }
	// alert("tabs 3");
});





$(function() {
	// alert("tabs 4");
  var lastTab = localStorage.getItem('lastTab');
  $('.container, .tab-content').removeClass('hidden');
  if (lastTab) {
    $('[data-target="' + lastTab + '"]').tab('show');
  }
  $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
    localStorage.setItem('lastTab', $(this).data('target'));
  });
  // alert("tabs 5");
});

</script>



  <script>  
//var intermediario= document.getElementById('intermediario');

var selectedvalue = ''; 

alert("popoin 1");
for(var i = 0; i < document.getElementsByClassName('box').length; i++ ) {
    var d = document.getElementsByClassName('box')[i];
    d.onclick = function (e) {    
       selectedvalue = this.text;
       this.className = this.className + " active";


    }
}

alert("popoin 2");

    var $j = jQuery.noConflict();
    $j(function() {
      $j('li.level1').click(function() {
            $j("li.level1").addClass('inactive').removeClass("current");
        $j(this).addClass('current').removeClass('inactive');
        $j('ul#level2').hide();
        $j('ul#level2', this).show();
              var parent = $j(this).parent().attr('id');
              localStorage.setItem('activeIndex', $j(this).index());
      });
            var currentIndex = localStorage.getItem('activeIndex');     $j('li.level1').eq(currentIndex).addClass('current').removeClass('inactive');
            $j('li.level1').eq(currentIndex).children('ul').css('display','block');
});

// alert("popoin 3");
</script>
           
<?php include 'postabpane.php'; ?>
            <div class="card-header py-3">

        <div style="clear:both"></div>  
        <div class="card shadow mb-4 col-md-12">

        <div class="card-header py-3 bg-white">

          <h4 class="m-2 font-weight-bold text-primary">Punto de Venta</h4>
  <script type="text/javascript">
var saveValue;
function load(){
	// alert("load 1");
saveValue = localStorage.getItem("saveValue");
document.getElementById("intermediario").value = saveValue;
// alert("load 2");
};
function save(){
	// alert("save 1");
saveValue = document.getElementById("intermediario").value;
localStorage.setItem("saveValue", saveValue);
// alert("save 2");
};

alert("popoing4");
document.getElementById("clear").onclick = clear_me;

function clear_me() {
	// alert("clear me 1");
    localStorage.clear();
    checkStorage();
	// alert("clear me 2");
}
</script>
        </div>
        
      <div class="row">    
      <div class="card-body col-md-8">
        <div class="table-responsive">

        <!-- trial form lang   -->
<form role="form" name="frm" method="post" action="pos_transac.php?action=add">
  <input type="hidden" name="employee" value="<?php echo $_SESSION['FIRST_NAME']; ?>">
  <input type="hidden" name="role" value="<?php echo $_SESSION['JOB_TITLE']; ?>">
  
        <table class="table" style="font-size: small;">    
        <tr>  
             <th width="25%">Nombre del producto </th>  
             <th width="10%">Ingrediente 1 </th>  
             <th width="10%">Ingrediente 2 </th>  
          

             <th width="5%">Cantidad</th> 
             <th width="5%">Cajas</th>  
             <th width="20%">Precio</th>  
             <th width="25%">Total</th>  

             <th width="5%">Accion</th>  
        </tr>  
        <?php  

        if(!empty($_SESSION['pointofsale'])):  
            
             $total = 0;  
        
             foreach($_SESSION['pointofsale'] as $key => $product): 
        ?>  
        <tr>  
          <td><!--Nombre-->
            <input type="hidden" name="name[]" value="<?php echo $product['name']; ?>">
            <?php echo $product['name']; ?>
          </td>  
              <!-- AQUI VA EL ingrediente-->
              <td>
            <input type="hidden" name="ingrediente1[]" value="<?php echo $product['ingrediente1']; ?>">
           <?php echo $product['ingrediente1']; ?>
          </td>  
    <!-- AQUI VA EL ingrediente-->
            <td>
            <input type="hidden" name="ingrediente2[]" value="<?php echo $product['ingrediente2']; ?>">
           <?php echo $product['ingrediente2']; ?>
          </td>  


           <td><!--cantidad-->
            <input type="hidden" name="quantity[]" value="<?php echo $product['quantity']; ?>">
            <?php echo $product['quantity']; ?>
          </td>  
          
           <td><!--Cantidad de cajas-->
           <?php /*echo number_format($product['cant_cajas']); */
            $tcajas = $product['quantity']*$product['cant_cajas'];
            echo $tcajas;
           ?>
          </td> 
          <td>
            <input type="hidden" name="price[]" value="<?php echo $product['price']; ?>">
            $ <?php echo number_format($product['price']); ?>
          <br>             
            <input type="hidden" name="description[]" value="<?php echo $product['description']; ?>">
          </td>  



           <td>
            <input type="hidden" name="total" value="<?php echo $product['quantity'] * $product['price']; ?>">
            $ <?php echo number_format($product['quantity'] * $product['price'], 2); ?>
            <!-- categoria-->
            <input type="hidden" name="category_id[]" value="<?php echo $product['category_id']; ?>">

          </td> 


    


           <td>
               <a href="pos.php?action=delete&id=<?php echo $product['id']; ?>">
                    <div class="btn bg-gradient-danger btn-danger"><i class="fas fa-fw fa-trash"></i></div>
               </a>
           </td>  
        </tr>
        <?php  

                //  $totalcajas += $product['cant_cajas'];
                 $totalcajas += $tcajas;
                  $total = $total + ($product['quantity'] * $product['price']);
             endforeach;  
        ?>
            <input type="hidden" name="cant_cajas" value="<?php echo $totalcajas?>">


        <?php  
        endif;
        ?>  
        </table> 

       <div style="text-align-last: right;">
       <h4>Subtotal: $<?php echo $total; ?>  <br>Total Cajas: <?php echo $totalcajas; ?> </h4>

       <div style="text-align-last: right; display: inline-flex;">
                <h4 >Ingrese descuento </h4>

      <input id="descuentov" placeholder="Porcentaje a descontar %" style="width: 40px; align-self: center;" value="0" onkeyup="calcular()">
      <h4 > % </h4>
        </div>


       <input id="valor" type="hidden" value="<?php echo $total; ?>" style="width:150px;">

               <h4 id="result" ></h4>

        <h4 id="result"  style="font-size: small;"></h4>
        <h4 id="total" style="font-size: small;"></h4>



          
        </div>         
        </div>
        </div> 

<script type="text/javascript">

</script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


<?php
include 'posside_test.php';
include '../includes/footer.php';
?>