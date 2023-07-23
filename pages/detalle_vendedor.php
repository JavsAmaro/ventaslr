<?php
include'../includes/connection.php';
include'../includes/topp.php';
           $id = $_GET['id'];
           $fd = $_GET['fd'];
           $ld = $_GET['ld'];

           $sumatotalf=0;
?>
<?php 

                $query = 'SELECT ID, t.TYPE
                          FROM users u
                          JOIN type t ON t.TYPE_ID=u.TYPE_ID WHERE ID = '.$_SESSION['MEMBER_ID'].'';
                $result = mysqli_query($db, $query) or die (mysqli_error($db));
      
                while ($row = mysqli_fetch_assoc($result)) {
                          $Aa = $row['TYPE'];
                   
if ($Aa=='User'){
           
             ?>    <script type="text/javascript">
                      //then it will be redirected
                      alert("¡Página restringida! Serás redirigido a POS");
                      window.location = "pos.php";
                  </script>
             <?php   }
                         
           
}   
            ?>







            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Ventas de <?php echo  $id;  ?></h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
               <thead>
                   <tr>
                     <th>Empleado</th>
                     <th>Monto vendido </th>
                     <th>Fecha </th>
                      <th>Metodo de pago </th>

                     <th>Intermediario </th>

                   </tr>
               </thead>
          <tbody>

<?php  


   $query = "SELECT *
              FROM transaction T
              JOIN transaction_details TD ON TD.`TRANS_D_ID`=T.`TRANS_D_ID`
               AND T.CITY LIKE '{$_SESSION['CITY']}%' 
               AND TD.EMPLOYEE LIKE '{$id}%'
                AND date(T.DATE) BETWEEN '{$fd}%' AND '{$ld}%' 
               GROUP BY TD.TRANS_D_ID ASC";






        $result = mysqli_query($db, $query) or die (mysqli_error($db));
      
            while ($row = mysqli_fetch_assoc($result)) {
                                 
                echo '<tr>';
                echo '<td>'. $row['EMPLOYEE'].'</td>';
 
                echo '<td>'. number_format($row['GRANDTOTAL'], 2, '.', ',').'</td>';

                echo '<td>'. date('H:i:s d/m/Y ',strtotime($row['DATE'])).'</td>';


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





                  echo '</tr> ';


                      $sumatotalf=$sumatotalf+$row['GRANDTOTAL'];

                        }
                        echo "Total de ventas: ";
                        echo $sumatotalf;
?> 



                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                  </div>
















<script>
function goBack() {
  window.history.back();
}
</script>

<?php
include'../includes/footer.php';
?>