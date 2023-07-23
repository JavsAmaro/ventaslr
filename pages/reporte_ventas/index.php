<?php

//traer funciones " base de datos y php excel"
require_once 'database.php';
require_once 'Classes/PHPExcel.php';
require_once 'Classes/PHPExcel/IOFactory.php';




//traer variables 
$fecha = date("d-m-Y H:i:s");
     $firstDay = $_GET['fd'];
     $lastDay = $_GET['ld'];
     $ciudad = $_GET['cd'];
     $rc=0;
     $primerDomingo = $_GET['pd'];
     $segundoLunes = $_GET['sl'];
     $segundoDomingo = $_GET['sd'];
     $tercerLunes = $_GET['tl'];
     $tercerDomingo = $_GET['td'];
     $cuartoLunes = $_GET['cl'];

     $cuartoDomingo = $_GET['cud'];
     $quintoLunes = $_GET['ql'];
     $quintoDomingo = $_GET['qd'];
             
              $ventaSemana1=0;
              $ventaSemana2=0;
              $ventaSemana3=0;
              $ventaSemana4=0;
              $ventaSemana5=0;
              $gastoSemana1=0;
              $gastoSemana2=0;
              $gastoSemana3=0;
              $gastoSemana4=0;
              $gastoSemana5=0;

              $cajasSemana1=0;
              $cajasSemana2=0;
              $cajasSemana3=0;
              $cajasSemana4=0;
              $cajasSemana5=0;
              $totalcajas=0;

//Declrar Querys

$result = mysqli_query($conn,"SELECT * FROM transaction WHERE CITY='$ciudad' AND DATE(date) BETWEEN '{$firstDay}' AND '{$lastDay}'");


$result1 = mysqli_query($conn,"SELECT * FROM transaction WHERE CITY='$ciudad' AND DATE(date) BETWEEN '{$firstDay}' AND '{$lastDay}'");


