<!-- SIDE PART NA SUMMARY -->
   

        <div class="card-body col-md-4">
        <?php  

        $_POST['cash']=0;  

        $cash=0;
        if(!empty($_SESSION['pointofsale'])):  
            
             $total = 0;  
        
             foreach($_SESSION['pointofsale'] as $key => $product): 
        ?> 

        <?php  
//                  $total = $total + ($product['quantity'] * $product['price']);

                  $total = $total + ($product['quantity'] * $product['price']);
               
             endforeach;

$sql = "SELECT CUST_ID, FIRST_NAME, LAST_NAME, PHONE_NUMBER, DIRECCION
        FROM customer WHERE CITY  LIKE '{$_SESSION['CITY']}%'
        order by FIRST_NAME asc";
$res = mysqli_query($db, $sql) or die ("Error SQL: $sql");

$opt = "<input placeholder='Buscar Cliente' list='options' oninput='console.log(this.value);' style='border-radius: 0px;width: 50%;'id='customer' onchange='AddValue()' onchange='myFunction(event)' name='customer'  >
<datalist id='options' >
        <option data-value='' disabled selected hidden>Seleccionar Cliente</option>";
  while ($row = mysqli_fetch_assoc($res)) {
    $opt .= "<option value='".$row['CUST_ID']."' label='".$row['FIRST_NAME'].' '.$row['LAST_NAME'].' '.$row['PHONE_NUMBER'].' '.$row['DIRECCION']."'>".$row['FIRST_NAME'].' '.$row['LAST_NAME']. ' '.$row['PHONE_NUMBER']. '  '.$row['DIRECCION']."</option>";
  }
$opt .= "</datalist> ";

        ?>  





      <script type="text/javascript">
window.addEventListener('load', calcular);

function calcular(){



  var valor = document.getElementById("valor").value;
  var descuentov = document.getElementById("descuentov").value;

  var result= document.getElementById('result');
  var total= document.getElementById('total');

  //le descuentas el 8% y lo agregas al HTML
  var descuento = parseInt(valor)*(parseInt(descuentov)/100);
  var totalDescuento = parseInt(valor)-descuento;

  //agrega los resultados al DOM
  result.innerHTML = 'Ahorro de: $' + descuento;
  total.innerHTML =  'Total:     $' + (parseInt(valor)-descuento);
  totalf.innerHTML =totalDescuento;



  document.getElementById("totalf").value = totalDescuento;


document.getElementById("caja_valor").value = descuentov;



};

       </script>




<script type="text/javascript">





  var inp = document.querySelector('input');
inp.addEventListener('input', function() {
  var value = this.value;
  var opt = [].find.call(this.list.options, function(option) {
    return option.value === value;
  });
  if(opt) {
    this.value = opt.textContent;
  }
});

function AddValue(){
    
  var Value = document.querySelector('#customer').value;

  if(!Value) return;

  const Text = document.querySelector('option[value="' + Value + '"]').label;

  const option=document.createElement("option");
  option.value=Value;
  option.text=Text;



  /*  alert(option.text);*/
document.getElementById("Colors").value = option.text;

}
</script>





<?php    echo "<div style='text-align-last: right;'>";

          echo "Hoy es : "; 
          $today = date("Y-m-d H:i:s"); 
          $firstDay=date('Y-m-d',strtotime("first day of this month"));

          echo date("d-m-Y H:i:s", strtotime($today) ); 
          echo "<br>";
         echo "</div>";
?> 
          <input type="hidden" name="date" value="<?php echo $today; ?>">
          <div class="form-group row mb-4">
            <div class="col-sm-12" style="text-align-last: right;" >




<?php
                    $query = "SELECT * FROM customer WHERE PHONE_NUMBER LIKE '*' AND CITY  LIKE '{$_SESSION['CITY']}%'";

                       $result = mysqli_query($db, $query) or die (mysqli_error($db));
                      while ($row = mysqli_fetch_assoc($result)) {

                  $Cliente_Sucursal =  $row['CUST_ID'];

                      }
  ?>


<!--
<button onclick="myFunction1()" class="btn btn-info">Sucursal</button>
-->

            <?php echo $opt; ?>


            <a  href="#" data-toggle="modal" data-target="#poscustomerModal" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;color: #fff;"><i class="fas fa-fw fa-plus" style=" color: #fff;"></i></a>
            </div>
          </br>

            <div class="col-sm-12" style="text-align-last: right;padding-top: 10px;" >
               <label> Datos del Cliente:&nbsp;</label> 

              <input align="right" id="Colors" style="width: 60%; text-align: end;float: right; "></input>

              <input align="right" name="comentarios" placeholder="Añadir comentarios" style="width: 60%; text-align: end;float: right;margin-top: 10px"></input>

                 <input align="right" name="cupon" placeholder="Añadir cupón" style="width: 60%; text-align: end;float: right;margin-top: 10px"></input>

            <input type="hidden" name="caja_valor" id="caja_valor" value="">







            </div>
          </div>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
         <div class="form-group row mb-4">
            <div class="col-sm-12" style="text-align-last: right;">
           
