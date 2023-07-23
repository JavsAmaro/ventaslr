<div class="show-grid">
  <div class="card  mb-2">
    <div class="card-header shadow ">
      <div class="row" style="justify-content: center;">
                      <?php
                      /* <div class="col-12" style="text-align: center;"> 
                      <span class="m-3 font-weight-bold " style="color: #858796;font-size: 16px;    font-weight: 500 !important;">
                        Sucursal <?php echo  $_SESSION['CITY'];?> </span> </div> */
                      ?>

                    
          <span class="valores m-2 font-weight-bold " style="color: #858796;font-size: medium;font-weight: 500 !important;">&nbsp; Fondo Inicial
            $<?php echo number_format($fondoInicial, 2, '.', ','); ?> &nbsp;
          </span>
               

          <span class="valores m-2 font-weight-bold text-primary" style="color: #858796;font-size: medium;">&nbsp; Salida de Efectivo
            $<?php echo number_format($salidaEfectivo, 2, '.', ',');?> &nbsp;</span> 

          <span class="valores m-2 font-weight-bold " style="color: #858796;font-size: medium;font-weight: 500 !important;">&nbsp; Efectivo en Caja $<?php echo number_format($caja, 2, '.', ',');?> &nbsp;</span>

          <span class="valores m-2 font-weight-bold " style="color: #858796;font-size: medium; font-weight: 500 !important;">&nbsp; Pagos en Efectivo
            $<?php echo number_format($PagoEfectivo, 2, '.', ','); ?> &nbsp;</span>
          <span class="valores m-2 font-weight-bold " style="color: #858796;font-size: medium; font-weight: 500 !important;">&nbsp; Pagos Con Tarjeta 

            $<?php echo number_format($PagoTarjeta, 2, '.', ',');?> &nbsp;
          </span>
          <span class="valores m-2 font-weight-bold " style="color: #858796;font-size: medium;font-weight: 500 !important;">&nbsp; Ventas de Hoy
                $<?php echo number_format($ventaDia, 2, '.', ','); ?> &nbsp;
          </span>
          <span class="valores m-2 font-weight-bold " style="color: #858796;font-size: 16px;font-weight: 500 !important;
">&nbsp;Cajas en Stock  <?php 
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
                           pz.&nbsp;
              </span>
      </div>
    </div>
  </div>
</div>