$result2 = mysqli_query($conn,"SELECT t1.PRODUCTS,  t1.TRANS_D_ID,t1.PRICE, SUM(QTY) as QTY  
                     FROM transaction_details t1 
                    INNER JOIN transaction t2
                            ON t1.TRANS_D_ID = t2.TRANS_D_ID WHERE t2.CITY='$ciudad' AND date(t2.DATE) BETWEEN '{$firstDay}%' AND '{$lastDay}%' GROUP BY t1.PRODUCTS");


$result4 = mysqli_query($conn,"SELECT SUM(GRANDTOTAL) as GRANDTOTAL FROM transaction WHERE CITY='$ciudad' AND DATE(date) BETWEEN '{$firstDay}' AND '{$primerDomingo}'");

while($row = mysqli_fetch_array($result4)) {
                  $ventaSemana1 =  $row['GRANDTOTAL'];

}


$result5 = mysqli_query($conn,"SELECT * FROM cortes WHERE CITY='$ciudad' AND DATE(date) BETWEEN '{$firstDay}%' AND '{$primerDomingo}%'");

while($row = mysqli_fetch_array($result5)) {
 if (($row['TIPO'] == 3)||($row['TIPO'] == 2)){
                  //  el monto se le resta al total de las ventas dejando solo el monto 
                           $gastoSemana1 +=  $row['MONTO'];
                          }
}



$result6 = mysqli_query($conn,"SELECT SUM(GRANDTOTAL) as GRANDTOTAL FROM transaction WHERE CITY='$ciudad' AND DATE(date) BETWEEN '{$segundoLunes}' AND '{$segundoDomingo}'");

while($row = mysqli_fetch_array($result6)) {
                  $ventaSemana2 =  $row['GRANDTOTAL'];

}


$result7 = mysqli_query($conn,"SELECT * FROM cortes WHERE CITY='$ciudad' AND DATE(date) BETWEEN '{$segundoLunes}%' AND '{$segundoDomingo}%'");

while($row = mysqli_fetch_array($result7)) {
if (($row['TIPO'] == 3)||($row['TIPO'] == 2)){
                  //  el monto se le resta al total de las ventas dejando solo el monto 
                           $gastoSemana2 +=  $row['MONTO'];
                          }

}

$result8 = mysqli_query($conn,"SELECT SUM(GRANDTOTAL) as GRANDTOTAL FROM transaction WHERE CITY='$ciudad' AND DATE(date) BETWEEN '{$tercerLunes}' AND '{$tercerDomingo}'");

while($row = mysqli_fetch_array($result8)) {

                  $ventaSemana3 =  $row['GRANDTOTAL'];

}


$result9 = mysqli_query($conn,"SELECT * FROM cortes WHERE CITY='$ciudad' AND DATE(date) BETWEEN '{$tercerLunes}%' AND '{$tercerDomingo}%'");

while($row = mysqli_fetch_array($result9)) {

if (($row['TIPO'] == 3)||($row['TIPO'] == 2)){
                  //  el monto se le resta al total de las ventas dejando solo el monto 
                           $gastoSemana3 +=  $row['MONTO'];
                          }

}


$result10 = mysqli_query($conn,"SELECT SUM(GRANDTOTAL) as GRANDTOTAL FROM transaction WHERE CITY='$ciudad' AND DATE(date) BETWEEN '{$cuartoLunes}' AND '{$cuartoDomingo}'");

while($row = mysqli_fetch_array($result10)) {
                  $ventaSemana4 =  $row['GRANDTOTAL'];

}


$result11 = mysqli_query($conn,"SELECT * FROM cortes WHERE CITY='$ciudad' AND DATE(date) BETWEEN '{$cuartoLunes}%' AND '{$cuartoDomingo}%'");

while($row = mysqli_fetch_array($result11)) {
if (($row['TIPO'] == 3)||($row['TIPO'] == 2)){
                  //  el monto se le resta al total de las ventas dejando solo el monto 
                           $gastoSemana4 +=  $row['MONTO'];
                          }

}


$result12 = mysqli_query($conn,"SELECT SUM(GRANDTOTAL) as GRANDTOTAL FROM transaction WHERE CITY='$ciudad' AND DATE(date) BETWEEN '{$quintoLunes}' AND '{$lastDay}'");

while($row = mysqli_fetch_array($result12)) {
                  $ventaSemana5 =  $row['GRANDTOTAL'];

}


$result13 = mysqli_query($conn,"SELECT * FROM cortes WHERE CITY='$ciudad' AND DATE(date) BETWEEN '{$quintoLunes}%' AND '{$quintoDomingo}%'");

while($row = mysqli_fetch_array($result13)) {
if (($row['TIPO'] == 3)||($row['TIPO'] == 2)){
                  //  el monto se le resta al total de las ventas dejando solo el monto 
                           $gastoSemana5 +=  $row['MONTO'];
                          }

}


$result14 = mysqli_query($conn,"SELECT SUM(CANT_CAJAS) as CANT_CAJAS FROM transaction WHERE CITY='$ciudad' AND DATE(date) BETWEEN '{$firstDay}' AND '{$primerDomingo}'");

while($row = mysqli_fetch_array($result14)) {
                  $cajasSemana1 =  $row['CANT_CAJAS'];

}

$result15 = mysqli_query($conn,"SELECT SUM(CANT_CAJAS) as CANT_CAJAS FROM transaction WHERE CITY='$ciudad' AND DATE(date) BETWEEN '{$segundoLunes}' AND '{$segundoDomingo}'");

while($row = mysqli_fetch_array($result15)) {
                  $cajasSemana2 =  $row['CANT_CAJAS'];

}

$result16 = mysqli_query($conn,"SELECT SUM(CANT_CAJAS) as CANT_CAJAS FROM transaction WHERE CITY='$ciudad' AND DATE(date) BETWEEN '{$tercerLunes}' AND '{$tercerDomingo}'");

while($row = mysqli_fetch_array($result16)) {
                  $cajasSemana3 =  $row['CANT_CAJAS'];

}


$result17 = mysqli_query($conn,"SELECT SUM(CANT_CAJAS) as CANT_CAJAS FROM transaction WHERE CITY='$ciudad' AND DATE(date) BETWEEN '{$cuartoLunes}' AND '{$cuartoDomingo}'");

while($row = mysqli_fetch_array($result17)) {
                  $cajasSemana4 =  $row['CANT_CAJAS'];

}


$result18 = mysqli_query($conn,"SELECT SUM(CANT_CAJAS) as CANT_CAJAS FROM transaction WHERE CITY='$ciudad' AND DATE(date) BETWEEN '{$quintoLunes}' AND '{$quintoDomingo}'");

while($row = mysqli_fetch_array($result18)) {
                  $cajasSemana5 =  $row['CANT_CAJAS'];

}




//MOVIMIENTOS

$results = mysqli_query($conn,"SELECT * FROM cortes WHERE CITY='$ciudad' AND DATE(date) BETWEEN '{$firstDay}' AND '{$lastDay}'");



//operaciones por semana

$utilidadSemana1=$ventaSemana1-$gastoSemana1;
$utilidadSemana2=$ventaSemana2-$gastoSemana2;
$utilidadSemana3=$ventaSemana3-$gastoSemana3;
$utilidadSemana4=$ventaSemana4-$gastoSemana4;
$utilidadSemana5=$ventaSemana5-$gastoSemana5;

$ventaMes = $ventaSemana1+$ventaSemana2+$ventaSemana3+$ventaSemana4+$ventaSemana5;

$gastoMes=$gastoSemana1+$gastoSemana2+$gastoSemana3+$gastoSemana4+$gastoSemana5;

$utilidadMes =$ventaMes-$gastoMes;

$gastoTotal=$gastoMes;

$utilidadTotal= $ventaMes - $gastoTotal;

$totalcajas=$cajasSemana1+$cajasSemana2+$cajasSemana3+$cajasSemana4+$cajasSemana5;

/* Create new PHPExcel object*/
$objPHPExcel = new PHPExcel();


function cellColor($cells,$color){
    global $objPHPExcel;

    $objPHPExcel->getActiveSheet()->getStyle($cells)->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => $color
        )
    ));
}

cellColor('O2:T1', 'C773FE');
cellColor('O4:T4', 'C773FE');
cellColor('O6:T6', 'C773FE');
cellColor('O8:T8', 'C773FE');


/*
cellColor('G5', 'F28A8C');
cellColor('A17:I17', 'F28A8C');
cellColor('A30:Z30', 'F28A8C');
*/

/* Create a first sheet, representing sales data*/
$objPHPExcel->setActiveSheetIndex(0);

$objPHPExcel->getActiveSheet()->setCellValue('A1', 'VENTAS DEL');
$objPHPExcel->getActiveSheet()->setCellValue('B1', $firstDay);
$objPHPExcel->getActiveSheet()->setCellValue('C1', 'AL');
$objPHPExcel->getActiveSheet()->setCellValue('D1', $lastDay);