<ul style="display: flex;float: right;">
      <p class="font-weight-bold" style="margin-right: 10px;">
       Método de Pago  &nbsp;
      </p>
  
          <select class='form-control' name='metodoPago' id='metodoPago' onclick="load()" required style="width: auto;">
                    <option value="" disabled selected hidden>Seleccionar Metodo de pago</option>
                    <option value="1">Efectivo</option>  
                    <option value="2">Tarjeta Débito/Crédito</option> 
          </select>
        </ul>

            </div>

          </div>

<?php endif; ?>       
          <button onclick="return IsEmpty();"  type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#posMODAL">Seguir</button>

        <!-- Modal -->
        <div class="modal fade" id="posMODAL" tabindex="-1" role="dialog" aria-labelledby="POS" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Cuenta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                  <div class="form-group row text-left mb-2">

                  <div class="col-sm-7">
                      <h3>
                        TOTAL A PAGAR  $ 
                      </h3>

                  </div>

                  <div class="col-sm-5 text-center row" >
              
              <input class="form-control text-right " id="totalf" readonly name="totalPago" >

              <input type="hidden" class="form-control text-right " id="total" readonly name="total" >

               

                  </div>
              </div>

                  <div class="form-group row text-left mb-2" id="campoMp"> 

                  <div class="col-sm-7">
                      <h3>
                       Moneda de pago     $
                      </h3>

                  </div>

                  <div class="col-sm-5 text-center row" >    
                        <input class="form-control text-right"  id="fx" name="cash"  placeholder="Ingrese moneda de pago" type="number" name="cash" enctype="multipart/form-data" required>
                  </div>
              </div>


                  <div class="form-group row text-left mb-2" id="campoCambio">

                  <div class="col-sm-9">
                      <h3>
                       CAMBIO $
                      </h3>

                  </div>

                  <div class="col-sm-3 text-right row" >
                      <h3 class="font-weight-bold bg-light">
                      <label id="resultado"></label>
                   </h3>
                  </div>
              </div>
             
              <input type="hidden" name="intermediario" id="intermediario" value=''/>   

              <input type="hidden" name="sucursal" value='<?php echo  $_SESSION['CITY'];?>'/>   


              


               </div>
              <div class="modal-footer">
                <button type="submit" id="btnEnviar" disabled  class="btn btn-primary btn-block">Proceder con el Pago</button>
              </div>
<!-----aqui---->
            </div>
          </div>
        </div>
        <!-- END OF Modal -->

        </form>
      </div> <!-- END OF CARD BODY -->

     </div>
</div>


<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>



<script type="text/javascript">




  $(document).ready(function() {
 
 $(document).on('click keyup','.mis-checkboxes,.mis-adicionales',function() {
   calcular();
 });

});


      $(function () {
        var form = document.getElementById('theForm');

        $("#metodoPago").change(function () {
            var selectedText = $(this).find("option:selected").text();
            var selectedValue = $(this).val();
        });
    });

var btnEnviar = document.getElementById('btnEnviar');
var fx = document.getElementById('fx'),
resultado = document.getElementById('resultado');
//var total = '<?php echo $total; ?>';
var total = document.getElementById("totalf");


var mp = document.getElementById('metodoPago');


fx.addEventListener('input', function () {
    var error = true;

    try{
       if (fx.value) {
    //alert("You entered: " + totalParts);
            // Evaluar el resultado
           // resultado.innerText = eval(fx.value - total);
           resultado.innerText = eval(fx.value-total.value);

            error = false;
        }

if( resultado.innerText < 0){
    btnEnviar.disabled = true;
  }
  else {  
    btnEnviar.disabled = false;
    }
    } catch (err) { }
    if (error) // Si no se pudo calcular
        resultado.innerText = "Error";

});
/*
function myFunction1() {

      document.getElementById('div_Sucursal').style.display='block';
    document.getElementById('div_Cliente').style.display='none';


document.getElementById('customer').value=<?php echo $Cliente_Sucursal; ?>;

    option.value=<?php echo $Cliente_Sucursal; ?>;
    

}*/


function IsEmpty() {

  if (document.forms['frm'].metodoPago.value === "") {
    alert("Ingrese el Metodo de Pago");
    
    return false;

  }
 
  if(document.forms['frm'].metodoPago.value === "2") {

    fx.value = 0;
    btnEnviar.disabled = false;
    $("#campoMp").hide();
    $("#campoCambio").hide();

    //return false;
  }




 if(document.getElementById("customer").value.length == 0)
{

  document.getElementById('customer').value=<?php echo $Cliente_Sucursal; ?>;

    option.value=<?php echo $Cliente_Sucursal; ?>;

    //alert("Ingrese Cliente")
}

  return true;
}

/*}*/
</script>
