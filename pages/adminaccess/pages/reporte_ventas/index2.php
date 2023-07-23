<?php

/* HTML a Excel
Autor: Hugo Parrales
Website: hugoparrales.com
version: 0.1
*/ 
/* HTML a Excel
Autor: Hugo Parrales
Website: hugoparrales.com
version: 0.1
*/ 
//establecemos el timezone para obtener la hora local
date_default_timezone_set('America/El_Salvador');
require_once 'Classes/PHPExcel.php';
require_once 'Classes/PHPExcel/IOFactory.php';


/* Create new PHPExcel object*/
$objPHPExcel = new PHPExcel();

header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="name_of_file.xls"');
header('Cache-Control: max-age=0');

//la fecha y hora de exportación sera parte del nombre del archivo Excel
$fecha = date("d-m-Y H:i:s");
     $firstDay = $_GET['fd'];
     $lastDay = $_GET['ld'];
     $ciudad = $_GET['cd'];
     $rc=0;






$objPHPExcel->setActiveSheetIndex(0);


require_once 'connection.php';
$db = mysqli_connect('localhost', 'root', '') or
        die ('Unable to connect. Check your connection parameters.');
        mysqli_select_db($db, 'prince' ) or die(mysqli_error($db));


      

$query="SELECT * FROM transaction WHERE CITY='$ciudad' AND DATE(date) BETWEEN '{$firstDay}' AND '{$lastDay}'";
$result=mysqli_query($db, $query);
?>
      <style> table, td {border:1px solid black} table {border-collapse:collapse}</style>


<div class="row" style="width: 700px">

<table style="width: 700px">

  <tr>
                <th colspan="6">Ventas del <?php echo $firstDay; ?> AL <?php echo $lastDay; ?> <?php echo $ciudad; ?></th>
  </tr>

  <tr>
                      <th style='background:#CCC; color:#fff'> Fecha</th>
                      <th > Total</th>
                      <th style='background:#CCC; color:#fff'> Metodo de pago</th>
                      <th > Intermediario</th>
                      <th style='background:#CCC; color:#fff'> Cajas</th>

                      <th > Comentarios</th>
                      <th style='background:#CCC; color:#fff'> Motivo de cancelación</th>

  </tr>
        <?php
          while($row=mysqli_fetch_assoc($result)){
             $rc++;
    if ($rc % 2 == 1)
    {
        $tr = '#cccccc';
    } 
    else 
    {
        $tr = '#ffffff';    }
?>

  <tr style="background-color:<?php echo $tr ;?>">
                      <td ><?php echo $row['DATE']; ?></td>
                      <td ><?php echo $row['GRANDTOTAL']; ?></td>
                      <td ><?php echo $row['METODO_PAGO']; ?></td>
                      <td ><?php echo $row['INTERMEDIARIO']; ?></td>
                      <td ><?php echo $row['CANT_CAJAS']; ?></td>

                      <td ><?php echo $row['COMENTARIOS']; ?></td>
                      <td ><?php echo $row['MOTIVO_CANCEL']; ?></td>

  </tr>


        <?php


          }



/*Rename sheet*/
?>
  </table>

  </div>
        <?php
/*Rename sheet*/
$objPHPExcel->getActiveSheet()->setTitle('Hoja1');
?>







        <?php


  /* Create a new worksheet, after the default sheet*/
$objPHPExcel->createSheet();

/* Add some data to the second sheet, resembling some different data types*/
$objPHPExcel->setActiveSheetIndex(1);

?>

<?php
    // Add new sheet


      // Add new sheet
      $objWorkSheet = $objPHPExcel->createSheet(1); //Setting index when creating

      //Write cells
      $objWorkSheet->setCellValue('A1', 'Hello')
                   ->setCellValue('B2', 'world!')
                   ->setCellValue('C1', 'Hello')
                   ->setCellValue('D2', 'world!');

      // Rename sheet
      $objWorkSheet->setTitle('Hello');





//Inicio de exportación en Excel

$objPHPExcel->getActiveSheet()->setTitle('Hoja 2');

/* Redirect output to a client’s web browser (Excel5)*/

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