//ENCABEZADO VENTAS REALIZADAS

$objPHPExcel->getActiveSheet()->setCellValue('J1', 'PRODUCTOS VENDIDOS DEL');
$objPHPExcel->getActiveSheet()->setCellValue('K1', $firstDay);
$objPHPExcel->getActiveSheet()->setCellValue('L1', 'AL');
$objPHPExcel->getActiveSheet()->setCellValue('M1', $lastDay);

$objPHPExcel->getActiveSheet()->setCellValue('A2', 'FECHA');
$objPHPExcel->getActiveSheet()->setCellValue('B2', 'TOTAL');
$objPHPExcel->getActiveSheet()->setCellValue('C2', 'METODO DE PAGO');
$objPHPExcel->getActiveSheet()->setCellValue('D2', 'INTERMEDIARIO');
$objPHPExcel->getActiveSheet()->setCellValue('E2', 'CAJAS');
$objPHPExcel->getActiveSheet()->setCellValue('F2', 'COMENTARIOS');
$objPHPExcel->getActiveSheet()->setCellValue('G2', 'MOTIVO CANCEL');



//ENCABEZADO PRODUCTOS VENDIDOS
$objPHPExcel->getActiveSheet()->setCellValue('J2', 'NOMBRE DEL PRODUCTO');
$objPHPExcel->getActiveSheet()->setCellValue('K2', 'CANTIDAD');
$objPHPExcel->getActiveSheet()->setCellValue('L2', 'PRECIO UNITARIO');
$objPHPExcel->getActiveSheet()->setCellValue('M2', 'VENTAS');



//ENCABEZADO VENTAS, GASTOS Y UTILIDADES SEMANALES   


$objPHPExcel->getActiveSheet()->setCellValue('O3', 'SEMANA 1');
$objPHPExcel->getActiveSheet()->setCellValue('O4', 'SEMANA 2');
$objPHPExcel->getActiveSheet()->setCellValue('O5', 'SEMANA 3');
$objPHPExcel->getActiveSheet()->setCellValue('O6', 'SEMANA 4');
$objPHPExcel->getActiveSheet()->setCellValue('O7', 'SEMANA 5');


$objPHPExcel->getActiveSheet()->setCellValue('P2', 'PERIODO');
$objPHPExcel->getActiveSheet()->setCellValue('Q2', 'VENTAS');
$objPHPExcel->getActiveSheet()->setCellValue('R2', 'GASTO');
$objPHPExcel->getActiveSheet()->setCellValue('S2', 'UTILIDAD');
$objPHPExcel->getActiveSheet()->setCellValue('T2', 'CAJAS');

$objPHPExcel->getActiveSheet()->setCellValue('P11', 'MOVIMIENTOS');

$objPHPExcel->getActiveSheet()->setCellValue('O12', 'FECHA');
$objPHPExcel->getActiveSheet()->setCellValue('P12', 'TIPO');
$objPHPExcel->getActiveSheet()->setCellValue('Q12', 'DESCRIPCION');
$objPHPExcel->getActiveSheet()->setCellValue('R12', 'MONTO');
$objPHPExcel->getActiveSheet()->setCellValue('S12', 'PROVEEDOR');


// VENTAS, GASTOS Y UTILIDADES SEMANALES   
//SEMANA 1
$objPHPExcel->getActiveSheet()->setCellValue('P3', $firstDay.'--'. $primerDomingo);
$objPHPExcel->getActiveSheet()->setCellValue('Q3', $ventaSemana1);
$objPHPExcel->getActiveSheet()->setCellValue('R3', $gastoSemana1);
$objPHPExcel->getActiveSheet()->setCellValue('S3', $utilidadSemana1);
$objPHPExcel->getActiveSheet()->setCellValue('T3', $cajasSemana1);

//SEMANA 2
$objPHPExcel->getActiveSheet()->setCellValue('P4', $segundoLunes.'--'. $segundoDomingo);
$objPHPExcel->getActiveSheet()->setCellValue('Q4', $ventaSemana2);
$objPHPExcel->getActiveSheet()->setCellValue('R4', $gastoSemana2);
$objPHPExcel->getActiveSheet()->setCellValue('S4', $utilidadSemana2);
$objPHPExcel->getActiveSheet()->setCellValue('T4', $cajasSemana2);

//SEMANA 3
$objPHPExcel->getActiveSheet()->setCellValue('P5', $tercerLunes.'--'. $tercerDomingo);
$objPHPExcel->getActiveSheet()->setCellValue('Q5', $ventaSemana3);
$objPHPExcel->getActiveSheet()->setCellValue('R5', $gastoSemana3);
$objPHPExcel->getActiveSheet()->setCellValue('S5', $utilidadSemana3);
$objPHPExcel->getActiveSheet()->setCellValue('T5', $cajasSemana3);

//SEMANA 4
$objPHPExcel->getActiveSheet()->setCellValue('P6', $cuartoLunes.'--'. $cuartoDomingo);
$objPHPExcel->getActiveSheet()->setCellValue('Q6', $ventaSemana4);
$objPHPExcel->getActiveSheet()->setCellValue('R6', $gastoSemana4);
$objPHPExcel->getActiveSheet()->setCellValue('S6', $utilidadSemana4);
$objPHPExcel->getActiveSheet()->setCellValue('T6', $cajasSemana4);

//SEMANA 5
$objPHPExcel->getActiveSheet()->setCellValue('P7', $quintoLunes.'--'. $lastDay);
$objPHPExcel->getActiveSheet()->setCellValue('Q7', $ventaSemana5);
$objPHPExcel->getActiveSheet()->setCellValue('R7', $gastoSemana5);
$objPHPExcel->getActiveSheet()->setCellValue('S7', $utilidadSemana5);
$objPHPExcel->getActiveSheet()->setCellValue('T7', $cajasSemana5);



$objPHPExcel->getActiveSheet()->setCellValue('P8', 'SUB TOTAL');
$objPHPExcel->getActiveSheet()->setCellValue('Q8', $ventaMes);
$objPHPExcel->getActiveSheet()->setCellValue('R8', $gastoMes);
$objPHPExcel->getActiveSheet()->setCellValue('S8', $utilidadMes);
$objPHPExcel->getActiveSheet()->setCellValue('T8', $totalcajas);
//TAMAÑO DE LA FILAS

$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(10);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(10);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(10);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(10);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(10);
$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(10);
$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(10);
$objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(10);
$objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(10);
$objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(10);


$i=3; 
$a=3;
$f=10;
$g=13;

//TRANSACCIONES REALIZADAS

while($row = mysqli_fetch_array($result)) {

  $DATE=$row['DATE'];
  $GRANDTOTAL=$row['GRANDTOTAL'];
  $METODO_PAGO=$row['METODO_PAGO'];
  $INTERMEDIARIO=$row['INTERMEDIARIO'];
  $CANT_CAJAS=$row['CANT_CAJAS'];
  $COMENTARIOS=$row['COMENTARIOS'];
  $MOTIVO_CANCEL=$row['MOTIVO_CANCEL'];

 if($i % 2 == 0) 
    {
cellColor("A$i", 'FFFFFF');
cellColor("B$i", 'FFFFFF');
cellColor("C$i", 'FFFFFF');
cellColor("D$i", 'FFFFFF');
cellColor("E$i", 'FFFFFF');
cellColor("F$i", 'FFFFFF');
cellColor("G$i", 'FFFFFF');


   }
   else 
  {
cellColor("A$i", 'FFFD99');
cellColor("B$i", 'FFFD99');
cellColor("C$i", 'FFFD99');
cellColor("D$i", 'FFFD99');
cellColor("E$i", 'FFFD99');
cellColor("F$i", 'FFFD99');
cellColor("G$i", 'FFFD99');
  }



  $objPHPExcel->getActiveSheet()->setCellValue("A$i",$DATE);
  $objPHPExcel->getActiveSheet()->setCellValue("B$i",$GRANDTOTAL);

        if($METODO_PAGO == "1"){
              $objPHPExcel->getActiveSheet()->setCellValue("C$i","Efectivo");
        }if($METODO_PAGO == "2"){
              $objPHPExcel->getActiveSheet()->setCellValue("C$i","Tarjeta"); } 


        if($INTERMEDIARIO == "1"){
              $objPHPExcel->getActiveSheet()->setCellValue("D$i","Sucursal");
        }if($INTERMEDIARIO == "2"){
              $objPHPExcel->getActiveSheet()->setCellValue("D$i","DIDI"); 
            }if($INTERMEDIARIO == "3"){
              $objPHPExcel->getActiveSheet()->setCellValue("D$i","UBER"); 
            }if($INTERMEDIARIO == "4"){
              $objPHPExcel->getActiveSheet()->setCellValue("D$i","Sin Delantal"); 
            }if($INTERMEDIARIO == "5"){
              $objPHPExcel->getActiveSheet()->setCellValue("D$i","Rappi"); }

  $objPHPExcel->getActiveSheet()->setCellValue("E$i",$CANT_CAJAS);
  $objPHPExcel->getActiveSheet()->setCellValue("F$i",$COMENTARIOS);
  $objPHPExcel->getActiveSheet()->setCellValue("G$i",$MOTIVO_CANCEL);

$i++;
}


//PRODUCTOS VENDIDOS
while($row = mysqli_fetch_array($result2)) {


 if($a % 2 == 0) 
    {
cellColor("J$a", 'FFFFFF');
cellColor("K$a", 'FFFFFF');
cellColor("L$a", 'FFFFFF');
cellColor("M$a", 'FFFFFF');



   }
   else 
  {
cellColor("J$a", 'FEDA73');
cellColor("K$a", 'FEDA73');
cellColor("L$a", 'FEDA73');
cellColor("M$a", 'FEDA73');

  }
  $PRODUCTS=$row['PRODUCTS'];
  $PRICE=$row['PRICE'];
  $QTY=$row['QTY'];
  $precioTotal=$row['PRICE']*$row['QTY'];




  $objPHPExcel->getActiveSheet()->setCellValue("J$a",$PRODUCTS);
  $objPHPExcel->getActiveSheet()->setCellValue("K$a",$QTY);
  $objPHPExcel->getActiveSheet()->setCellValue("L$a",$PRICE);
  $objPHPExcel->getActiveSheet()->setCellValue("M$a",$precioTotal);

$a++;
}






while($row = mysqli_fetch_array($results)) {

  $TIPO=$row['TIPO'];
  $MONTO=$row['MONTO'];
  $DATE=$row['DATE'];
  $DESCRIPCION=$row['DESCRIPCION'];
  $PROVEEDOR=$row['PROVEEDOR'];

 if($g % 2 == 0) 
    {
cellColor("O$g", 'FFFFFF');
cellColor("P$g", 'FFFFFF');
cellColor("Q$g", 'FFFFFF');
cellColor("R$g", 'FFFFFF');
cellColor("S$g", 'FFFFFF');


   }
   else 
  {
cellColor("O$g", 'FF6961');
cellColor("P$g", 'FF6961');
cellColor("Q$g", 'FF6961');
cellColor("R$g", 'FF6961');
cellColor("S$g", 'FF6961');
  }

  $objPHPExcel->getActiveSheet()->setCellValue("O$g",$DATE);


        if($TIPO == "1"){
              $objPHPExcel->getActiveSheet()->setCellValue("P$g","Fondo Extra de Caja");
        }if($TIPO == "2"){
              $objPHPExcel->getActiveSheet()->setCellValue("P$g","Pagos a proveedores"); 
            }if($TIPO == "3"){
              $objPHPExcel->getActiveSheet()->setCellValue("P$g","Retiro"); 
            }if($TIPO == "4"){
              $objPHPExcel->getActiveSheet()->setCellValue("P$g","Cierre de Caja"); 
            }if($TIPO == "5"){
              $objPHPExcel->getActiveSheet()->setCellValue("P$g","Cierre de Caja del Día Anterior"); }


  $objPHPExcel->getActiveSheet()->setCellValue("Q$g",$DESCRIPCION);
  $objPHPExcel->getActiveSheet()->setCellValue("R$g",$MONTO);
  $objPHPExcel->getActiveSheet()->setCellValue("S$g",$PROVEEDOR);

$g++;
}





/*

while($row = mysqli_fetch_array($result)) {


  if($f % 2 == 0) 
    {
cellColor("J$i", 'FEDA73');
cellColor("K$i", 'FEDA73');
cellColor("L$i", 'FEDA73');
cellColor("M$i", 'FEDA73');
   }
   else 
  {
cellColor("J$i", 'FFFFFF');
cellColor("K$i", 'FFFFFF');
cellColor("L$i", 'FFFFFF');
cellColor("M$i", 'FFFFFF');
}


  $DATE=$row['DATE'];
  $GRANDTOTAL=$row['GRANDTOTAL'];
  $METODO_PAGO=$row['METODO_PAGO'];
  $INTERMEDIARIO=$row['INTERMEDIARIO'];
  $CANT_CAJAS=$row['CANT_CAJAS'];
  $COMENTARIOS=$row['COMENTARIOS'];
  $MOTIVO_CANCEL=$row['MOTIVO_CANCEL'];

  $objPHPExcel->getActiveSheet()->setCellValue("A$f",$DATE);
  $objPHPExcel->getActiveSheet()->setCellValue("B$f",$GRANDTOTAL);

        if($METODO_PAGO == "1"){
              $objPHPExcel->getActiveSheet()->setCellValue("C$f","Efectivo");
        }if($METODO_PAGO == "2"){
              $objPHPExcel->getActiveSheet()->setCellValue("C$f","Tarjeta"); } 

        if($fNTERMEDIARIO == "1"){
              $objPHPExcel->getActiveSheet()->setCellValue("D$f","Sucursal");
        }if($fNTERMEDIARIO == "2"){
              $objPHPExcel->getActiveSheet()->setCellValue("D$f","DIDI"); 
            }if($fNTERMEDIARIO == "3"){
              $objPHPExcel->getActiveSheet()->setCellValue("D$f","UBER"); 
            }if($fNTERMEDIARIO == "4"){
              $objPHPExcel->getActiveSheet()->setCellValue("D$f","Sin Delantal"); 
            }if($fNTERMEDIARIO == "5"){
              $objPHPExcel->getActiveSheet()->setCellValue("D$f","Rappi"); }

  $objPHPExcel->getActiveSheet()->setCellValue("E$f",$CANT_CAJAS);
  $objPHPExcel->getActiveSheet()->setCellValue("F$f",$COMENTARIOS);
  $objPHPExcel->getActiveSheet()->setCellValue("G$f",$MOTIVO_CANCEL);

$f++;
}

*/



/*Rename sheet*/
$objPHPExcel->getActiveSheet()->setTitle('RESUMEN DEL MES');


/* Create a new worksheet, after the default sheet*/
//AQUI EMPIEZA LA HOJA 2
$objPHPExcel->createSheet();

/* Add some data to the second sheet, resembling some different data types*/
$objPHPExcel->setActiveSheetIndex(1);


//Venta del dia 1




//querys
$result = mysqli_query($conn,"SELECT * FROM transaction WHERE CITY='$ciudad' AND DATE(date)='$firstDay' ");


$result1 = mysqli_query($conn,"SELECT * FROM transaction WHERE CITY='$ciudad' AND DATE(date)='$firstDay'");


$result2 = mysqli_query($conn,"SELECT t1.PRODUCTS,  t1.TRANS_D_ID,t1.PRICE, SUM(QTY) as QTY  
                     FROM transaction_details t1 
                    INNER JOIN transaction t2
                            ON t1.TRANS_D_ID = t2.TRANS_D_ID WHERE t2.CITY='$ciudad' AND date(t2.DATE)='$firstDay' GROUP BY t1.PRODUCTS");


$result3 = mysqli_query($conn,"SELECT SUM(CANT_CAJAS) as CANT_CAJAS FROM transaction WHERE CITY='$ciudad' AND DATE(date)='{$firstDay}'");

while($row = mysqli_fetch_array($result3)) {
                  $cajasSemana1 =  $row['CANT_CAJAS'];

}

$result4 = mysqli_query($conn,"SELECT SUM(CANT_CAJAS) as CANT_CAJAS FROM transaction WHERE CITY='$ciudad' AND DATE(date)='{$segundoLunes}' ");

while($row = mysqli_fetch_array($result4)) {
                  $cajasSemana2 =  $row['CANT_CAJAS'];

}

$result5 = mysqli_query($conn,"SELECT SUM(CANT_CAJAS) as CANT_CAJAS FROM transaction WHERE CITY='$ciudad' AND DATE(date)='{$tercerLunes}' ");

while($row = mysqli_fetch_array($result5)) {
                  $cajasSemana3 =  $row['CANT_CAJAS'];

}


$result6 = mysqli_query($conn,"SELECT SUM(CANT_CAJAS) as CANT_CAJAS FROM transaction WHERE CITY='$ciudad' AND DATE(date)='{$cuartoLunes}' ");

while($row = mysqli_fetch_array($result6)) {
                  $cajasSemana4 =  $row['CANT_CAJAS'];

}


$result7 = mysqli_query($conn,"SELECT SUM(CANT_CAJAS) as CANT_CAJAS FROM transaction WHERE CITY='$ciudad' AND DATE(date)='{$quintoLunes}'");

while($row = mysqli_fetch_array($result7)) {
                  $cajasSemana5 =  $row['CANT_CAJAS'];

}
/*
$result4 = mysqli_query($conn,"SELECT SUM(GRANDTOTAL) as GRANDTOTAL FROM transaction WHERE CITY='$ciudad' AND DATE(date) BETWEEN '{$firstDay}' AND '{$primerDomingo}'");

while($row = mysqli_fetch_array($result4)) {
                  $ventaSemana1 =  $row['GRANDTOTAL'];

}


$result5 = mysqli_query($conn,"SELECT * FROM cortes WHERE CITY='$ciudad' AND DATE(date) BETWEEN '{$firstDay}%' AND '{$primerDomingo}%'");

while($row = mysqli_fetch_array($result5)) {
 if (($row['TIPO'] == 3)||($row['TIPO'] == 2)){
                  //  el monto se le resta al total de las ventas dejando solo el monto 
                           $gastoSemana1 +=  $row['MONTO'];
                          }
}



$result6 = mysqli_query($conn,"SELECT SUM(GRANDTOTAL) as GRANDTOTAL FROM transaction WHERE CITY='$ciudad' AND DATE(date) BETWEEN '{$segundoLunes}' AND '{$segundoDomingo}'");

while($row = mysqli_fetch_array($result6)) {
                  $ventaSemana2 =  $row['GRANDTOTAL'];

}


$result7 = mysqli_query($conn,"SELECT * FROM cortes WHERE CITY='$ciudad' AND DATE(date) BETWEEN '{$segundoLunes}%' AND '{$segundoDomingo}%'");

while($row = mysqli_fetch_array($result7)) {
if (($row['TIPO'] == 3)||($row['TIPO'] == 2)){
                  //  el monto se le resta al total de las ventas dejando solo el monto 
                           $gastoSemana2 +=  $row['MONTO'];
                          }

}

$result8 = mysqli_query($conn,"SELECT SUM(GRANDTOTAL) as GRANDTOTAL FROM transaction WHERE CITY='$ciudad' AND DATE(date) BETWEEN '{$tercerLunes}' AND '{$tercerDomingo}'");

while($row = mysqli_fetch_array($result8)) {

                  $ventaSemana3 =  $row['GRANDTOTAL'];

}


$result9 = mysqli_query($conn,"SELECT * FROM cortes WHERE CITY='$ciudad' AND DATE(date) BETWEEN '{$tercerLunes}%' AND '{$tercerDomingo}%'");

while($row = mysqli_fetch_array($result9)) {

if (($row['TIPO'] == 3)||($row['TIPO'] == 2)){
                  //  el monto se le resta al total de las ventas dejando solo el monto 
                           $gastoSemana3 +=  $row['MONTO'];
                          }

}


$result10 = mysqli_query($conn,"SELECT SUM(GRANDTOTAL) as GRANDTOTAL FROM transaction WHERE CITY='$ciudad' AND DATE(date) BETWEEN '{$cuartoLunes}' AND '{$cuartoDomingo}'");

while($row = mysqli_fetch_array($result10)) {
                  $ventaSemana4 =  $row['GRANDTOTAL'];

}


$result11 = mysqli_query($conn,"SELECT * FROM cortes WHERE CITY='$ciudad' AND DATE(date) BETWEEN '{$cuartoLunes}%' AND '{$cuartoDomingo}%'");

while($row = mysqli_fetch_array($result11)) {
if (($row['TIPO'] == 3)||($row['TIPO'] == 2)){
                  //  el monto se le resta al total de las ventas dejando solo el monto 
                           $gastoSemana4 +=  $row['MONTO'];
                          }

}


$result12 = mysqli_query($conn,"SELECT SUM(GRANDTOTAL) as GRANDTOTAL FROM transaction WHERE CITY='$ciudad' AND DATE(date) BETWEEN '{$quintoLunes}' AND '{$lastDay}'");

while($row = mysqli_fetch_array($result12)) {
                  $ventaSemana5 =  $row['GRANDTOTAL'];

}


$result13 = mysqli_query($conn,"SELECT * FROM cortes WHERE CITY='$ciudad' AND DATE(date) BETWEEN '{$quintoLunes}%' AND '{$quintoDomingo}%'");

while($row = mysqli_fetch_array($result13)) {
if (($row['TIPO'] == 3)||($row['TIPO'] == 2)){
                  //  el monto se le resta al total de las ventas dejando solo el monto 
                           $gastoSemana5 +=  $row['MONTO'];
                          }

}



*/










cellColor('O2:S1', 'C773FE');
cellColor('O4:S4', 'C773FE');
cellColor('O6:S6', 'C773FE');
cellColor('O8:S8', 'C773FE');




$objPHPExcel->getActiveSheet()->setCellValue('A1', 'VENTAS DEL');
$objPHPExcel->getActiveSheet()->setCellValue('B1', $firstDay);


//ENCABEZADO VENTAS REALIZADAS

$objPHPExcel->getActiveSheet()->setCellValue('J1', 'PRODUCTOS VENDIDOS DEL');
$objPHPExcel->getActiveSheet()->setCellValue('K1', $firstDay);
$objPHPExcel->getActiveSheet()->setCellValue('L1', 'AL');
$objPHPExcel->getActiveSheet()->setCellValue('M1', $lastDay);

$objPHPExcel->getActiveSheet()->setCellValue('A2', 'FECHA');
$objPHPExcel->getActiveSheet()->setCellValue('B2', 'TOTAL');
$objPHPExcel->getActiveSheet()->setCellValue('C2', 'METODO DE PAGO');
$objPHPExcel->getActiveSheet()->setCellValue('D2', 'INTERMEDIARIO');
$objPHPExcel->getActiveSheet()->setCellValue('E2', 'CAJAS');
$objPHPExcel->getActiveSheet()->setCellValue('F2', 'COMENTARIOS');
$objPHPExcel->getActiveSheet()->setCellValue('G2', 'MOTIVO CANCEL');



//ENCABEZADO PRODUCTOS VENDIDOS
$objPHPExcel->getActiveSheet()->setCellValue('J2', 'NOMBRE DEL PRODUCTO');
$objPHPExcel->getActiveSheet()->setCellValue('K2', 'CANTIDAD');
$objPHPExcel->getActiveSheet()->setCellValue('L2', 'PRECIO UNITARIO');
$objPHPExcel->getActiveSheet()->setCellValue('M2', 'VENTAS');



//ENCABEZADO VENTAS, GASTOS Y UTILIDADES SEMANALES   


$objPHPExcel->getActiveSheet()->setCellValue('O3', 'SEMANA 1');
$objPHPExcel->getActiveSheet()->setCellValue('O4', 'SEMANA 2');
$objPHPExcel->getActiveSheet()->setCellValue('O5', 'SEMANA 3');
$objPHPExcel->getActiveSheet()->setCellValue('O6', 'SEMANA 4');
$objPHPExcel->getActiveSheet()->setCellValue('O7', 'SEMANA 5');


$objPHPExcel->getActiveSheet()->setCellValue('P2', 'PERIODO');
$objPHPExcel->getActiveSheet()->setCellValue('Q2', 'VENTAS');
$objPHPExcel->getActiveSheet()->setCellValue('R2', 'GASTO');
$objPHPExcel->getActiveSheet()->setCellValue('S2', 'UTILIDAD');
$objPHPExcel->getActiveSheet()->setCellValue('T2', 'TOTAL CAJAS');


// VENTAS, GASTOS Y UTILIDADES SEMANALES   
//SEMANA 1
$objPHPExcel->getActiveSheet()->setCellValue('P3', $firstDay.'--'. $primerDomingo);
$objPHPExcel->getActiveSheet()->setCellValue('Q3', $ventaSemana1);
$objPHPExcel->getActiveSheet()->setCellValue('R3', $gastoSemana1);
$objPHPExcel->getActiveSheet()->setCellValue('S3', $utilidadSemana1);
$objPHPExcel->getActiveSheet()->setCellValue('T3', $cajasSemana1);

//SEMANA 2
$objPHPExcel->getActiveSheet()->setCellValue('P4', $segundoLunes.'--'. $segundoDomingo);
$objPHPExcel->getActiveSheet()->setCellValue('Q4', $ventaSemana2);
$objPHPExcel->getActiveSheet()->setCellValue('R4', $gastoSemana2);
$objPHPExcel->getActiveSheet()->setCellValue('S4', $utilidadSemana2);
$objPHPExcel->getActiveSheet()->setCellValue('T4', $cajasSemana2);

//SEMANA 3
$objPHPExcel->getActiveSheet()->setCellValue('P5', $tercerLunes.'--'. $tercerDomingo);
$objPHPExcel->getActiveSheet()->setCellValue('Q5', $ventaSemana3);
$objPHPExcel->getActiveSheet()->setCellValue('R5', $gastoSemana3);
$objPHPExcel->getActiveSheet()->setCellValue('S5', $utilidadSemana3);
$objPHPExcel->getActiveSheet()->setCellValue('T5', $cajasSemana3);

//SEMANA 4
$objPHPExcel->getActiveSheet()->setCellValue('P6', $cuartoLunes.'--'. $cuartoDomingo);
$objPHPExcel->getActiveSheet()->setCellValue('Q6', $ventaSemana4);
$objPHPExcel->getActiveSheet()->setCellValue('R6', $gastoSemana4);
$objPHPExcel->getActiveSheet()->setCellValue('S6', $utilidadSemana4);
$objPHPExcel->getActiveSheet()->setCellValue('T6', $cajasSemana4);

//SEMANA 5
$objPHPExcel->getActiveSheet()->setCellValue('P7', $quintoLunes.'--'. $lastDay);
$objPHPExcel->getActiveSheet()->setCellValue('Q7', $ventaSemana5);
$objPHPExcel->getActiveSheet()->setCellValue('R7', $gastoSemana5);
$objPHPExcel->getActiveSheet()->setCellValue('S7', $utilidadSemana5);
$objPHPExcel->getActiveSheet()->setCellValue('T7', $cajasSemana5);



$objPHPExcel->getActiveSheet()->setCellValue('P8', 'SUB TOTAL');
$objPHPExcel->getActiveSheet()->setCellValue('Q8', $ventaMes);
$objPHPExcel->getActiveSheet()->setCellValue('R8', $gastoMes);
$objPHPExcel->getActiveSheet()->setCellValue('S8', $utilidadMes);
$objPHPExcel->getActiveSheet()->setCellValue('T8', $totalcajas);



//TAMAÑO DE LA FILAS

$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(10);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(10);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(10);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(10);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(10);
$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(10);
$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(10);
$objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(10);
$objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(10);
$objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(10);


$i=3; 
$a=3;
$f=10;
//TRANSACCIONES REALIZADAS

while($row = mysqli_fetch_array($result)) {

  $DATE=$row['DATE'];
  $GRANDTOTAL=$row['GRANDTOTAL'];
  $METODO_PAGO=$row['METODO_PAGO'];
  $INTERMEDIARIO=$row['INTERMEDIARIO'];
  $CANT_CAJAS=$row['CANT_CAJAS'];
  $COMENTARIOS=$row['COMENTARIOS'];
  $MOTIVO_CANCEL=$row['MOTIVO_CANCEL'];

 if($i % 2 == 0) 
    {
cellColor("A$i", 'FFFFFF');
cellColor("B$i", 'FFFFFF');
cellColor("C$i", 'FFFFFF');
cellColor("D$i", 'FFFFFF');
cellColor("E$i", 'FFFFFF');
cellColor("F$i", 'FFFFFF');
cellColor("G$i", 'FFFFFF');


   }
   else 
  {
cellColor("A$i", 'FFFD99');
cellColor("B$i", 'FFFD99');
cellColor("C$i", 'FFFD99');
cellColor("D$i", 'FFFD99');
cellColor("E$i", 'FFFD99');
cellColor("F$i", 'FFFD99');
cellColor("G$i", 'FFFD99');
  }



  $objPHPExcel->getActiveSheet()->setCellValue("A$i",$DATE);
  $objPHPExcel->getActiveSheet()->setCellValue("B$i",$GRANDTOTAL);

        if($METODO_PAGO == "1"){
              $objPHPExcel->getActiveSheet()->setCellValue("C$i","Efectivo");
        }if($METODO_PAGO == "2"){
              $objPHPExcel->getActiveSheet()->setCellValue("C$i","Tarjeta"); } 


        if($INTERMEDIARIO == "1"){
              $objPHPExcel->getActiveSheet()->setCellValue("D$i","Sucursal");
        }if($INTERMEDIARIO == "2"){
              $objPHPExcel->getActiveSheet()->setCellValue("D$i","DIDI"); 
            }if($INTERMEDIARIO == "3"){
              $objPHPExcel->getActiveSheet()->setCellValue("D$i","UBER"); 
            }if($INTERMEDIARIO == "4"){
              $objPHPExcel->getActiveSheet()->setCellValue("D$i","Sin Delantal"); 
            }if($INTERMEDIARIO == "5"){
              $objPHPExcel->getActiveSheet()->setCellValue("D$i","Rappi"); }

  $objPHPExcel->getActiveSheet()->setCellValue("E$i",$CANT_CAJAS);
  $objPHPExcel->getActiveSheet()->setCellValue("F$i",$COMENTARIOS);
  $objPHPExcel->getActiveSheet()->setCellValue("G$i",$MOTIVO_CANCEL);

$i++;
}





//PRODUCTOS VENDIDOS
while($row = mysqli_fetch_array($result2)) {


 if($a % 2 == 0) 
    {
cellColor("J$a", 'FFFFFF');
cellColor("K$a", 'FFFFFF');
cellColor("L$a", 'FFFFFF');
cellColor("M$a", 'FFFFFF');



   }
   else 
  {
cellColor("J$a", 'FEDA73');
cellColor("K$a", 'FEDA73');
cellColor("L$a", 'FEDA73');
cellColor("M$a", 'FEDA73');

  }
  $PRODUCTS=$row['PRODUCTS'];
  $PRICE=$row['PRICE'];
  $QTY=$row['QTY'];
  $precioTotal=$row['PRICE']*$row['QTY'];




  $objPHPExcel->getActiveSheet()->setCellValue("J$a",$PRODUCTS);
  $objPHPExcel->getActiveSheet()->setCellValue("K$a",$QTY);
  $objPHPExcel->getActiveSheet()->setCellValue("L$a",$PRICE);
  $objPHPExcel->getActiveSheet()->setCellValue("M$a",$precioTotal);

$a++;
}







/* Rename 2nd sheet*/
$objPHPExcel->getActiveSheet()->setTitle('Resumen dia 1');











/* Redirect output to a client’s web browser (Excel5)*/
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="RESUMEN MENSUAL.xls"');
header('Cache-Control: max-age=0');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');