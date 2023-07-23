<?php

include'../includes/connection.php';
 ?>
<?php
           

           $sql = "SELECT DISTINCT NAME_INGREDIENTE, ID_INGREDIENTE FROM ingredientes order by NAME_INGREDIENTE asc";
           $result = mysqli_query($db, $sql) or die ("Bad SQL: $sql");
           
           
           $sql = "SELECT DISTINCT NAME_INGREDIENTE, ID_INGREDIENTE FROM ingredientes order by NAME_INGREDIENTE asc";
           $result1 = mysqli_query($db, $sql) or die ("Bad SQL: $sql");
           
           
           
           
           $aaa = "<select class='form-control' name='ingrediente1' required>
                   <option disabled selected hidden>Ingrediente1</option>";
             while ($row = mysqli_fetch_assoc($result)) {
               $aaa .= "<option value='".$row['NAME_INGREDIENTE']."'>".$row['NAME_INGREDIENTE']."</option>";
             }
           
           $aaa .= "</select>";
           
           
                
           $bbb = "<select class='form-control' name='ingrediente2' required>
                   <option disabled selected hidden>Ingrediente2</option>";
             while ($row = mysqli_fetch_assoc($result1)) {
               $bbb .= "<option value='".$row['NAME_INGREDIENTE']."'>".$row['NAME_INGREDIENTE']."</option>";
             }
           
           $bbb .= "</select>";

           ?>




 <style type="text/css">
   .stock{
     display: inline-block;
  vertical-align:baseline;
   }
 </style>
                          <!-- Tab panes -->
                            <div class="tab-content"  >
                              <!-- PROMOS TAB -->
                                <div class="tab-pane fade in mt-2" id="promos">
                                  <div class="row" style="justify-content: center;">
                                      <?php  $query = "SELECT * FROM product WHERE CATEGORY_ID=0 AND CITY  LIKE '{$_SESSION['CITY']}%' ORDER by PRODUCT_ID ASC";
                                        $result = mysqli_query($db, $query);

                                        if ($result):
                                            if(mysqli_num_rows($result)>0):
                                                while($product = mysqli_fetch_assoc($result)):
                                                //print_r($product);
                                      ?>
                                    <div class="col-sm-auto--menu col-md-auto--menu">
                                      <form method="post" action="pos.php?action=add&id=<?php echo $product['PRODUCT_ID']; ?>">
                                          <div class="products" style="text-align: center;" >
                                          <?php
                                                if(($product['IMAGENES'] == null))
                                                {
                                                 echo ' <img src="img/lr-logo.jpg"  title="'.$product['DESCRIPTION'].'" width="50px" height="50px" />';

                                               }if(($product['IMAGENES'] != null))
                                                {
                                                 echo ' <img src="img/'.$product['IMAGENES'].'"  title="'.$product['DESCRIPTION'].'" width="50px" height="50px" />';
                                               } ?>


                                              <h6 class="text-info"><?php echo $product['NAME']; ?></h6>

                                              <h6>$ <?php echo $product['PRICE']; ?></h6>

                                                   <?php /* Stock  
                                              if(($product['QTY_STOCK'] <= "15")&&($product['QTY_STOCK'] > "0")){
                                                 echo '<h6 class="text-warning stock">'. $product['QTY_STOCK'].'</h6>';
                                               }if($product['QTY_STOCK'] > "15"){
                                                 echo '<h6 class="text-success stock">'. $product['QTY_STOCK'].'</h6>';
                                               } if($product['QTY_STOCK'] <= "0"){
                                                 echo '<h6 class="text-danger stock">'. $product['QTY_STOCK'].'</h6>';
                                               } 
                                                */?>

                                              <input type="number" name="quantity" class="form-control" style="width: 6.5rem;" value="1" />
                                              <input type="hidden" name="description" value="<?php echo $product['DESCRIPTION']; ?>" />

                                               <input type="hidden" name="category_id" value="<?php echo $product['CATEGORY_ID']; ?>" />

                                              <input type="hidden" name="description" value="<?php echo $product['DESCRIPTION']; ?>" />



                                              <input type="hidden" name="name" value="<?php echo $product['NAME']; ?>" />
                                              <input type="hidden" name="price" value="<?php echo $product['PRICE']; ?>" />
                                            
                                              <input type="hidden" name="cant_cajas" value="<?php echo $product['CANT_CAJAS']; ?>" />

                                               <input type="hidden" name="category_id" value="<?php echo $product['CATEGORY_ID']; ?>" />
                                               <!--<h6>Cajas <?php echo $product['CANT_CAJAS']; ?></h6>-->

                                               <input type="hidden" name="intermediario" value="1" />

                                              <input type="submit" name="addpos" style="margin-top:5px;" class="btn btn-info"
                                                     value="Añadir" />
                                              

                                          </div>
                                      </form>
                                  </div>
                                      <?php endwhile; ?>
                                    </div>
                                </div>
                                            <?php
                                        endif;
                                    endif;   
                                    ?>

                                    
                              <!-- ADEREZO TAB -->
                                <div class="tab-pane fade in mt-2 " id="aderezo">
                                  <div class="row " style="justify-content: center;">
                                      <?php  $query = "SELECT * FROM product WHERE CATEGORY_ID=1 AND CITY  LIKE '{$_SESSION['CITY']}%' ORDER by PRODUCT_ID ASC";
                                        $result = mysqli_query($db, $query);

                                        if ($result):
                                            if(mysqli_num_rows($result)>0):
                                                while($product = mysqli_fetch_assoc($result)):
                                                //print_r($product);
                                      ?>
                                    <div class="col-sm-auto--menu col-md-auto--menu" >
                                    <form method="post" action="pos.php?action=add&id=<?php echo $product['PRODUCT_ID']; ?>">
                                          <div class="products">
                                               <img src="img/<?php echo $product['IMAGENES']; ?>"  title="<?php echo $product['DESCRIPTION']; ?>" width="50px" height="50px" />

                                              <h6 class="text-info"><?php echo $product['NAME']; ?></h6>
                                              <h6>$ <?php echo $product['PRICE']; ?></h6>
                                              <input type="number" name="quantity" class="form-control" value="1" />
                                              <input type="hidden" name="name" value="<?php echo $product['NAME']; ?>" />
                                              <input type="hidden" name="price" value="<?php echo $product['PRICE']; ?>" />
                                              <input type="hidden" name="intermediario" value="1" />
                                              <input type="hidden" name="cant_cajas" value="<?php echo $product['CANT_CAJAS']; ?>" />

                                              <input type="submit" name="addpos" style="margin-top:5px;" class="btn btn-info"
                                                     value="Añadir" />
                                          </div>
                                      </form>
                                  </div>
                                      <?php endwhile;
                                        endif;
                                    endif;   
                                    ?>
                                    </div>
                                </div>

                                <!-- PIZZA INDIVIDUAL TAB -->
                                <div class="tab-pane fade in mt-2 " id="individuales">
                                  <div class="row " style="justify-content: center;">
                                      <?php  $query = "SELECT * FROM product WHERE CATEGORY_ID=8 AND CITY  LIKE '{$_SESSION['CITY']}%' ORDER by PRODUCT_ID ASC";
                                        $result = mysqli_query($db, $query);

                                        if ($result):
                                            if(mysqli_num_rows($result)>0):
                                                while($product = mysqli_fetch_assoc($result)):
                                                //print_r($product);
                                      ?>
                                    <div class="col-sm-auto--menu col-md-auto--menu" >
                                    <form method="post" action="pos.php?action=add&id=<?php echo $product['PRODUCT_ID']; ?>">
                                          <div class="products">
                                               <img src="img/<?php echo $product['IMAGENES']; ?>"  title="<?php echo $product['DESCRIPTION']; ?>" width="50px" height="50px" />

                                              <h6 class="text-info"><?php echo $product['NAME']; ?></h6>
                                              <h6>$ <?php echo $product['PRICE']; ?></h6>
                                              <input type="number" name="quantity" class="form-control" value="1" />
                                              <input type="hidden" name="name" value="<?php echo $product['NAME']; ?>" />
                                              <input type="hidden" name="price" value="<?php echo $product['PRICE']; ?>" />
                                              <input type="hidden" name="intermediario" value="1" />
                                              <input type="hidden" name="cant_cajas" value="<?php echo $product['CANT_CAJAS']; ?>" />

                                              <input type="submit" name="addpos" style="margin-top:5px;" class="btn btn-info"
                                                     value="Añadir" />
                                          </div>
                                      </form>
                                  </div>
                                      <?php endwhile;
                                        endif;
                                    endif;   
                                    ?>
                                    </div>
                                </div>

                                
                              <!-- COMPLEMENTOS TAB -->

                                <div class="tab-pane fade in mt-2" id="complementos">
                                  <div class="row" style="justify-content: center;">
                                      <?php  $query = "SELECT * FROM product WHERE CATEGORY_ID=2 AND CITY  LIKE '{$_SESSION['CITY']}%' ORDER by PRODUCT_ID ASC";
                                        $result = mysqli_query($db, $query);

                                        if ($result):
                                            if(mysqli_num_rows($result)>0):
                                                while($product = mysqli_fetch_assoc($result)):
                                                //print_r($product);
                                      ?>
                                    <div class="col-sm-auto--menu col-md-auto--menu" >
                                      <form method="post" action="pos.php?action=add&id=<?php echo $product['PRODUCT_ID']; ?>">
                                          <div class="products" style="text-align: center;">
                                                                                  <?php
                                                if(($product['IMAGENES'] == null))
                                                {
                                                 echo ' <img src="img/lr-logo.jpg"  title="'.$product['DESCRIPTION'].'" width="50px" height="50px" />';

                                               }if(($product['IMAGENES'] != null))
                                                {
                                                 echo ' <img src="img/'.$product['IMAGENES'].'"  title="'.$product['DESCRIPTION'].'" width="50px" height="50px" />';
                                               } ?>

                                              <h6 class="text-info"><?php echo $product['NAME']; ?></h6>
                                              <h6>$ <?php echo $product['PRICE']; ?></h6>
                                                  <?php /* Stock  
                                              if(($product['QTY_STOCK'] <= "15")&&($product['QTY_STOCK'] > "0")){
                                                 echo '<h6 class="text-warning stock">'. $product['QTY_STOCK'].'</h6>';
                                               }if($product['QTY_STOCK'] > "15"){
                                                 echo '<h6 class="text-success stock">'. $product['QTY_STOCK'].'</h6>';
                                               } if($product['QTY_STOCK'] <= "0"){
                                                 echo '<h6 class="text-danger stock">'. $product['QTY_STOCK'].'</h6>';
                                               } 
                                                */?>

                                              <input type="number" name="quantity" class="form-control" style="width: 6.5rem;" value="1" />
                                              <input type="hidden" name="description" value="<?php echo $product['DESCRIPTION']; ?>" />

                                               <input type="hidden" name="category_id" value="<?php echo $product['CATEGORY_ID']; ?>" />
                                              <input type="hidden" name="name" value="<?php echo $product['NAME']; ?>" />
                                              <input type="hidden" name="price" value="<?php echo $product['PRICE']; ?>" />
                                              <input type="hidden" name="cant_cajas" value="<?php echo $product['CANT_CAJAS']; ?>" />
                                              <input type="hidden" name="intermediario" value="1" />
                                              <input type="submit" name="addpos" style="margin-top:5px;" class="btn btn-info"
                                                     value="Añadir" />
                                          </div>
                                      </form>
                                  </div>
                                      <?php endwhile;
                                        endif;
                                    endif;   
                                    ?>
                                    </div>
                                </div>
                              <!-- Cortesias TAB -->
                                <div class="tab-pane fade in mt-2" id="cortesias">
                                  <div class="row" style="justify-content: center;">
                                      <?php  $query = "SELECT * FROM product WHERE CATEGORY_ID=3 AND CITY  LIKE '{$_SESSION['CITY']}%' ORDER by PRODUCT_ID ASC";
                                        $result = mysqli_query($db, $query);

                                        if ($result):
                                            if(mysqli_num_rows($result)>0):
                                                while($product = mysqli_fetch_assoc($result)):
                                                //print_r($product);
                                      ?>
                                    <div class="col-sm-auto--menu col-md-auto--menu" >
                                      <form method="post" action="pos.php?action=add&id=<?php echo $product['PRODUCT_ID']; ?>">
                                          <div class="products" style="text-align: center;">
                                                                                 <?php
                                                if(($product['IMAGENES'] == null))
                                                {
                                                 echo ' <img src="img/lr-logo.jpg"  title="'.$product['DESCRIPTION'].'" width="50px" height="50px" />';

                                               }if(($product['IMAGENES'] != null))
                                                {
                                                 echo ' <img src="img/'.$product['IMAGENES'].'"  title="'.$product['DESCRIPTION'].'" width="50px" height="50px" />';
                                               } ?>
                                              <h6 class="text-info"><?php echo $product['NAME']; ?></h6>
                                              <h6>$ <?php echo $product['PRICE']; ?></h6>

                                                   <?php /* Stock  
                                              if(($product['QTY_STOCK'] <= "15")&&($product['QTY_STOCK'] > "0")){
                                                 echo '<h6 class="text-warning stock">'. $product['QTY_STOCK'].'</h6>';
                                               }if($product['QTY_STOCK'] > "15"){
                                                 echo '<h6 class="text-success stock">'. $product['QTY_STOCK'].'</h6>';
                                               } if($product['QTY_STOCK'] <= "0"){
                                                 echo '<h6 class="text-danger stock">'. $product['QTY_STOCK'].'</h6>';
                                               } 
                                                */?>

                                              <input type="number" name="quantity" class="form-control" style="width: 6.5rem;" value="1" />
                                              <input type="hidden" name="description" value="<?php echo $product['DESCRIPTION']; ?>" />

                                               <input type="hidden" name="category_id" value="<?php echo $product['CATEGORY_ID']; ?>" />
                                              <input type="hidden" name="name" value="<?php echo $product['NAME']; ?>" />
                                              <input type="hidden" name="price" value="<?php echo $product['PRICE']; ?>" />
                                              <input type="hidden" name="cant_cajas" value="<?php echo $product['CANT_CAJAS']; ?>" />
                                              <input type="hidden" name="intermediario" value="1" />
                                              <input type="submit" name="addpos" style="margin-top:5px;" class="btn btn-info"
                                                     value="Añadir" />
                                          </div>
                                      </form>
                                  </div>
                                      <?php endwhile;
                                        endif;
                                    endif;   
                                    ?>
                                    </div>
                                </div>


                              <!-- Pizzas TAB -->
                                <div class="tab-pane fade mt-2 active show in " id="siempre_Listas" > 
                                  <div class="row" style="justify-content: center;">
                                      <?php  $query = "SELECT * FROM product WHERE CATEGORY_ID=4 AND CITY  LIKE '{$_SESSION['CITY']}%' ORDER by PRODUCT_ID ASC";
                                        $result = mysqli_query($db, $query);

                                        if ($result):
                                            if(mysqli_num_rows($result)>0):
                                                while($product = mysqli_fetch_assoc($result)):
                                                //print_r($product);
                                      ?>
                                    <div class="col-sm-auto--menu col-md-auto--menu" >
                                      <form method="post" action="pos.php?action=add&id=<?php echo $product['PRODUCT_ID']; ?>">
                                          <div class="products" style="text-align: center;">
                                                                                 <?php
                                                if(($product['IMAGENES'] == null))
                                                {
                                                 echo ' <img src="img/lr-logo.jpg"  title="'.$product['DESCRIPTION'].'" width="50px" height="50px" />';

                                               }if(($product['IMAGENES'] != null))
                                                {
                                                 echo ' <img src="img/'.$product['IMAGENES'].'"  title="'.$product['DESCRIPTION'].'" width="50px" height="50px" />';
                                               } ?>
                                              <h6 class="text-info"><?php echo $product['NAME']; ?></h6>
                                              <h6>$ <?php echo $product['PRICE']; ?></h6>

                                                   <?php /* Stock  
                                              if(($product['QTY_STOCK'] <= "15")&&($product['QTY_STOCK'] > "0")){
                                                 echo '<h6 class="text-warning stock">'. $product['QTY_STOCK'].'</h6>';
                                               }if($product['QTY_STOCK'] > "15"){
                                                 echo '<h6 class="text-success stock">'. $product['QTY_STOCK'].'</h6>';
                                               } if($product['QTY_STOCK'] <= "0"){
                                                 echo '<h6 class="text-danger stock">'. $product['QTY_STOCK'].'</h6>';
                                               } 
                                                */?>
                                              <input type="number" name="quantity" class="form-control" style="width: 6.5rem;" value="1" />

                                              <?php
                                              if ($product['INGREDIENTE']=="SI") {
                                               echo $aaa;
                                               echo $bbb;
                                                // code...
                                              }
                                              ?>

                                              <input type="hidden" name="description" value="<?php echo $product['DESCRIPTION']; ?>" />

                                               <input type="hidden" name="category_id" value="<?php echo $product['CATEGORY_ID']; ?>" />
                                              <input type="hidden" name="name" value="<?php echo $product['NAME']; ?>" />
                                              <input type="hidden" name="price" value="<?php echo $product['PRICE']; ?>" />
                                              <input type="hidden" name="cant_cajas" value="<?php echo $product['CANT_CAJAS']; ?>" />
                                              <input type="hidden" name="intermediario" value="1" />
                                               <!--<h6>Cajas <?php echo $product['CANT_CAJAS']; ?></h6>-->
                                              <input type="submit" name="addpos" style="margin-top:5px;" class="btn btn-info"
                                                     value="Añadir" />
                                          </div>
                                      </form>
                                  </div>
                                      <?php endwhile;
                                        endif;
                                    endif;   
                                    ?>
                                    </div>
                                </div>
                              <!-- Otros TAB -->
                              <div class="tab-pane fade in mt-2" id="otros">
                                  <div class="row" style="justify-content: center;">
                                      <?php  $query = "SELECT * FROM product WHERE CATEGORY_ID=5 AND CITY  LIKE '{$_SESSION['CITY']}%' ORDER by PRODUCT_ID ASC";
                                        $result = mysqli_query($db, $query);

                                        if ($result):
                                            if(mysqli_num_rows($result)>0):
                                                while($product = mysqli_fetch_assoc($result)):
                                                //print_r($product);
                                      ?>
                                    <div class="col-sm-auto--menu col-md-auto--menu" >
                                      <form method="post" action="pos.php?action=add&id=<?php echo $product['PRODUCT_ID']; ?>">
                                              <div class="products" style="text-align: center;">
                                                                                 <?php
                                                if(($product['IMAGENES'] == null))
                                                {
                                                 echo ' <img src="img/lr-logo.jpg"  title="'.$product['DESCRIPTION'].'" width="50px" height="50px" />';

                                               }if(($product['IMAGENES'] != null))
                                                {
                                                 echo ' <img src="img/'.$product['IMAGENES'].'"  title="'.$product['DESCRIPTION'].'" width="50px" height="50px" />';
                                               } ?>
                                              <h6 class="text-info"><?php echo $product['NAME']; ?></h6>
                                              <h6>$ <?php echo $product['PRICE']; ?></h6>

                                                   <?php /* Stock  
                                              if(($product['QTY_STOCK'] <= "15")&&($product['QTY_STOCK'] > "0")){
                                                 echo '<h6 class="text-warning stock">'. $product['QTY_STOCK'].'</h6>';
                                               }if($product['QTY_STOCK'] > "15"){
                                                 echo '<h6 class="text-success stock">'. $product['QTY_STOCK'].'</h6>';
                                               } if($product['QTY_STOCK'] <= "0"){
                                                 echo '<h6 class="text-danger stock">'. $product['QTY_STOCK'].'</h6>';
                                               } 
                                                */?>
                              
                                              <input type="number" name="quantity" class="form-control" style="width: 6.5rem;" value="1" />
                                              <input type="hidden" name="description" value="<?php echo $product['DESCRIPTION']; ?>" />

                                               <input type="hidden" name="category_id" value="<?php echo $product['CATEGORY_ID']; ?>" />
                                              <input type="hidden" name="name" value="<?php echo $product['NAME']; ?>" />
                                              <input type="hidden" name="price" value="<?php echo $product['PRICE']; ?>" />
                                              <input type="hidden" name="cant_cajas" value="<?php echo $product['CANT_CAJAS']; ?>" />
                                              <input type="hidden" name="intermediario" value="1" />
                                              <input type="submit" name="addpos" style="margin-top:5px;" class="btn btn-info"
                                                     value="Añadir" />
                                          </div>
                                      </form>
                                  </div>
                                      <?php endwhile;
                                        endif;
                                    endif;   
                                    ?>
                                    </div>
                                </div>

                                <!-- BEBIDAS TAB -->

                                <div class="tab-pane fade in mt-2" id="bebidas">
                                  <div class="row" style="justify-content: center;">
                                      <?php  $query = "SELECT * FROM product WHERE CATEGORY_ID=6 AND CITY  LIKE '{$_SESSION['CITY']}%' ORDER by PRODUCT_ID ASC";
                                        $result = mysqli_query($db, $query);

                                        if ($result):
                                            if(mysqli_num_rows($result)>0):
                                                while($product = mysqli_fetch_assoc($result)):
                                                //print_r($product);
                                      ?>
                                    <div class="col-sm-auto--menu col-md-auto--menu" >
                                      <form method="post" action="pos.php?action=add&id=<?php echo $product['PRODUCT_ID']; ?>">
                                          <div class="products" style="text-align: center;">
                                                                                  <?php
                                                if(($product['IMAGENES'] == null))
                                                {
                                                 echo ' <img src="img/lr-logo.jpg"  title="'.$product['DESCRIPTION'].'" width="50px" height="50px" />';

                                               }if(($product['IMAGENES'] != null))
                                                {
                                                 echo ' <img src="img/'.$product['IMAGENES'].'"  title="'.$product['DESCRIPTION'].'" width="50px" height="50px" />';
                                               } ?>

                                              <h6 class="text-info"><?php echo $product['NAME']; ?></h6>
                                              <h6>$ <?php echo $product['PRICE']; ?></h6>


                                                   <?php /* Stock  
                                              if(($product['QTY_STOCK'] <= "15")&&($product['QTY_STOCK'] > "0")){
                                                 echo '<h6 class="text-warning stock">'. $product['QTY_STOCK'].'</h6>';
                                               }if($product['QTY_STOCK'] > "15"){
                                                 echo '<h6 class="text-success stock">'. $product['QTY_STOCK'].'</h6>';
                                               } if($product['QTY_STOCK'] <= "0"){
                                                 echo '<h6 class="text-danger stock">'. $product['QTY_STOCK'].'</h6>';
                                               } 
                                                */?>

                                              <input type="number" name="quantity" class="form-control" style="width: 6.5rem;" value="1" />
                                              <input type="hidden" name="description" value="<?php echo $product['DESCRIPTION']; ?>" />

                                               <input type="hidden" name="category_id" value="<?php echo $product['CATEGORY_ID']; ?>" />
                                              <input type="hidden" name="name" value="<?php echo $product['NAME']; ?>" />
                                              <input type="hidden" name="price" value="<?php echo $product['PRICE']; ?>" />

                                                <input type="hidden" name="cant_cajas" value="<?php echo $product['CANT_CAJAS']; ?>" />

                                              <input type="hidden" name="intermediario" value="1" />
                                              <input type="submit" name="addpos" style="margin-top:5px;" class="btn btn-info"
                                                     value="Añadir" />
                                          </div>
                                      </form>
                                  </div>
                                      <?php endwhile;
                                        endif;
                                    endif;   
                                    ?>
                                    </div>
                                </div>
                              <!-- COMBOS TAB -->
                                <div class="tab-pane fade in mt-2" id="combos">
                                  <div class="row" style="justify-content: center;">
                                      <?php  $query = "SELECT * FROM product WHERE CATEGORY_ID=7 AND CITY  LIKE '{$_SESSION['CITY']}%' ORDER by PRODUCT_ID ASC";
                                        $result = mysqli_query($db, $query);

                                        if ($result):
                                            if(mysqli_num_rows($result)>0):
                                                while($product = mysqli_fetch_assoc($result)):
                                                //print_r($product);
                                      ?>
                                    <div class="col-sm-auto--menu col-md-auto--menu" >
                                      <form method="post" action="pos.php?action=add&id=<?php echo $product['PRODUCT_ID']; ?>">
                                          <div class="products" style="text-align: center;">
                                                                                  <?php
                                                if(($product['IMAGENES'] == null))
                                                {
                                                 echo ' <img src="img/lr-logo.jpg"  title="'.$product['DESCRIPTION'].'" width="50px" height="50px" />';

                                               }if(($product['IMAGENES'] != null))
                                                {
                                                 echo ' <img src="img/'.$product['IMAGENES'].'"  title="'.$product['DESCRIPTION'].'" width="50px" height="50px" />';
                                               } ?>

                                              <h6 class="text-info"><?php echo $product['NAME']; ?></h6>
                                              <h6>$ <?php echo $product['PRICE']; ?></h6>

                                                   <?php /* Stock  
                                              if(($product['QTY_STOCK'] <= "15")&&($product['QTY_STOCK'] > "0")){
                                                 echo '<h6 class="text-warning stock">'. $product['QTY_STOCK'].'</h6>';
                                               }if($product['QTY_STOCK'] > "15"){
                                                 echo '<h6 class="text-success stock">'. $product['QTY_STOCK'].'</h6>';
                                               } if($product['QTY_STOCK'] <= "0"){
                                                 echo '<h6 class="text-danger stock">'. $product['QTY_STOCK'].'</h6>';
                                               } 
                                                */?>
                                              <input type="number" name="quantity" class="form-control" style="width: 6.5rem;" value="1" />
                                              <input type="hidden" name="description" value="<?php echo $product['DESCRIPTION']; ?>" />

                                               <input type="hidden" name="category_id" value="<?php echo $product['CATEGORY_ID']; ?>" />
                                              <input type="hidden" name="name" value="<?php echo $product['NAME']; ?>" />
                                              <input type="hidden" name="price" value="<?php echo $product['PRICE']; ?>" />
                                              <input type="hidden" name="cant_cajas" value="<?php echo $product['CANT_CAJAS']; ?>" />
                                               <!--<h6>Cajas <?php echo $product['CANT_CAJAS']; ?></h6>-->

                                              <input type="hidden" name="intermediario" value="1" />
                                              <input type="submit" name="addpos" style="margin-top:5px;" class="btn btn-info"
                                                     value="Añadir" />
                                          </div>
                                      </form>
                                  </div>
                                      <?php endwhile;
                                        endif;
                                    endif;   
                                    ?>
                                    </div>
                                </div>
                             
                             <!-- DIDI Tab-->
                             <!-- Didi Pizza TAB -->

                              <div class="tab-pane fade in mt-2" id="didi_siempre_Listas">
                                  <div class="row" style="justify-content: center;">
                                      <?php  $query = "SELECT * FROM product WHERE CATEGORY_ID=10 AND CITY  LIKE '{$_SESSION['CITY']}%' ORDER by PRODUCT_ID ASC";
                                        $result = mysqli_query($db, $query);

                                        if ($result):
                                            if(mysqli_num_rows($result)>0):
                                                while($product = mysqli_fetch_assoc($result)):
                                                //print_r($product);
                                      ?>
                                    <div class="col-sm-auto--menu col-md-auto--menu" >
                                      <form method="post" action="pos.php?action=add&id=<?php echo $product['PRODUCT_ID']; ?>">
                                          <div class="products" style="text-align: center;">
                                                                                 <?php
                                                if(($product['IMAGENES'] == null))
                                                {
                                                 echo ' <img src="img/lr-logo.jpg"  title="'.$product['DESCRIPTION'].'" width="50px" height="50px" />';

                                               }if(($product['IMAGENES'] != null))
                                                {
                                                 echo ' <img src="img/'.$product['IMAGENES'].'"  title="'.$product['DESCRIPTION'].'" width="50px" height="50px" />';
                                               } ?>
                                              <h6 class="text-info"><?php echo $product['NAME']; ?></h6>
                                              <h6>$ <?php echo $product['PRICE']; ?></h6>

                                                   <?php /* Stock  
                                              if(($product['QTY_STOCK'] <= "15")&&($product['QTY_STOCK'] > "0")){
                                                 echo '<h6 class="text-warning stock">'. $product['QTY_STOCK'].'</h6>';
                                               }if($product['QTY_STOCK'] > "15"){
                                                 echo '<h6 class="text-success stock">'. $product['QTY_STOCK'].'</h6>';
                                               } if($product['QTY_STOCK'] <= "0"){
                                                 echo '<h6 class="text-danger stock">'. $product['QTY_STOCK'].'</h6>';
                                               } 
                                                */?>

                                              <input type="number" name="quantity" class="form-control" style="width: 6.5rem;" value="1" />
                                              <?php
                                              if ($product['INGREDIENTE']=="SI") {
                                               echo $aaa;
                                               echo $bbb;
                                                // code...
                                              }
                                              ?>

                                              <input type="hidden" name="description" value="<?php echo $product['DESCRIPTION']; ?>" />

                                               <input type="hidden" name="category_id" value="<?php echo $product['CATEGORY_ID']; ?>" />
                                              <input type="hidden" name="name" value="<?php echo $product['NAME']; ?>" />
                                              <input type="hidden" name="price" value="<?php echo $product['PRICE']; ?>" />
                                              <input type="hidden" name="cant_cajas" value="<?php echo $product['CANT_CAJAS']; ?>" />
                                              <input type="hidden" name="intermediario" value="2" />
                                               <!--<h6>Cajas <?php echo $product['CANT_CAJAS']; ?></h6>-->

                                              <input type="submit" name="addpos" style="margin-top:5px;" class="btn btn-info"
                                                     value="Añadir" />
                                          </div>
                                      </form>
                                  </div>
                                      <?php endwhile;
                                        endif;
                                    endif;   
                                    ?>
                                    </div>
                                </div>
<!-- Didi Pizza INDIVIDUAL TAB -->

                                <div class="tab-pane fade in mt-2" id="didi_individuales">
                                  <div class="row" style="justify-content: center;">
                                      <?php  $query = "SELECT * FROM product WHERE CATEGORY_ID=18 AND CITY  LIKE '{$_SESSION['CITY']}%' ORDER by PRODUCT_ID ASC";
                                        $result = mysqli_query($db, $query);

                                        if ($result):
                                            if(mysqli_num_rows($result)>0):
                                                while($product = mysqli_fetch_assoc($result)):
                                                //print_r($product);
                                      ?>
                                    <div class="col-sm-auto--menu col-md-auto--menu" >
                                      <form method="post" action="pos.php?action=add&id=<?php echo $product['PRODUCT_ID']; ?>">
                                          <div class="products" style="text-align: center;">
                                                                                 <?php
                                                if(($product['IMAGENES'] == null))
                                                {
                                                 echo ' <img src="img/lr-logo.jpg"  title="'.$product['DESCRIPTION'].'" width="50px" height="50px" />';

                                               }if(($product['IMAGENES'] != null))
                                                {
                                                 echo ' <img src="img/'.$product['IMAGENES'].'"  title="'.$product['DESCRIPTION'].'" width="50px" height="50px" />';
                                               } ?>
                                              <h6 class="text-info"><?php echo $product['NAME']; ?></h6>
                                              <h6>$ <?php echo $product['PRICE']; ?></h6>

                                                   <?php /* Stock  
                                              if(($product['QTY_STOCK'] <= "15")&&($product['QTY_STOCK'] > "0")){
                                                 echo '<h6 class="text-warning stock">'. $product['QTY_STOCK'].'</h6>';
                                               }if($product['QTY_STOCK'] > "15"){
                                                 echo '<h6 class="text-success stock">'. $product['QTY_STOCK'].'</h6>';
                                               } if($product['QTY_STOCK'] <= "0"){
                                                 echo '<h6 class="text-danger stock">'. $product['QTY_STOCK'].'</h6>';
                                               } 
                                                */?>

                                              <input type="number" name="quantity" class="form-control" style="width: 6.5rem;" value="1" />
                                              <input type="hidden" name="description" value="<?php echo $product['DESCRIPTION']; ?>" />

                                               <input type="hidden" name="category_id" value="<?php echo $product['CATEGORY_ID']; ?>" />
                                              <input type="hidden" name="name" value="<?php echo $product['NAME']; ?>" />
                                              <input type="hidden" name="price" value="<?php echo $product['PRICE']; ?>" />
                                              <input type="hidden" name="cant_cajas" value="<?php echo $product['CANT_CAJAS']; ?>" />
                                              <input type="hidden" name="intermediario" value="2" />
                                               <!--<h6>Cajas <?php echo $product['CANT_CAJAS']; ?></h6>-->

                                              <input type="submit" name="addpos" style="margin-top:5px;" class="btn btn-info"
                                                     value="Añadir" />
                                          </div>
                                      </form>
                                  </div>
                                      <?php endwhile;
                                        endif;
                                    endif;   
                                    ?>
                                    </div>
                                </div>



<!-- Didi PROMOS TAB -->

                  <div class="tab-pane fade in mt-2" id="didi_promos">
                                  <div class="row" style="justify-content: center;">
                                      <?php  $query = "SELECT * FROM product WHERE CATEGORY_ID=11 AND CITY  LIKE '{$_SESSION['CITY']}%' ORDER by PRODUCT_ID ASC";
                                        $result = mysqli_query($db, $query);

                                        if ($result):
                                            if(mysqli_num_rows($result)>0):
                                                while($product = mysqli_fetch_assoc($result)):
                                                //print_r($product);
                                      ?>
                                    <div class="col-sm-auto--menu col-md-auto--menu" >
                                      <form method="post" action="pos.php?action=add&id=<?php echo $product['PRODUCT_ID']; ?>">
                                          <div class="products" style="text-align: center;">
                                                                                 <?php
                                                if(($product['IMAGENES'] == null))
                                                {
                                                 echo ' <img src="img/lr-logo.jpg"  title="'.$product['DESCRIPTION'].'" width="50px" height="50px" />';

                                               }if(($product['IMAGENES'] != null))
                                                {
                                                 echo ' <img src="img/'.$product['IMAGENES'].'"  title="'.$product['DESCRIPTION'].'" width="50px" height="50px" />';
                                               } ?>
                                              <h6 class="text-info"><?php echo $product['NAME']; ?></h6>
                                              <h6>$ <?php echo $product['PRICE']; ?></h6>

                                                   <?php /* Stock  
                                              if(($product['QTY_STOCK'] <= "15")&&($product['QTY_STOCK'] > "0")){
                                                 echo '<h6 class="text-warning stock">'. $product['QTY_STOCK'].'</h6>';
                                               }if($product['QTY_STOCK'] > "15"){
                                                 echo '<h6 class="text-success stock">'. $product['QTY_STOCK'].'</h6>';
                                               } if($product['QTY_STOCK'] <= "0"){
                                                 echo '<h6 class="text-danger stock">'. $product['QTY_STOCK'].'</h6>';
                                               } 
                                                */?>


                                              <input type="number" name="quantity" class="form-control" style="width: 6.5rem;" value="1" />
                                              <input type="hidden" name="description" value="<?php echo $product['DESCRIPTION']; ?>" />

                                               <input type="hidden" name="category_id" value="<?php echo $product['CATEGORY_ID']; ?>" />
                                              <input type="hidden" name="name" value="<?php echo $product['NAME']; ?>" />
                                              <input type="hidden" name="price" value="<?php echo $product['PRICE']; ?>" />
                                              <input type="hidden" name="cant_cajas" value="<?php echo $product['CANT_CAJAS']; ?>" />
                                              <input type="hidden" name="intermediario" value="2" />
                                              <input type="submit" name="addpos" style="margin-top:5px;" class="btn btn-info"
                                                     value="Añadir" />
                                          </div>
                                      </form>
                                  </div>
                                      <?php endwhile;
                                        endif;
                                    endif;   
                                    ?>
                                    </div>
                                </div>

<!-- Didi ADEREZOS TAB -->


                  <div class="tab-pane fade in mt-2" id="didi_aderezo">
                                  <div class="row" style="justify-content: center;">
                                      <?php  $query = "SELECT * FROM product WHERE CATEGORY_ID=12 AND CITY  LIKE '{$_SESSION['CITY']}%' ORDER by PRODUCT_ID ASC";
                                        $result = mysqli_query($db, $query);

                                        if ($result):
                                            if(mysqli_num_rows($result)>0):
                                                while($product = mysqli_fetch_assoc($result)):
                                                //print_r($product);
                                      ?>
                                    <div class="col-sm-auto--menu col-md-auto--menu" >
                                      <form method="post" action="pos.php?action=add&id=<?php echo $product['PRODUCT_ID']; ?>">
                                          <div class="products" style="text-align: center;">
                                                                                 <?php
                                                if(($product['IMAGENES'] == null))
                                                {
                                                 echo ' <img src="img/lr-logo.jpg"  title="'.$product['DESCRIPTION'].'" width="50px" height="50px" />';

                                               }if(($product['IMAGENES'] != null))
                                                {
                                                 echo ' <img src="img/'.$product['IMAGENES'].'"  title="'.$product['DESCRIPTION'].'" width="50px" height="50px" />';
                                               } ?>
                                              <h6 class="text-info"><?php echo $product['NAME']; ?></h6>
                                              <h6>$ <?php echo $product['PRICE']; ?></h6>

                                                   <?php /* Stock  
                                              if(($product['QTY_STOCK'] <= "15")&&($product['QTY_STOCK'] > "0")){
                                                 echo '<h6 class="text-warning stock">'. $product['QTY_STOCK'].'</h6>';
                                               }if($product['QTY_STOCK'] > "15"){
                                                 echo '<h6 class="text-success stock">'. $product['QTY_STOCK'].'</h6>';
                                               } if($product['QTY_STOCK'] <= "0"){
                                                 echo '<h6 class="text-danger stock">'. $product['QTY_STOCK'].'</h6>';
                                               } 
                                                */?>

                                              <input type="number" name="quantity" class="form-control" style="width: 6.5rem;" value="1" />
                                              <input type="hidden" name="description" value="<?php echo $product['DESCRIPTION']; ?>" />

                                               <input type="hidden" name="category_id" value="<?php echo $product['CATEGORY_ID']; ?>" />
                                              <input type="hidden" name="name" value="<?php echo $product['NAME']; ?>" />
                                              <input type="hidden" name="price" value="<?php echo $product['PRICE']; ?>" />
                                              <input type="hidden" name="cant_cajas" value="<?php echo $product['CANT_CAJAS']; ?>" />
                                              <input type="hidden" name="intermediario" value="2" />
                                              <input type="submit" name="addpos" style="margin-top:5px;" class="btn btn-info"
                                                     value="Añadir" />
                                          </div>
                                      </form>
                                  </div>
                                      <?php endwhile;
                                        endif;
                                    endif;   
                                    ?>
                                    </div>
                                </div>



<!-- Didi BEBIDAS TAB -->

                  <div class="tab-pane fade in mt-2" id="didi_bebidas">
                                  <div class="row" style="justify-content: center;">
                                      <?php  $query = "SELECT * FROM product WHERE CATEGORY_ID=13 AND CITY  LIKE '{$_SESSION['CITY']}%' ORDER by PRODUCT_ID ASC";
                                        $result = mysqli_query($db, $query);

                                        if ($result):
                                            if(mysqli_num_rows($result)>0):
                                                while($product = mysqli_fetch_assoc($result)):
                                                //print_r($product);
                                      ?>
                                    <div class="col-sm-auto--menu col-md-auto--menu" >
                                      <form method="post" action="pos.php?action=add&id=<?php echo $product['PRODUCT_ID']; ?>">
                                          <div class="products" style="text-align: center;">

                                                                        <?php
                                                if(($product['IMAGENES'] == null))
                                                {
                                                 echo ' <img src="img/lr-logo.jpg"  title="'.$product['DESCRIPTION'].'" width="50px" height="50px" />';

                                               }if(($product['IMAGENES'] != null))
                                                {
                                                 echo ' <img src="img/'.$product['IMAGENES'].'"  title="'.$product['DESCRIPTION'].'" width="50px" height="50px" />';
                                               } ?>

                                              <h6 class="text-info"><?php echo $product['NAME']; ?></h6>
                                              <h6>$ <?php echo $product['PRICE']; ?></h6>

                                                   <?php /* Stock  
                                              if(($product['QTY_STOCK'] <= "15")&&($product['QTY_STOCK'] > "0")){
                                                 echo '<h6 class="text-warning stock">'. $product['QTY_STOCK'].'</h6>';
                                               }if($product['QTY_STOCK'] > "15"){
                                                 echo '<h6 class="text-success stock">'. $product['QTY_STOCK'].'</h6>';
                                               } if($product['QTY_STOCK'] <= "0"){
                                                 echo '<h6 class="text-danger stock">'. $product['QTY_STOCK'].'</h6>';
                                               } 
                                                */?>
                                              <input type="number" name="quantity" class="form-control" style="width: 6.5rem;" value="1" />
                                              <input type="hidden" name="description" value="<?php echo $product['DESCRIPTION']; ?>" />

                                               <input type="hidden" name="category_id" value="<?php echo $product['CATEGORY_ID']; ?>" />
                                              <input type="hidden" name="name" value="<?php echo $product['NAME']; ?>" />
                                              <input type="hidden" name="price" value="<?php echo $product['PRICE']; ?>" />
                                              <input type="hidden" name="cant_cajas" value="<?php echo $product['CANT_CAJAS']; ?>" />
                                              <input type="hidden" name="intermediario" value="2" />
                                              <input type="submit" name="addpos" style="margin-top:5px;" class="btn btn-info"
                                                     value="Añadir" />
                                          </div>
                                      </form>
                                  </div>
                                      <?php endwhile;
                                        endif;
                                    endif;   
                                    ?>
                                    </div>
                                </div>



<!-- Didi COMBOS TAB -->

                  <div class="tab-pane fade in mt-2" id="didi_combos">
                                  <div class="row" style="justify-content: center;">
                                      <?php  $query = "SELECT * FROM product WHERE CATEGORY_ID=14 AND CITY  LIKE '{$_SESSION['CITY']}%' ORDER by PRODUCT_ID ASC";
                                        $result = mysqli_query($db, $query);

                                        if ($result):
                                            if(mysqli_num_rows($result)>0):
                                                while($product = mysqli_fetch_assoc($result)):
                                                //print_r($product);
                                      ?>
                                    <div class="col-sm-auto--menu col-md-auto--menu" >
                                      <form method="post" action="pos.php?action=add&id=<?php echo $product['PRODUCT_ID']; ?>">
                                          <div class="products" style="text-align: center;">
                                                                                 <?php
                                                if(($product['IMAGENES'] == null))
                                                {
                                                 echo ' <img src="img/lr-logo.jpg"  title="'.$product['DESCRIPTION'].'" width="50px" height="50px" />';

                                               }if(($product['IMAGENES'] != null))
                                                {
                                                 echo ' <img src="img/'.$product['IMAGENES'].'"  title="'.$product['DESCRIPTION'].'" width="50px" height="50px" />';
                                               } ?>
                                              <h6 class="text-info"><?php echo $product['NAME']; ?></h6>
                                              <h6>$ <?php echo $product['PRICE']; ?></h6>

                                                   <?php /* Stock  
                                              if(($product['QTY_STOCK'] <= "15")&&($product['QTY_STOCK'] > "0")){
                                                 echo '<h6 class="text-warning stock">'. $product['QTY_STOCK'].'</h6>';
                                               }if($product['QTY_STOCK'] > "15"){
                                                 echo '<h6 class="text-success stock">'. $product['QTY_STOCK'].'</h6>';
                                               } if($product['QTY_STOCK'] <= "0"){
                                                 echo '<h6 class="text-danger stock">'. $product['QTY_STOCK'].'</h6>';
                                               } 
                                                */?>
                                              <input type="number" name="quantity" class="form-control" style="width: 6.5rem;" value="1" />
                                              <input type="hidden" name="description" value="<?php echo $product['DESCRIPTION']; ?>" />

                                               <input type="hidden" name="category_id" value="<?php echo $product['CATEGORY_ID']; ?>" />
                                              <input type="hidden" name="name" value="<?php echo $product['NAME']; ?>" />
                                              <input type="hidden" name="price" value="<?php echo $product['PRICE']; ?>" />
                                              <input type="hidden" name="cant_cajas" value="<?php echo $product['CANT_CAJAS']; ?>" />
                                             <!-- <h6>Cajas <?php echo $product['CANT_CAJAS']; ?></h6>-->
                                              <input type="hidden" name="intermediario" value="2" />
                                              <input type="submit" name="addpos" style="margin-top:5px;" class="btn btn-info"
                                                     value="Añadir" />
                                          </div>
                                      </form>
                                  </div>
                                      <?php endwhile;
                                        endif;
                                    endif;   
                                    ?>
                                    </div>
                                </div>


<!-- Didi COMPLEMENTOS TAB -->

                  <div class="tab-pane fade in mt-2" id="didi_complementos">
                                  <div class="row" style="justify-content: center;">
                                      <?php  $query = "SELECT * FROM product WHERE CATEGORY_ID=15 AND CITY  LIKE '{$_SESSION['CITY']}%' ORDER by PRODUCT_ID ASC";
                                        $result = mysqli_query($db, $query);

                                        if ($result):
                                            if(mysqli_num_rows($result)>0):
                                                while($product = mysqli_fetch_assoc($result)):
                                                //print_r($product);
                                      ?>
                                    <div class="col-sm-auto--menu col-md-auto--menu" >
                                      <form method="post" action="pos.php?action=add&id=<?php echo $product['PRODUCT_ID']; ?>">
                                          <div class="products" style="text-align: center;">
                                                                                 <?php
                                                if(($product['IMAGENES'] == null))
                                                {
                                                 echo ' <img src="img/lr-logo.jpg"  title="'.$product['DESCRIPTION'].'" width="50px" height="50px" />';

                                               }if(($product['IMAGENES'] != null))
                                                {
                                                 echo ' <img src="img/'.$product['IMAGENES'].'"  title="'.$product['DESCRIPTION'].'" width="50px" height="50px" />';
                                               } ?>
                                              <h6 class="text-info"><?php echo $product['NAME']; ?></h6>
                                              <h6>$ <?php echo $product['PRICE']; ?></h6>

                                                   <?php /* Stock  
                                              if(($product['QTY_STOCK'] <= "15")&&($product['QTY_STOCK'] > "0")){
                                                 echo '<h6 class="text-warning stock">'. $product['QTY_STOCK'].'</h6>';
                                               }if($product['QTY_STOCK'] > "15"){
                                                 echo '<h6 class="text-success stock">'. $product['QTY_STOCK'].'</h6>';
                                               } if($product['QTY_STOCK'] <= "0"){
                                                 echo '<h6 class="text-danger stock">'. $product['QTY_STOCK'].'</h6>';
                                               } 
                                                */?>
                                              <input type="number" name="quantity" class="form-control" style="width: 6.5rem;" value="1" />
                                              <input type="hidden" name="description" value="<?php echo $product['DESCRIPTION']; ?>" />

                                               <input type="hidden" name="category_id" value="<?php echo $product['CATEGORY_ID']; ?>" />
                                              <input type="hidden" name="name" value="<?php echo $product['NAME']; ?>" />
                                              <input type="hidden" name="price" value="<?php echo $product['PRICE']; ?>" />
                                              <input type="hidden" name="cant_cajas" value="<?php echo $product['CANT_CAJAS']; ?>" />
                                              <input type="hidden" name="intermediario" value="2" />
                                              <input type="submit" name="addpos" style="margin-top:5px;" class="btn btn-info"
                                                     value="Añadir" />
                                          </div>
                                      </form>
                                  </div>
                                      <?php endwhile;
                                        endif;
                                    endif;   
                                    ?>
                                    </div>
                                </div>
<!-- Didi CORTESIAS TAB -->

                  <div class="tab-pane fade in mt-2" id="didi_cortesias">
                                  <div class="row" style="justify-content: center;">
                                      <?php  $query = "SELECT * FROM product WHERE CATEGORY_ID=16 AND CITY  LIKE '{$_SESSION['CITY']}%' ORDER by PRODUCT_ID ASC";
                                        $result = mysqli_query($db, $query);

                                        if ($result):
                                            if(mysqli_num_rows($result)>0):
                                                while($product = mysqli_fetch_assoc($result)):
                                                //print_r($product);
                                      ?>
                                    <div class="col-sm-auto--menu col-md-auto--menu" >
                                      <form method="post" action="pos.php?action=add&id=<?php echo $product['PRODUCT_ID']; ?>">
                                          <div class="products" style="text-align: center;">
                                                                                 <?php
                                                if(($product['IMAGENES'] == null))
                                                {
                                                 echo ' <img src="img/lr-logo.jpg"  title="'.$product['DESCRIPTION'].'" width="50px" height="50px" />';

                                               }if(($product['IMAGENES'] != null))
                                                {
                                                 echo ' <img src="img/'.$product['IMAGENES'].'"  title="'.$product['DESCRIPTION'].'" width="50px" height="50px" />';
                                               } ?>
                                              <h6 class="text-info"><?php echo $product['NAME']; ?></h6>
                                              <h6>$ <?php echo $product['PRICE']; ?></h6>

                                                   <?php /* Stock  
                                              if(($product['QTY_STOCK'] <= "15")&&($product['QTY_STOCK'] > "0")){
                                                 echo '<h6 class="text-warning stock">'. $product['QTY_STOCK'].'</h6>';
                                               }if($product['QTY_STOCK'] > "15"){
                                                 echo '<h6 class="text-success stock">'. $product['QTY_STOCK'].'</h6>';
                                               } if($product['QTY_STOCK'] <= "0"){
                                                 echo '<h6 class="text-danger stock">'. $product['QTY_STOCK'].'</h6>';
                                               } 
                                                */?>
                                              <input type="number" name="quantity" class="form-control" style="width: 6.5rem;" value="1" />
                                              <input type="hidden" name="description" value="<?php echo $product['DESCRIPTION']; ?>" />

                                               <input type="hidden" name="category_id" value="<?php echo $product['CATEGORY_ID']; ?>" />
                                              <input type="hidden" name="name" value="<?php echo $product['NAME']; ?>" />
                                              <input type="hidden" name="price" value="<?php echo $product['PRICE']; ?>" />
                                              <input type="hidden" name="cant_cajas" value="<?php echo $product['CANT_CAJAS']; ?>" />
                                              <input type="hidden" name="intermediario" value="2" />
                                              <input type="submit" name="addpos" style="margin-top:5px;" class="btn btn-info"
                                                     value="Añadir" />
                                          </div>
                                      </form>
                                  </div>
                                      <?php endwhile;
                                        endif;
                                    endif;   
                                    ?>
                                    </div>
                                </div>

<!-- Didi OTROSL TAB -->


                                                  <div class="tab-pane fade in mt-2" id="didi_otros">
                                  <div class="row" style="justify-content: center;">
                                      <?php  $query = "SELECT * FROM product WHERE CATEGORY_ID=17 AND CITY  LIKE '{$_SESSION['CITY']}%' ORDER by PRODUCT_ID ASC";
                                        $result = mysqli_query($db, $query);

                                        if ($result):
                                            if(mysqli_num_rows($result)>0):
                                                while($product = mysqli_fetch_assoc($result)):
                                                //print_r($product);
                                      ?>
                                    <div class="col-sm-auto--menu col-md-auto--menu" >
                                      <form method="post" action="pos.php?action=add&id=<?php echo $product['PRODUCT_ID']; ?>">
                                          <div class="products" style="text-align: center;">
                                                                                 <?php
                                                if(($product['IMAGENES'] == null))
                                                {
                                                 echo ' <img src="img/lr-logo.jpg"  title="'.$product['DESCRIPTION'].'" width="50px" height="50px" />';

                                               }if(($product['IMAGENES'] != null))
                                                {
                                                 echo ' <img src="img/'.$product['IMAGENES'].'"  title="'.$product['DESCRIPTION'].'" width="50px" height="50px" />';
                                               } ?>
                                              <h6 class="text-info"><?php echo $product['NAME']; ?></h6>
                                              <h6>$ <?php echo $product['PRICE']; ?></h6>

                                                   <?php /* Stock  
                                              if(($product['QTY_STOCK'] <= "15")&&($product['QTY_STOCK'] > "0")){
                                                 echo '<h6 class="text-warning stock">'. $product['QTY_STOCK'].'</h6>';
                                               }if($product['QTY_STOCK'] > "15"){
                                                 echo '<h6 class="text-success stock">'. $product['QTY_STOCK'].'</h6>';
                                               } if($product['QTY_STOCK'] <= "0"){
                                                 echo '<h6 class="text-danger stock">'. $product['QTY_STOCK'].'</h6>';
                                               } 
                                                */?>
                                              <input type="number" name="quantity" class="form-control" style="width: 6.5rem;" value="1" />
                                              <input type="hidden" name="description" value="<?php echo $product['DESCRIPTION']; ?>" />

                                               <input type="hidden" name="category_id" value="<?php echo $product['CATEGORY_ID']; ?>" />
                                              <input type="hidden" name="name" value="<?php echo $product['NAME']; ?>" />
                                              <input type="hidden" name="price" value="<?php echo $product['PRICE']; ?>" />
                                              <input type="hidden" name="cant_cajas" value="<?php echo $product['CANT_CAJAS']; ?>" />
                                              <input type="hidden" name="intermediario" value="2" />
                                              <input type="submit" name="addpos" style="margin-top:5px;" class="btn btn-info"
                                                     value="Añadir" />
                                          </div>
                                      </form>
                                  </div>
                                      <?php endwhile;
                                        endif;
                                    endif;   
                                    ?>
                                    </div>
                                </div>




<!-- wala na di nadala sa tab pane, dalom nana di na part -->






<!-- Uber Tab-->
<!-- Uber PIZZA INDIVIDUAL Tab-->

                            <div class="tab-pane fade in mt-2" id="uber_individuales">
                                  <div class="row" style="justify-content: center;">
                                      <?php  $query = "SELECT * FROM product WHERE CATEGORY_ID=28 AND CITY  LIKE '{$_SESSION['CITY']}%' ORDER by PRODUCT_ID ASC";
                                        $result = mysqli_query($db, $query);

                                        if ($result):
                                            if(mysqli_num_rows($result)>0):
                                                while($product = mysqli_fetch_assoc($result)):
                                                //print_r($product);
                                      ?>
                                    <div class="col-sm-auto--menu col-md-auto--menu" >
                                      <form method="post" action="pos.php?action=add&id=<?php echo $product['PRODUCT_ID']; ?>">
                                          <div class="products" style="text-align: center;">
                                                                                 <?php
                                                if(($product['IMAGENES'] == null))
                                                {
                                                 echo ' <img src="img/lr-logo.jpg"  title="'.$product['DESCRIPTION'].'" width="50px" height="50px" />';

                                               }if(($product['IMAGENES'] != null))
                                                {
                                                 echo ' <img src="img/'.$product['IMAGENES'].'"  title="'.$product['DESCRIPTION'].'" width="50px" height="50px" />';
                                               } ?>
                                              <h6 class="text-info"><?php echo $product['NAME']; ?></h6>
                                              <h6>$ <?php echo $product['PRICE']; ?></h6>

                                                   <?php /* Stock  
                                              if(($product['QTY_STOCK'] <= "15")&&($product['QTY_STOCK'] > "0")){
                                                 echo '<h6 class="text-warning stock">'. $product['QTY_STOCK'].'</h6>';
                                               }if($product['QTY_STOCK'] > "15"){
                                                 echo '<h6 class="text-success stock">'. $product['QTY_STOCK'].'</h6>';
                                               } if($product['QTY_STOCK'] <= "0"){
                                                 echo '<h6 class="text-danger stock">'. $product['QTY_STOCK'].'</h6>';
                                               } 
                                                */?>
                                              <input type="number" name="quantity" class="form-control" style="width: 6.5rem;" value="1" />
                                              <input type="hidden" name="description" value="<?php echo $product['DESCRIPTION']; ?>" />

                                               <input type="hidden" name="category_id" value="<?php echo $product['CATEGORY_ID']; ?>" />
                                              <input type="hidden" name="name" value="<?php echo $product['NAME']; ?>" />
                                              <input type="hidden" name="price" value="<?php echo $product['PRICE']; ?>" />
                                              <input type="hidden" name="cant_cajas" value="<?php echo $product['CANT_CAJAS']; ?>" />
                                               <!--<h6>Cajas <?php echo $product['CANT_CAJAS']; ?></h6>-->
                                              <input type="hidden" name="intermediario" value="2" />

                                              <input type="submit" name="addpos" style="margin-top:5px;" class="btn btn-info"
                                                     value="Añadir" />
                                          </div>
                                      </form>
                                  </div>
                                      <?php endwhile;
                                        endif;
                                    endif;   
                                    ?>
                                    </div>
                                </div>

<!-- Uber PIZZAS Tab-->

                  <div class="tab-pane fade in mt-2" id="uber_siempre_listas">
                                  <div class="row" style="justify-content: center;">
                                      <?php  $query = "SELECT * FROM product WHERE CATEGORY_ID=20 AND CITY  LIKE '{$_SESSION['CITY']}%' ORDER by PRODUCT_ID ASC";
                                        $result = mysqli_query($db, $query);

                                        if ($result):
                                            if(mysqli_num_rows($result)>0):
                                                while($product = mysqli_fetch_assoc($result)):
                                                //print_r($product);
                                      ?>
                                    <div class="col-sm-auto--menu col-md-auto--menu" >
                                      <form method="post" action="pos.php?action=add&id=<?php echo $product['PRODUCT_ID']; ?>">
                                          <div class="products" style="text-align: center;">
                                                                                 <?php
                                                if(($product['IMAGENES'] == null))
                                                {
                                                 echo ' <img src="img/lr-logo.jpg"  title="'.$product['DESCRIPTION'].'" width="50px" height="50px" />';

                                               }if(($product['IMAGENES'] != null))
                                                {
                                                 echo ' <img src="img/'.$product['IMAGENES'].'"  title="'.$product['DESCRIPTION'].'" width="50px" height="50px" />';
                                               } ?>
                                              <h6 class="text-info"><?php echo $product['NAME']; ?></h6>
                                              <h6>$ <?php echo $product['PRICE']; ?></h6>

                                                   <?php /* Stock  
                                              if(($product['QTY_STOCK'] <= "15")&&($product['QTY_STOCK'] > "0")){
                                                 echo '<h6 class="text-warning stock">'. $product['QTY_STOCK'].'</h6>';
                                               }if($product['QTY_STOCK'] > "15"){
                                                 echo '<h6 class="text-success stock">'. $product['QTY_STOCK'].'</h6>';
                                               } if($product['QTY_STOCK'] <= "0"){
                                                 echo '<h6 class="text-danger stock">'. $product['QTY_STOCK'].'</h6>';
                                               } 
                                                */?>
                                              <input type="number" name="quantity" class="form-control" style="width: 6.5rem;" value="1" />
                                              <?php
                                              if ($product['INGREDIENTE']=="SI") {
                                               echo $aaa;
                                               echo $bbb;
                                                // code...
                                              }
                                              ?>

                                              <input type="hidden" name="description" value="<?php echo $product['DESCRIPTION']; ?>" />

                                               <input type="hidden" name="category_id" value="<?php echo $product['CATEGORY_ID']; ?>" />
                                              <input type="hidden" name="name" value="<?php echo $product['NAME']; ?>" />
                                              <input type="hidden" name="price" value="<?php echo $product['PRICE']; ?>" />
                                              <input type="hidden" name="cant_cajas" value="<?php echo $product['CANT_CAJAS']; ?>" />
                                               <!--<h6>Cajas <?php echo $product['CANT_CAJAS']; ?></h6>-->
                                              <input type="hidden" name="intermediario" value="2" />

                                              <input type="submit" name="addpos" style="margin-top:5px;" class="btn btn-info"
                                                     value="Añadir" />
                                          </div>
                                      </form>
                                  </div>
                                      <?php endwhile;
                                        endif;
                                    endif;   
                                    ?>
                                    </div>
                                </div>



<!-- Uber PROMOS Tab-->
                  <div class="tab-pane fade in mt-2" id="uber_promos">
                                  <div class="row" style="justify-content: center;">
                                      <?php  $query = "SELECT * FROM product WHERE CATEGORY_ID=21 AND CITY  LIKE '{$_SESSION['CITY']}%' ORDER by PRODUCT_ID ASC";
                                        $result = mysqli_query($db, $query);

                                        if ($result):
                                            if(mysqli_num_rows($result)>0):
                                                while($product = mysqli_fetch_assoc($result)):
                                                //print_r($product);
                                      ?>
                                    <div class="col-sm-auto--menu col-md-auto--menu" >
                                      <form method="post" action="pos.php?action=add&id=<?php echo $product['PRODUCT_ID']; ?>">
                                          <div class="products" style="text-align: center;">
                                                                                 <?php
                                                if(($product['IMAGENES'] == null))
                                                {
                                                 echo ' <img src="img/lr-logo.jpg"  title="'.$product['DESCRIPTION'].'" width="50px" height="50px" />';

                                               }if(($product['IMAGENES'] != null))
                                                {
                                                 echo ' <img src="img/'.$product['IMAGENES'].'"  title="'.$product['DESCRIPTION'].'" width="50px" height="50px" />';
                                               } ?>
                                              <h6 class="text-info"><?php echo $product['NAME']; ?></h6>
                                              <h6>$ <?php echo $product['PRICE']; ?></h6>

                                                   <?php /* Stock  
                                              if(($product['QTY_STOCK'] <= "15")&&($product['QTY_STOCK'] > "0")){
                                                 echo '<h6 class="text-warning stock">'. $product['QTY_STOCK'].'</h6>';
                                               }if($product['QTY_STOCK'] > "15"){
                                                 echo '<h6 class="text-success stock">'. $product['QTY_STOCK'].'</h6>';
                                               } if($product['QTY_STOCK'] <= "0"){
                                                 echo '<h6 class="text-danger stock">'. $product['QTY_STOCK'].'</h6>';
                                               } 
                                                */?>
                                              <input type="number" name="quantity" class="form-control" style="width: 6.5rem;" value="1" />
                                              <input type="hidden" name="description" value="<?php echo $product['DESCRIPTION']; ?>" />

                                               <input type="hidden" name="category_id" value="<?php echo $product['CATEGORY_ID']; ?>" />
                                              <input type="hidden" name="name" value="<?php echo $product['NAME']; ?>" />
                                              <input type="hidden" name="price" value="<?php echo $product['PRICE']; ?>" />
                                              <input type="hidden" name="cant_cajas" value="<?php echo $product['CANT_CAJAS']; ?>" />
                                              <input type="hidden" name="intermediario" value="2" />
                                              <input type="submit" name="addpos" style="margin-top:5px;" class="btn btn-info"
                                                     value="Añadir" />
                                          </div>
                                      </form>
                                  </div>
                                      <?php endwhile;
                                        endif;
                                    endif;   
                                    ?>
                                    </div>
                                </div>

<!-- Uber ADEREZOS Tab-->

                  <div class="tab-pane fade in mt-2" id="uber_aderezo">
                                  <div class="row" style="justify-content: center;">
                                      <?php  $query = "SELECT * FROM product WHERE CATEGORY_ID=22 AND CITY  LIKE '{$_SESSION['CITY']}%' ORDER by PRODUCT_ID ASC";
                                        $result = mysqli_query($db, $query);

                                        if ($result):
                                            if(mysqli_num_rows($result)>0):
                                                while($product = mysqli_fetch_assoc($result)):
                                                //print_r($product);
                                      ?>
                                    <div class="col-sm-auto--menu col-md-auto--menu" >
                                      <form method="post" action="pos.php?action=add&id=<?php echo $product['PRODUCT_ID']; ?>">
                                          <div class="products" style="text-align: center;">
                                                                                 <?php
                                                if(($product['IMAGENES'] == null))
                                                {
                                                 echo ' <img src="img/lr-logo.jpg"  title="'.$product['DESCRIPTION'].'" width="50px" height="50px" />';

                                               }if(($product['IMAGENES'] != null))
                                                {
                                                 echo ' <img src="img/'.$product['IMAGENES'].'"  title="'.$product['DESCRIPTION'].'" width="50px" height="50px" />';
                                               } ?>
                                              <h6 class="text-info"><?php echo $product['NAME']; ?></h6>
                                              <h6>$ <?php echo $product['PRICE']; ?></h6>

                                                   <?php /* Stock  
                                              if(($product['QTY_STOCK'] <= "15")&&($product['QTY_STOCK'] > "0")){
                                                 echo '<h6 class="text-warning stock">'. $product['QTY_STOCK'].'</h6>';
                                               }if($product['QTY_STOCK'] > "15"){
                                                 echo '<h6 class="text-success stock">'. $product['QTY_STOCK'].'</h6>';
                                               } if($product['QTY_STOCK'] <= "0"){
                                                 echo '<h6 class="text-danger stock">'. $product['QTY_STOCK'].'</h6>';
                                               } 
                                                */?>
                                              <input type="number" name="quantity" class="form-control" style="width: 6.5rem;" value="1" />
                                              <input type="hidden" name="description" value="<?php echo $product['DESCRIPTION']; ?>" />

                                               <input type="hidden" name="category_id" value="<?php echo $product['CATEGORY_ID']; ?>" />
                                              <input type="hidden" name="name" value="<?php echo $product['NAME']; ?>" />
                                              <input type="hidden" name="price" value="<?php echo $product['PRICE']; ?>" />
                                              <input type="hidden" name="cant_cajas" value="<?php echo $product['CANT_CAJAS']; ?>" />
                                              <input type="hidden" name="intermediario" value="2" />
                                              <input type="submit" name="addpos" style="margin-top:5px;" class="btn btn-info"
                                                     value="Añadir" />
                                          </div>
                                      </form>
                                  </div>
                                      <?php endwhile;
                                        endif;
                                    endif;   
                                    ?>
                                    </div>
                                </div>



<!-- Uber BEBIDAS Tab-->
                  <div class="tab-pane fade in mt-2" id="uber_bebidas">
                                  <div class="row" style="justify-content: center;">
                                      <?php  $query = "SELECT * FROM product WHERE CATEGORY_ID=23 AND CITY  LIKE '{$_SESSION['CITY']}%' ORDER by PRODUCT_ID ASC";
                                        $result = mysqli_query($db, $query);

                                        if ($result):
                                            if(mysqli_num_rows($result)>0):
                                                while($product = mysqli_fetch_assoc($result)):
                                                //print_r($product);
                                      ?>
                                    <div class="col-sm-auto--menu col-md-auto--menu" >
                                      <form method="post" action="pos.php?action=add&id=<?php echo $product['PRODUCT_ID']; ?>">
                                          <div class="products" style="text-align: center;">

                                                                        <?php
                                                if(($product['IMAGENES'] == null))
                                                {
                                                 echo ' <img src="img/lr-logo.jpg"  title="'.$product['DESCRIPTION'].'" width="50px" height="50px" />';

                                               }if(($product['IMAGENES'] != null))
                                                {
                                                 echo ' <img src="img/'.$product['IMAGENES'].'"  title="'.$product['DESCRIPTION'].'" width="50px" height="50px" />';
                                               } ?>

                                              <h6 class="text-info"><?php echo $product['NAME']; ?></h6>
                                              <h6>$ <?php echo $product['PRICE']; ?></h6>

                                                   <?php /* Stock  
                                              if(($product['QTY_STOCK'] <= "15")&&($product['QTY_STOCK'] > "0")){
                                                 echo '<h6 class="text-warning stock">'. $product['QTY_STOCK'].'</h6>';
                                               }if($product['QTY_STOCK'] > "15"){
                                                 echo '<h6 class="text-success stock">'. $product['QTY_STOCK'].'</h6>';
                                               } if($product['QTY_STOCK'] <= "0"){
                                                 echo '<h6 class="text-danger stock">'. $product['QTY_STOCK'].'</h6>';
                                               } 
                                                */?>
                                              <input type="number" name="quantity" class="form-control" style="width: 6.5rem;" value="1" />
                                              <input type="hidden" name="description" value="<?php echo $product['DESCRIPTION']; ?>" />

                                               <input type="hidden" name="category_id" value="<?php echo $product['CATEGORY_ID']; ?>" />
                                              <input type="hidden" name="name" value="<?php echo $product['NAME']; ?>" />
                                              <input type="hidden" name="price" value="<?php echo $product['PRICE']; ?>" />
                                              <input type="hidden" name="cant_cajas" value="<?php echo $product['CANT_CAJAS']; ?>" />
                                              <input type="hidden" name="intermediario" value="2" />
                                              <input type="submit" name="addpos" style="margin-top:5px;" class="btn btn-info"
                                                     value="Añadir" />
                                          </div>
                                      </form>
                                  </div>
                                      <?php endwhile;
                                        endif;
                                    endif;   
                                    ?>
                                    </div>
                                </div>



<!-- Uber COMBOS Tab-->
                  <div class="tab-pane fade in mt-2" id="uber_combos">
                                  <div class="row" style="justify-content: center;">
                                      <?php  $query = "SELECT * FROM product WHERE CATEGORY_ID=24 AND CITY  LIKE '{$_SESSION['CITY']}%' ORDER by PRODUCT_ID ASC";
                                        $result = mysqli_query($db, $query);

                                        if ($result):
                                            if(mysqli_num_rows($result)>0):
                                                while($product = mysqli_fetch_assoc($result)):
                                                //print_r($product);
                                      ?>
                                    <div class="col-sm-auto--menu col-md-auto--menu" >
                                      <form method="post" action="pos.php?action=add&id=<?php echo $product['PRODUCT_ID']; ?>">
                                          <div class="products" style="text-align: center;">
                                                                                 <?php
                                                if(($product['IMAGENES'] == null))
                                                {
                                                 echo ' <img src="img/lr-logo.jpg"  title="'.$product['DESCRIPTION'].'" width="50px" height="50px" />';

                                               }if(($product['IMAGENES'] != null))
                                                {
                                                 echo ' <img src="img/'.$product['IMAGENES'].'"  title="'.$product['DESCRIPTION'].'" width="50px" height="50px" />';
                                               } ?>
                                              <h6 class="text-info"><?php echo $product['NAME']; ?></h6>
                                              <h6>$ <?php echo $product['PRICE']; ?></h6>

                                                   <?php /* Stock  
                                              if(($product['QTY_STOCK'] <= "15")&&($product['QTY_STOCK'] > "0")){
                                                 echo '<h6 class="text-warning stock">'. $product['QTY_STOCK'].'</h6>';
                                               }if($product['QTY_STOCK'] > "15"){
                                                 echo '<h6 class="text-success stock">'. $product['QTY_STOCK'].'</h6>';
                                               } if($product['QTY_STOCK'] <= "0"){
                                                 echo '<h6 class="text-danger stock">'. $product['QTY_STOCK'].'</h6>';
                                               } 
                                                */?>
                                              <input type="number" name="quantity" class="form-control" style="width: 6.5rem;" value="1" />
                                              <input type="hidden" name="description" value="<?php echo $product['DESCRIPTION']; ?>" />

                                               <input type="hidden" name="category_id" value="<?php echo $product['CATEGORY_ID']; ?>" />

                                              <input type="hidden" name="name" value="<?php echo $product['NAME']; ?>" />
                                              <input type="hidden" name="price" value="<?php echo $product['PRICE']; ?>" />
                                              <input type="hidden" name="cant_cajas" value="<?php echo $product['CANT_CAJAS']; ?>" />
                                                <!--h6>Cajas <?php echo $product['CANT_CAJAS']; ?></h6>-->
                                              <input type="hidden" name="intermediario" value="2" />
                                              <input type="submit" name="addpos" style="margin-top:5px;" class="btn btn-info"
                                                     value="Añadir" />
                                          </div>
                                      </form>
                                  </div>
                                      <?php endwhile;
                                        endif;
                                    endif;   
                                    ?>
                                    </div>
                                </div>


<!-- Uber COMPLEMENTOS Tab-->
                  <div class="tab-pane fade in mt-2" id="uber_complementos">
                                  <div class="row" style="justify-content: center;">
                                      <?php  $query = "SELECT * FROM product WHERE CATEGORY_ID=25 AND CITY  LIKE '{$_SESSION['CITY']}%' ORDER by PRODUCT_ID ASC";
                                        $result = mysqli_query($db, $query);

                                        if ($result):
                                            if(mysqli_num_rows($result)>0):
                                                while($product = mysqli_fetch_assoc($result)):
                                                //print_r($product);
                                      ?>
                                    <div class="col-sm-auto--menu col-md-auto--menu" >
                                      <form method="post" action="pos.php?action=add&id=<?php echo $product['PRODUCT_ID']; ?>">
                                          <div class="products" style="text-align: center;">
                                                                                 <?php
                                                if(($product['IMAGENES'] == null))
                                                {
                                                 echo ' <img src="img/lr-logo.jpg"  title="'.$product['DESCRIPTION'].'" width="50px" height="50px" />';

                                               }if(($product['IMAGENES'] != null))
                                                {
                                                 echo ' <img src="img/'.$product['IMAGENES'].'"  title="'.$product['DESCRIPTION'].'" width="50px" height="50px" />';
                                               } ?>
                                              <h6 class="text-info"><?php echo $product['NAME']; ?></h6>
                                              <h6>$ <?php echo $product['PRICE']; ?></h6>

                                                   <?php /* Stock  
                                              if(($product['QTY_STOCK'] <= "15")&&($product['QTY_STOCK'] > "0")){
                                                 echo '<h6 class="text-warning stock">'. $product['QTY_STOCK'].'</h6>';
                                               }if($product['QTY_STOCK'] > "15"){
                                                 echo '<h6 class="text-success stock">'. $product['QTY_STOCK'].'</h6>';
                                               } if($product['QTY_STOCK'] <= "0"){
                                                 echo '<h6 class="text-danger stock">'. $product['QTY_STOCK'].'</h6>';
                                               } 
                                                */?>
                                              <input type="number" name="quantity" class="form-control" style="width: 6.5rem;" value="1" />
                                              <input type="hidden" name="description" value="<?php echo $product['DESCRIPTION']; ?>" />

                                               <input type="hidden" name="category_id" value="<?php echo $product['CATEGORY_ID']; ?>" />
                                              <input type="hidden" name="name" value="<?php echo $product['NAME']; ?>" />
                                              <input type="hidden" name="price" value="<?php echo $product['PRICE']; ?>" />
                                              <input type="hidden" name="cant_cajas" value="<?php echo $product['CANT_CAJAS']; ?>" />
                                              <input type="hidden" name="intermediario" value="2" />
                                              <input type="submit" name="addpos" style="margin-top:5px;" class="btn btn-info"
                                                     value="Añadir" />
                                          </div>
                                      </form>
                                  </div>
                                      <?php endwhile;
                                        endif;
                                    endif;   
                                    ?>
                                    </div>
                                </div>

<!-- Uber CORTESIAS Tab-->

                  <div class="tab-pane fade in mt-2" id="uber_cortesias">
                                  <div class="row" style="justify-content: center;">
                                      <?php  $query = "SELECT * FROM product WHERE CATEGORY_ID=26 AND CITY  LIKE '{$_SESSION['CITY']}%' ORDER by PRODUCT_ID ASC";
                                        $result = mysqli_query($db, $query);

                                        if ($result):
                                            if(mysqli_num_rows($result)>0):
                                                while($product = mysqli_fetch_assoc($result)):
                                                //print_r($product);
                                      ?>
                                    <div class="col-sm-auto--menu col-md-auto--menu" >
                                      <form method="post" action="pos.php?action=add&id=<?php echo $product['PRODUCT_ID']; ?>">
                                          <div class="products" style="text-align: center;">
                                                                                 <?php
                                                if(($product['IMAGENES'] == null))
                                                {
                                                 echo ' <img src="img/lr-logo.jpg"  title="'.$product['DESCRIPTION'].'" width="50px" height="50px" />';

                                               }if(($product['IMAGENES'] != null))
                                                {
                                                 echo ' <img src="img/'.$product['IMAGENES'].'"  title="'.$product['DESCRIPTION'].'" width="50px" height="50px" />';
                                               } ?>
                                              <h6 class="text-info"><?php echo $product['NAME']; ?></h6>
                                              <h6>$ <?php echo $product['PRICE']; ?></h6>

                                                   <?php /* Stock  
                                              if(($product['QTY_STOCK'] <= "15")&&($product['QTY_STOCK'] > "0")){
                                                 echo '<h6 class="text-warning stock">'. $product['QTY_STOCK'].'</h6>';
                                               }if($product['QTY_STOCK'] > "15"){
                                                 echo '<h6 class="text-success stock">'. $product['QTY_STOCK'].'</h6>';
                                               } if($product['QTY_STOCK'] <= "0"){
                                                 echo '<h6 class="text-danger stock">'. $product['QTY_STOCK'].'</h6>';
                                               } 
                                                */?>
                                              <input type="number" name="quantity" class="form-control" style="width: 6.5rem;" value="1" />
                                              <input type="hidden" name="description" value="<?php echo $product['DESCRIPTION']; ?>" />

                                               <input type="hidden" name="category_id" value="<?php echo $product['CATEGORY_ID']; ?>" />
                                              <input type="hidden" name="name" value="<?php echo $product['NAME']; ?>" />
                                              <input type="hidden" name="price" value="<?php echo $product['PRICE']; ?>" />
                                              <input type="hidden" name="cant_cajas" value="<?php echo $product['CANT_CAJAS']; ?>" />
                                              <input type="hidden" name="intermediario" value="2" />
                                              <input type="submit" name="addpos" style="margin-top:5px;" class="btn btn-info"
                                                     value="Añadir" />
                                          </div>
                                      </form>
                                  </div>
                                      <?php endwhile;
                                        endif;
                                    endif;   
                                    ?>
                                    </div>
                                </div>

<!-- Uber OTROS Tab-->

                               <div class="tab-pane fade in mt-2" id="uber_otros">
                                  <div class="row" style="justify-content: center;">
                                      <?php  $query = "SELECT * FROM product WHERE CATEGORY_ID=27 AND CITY  LIKE '{$_SESSION['CITY']}%' ORDER by PRODUCT_ID ASC";
                                        $result = mysqli_query($db, $query);

                                        if ($result):
                                            if(mysqli_num_rows($result)>0):
                                                while($product = mysqli_fetch_assoc($result)):
                                                //print_r($product);
                                      ?>
                                    <div class="col-sm-auto--menu col-md-auto--menu" >
                                      <form method="post" action="pos.php?action=add&id=<?php echo $product['PRODUCT_ID']; ?>">
                                          <div class="products" style="text-align: center;">
                                                                                 <?php
                                                if(($product['IMAGENES'] == null))
                                                {
                                                 echo ' <img src="img/lr-logo.jpg"  title="'.$product['DESCRIPTION'].'" width="50px" height="50px" />';

                                               }if(($product['IMAGENES'] != null))
                                                {
                                                 echo ' <img src="img/'.$product['IMAGENES'].'"  title="'.$product['DESCRIPTION'].'" width="50px" height="50px" />';
                                               } ?>
                                              <h6 class="text-info"><?php echo $product['NAME']; ?></h6>
                                              <h6>$ <?php echo $product['PRICE']; ?></h6>

                                                   <?php /* Stock  
                                              if(($product['QTY_STOCK'] <= "15")&&($product['QTY_STOCK'] > "0")){
                                                 echo '<h6 class="text-warning stock">'. $product['QTY_STOCK'].'</h6>';
                                               }if($product['QTY_STOCK'] > "15"){
                                                 echo '<h6 class="text-success stock">'. $product['QTY_STOCK'].'</h6>';
                                               } if($product['QTY_STOCK'] <= "0"){
                                                 echo '<h6 class="text-danger stock">'. $product['QTY_STOCK'].'</h6>';
                                               } 
                                                */?>
                                              <input type="number" name="quantity" class="form-control" style="width: 6.5rem;" value="1" />
                                              <input type="hidden" name="description" value="<?php echo $product['DESCRIPTION']; ?>" />

                                               <input type="hidden" name="category_id" value="<?php echo $product['CATEGORY_ID']; ?>" />
                                              <input type="hidden" name="name" value="<?php echo $product['NAME']; ?>" />
                                              <input type="hidden" name="price" value="<?php echo $product['PRICE']; ?>" />
                                              <input type="hidden" name="cant_cajas" value="<?php echo $product['CANT_CAJAS']; ?>" />
                                              <input type="hidden" name="intermediario" value="2" />
                                              <input type="submit" name="addpos" style="margin-top:5px;" class="btn btn-info"
                                                     value="Añadir" />
                                          </div>
                                      </form>
                                  </div>
                                      <?php endwhile;
                                        endif;
                                    endif;   
                                    ?>
                                    </div>
                                </div>



                        <!-- /Espacio Uber  -->


<!-- sd Tab-->

                  <div class="tab-pane fade in mt-2" id="sd_siempre_listas">
                                  <div class="row" style="justify-content: center;">
                                      <?php  $query = "SELECT * FROM product WHERE CATEGORY_ID=30 AND CITY  LIKE '{$_SESSION['CITY']}%' ORDER by PRODUCT_ID ASC";
                                        $result = mysqli_query($db, $query);

                                        if ($result):
                                            if(mysqli_num_rows($result)>0):
                                                while($product = mysqli_fetch_assoc($result)):
                                                //print_r($product);
                                      ?>
                                    <div class="col-sm-auto--menu col-md-auto--menu" >
                                      <form method="post" action="pos.php?action=add&id=<?php echo $product['PRODUCT_ID']; ?>">
                                          <div class="products" style="text-align: center;">
                                                                                 <?php
                                                if(($product['IMAGENES'] == null))
                                                {
                                                 echo ' <img src="img/lr-logo.jpg"  title="'.$product['DESCRIPTION'].'" width="50px" height="50px" />';

                                               }if(($product['IMAGENES'] != null))
                                                {
                                                 echo ' <img src="img/'.$product['IMAGENES'].'"  title="'.$product['DESCRIPTION'].'" width="50px" height="50px" />';
                                               } ?>
                                              <h6 class="text-info"><?php echo $product['NAME']; ?></h6>
                                              <h6>$ <?php echo $product['PRICE']; ?></h6>

                                                   <?php /* Stock  
                                              if(($product['QTY_STOCK'] <= "15")&&($product['QTY_STOCK'] > "0")){
                                                 echo '<h6 class="text-warning stock">'. $product['QTY_STOCK'].'</h6>';
                                               }if($product['QTY_STOCK'] > "15"){
                                                 echo '<h6 class="text-success stock">'. $product['QTY_STOCK'].'</h6>';
                                               } if($product['QTY_STOCK'] <= "0"){
                                                 echo '<h6 class="text-danger stock">'. $product['QTY_STOCK'].'</h6>';
                                               } 
                                                */?>
                                              <input type="number" name="quantity" class="form-control" style="width: 6.5rem;" value="1" />
                                              <input type="hidden" name="description" value="<?php echo $product['DESCRIPTION']; ?>" />

                                               <input type="hidden" name="category_id" value="<?php echo $product['CATEGORY_ID']; ?>" />
                                              <input type="hidden" name="name" value="<?php echo $product['NAME']; ?>" />
                                              <input type="hidden" name="price" value="<?php echo $product['PRICE']; ?>" />
                                              <input type="hidden" name="cant_cajas" value="<?php echo $product['CANT_CAJAS']; ?>" />
                                               <!--<h6>Cajas <?php echo $product['CANT_CAJAS']; ?></h6>-->
                                              <input type="hidden" name="intermediario" value="2" />

                                              <input type="submit" name="addpos" style="margin-top:5px;" class="btn btn-info"
                                                     value="Añadir" />
                                          </div>
                                      </form>
                                  </div>
                                      <?php endwhile;
                                        endif;
                                    endif;   
                                    ?>
                                    </div>
                                </div>




                  <div class="tab-pane fade in mt-2" id="sd_promos">
                                  <div class="row" style="justify-content: center;">
                                      <?php  $query = "SELECT * FROM product WHERE CATEGORY_ID=31 AND CITY  LIKE '{$_SESSION['CITY']}%' ORDER by PRODUCT_ID ASC";
                                        $result = mysqli_query($db, $query);

                                        if ($result):
                                            if(mysqli_num_rows($result)>0):
                                                while($product = mysqli_fetch_assoc($result)):
                                                //print_r($product);
                                      ?>
                                    <div class="col-sm-auto--menu col-md-auto--menu" >
                                      <form method="post" action="pos.php?action=add&id=<?php echo $product['PRODUCT_ID']; ?>">
                                          <div class="products" style="text-align: center;">
                                                                                 <?php
                                                if(($product['IMAGENES'] == null))
                                                {
                                                 echo ' <img src="img/lr-logo.jpg"  title="'.$product['DESCRIPTION'].'" width="50px" height="50px" />';

                                               }if(($product['IMAGENES'] != null))
                                                {
                                                 echo ' <img src="img/'.$product['IMAGENES'].'"  title="'.$product['DESCRIPTION'].'" width="50px" height="50px" />';
                                               } ?>
                                              <h6 class="text-info"><?php echo $product['NAME']; ?></h6>
                                              <h6>$ <?php echo $product['PRICE']; ?></h6>

                                                   <?php /* Stock  
                                              if(($product['QTY_STOCK'] <= "15")&&($product['QTY_STOCK'] > "0")){
                                                 echo '<h6 class="text-warning stock">'. $product['QTY_STOCK'].'</h6>';
                                               }if($product['QTY_STOCK'] > "15"){
                                                 echo '<h6 class="text-success stock">'. $product['QTY_STOCK'].'</h6>';
                                               } if($product['QTY_STOCK'] <= "0"){
                                                 echo '<h6 class="text-danger stock">'. $product['QTY_STOCK'].'</h6>';
                                               } 
                                                */?>
                                              <input type="number" name="quantity" class="form-control" style="width: 6.5rem;" value="1" />
                                              <input type="hidden" name="description" value="<?php echo $product['DESCRIPTION']; ?>" />

                                               <input type="hidden" name="category_id" value="<?php echo $product['CATEGORY_ID']; ?>" />
                                              <input type="hidden" name="name" value="<?php echo $product['NAME']; ?>" />
                                              <input type="hidden" name="price" value="<?php echo $product['PRICE']; ?>" />
                                              <input type="hidden" name="cant_cajas" value="<?php echo $product['CANT_CAJAS']; ?>" />
                                              <input type="hidden" name="intermediario" value="2" />
                                              <input type="submit" name="addpos" style="margin-top:5px;" class="btn btn-info"
                                                     value="Añadir" />
                                          </div>
                                      </form>
                                  </div>
                                      <?php endwhile;
                                        endif;
                                    endif;   
                                    ?>
                                    </div>
                                </div>



                  <div class="tab-pane fade in mt-2" id="sd_aderezo">
                                  <div class="row" style="justify-content: center;">
                                      <?php  $query = "SELECT * FROM product WHERE CATEGORY_ID=32 AND CITY  LIKE '{$_SESSION['CITY']}%' ORDER by PRODUCT_ID ASC";
                                        $result = mysqli_query($db, $query);

                                        if ($result):
                                            if(mysqli_num_rows($result)>0):
                                                while($product = mysqli_fetch_assoc($result)):
                                                //print_r($product);
                                      ?>
                                    <div class="col-sm-auto--menu col-md-auto--menu" >
                                      <form method="post" action="pos.php?action=add&id=<?php echo $product['PRODUCT_ID']; ?>">
                                          <div class="products" style="text-align: center;">
                                                                                 <?php
                                                if(($product['IMAGENES'] == null))
                                                {
                                                 echo ' <img src="img/lr-logo.jpg"  title="'.$product['DESCRIPTION'].'" width="50px" height="50px" />';

                                               }if(($product['IMAGENES'] != null))
                                                {
                                                 echo ' <img src="img/'.$product['IMAGENES'].'"  title="'.$product['DESCRIPTION'].'" width="50px" height="50px" />';
                                               } ?>
                                              <h6 class="text-info"><?php echo $product['NAME']; ?></h6>
                                              <h6>$ <?php echo $product['PRICE']; ?></h6>

                                                   <?php /* Stock  
                                              if(($product['QTY_STOCK'] <= "15")&&($product['QTY_STOCK'] > "0")){
                                                 echo '<h6 class="text-warning stock">'. $product['QTY_STOCK'].'</h6>';
                                               }if($product['QTY_STOCK'] > "15"){
                                                 echo '<h6 class="text-success stock">'. $product['QTY_STOCK'].'</h6>';
                                               } if($product['QTY_STOCK'] <= "0"){
                                                 echo '<h6 class="text-danger stock">'. $product['QTY_STOCK'].'</h6>';
                                               } 
                                                */?>
                                              <input type="number" name="quantity" class="form-control" style="width: 6.5rem;" value="1" />
                                              <input type="hidden" name="description" value="<?php echo $product['DESCRIPTION']; ?>" />

                                               <input type="hidden" name="category_id" value="<?php echo $product['CATEGORY_ID']; ?>" />
                                              <input type="hidden" name="name" value="<?php echo $product['NAME']; ?>" />
                                              <input type="hidden" name="price" value="<?php echo $product['PRICE']; ?>" />
                                              <input type="hidden" name="cant_cajas" value="<?php echo $product['CANT_CAJAS']; ?>" />
                                              <input type="hidden" name="intermediario" value="2" />
                                              <input type="submit" name="addpos" style="margin-top:5px;" class="btn btn-info"
                                                     value="Añadir" />
                                          </div>
                                      </form>
                                  </div>
                                      <?php endwhile;
                                        endif;
                                    endif;   
                                    ?>
                                    </div>
                                </div>




                  <div class="tab-pane fade in mt-2" id="sd_bebidas">
                                  <div class="row" style="justify-content: center;">
                                      <?php  $query = "SELECT * FROM product WHERE CATEGORY_ID=33 AND CITY  LIKE '{$_SESSION['CITY']}%' ORDER by PRODUCT_ID ASC";
                                        $result = mysqli_query($db, $query);

                                        if ($result):
                                            if(mysqli_num_rows($result)>0):
                                                while($product = mysqli_fetch_assoc($result)):
                                                //print_r($product);
                                      ?>
                                    <div class="col-sm-auto--menu col-md-auto--menu" >
                                      <form method="post" action="pos.php?action=add&id=<?php echo $product['PRODUCT_ID']; ?>">
                                          <div class="products" style="text-align: center;">

                                                                        <?php
                                                if(($product['IMAGENES'] == null))
                                                {
                                                 echo ' <img src="img/lr-logo.jpg"  title="'.$product['DESCRIPTION'].'" width="50px" height="50px" />';

                                               }if(($product['IMAGENES'] != null))
                                                {
                                                 echo ' <img src="img/'.$product['IMAGENES'].'"  title="'.$product['DESCRIPTION'].'" width="50px" height="50px" />';
                                               } ?>

                                              <h6 class="text-info"><?php echo $product['NAME']; ?></h6>
                                              <h6>$ <?php echo $product['PRICE']; ?></h6>

                                                   <?php /* Stock  
                                              if(($product['QTY_STOCK'] <= "15")&&($product['QTY_STOCK'] > "0")){
                                                 echo '<h6 class="text-warning stock">'. $product['QTY_STOCK'].'</h6>';
                                               }if($product['QTY_STOCK'] > "15"){
                                                 echo '<h6 class="text-success stock">'. $product['QTY_STOCK'].'</h6>';
                                               } if($product['QTY_STOCK'] <= "0"){
                                                 echo '<h6 class="text-danger stock">'. $product['QTY_STOCK'].'</h6>';
                                               } 
                                                */?>
                                              <input type="number" name="quantity" class="form-control" style="width: 6.5rem;" value="1" />
                                              <input type="hidden" name="description" value="<?php echo $product['DESCRIPTION']; ?>" />

                                               <input type="hidden" name="category_id" value="<?php echo $product['CATEGORY_ID']; ?>" />
                                              <input type="hidden" name="name" value="<?php echo $product['NAME']; ?>" />
                                              <input type="hidden" name="price" value="<?php echo $product['PRICE']; ?>" />
                                              <input type="hidden" name="cant_cajas" value="<?php echo $product['CANT_CAJAS']; ?>" />
                                              <input type="hidden" name="intermediario" value="2" />
                                              <input type="submit" name="addpos" style="margin-top:5px;" class="btn btn-info"
                                                     value="Añadir" />
                                          </div>
                                      </form>
                                  </div>
                                      <?php endwhile;
                                        endif;
                                    endif;   
                                    ?>
                                    </div>
                                </div>




                  <div class="tab-pane fade in mt-2" id="sd_combos">
                                  <div class="row" style="justify-content: center;">
                                      <?php  $query = "SELECT * FROM product WHERE CATEGORY_ID=34 AND CITY  LIKE '{$_SESSION['CITY']}%' ORDER by PRODUCT_ID ASC";
                                        $result = mysqli_query($db, $query);

                                        if ($result):
                                            if(mysqli_num_rows($result)>0):
                                                while($product = mysqli_fetch_assoc($result)):
                                                //print_r($product);
                                      ?>
                                    <div class="col-sm-auto--menu col-md-auto--menu" >
                                      <form method="post" action="pos.php?action=add&id=<?php echo $product['PRODUCT_ID']; ?>">
                                          <div class="products" style="text-align: center;">
                                                                                 <?php
                                                if(($product['IMAGENES'] == null))
                                                {
                                                 echo ' <img src="img/lr-logo.jpg"  title="'.$product['DESCRIPTION'].'" width="50px" height="50px" />';

                                               }if(($product['IMAGENES'] != null))
                                                {
                                                 echo ' <img src="img/'.$product['IMAGENES'].'"  title="'.$product['DESCRIPTION'].'" width="50px" height="50px" />';
                                               } ?>
                                              <h6 class="text-info"><?php echo $product['NAME']; ?></h6>
                                              <h6>$ <?php echo $product['PRICE']; ?></h6>

                                                   <?php /* Stock  
                                              if(($product['QTY_STOCK'] <= "15")&&($product['QTY_STOCK'] > "0")){
                                                 echo '<h6 class="text-warning stock">'. $product['QTY_STOCK'].'</h6>';
                                               }if($product['QTY_STOCK'] > "15"){
                                                 echo '<h6 class="text-success stock">'. $product['QTY_STOCK'].'</h6>';
                                               } if($product['QTY_STOCK'] <= "0"){
                                                 echo '<h6 class="text-danger stock">'. $product['QTY_STOCK'].'</h6>';
                                               } 
                                                */?>
                                              <input type="number" name="quantity" class="form-control" style="width: 6.5rem;" value="1" />
                                              <input type="hidden" name="description" value="<?php echo $product['DESCRIPTION']; ?>" />

                                               <input type="hidden" name="category_id" value="<?php echo $product['CATEGORY_ID']; ?>" />
                                              <input type="hidden" name="name" value="<?php echo $product['NAME']; ?>" />
                                              <input type="hidden" name="price" value="<?php echo $product['PRICE']; ?>" />
                                              <input type="hidden" name="cant_cajas" value="<?php echo $product['CANT_CAJAS']; ?>" />
                                             <!-- <h6>Cajas <?php echo $product['CANT_CAJAS']; ?></h6>-->
                                              <input type="hidden" name="intermediario" value="2" />
                                              <input type="submit" name="addpos" style="margin-top:5px;" class="btn btn-info"
                                                     value="Añadir" />
                                          </div>
                                      </form>
                                  </div>
                                      <?php endwhile;
                                        endif;
                                    endif;   
                                    ?>
                                    </div>
                                </div>



                  <div class="tab-pane fade in mt-2" id="sd_complementos">
                                  <div class="row" style="justify-content: center;">
                                      <?php  $query = "SELECT * FROM product WHERE CATEGORY_ID=35 AND CITY  LIKE '{$_SESSION['CITY']}%' ORDER by PRODUCT_ID ASC";
                                        $result = mysqli_query($db, $query);

                                        if ($result):
                                            if(mysqli_num_rows($result)>0):
                                                while($product = mysqli_fetch_assoc($result)):
                                                //print_r($product);
                                      ?>
                                    <div class="col-sm-auto--menu col-md-auto--menu" >
                                      <form method="post" action="pos.php?action=add&id=<?php echo $product['PRODUCT_ID']; ?>">
                                          <div class="products" style="text-align: center;">
                                                                                 <?php
                                                if(($product['IMAGENES'] == null))
                                                {
                                                 echo ' <img src="img/lr-logo.jpg"  title="'.$product['DESCRIPTION'].'" width="50px" height="50px" />';

                                               }if(($product['IMAGENES'] != null))
                                                {
                                                 echo ' <img src="img/'.$product['IMAGENES'].'"  title="'.$product['DESCRIPTION'].'" width="50px" height="50px" />';
                                               } ?>
                                              <h6 class="text-info"><?php echo $product['NAME']; ?></h6>
                                              <h6>$ <?php echo $product['PRICE']; ?></h6>

                                                   <?php /* Stock  
                                              if(($product['QTY_STOCK'] <= "15")&&($product['QTY_STOCK'] > "0")){
                                                 echo '<h6 class="text-warning stock">'. $product['QTY_STOCK'].'</h6>';
                                               }if($product['QTY_STOCK'] > "15"){
                                                 echo '<h6 class="text-success stock">'. $product['QTY_STOCK'].'</h6>';
                                               } if($product['QTY_STOCK'] <= "0"){
                                                 echo '<h6 class="text-danger stock">'. $product['QTY_STOCK'].'</h6>';
                                               } 
                                                */?>
                                              <input type="number" name="quantity" class="form-control" style="width: 6.5rem;" value="1" />
                                              <input type="hidden" name="description" value="<?php echo $product['DESCRIPTION']; ?>" />

                                               <input type="hidden" name="category_id" value="<?php echo $product['CATEGORY_ID']; ?>" />
                                              <input type="hidden" name="name" value="<?php echo $product['NAME']; ?>" />
                                              <input type="hidden" name="price" value="<?php echo $product['PRICE']; ?>" />
                                              <input type="hidden" name="cant_cajas" value="<?php echo $product['CANT_CAJAS']; ?>" />
                                              <input type="hidden" name="intermediario" value="2" />
                                              <input type="submit" name="addpos" style="margin-top:5px;" class="btn btn-info"
                                                     value="Añadir" />
                                          </div>
                                      </form>
                                  </div>
                                      <?php endwhile;
                                        endif;
                                    endif;   
                                    ?>
                                    </div>
                                </div>

                  <div class="tab-pane fade in mt-2" id="sd_cortesias">
                                  <div class="row" style="justify-content: center;">
                                      <?php  $query = "SELECT * FROM product WHERE CATEGORY_ID=36 AND CITY  LIKE '{$_SESSION['CITY']}%' ORDER by PRODUCT_ID ASC";
                                        $result = mysqli_query($db, $query);

                                        if ($result):
                                            if(mysqli_num_rows($result)>0):
                                                while($product = mysqli_fetch_assoc($result)):
                                                //print_r($product);
                                      ?>
                                    <div class="col-sm-auto--menu col-md-auto--menu" >
                                      <form method="post" action="pos.php?action=add&id=<?php echo $product['PRODUCT_ID']; ?>">
                                          <div class="products" style="text-align: center;">
                                                                                 <?php
                                                if(($product['IMAGENES'] == null))
                                                {
                                                 echo ' <img src="img/lr-logo.jpg"  title="'.$product['DESCRIPTION'].'" width="50px" height="50px" />';

                                               }if(($product['IMAGENES'] != null))
                                                {
                                                 echo ' <img src="img/'.$product['IMAGENES'].'"  title="'.$product['DESCRIPTION'].'" width="50px" height="50px" />';
                                               } ?>
                                              <h6 class="text-info"><?php echo $product['NAME']; ?></h6>
                                              <h6>$ <?php echo $product['PRICE']; ?></h6>

                                                   <?php /* Stock  
                                              if(($product['QTY_STOCK'] <= "15")&&($product['QTY_STOCK'] > "0")){
                                                 echo '<h6 class="text-warning stock">'. $product['QTY_STOCK'].'</h6>';
                                               }if($product['QTY_STOCK'] > "15"){
                                                 echo '<h6 class="text-success stock">'. $product['QTY_STOCK'].'</h6>';
                                               } if($product['QTY_STOCK'] <= "0"){
                                                 echo '<h6 class="text-danger stock">'. $product['QTY_STOCK'].'</h6>';
                                               } 
                                                */?>
                                              <input type="number" name="quantity" class="form-control" style="width: 6.5rem;" value="1" />
                                              <input type="hidden" name="description" value="<?php echo $product['DESCRIPTION']; ?>" />

                                               <input type="hidden" name="category_id" value="<?php echo $product['CATEGORY_ID']; ?>" />
                                              <input type="hidden" name="name" value="<?php echo $product['NAME']; ?>" />
                                              <input type="hidden" name="price" value="<?php echo $product['PRICE']; ?>" />
                                              <input type="hidden" name="cant_cajas" value="<?php echo $product['CANT_CAJAS']; ?>" />
                                              <input type="hidden" name="intermediario" value="2" />
                                              <input type="submit" name="addpos" style="margin-top:5px;" class="btn btn-info"
                                                     value="Añadir" />
                                          </div>
                                      </form>
                                  </div>
                                      <?php endwhile;
                                        endif;
                                    endif;   
                                    ?>
                                    </div>
                                </div>
                        <!-- /Espacio sd  -->



<!-- rappi Tab-->

<!-- rappi Pizza Individual Tab-->
<div class="tab-pane fade in mt-2" id="rappi_individuales">
                                  <div class="row" style="justify-content: center;">
                                      <?php  $query = "SELECT * FROM product WHERE CATEGORY_ID=48 AND CITY  LIKE '{$_SESSION['CITY']}%' ORDER by PRODUCT_ID ASC";
                                        $result = mysqli_query($db, $query);

                                        if ($result):
                                            if(mysqli_num_rows($result)>0):
                                                while($product = mysqli_fetch_assoc($result)):
                                                //print_r($product);
                                      ?>
                                    <div class="col-sm-auto--menu col-md-auto--menu" >
                                      <form method="post" action="pos.php?action=add&id=<?php echo $product['PRODUCT_ID']; ?>">
                                          <div class="products" style="text-align: center;">
                                                                                 <?php
                                                if(($product['IMAGENES'] == null))
                                                {
                                                 echo ' <img src="img/lr-logo.jpg"  title="'.$product['DESCRIPTION'].'" width="50px" height="50px" />';

                                               }if(($product['IMAGENES'] != null))
                                                {
                                                 echo ' <img src="img/'.$product['IMAGENES'].'"  title="'.$product['DESCRIPTION'].'" width="50px" height="50px" />';
                                               } ?>
                                              <h6 class="text-info"><?php echo $product['NAME']; ?></h6>
                                              <h6>$ <?php echo $product['PRICE']; ?></h6>

                                                   <?php /* Stock  
                                              if(($product['QTY_STOCK'] <= "15")&&($product['QTY_STOCK'] > "0")){
                                                 echo '<h6 class="text-warning stock">'. $product['QTY_STOCK'].'</h6>';
                                               }if($product['QTY_STOCK'] > "15"){
                                                 echo '<h6 class="text-success stock">'. $product['QTY_STOCK'].'</h6>';
                                               } if($product['QTY_STOCK'] <= "0"){
                                                 echo '<h6 class="text-danger stock">'. $product['QTY_STOCK'].'</h6>';
                                               } 
                                                */?>
                                              <input type="number" name="quantity" class="form-control" style="width: 6.5rem;" value="1" />
                                              <input type="hidden" name="description" value="<?php echo $product['DESCRIPTION']; ?>" />

                                               <input type="hidden" name="category_id" value="<?php echo $product['CATEGORY_ID']; ?>" />
                                              <input type="hidden" name="name" value="<?php echo $product['NAME']; ?>" />
                                              <input type="hidden" name="price" value="<?php echo $product['PRICE']; ?>" />
                                              <input type="hidden" name="cant_cajas" value="<?php echo $product['CANT_CAJAS']; ?>" />
                                               <!--<h6>Cajas <?php echo $product['CANT_CAJAS']; ?></h6>-->

                                              <input type="hidden" name="intermediario" value="2" />

                                              <input type="submit" name="addpos" style="margin-top:5px;" class="btn btn-info"
                                                     value="Añadir" />
                                          </div>
                                      </form>
                                  </div>
                                      <?php endwhile;
                                        endif;
                                    endif;   
                                    ?>
                                    </div>
                                </div>
<!-- rappi PIZZAS Tab-->

                  <div class="tab-pane fade in mt-2" id="rappi_siempre_listas">
                                  <div class="row" style="justify-content: center;">
                                      <?php  $query = "SELECT * FROM product WHERE CATEGORY_ID=40 AND CITY  LIKE '{$_SESSION['CITY']}%' ORDER by PRODUCT_ID ASC";
                                        $result = mysqli_query($db, $query);

                                        if ($result):
                                            if(mysqli_num_rows($result)>0):
                                                while($product = mysqli_fetch_assoc($result)):
                                                //print_r($product);
                                      ?>
                                    <div class="col-sm-auto--menu col-md-auto--menu" >
                                      <form method="post" action="pos.php?action=add&id=<?php echo $product['PRODUCT_ID']; ?>">
                                          <div class="products" style="text-align: center;">
                                                                                 <?php
                                                if(($product['IMAGENES'] == null))
                                                {
                                                 echo ' <img src="img/lr-logo.jpg"  title="'.$product['DESCRIPTION'].'" width="50px" height="50px" />';

                                               }if(($product['IMAGENES'] != null))
                                                {
                                                 echo ' <img src="img/'.$product['IMAGENES'].'"  title="'.$product['DESCRIPTION'].'" width="50px" height="50px" />';
                                               } ?>
                                              <h6 class="text-info"><?php echo $product['NAME']; ?></h6>
                                              <h6>$ <?php echo $product['PRICE']; ?></h6>

                                                   <?php /* Stock  
                                              if(($product['QTY_STOCK'] <= "15")&&($product['QTY_STOCK'] > "0")){
                                                 echo '<h6 class="text-warning stock">'. $product['QTY_STOCK'].'</h6>';
                                               }if($product['QTY_STOCK'] > "15"){
                                                 echo '<h6 class="text-success stock">'. $product['QTY_STOCK'].'</h6>';
                                               } if($product['QTY_STOCK'] <= "0"){
                                                 echo '<h6 class="text-danger stock">'. $product['QTY_STOCK'].'</h6>';
                                               } 
                                                */?>
                                              <input type="number" name="quantity" class="form-control" style="width: 6.5rem;" value="1" />
                                              <?php
                                              if ($product['INGREDIENTE']=="SI") {
                                               echo $aaa;
                                               echo $bbb;
                                                // code...
                                              }
                                              ?>

                                              <input type="hidden" name="description" value="<?php echo $product['DESCRIPTION']; ?>" />

                                               <input type="hidden" name="category_id" value="<?php echo $product['CATEGORY_ID']; ?>" />
                                              <input type="hidden" name="name" value="<?php echo $product['NAME']; ?>" />
                                              <input type="hidden" name="price" value="<?php echo $product['PRICE']; ?>" />
                                              <input type="hidden" name="cant_cajas" value="<?php echo $product['CANT_CAJAS']; ?>" />
                                               <!--<h6>Cajas <?php echo $product['CANT_CAJAS']; ?></h6>-->

                                              <input type="hidden" name="intermediario" value="2" />

                                              <input type="submit" name="addpos" style="margin-top:5px;" class="btn btn-info"
                                                     value="Añadir" />
                                          </div>
                                      </form>
                                  </div>
                                      <?php endwhile;
                                        endif;
                                    endif;   
                                    ?>
                                    </div>
                                </div>


<!-- rappi PROMOS Tab-->


                  <div class="tab-pane fade in mt-2" id="rappi_promos">
                                  <div class="row" style="justify-content: center;">
                                      <?php  $query = "SELECT * FROM product WHERE CATEGORY_ID=41 AND CITY  LIKE '{$_SESSION['CITY']}%' ORDER by PRODUCT_ID ASC";
                                        $result = mysqli_query($db, $query);

                                        if ($result):
                                            if(mysqli_num_rows($result)>0):
                                                while($product = mysqli_fetch_assoc($result)):
                                                //print_r($product);
                                      ?>
                                    <div class="col-sm-auto--menu col-md-auto--menu" >
                                      <form method="post" action="pos.php?action=add&id=<?php echo $product['PRODUCT_ID']; ?>">
                                          <div class="products" style="text-align: center;">
                                                                                 <?php
                                                if(($product['IMAGENES'] == null))
                                                {
                                                 echo ' <img src="img/lr-logo.jpg"  title="'.$product['DESCRIPTION'].'" width="50px" height="50px" />';

                                               }if(($product['IMAGENES'] != null))
                                                {
                                                 echo ' <img src="img/'.$product['IMAGENES'].'"  title="'.$product['DESCRIPTION'].'" width="50px" height="50px" />';
                                               } ?>
                                              <h6 class="text-info"><?php echo $product['NAME']; ?></h6>
                                              <h6>$ <?php echo $product['PRICE']; ?></h6>

                                                   <?php /* Stock  
                                              if(($product['QTY_STOCK'] <= "15")&&($product['QTY_STOCK'] > "0")){
                                                 echo '<h6 class="text-warning stock">'. $product['QTY_STOCK'].'</h6>';
                                               }if($product['QTY_STOCK'] > "15"){
                                                 echo '<h6 class="text-success stock">'. $product['QTY_STOCK'].'</h6>';
                                               } if($product['QTY_STOCK'] <= "0"){
                                                 echo '<h6 class="text-danger stock">'. $product['QTY_STOCK'].'</h6>';
                                               } 
                                                */?>
                                              <input type="number" name="quantity" class="form-control" style="width: 6.5rem;" value="1" />
                                              <input type="hidden" name="description" value="<?php echo $product['DESCRIPTION']; ?>" />

                                               <input type="hidden" name="category_id" value="<?php echo $product['CATEGORY_ID']; ?>" />
                                              <input type="hidden" name="name" value="<?php echo $product['NAME']; ?>" />
                                              <input type="hidden" name="price" value="<?php echo $product['PRICE']; ?>" />
                                              <input type="hidden" name="cant_cajas" value="<?php echo $product['CANT_CAJAS']; ?>" />
                                              <input type="hidden" name="intermediario" value="2" />
                                              <input type="submit" name="addpos" style="margin-top:5px;" class="btn btn-info"
                                                     value="Añadir" />
                                          </div>
                                      </form>
                                  </div>
                                      <?php endwhile;
                                        endif;
                                    endif;   
                                    ?>
                                    </div>
                                </div>

<!-- rappi ADEREZOS Tab-->


                  <div class="tab-pane fade in mt-2" id="rappi_aderezo">
                                  <div class="row" style="justify-content: center;">
                                      <?php  $query = "SELECT * FROM product WHERE CATEGORY_ID=42 AND CITY  LIKE '{$_SESSION['CITY']}%' ORDER by PRODUCT_ID ASC";
                                        $result = mysqli_query($db, $query);

                                        if ($result):
                                            if(mysqli_num_rows($result)>0):
                                                while($product = mysqli_fetch_assoc($result)):
                                                //print_r($product);
                                      ?>
                                    <div class="col-sm-auto--menu col-md-auto--menu" >
                                      <form method="post" action="pos.php?action=add&id=<?php echo $product['PRODUCT_ID']; ?>">
                                          <div class="products" style="text-align: center;">
                                                                                 <?php
                                                if(($product['IMAGENES'] == null))
                                                {
                                                 echo ' <img src="img/lr-logo.jpg"  title="'.$product['DESCRIPTION'].'" width="50px" height="50px" />';

                                               }if(($product['IMAGENES'] != null))
                                                {
                                                 echo ' <img src="img/'.$product['IMAGENES'].'"  title="'.$product['DESCRIPTION'].'" width="50px" height="50px" />';
                                               } ?>
                                              <h6 class="text-info"><?php echo $product['NAME']; ?></h6>
                                              <h6>$ <?php echo $product['PRICE']; ?></h6>

                                                   <?php /* Stock  
                                              if(($product['QTY_STOCK'] <= "15")&&($product['QTY_STOCK'] > "0")){
                                                 echo '<h6 class="text-warning stock">'. $product['QTY_STOCK'].'</h6>';
                                               }if($product['QTY_STOCK'] > "15"){
                                                 echo '<h6 class="text-success stock">'. $product['QTY_STOCK'].'</h6>';
                                               } if($product['QTY_STOCK'] <= "0"){
                                                 echo '<h6 class="text-danger stock">'. $product['QTY_STOCK'].'</h6>';
                                               } 
                                                */?>
                                              <input type="number" name="quantity" class="form-control" style="width: 6.5rem;" value="1" />
                                              <input type="hidden" name="description" value="<?php echo $product['DESCRIPTION']; ?>" />

                                               <input type="hidden" name="category_id" value="<?php echo $product['CATEGORY_ID']; ?>" />
                                              <input type="hidden" name="name" value="<?php echo $product['NAME']; ?>" />
                                              <input type="hidden" name="price" value="<?php echo $product['PRICE']; ?>" />
                                              <input type="hidden" name="cant_cajas" value="<?php echo $product['CANT_CAJAS']; ?>" />
                                              <input type="hidden" name="intermediario" value="2" />
                                              <input type="submit" name="addpos" style="margin-top:5px;" class="btn btn-info"
                                                     value="Añadir" />
                                          </div>
                                      </form>
                                  </div>
                                      <?php endwhile;
                                        endif;
                                    endif;   
                                    ?>
                                    </div>
                                </div>



<!-- rappi BEBIDAS Tab-->

                  <div class="tab-pane fade in mt-2" id="rappi_bebidas">
                                  <div class="row" style="justify-content: center;">
                                      <?php  $query = "SELECT * FROM product WHERE CATEGORY_ID=43 AND CITY  LIKE '{$_SESSION['CITY']}%' ORDER by PRODUCT_ID ASC";
                                        $result = mysqli_query($db, $query);

                                        if ($result):
                                            if(mysqli_num_rows($result)>0):
                                                while($product = mysqli_fetch_assoc($result)):
                                                //print_r($product);
                                      ?>
                                    <div class="col-sm-auto--menu col-md-auto--menu" >
                                      <form method="post" action="pos.php?action=add&id=<?php echo $product['PRODUCT_ID']; ?>">
                                          <div class="products" style="text-align: center;">

                                                                        <?php
                                                if(($product['IMAGENES'] == null))
                                                {
                                                 echo ' <img src="img/lr-logo.jpg"  title="'.$product['DESCRIPTION'].'" width="50px" height="50px" />';

                                               }if(($product['IMAGENES'] != null))
                                                {
                                                 echo ' <img src="img/'.$product['IMAGENES'].'"  title="'.$product['DESCRIPTION'].'" width="50px" height="50px" />';
                                               } ?>

                                              <h6 class="text-info"><?php echo $product['NAME']; ?></h6>
                                              <h6>$ <?php echo $product['PRICE']; ?></h6>

                                                   <?php /* Stock  
                                              if(($product['QTY_STOCK'] <= "15")&&($product['QTY_STOCK'] > "0")){
                                                 echo '<h6 class="text-warning stock">'. $product['QTY_STOCK'].'</h6>';
                                               }if($product['QTY_STOCK'] > "15"){
                                                 echo '<h6 class="text-success stock">'. $product['QTY_STOCK'].'</h6>';
                                               } if($product['QTY_STOCK'] <= "0"){
                                                 echo '<h6 class="text-danger stock">'. $product['QTY_STOCK'].'</h6>';
                                               } 
                                                */?>
                                              <input type="number" name="quantity" class="form-control" style="width: 6.5rem;" value="1" />
                                              <input type="hidden" name="description" value="<?php echo $product['DESCRIPTION']; ?>" />

                                               <input type="hidden" name="category_id" value="<?php echo $product['CATEGORY_ID']; ?>" />
                                              <input type="hidden" name="name" value="<?php echo $product['NAME']; ?>" />
                                              <input type="hidden" name="price" value="<?php echo $product['PRICE']; ?>" />
                                              <input type="hidden" name="cant_cajas" value="<?php echo $product['CANT_CAJAS']; ?>" />
                                              <input type="hidden" name="intermediario" value="2" />
                                              <input type="submit" name="addpos" style="margin-top:5px;" class="btn btn-info"
                                                     value="Añadir" />
                                          </div>
                                      </form>
                                  </div>
                                      <?php endwhile;
                                        endif;
                                    endif;   
                                    ?>
                                    </div>
                                </div>



<!-- rappi COMBOS Tab-->

                  <div class="tab-pane fade in mt-2" id="rappi_combos">
                                  <div class="row" style="justify-content: center;">
                                      <?php  $query = "SELECT * FROM product WHERE CATEGORY_ID=44 AND CITY  LIKE '{$_SESSION['CITY']}%' ORDER by PRODUCT_ID ASC";
                                        $result = mysqli_query($db, $query);

                                        if ($result):
                                            if(mysqli_num_rows($result)>0):
                                                while($product = mysqli_fetch_assoc($result)):
                                                //print_r($product);
                                      ?>
                                    <div class="col-sm-auto--menu col-md-auto--menu" >
                                      <form method="post" action="pos.php?action=add&id=<?php echo $product['PRODUCT_ID']; ?>">
                                          <div class="products" style="text-align: center;">
                                                                                 <?php
                                                if(($product['IMAGENES'] == null))
                                                {
                                                 echo ' <img src="img/lr-logo.jpg"  title="'.$product['DESCRIPTION'].'" width="50px" height="50px" />';

                                               }if(($product['IMAGENES'] != null))
                                                {
                                                 echo ' <img src="img/'.$product['IMAGENES'].'"  title="'.$product['DESCRIPTION'].'" width="50px" height="50px" />';
                                               } ?>
                                              <h6 class="text-info"><?php echo $product['NAME']; ?></h6>
                                              <h6>$ <?php echo $product['PRICE']; ?></h6>

                                                   <?php /* Stock  
                                              if(($product['QTY_STOCK'] <= "15")&&($product['QTY_STOCK'] > "0")){
                                                 echo '<h6 class="text-warning stock">'. $product['QTY_STOCK'].'</h6>';
                                               }if($product['QTY_STOCK'] > "15"){
                                                 echo '<h6 class="text-success stock">'. $product['QTY_STOCK'].'</h6>';
                                               } if($product['QTY_STOCK'] <= "0"){
                                                 echo '<h6 class="text-danger stock">'. $product['QTY_STOCK'].'</h6>';
                                               } 
                                                */?>
                                              <input type="number" name="quantity" class="form-control" style="width: 6.5rem;" value="1" />
                                              <input type="hidden" name="description" value="<?php echo $product['DESCRIPTION']; ?>" />

                                               <input type="hidden" name="category_id" value="<?php echo $product['CATEGORY_ID']; ?>" />
                                              <input type="hidden" name="name" value="<?php echo $product['NAME']; ?>" />
                                              <input type="hidden" name="price" value="<?php echo $product['PRICE']; ?>" />
                                               <input type="hidden" name="cant_cajas" value="<?php echo $product['CANT_CAJAS']; ?>" />

                                               <!--<h6>Cajas <?php echo $product['CANT_CAJAS']; ?></h6>-->


                                              <input type="hidden" name="intermediario" value="2" />
                                              <input type="submit" name="addpos" style="margin-top:5px;" class="btn btn-info"
                                                     value="Añadir" />
                                          </div>
                                      </form>
                                  </div>
                                      <?php endwhile;
                                        endif;
                                    endif;   
                                    ?>
                                    </div>
                                </div>


<!-- rappi COMPLEMENTOS Tab-->


                  <div class="tab-pane fade in mt-2" id="rappi_complementos">
                                  <div class="row" style="justify-content: center;">
                                      <?php  $query = "SELECT * FROM product WHERE CATEGORY_ID=45 AND CITY  LIKE '{$_SESSION['CITY']}%' ORDER by PRODUCT_ID ASC";
                                        $result = mysqli_query($db, $query);

                                        if ($result):
                                            if(mysqli_num_rows($result)>0):
                                                while($product = mysqli_fetch_assoc($result)):
                                                //print_r($product);
                                      ?>
                                    <div class="col-sm-auto--menu col-md-auto--menu" >
                                      <form method="post" action="pos.php?action=add&id=<?php echo $product['PRODUCT_ID']; ?>">
                                          <div class="products" style="text-align: center;">
                                                                                 <?php
                                                if(($product['IMAGENES'] == null))
                                                {
                                                 echo ' <img src="img/lr-logo.jpg"  title="'.$product['DESCRIPTION'].'" width="50px" height="50px" />';

                                               }if(($product['IMAGENES'] != null))
                                                {
                                                 echo ' <img src="img/'.$product['IMAGENES'].'"  title="'.$product['DESCRIPTION'].'" width="50px" height="50px" />';
                                               } ?>
                                              <h6 class="text-info"><?php echo $product['NAME']; ?></h6>
                                              <h6>$ <?php echo $product['PRICE']; ?></h6>

                                                   <?php /* Stock  
                                              if(($product['QTY_STOCK'] <= "15")&&($product['QTY_STOCK'] > "0")){
                                                 echo '<h6 class="text-warning stock">'. $product['QTY_STOCK'].'</h6>';
                                               }if($product['QTY_STOCK'] > "15"){
                                                 echo '<h6 class="text-success stock">'. $product['QTY_STOCK'].'</h6>';
                                               } if($product['QTY_STOCK'] <= "0"){
                                                 echo '<h6 class="text-danger stock">'. $product['QTY_STOCK'].'</h6>';
                                               } 
                                                */?>
                                              <input type="number" name="quantity" class="form-control" style="width: 6.5rem;" value="1" />
                                              <input type="hidden" name="description" value="<?php echo $product['DESCRIPTION']; ?>" />

                                               <input type="hidden" name="category_id" value="<?php echo $product['CATEGORY_ID']; ?>" />
                                              <input type="hidden" name="name" value="<?php echo $product['NAME']; ?>" />
                                              <input type="hidden" name="price" value="<?php echo $product['PRICE']; ?>" />
                                              <input type="hidden" name="cant_cajas" value="<?php echo $product['CANT_CAJAS']; ?>" />
                                              <input type="hidden" name="intermediario" value="2" />
                                              <input type="submit" name="addpos" style="margin-top:5px;" class="btn btn-info"
                                                     value="Añadir" />
                                          </div>
                                      </form>
                                  </div>
                                      <?php endwhile;
                                        endif;
                                    endif;   
                                    ?>
                                    </div>
                                </div>
<!-- rappi CORTESIAS Tab-->

                  <div class="tab-pane fade in mt-2" id="rappi_cortesias">
                                  <div class="row" style="justify-content: center;">
                                      <?php  $query = "SELECT * FROM product WHERE CATEGORY_ID=46 AND CITY  LIKE '{$_SESSION['CITY']}%' ORDER by PRODUCT_ID ASC";
                                        $result = mysqli_query($db, $query);

                                        if ($result):
                                            if(mysqli_num_rows($result)>0):
                                                while($product = mysqli_fetch_assoc($result)):
                                                //print_r($product);
                                      ?>
                                    <div class="col-sm-auto--menu col-md-auto--menu" >
                                      <form method="post" action="pos.php?action=add&id=<?php echo $product['PRODUCT_ID']; ?>">
                                          <div class="products" style="text-align: center;">
                                                                                 <?php
                                                if(($product['IMAGENES'] == null))
                                                {
                                                 echo ' <img src="img/lr-logo.jpg"  title="'.$product['DESCRIPTION'].'" width="50px" height="50px" />';

                                               }if(($product['IMAGENES'] != null))
                                                {
                                                 echo ' <img src="img/'.$product['IMAGENES'].'"  title="'.$product['DESCRIPTION'].'" width="50px" height="50px" />';
                                               } ?>
                                              <h6 class="text-info"><?php echo $product['NAME']; ?></h6>
                                              <h6>$ <?php echo $product['PRICE']; ?></h6>

                                                   <?php /* Stock  
                                              if(($product['QTY_STOCK'] <= "15")&&($product['QTY_STOCK'] > "0")){
                                                 echo '<h6 class="text-warning stock">'. $product['QTY_STOCK'].'</h6>';
                                               }if($product['QTY_STOCK'] > "15"){
                                                 echo '<h6 class="text-success stock">'. $product['QTY_STOCK'].'</h6>';
                                               } if($product['QTY_STOCK'] <= "0"){
                                                 echo '<h6 class="text-danger stock">'. $product['QTY_STOCK'].'</h6>';
                                               } 
                                                */?>
                                              <input type="number" name="quantity" class="form-control" style="width: 6.5rem;" value="1" />
                                              <input type="hidden" name="description" value="<?php echo $product['DESCRIPTION']; ?>" />

                                               <input type="hidden" name="category_id" value="<?php echo $product['CATEGORY_ID']; ?>" />
                                              <input type="hidden" name="name" value="<?php echo $product['NAME']; ?>" />
                                              <input type="hidden" name="price" value="<?php echo $product['PRICE']; ?>" />
                                              <input type="hidden" name="cant_cajas" value="<?php echo $product['CANT_CAJAS']; ?>" />
                                              <input type="hidden" name="intermediario" value="2" />
                                              <input type="submit" name="addpos" style="margin-top:5px;" class="btn btn-info"
                                                     value="Añadir" />
                                          </div>
                                      </form>
                                  </div>
                                      <?php endwhile;
                                        endif;
                                    endif;   
                                    ?>
                                    </div>
                                </div>



<!-- rappi OTROS Tab-->

                                 <div class="tab-pane fade in mt-2" id="rappi_otros">
                                  <div class="row" style="justify-content: center;width: 6.5rem;">
                                      <?php  $query = "SELECT * FROM product WHERE CATEGORY_ID=47 AND CITY  LIKE '{$_SESSION['CITY']}%' ORDER by PRODUCT_ID ASC";
                                        $result = mysqli_query($db, $query);

                                        if ($result):
                                            if(mysqli_num_rows($result)>0):
                                                while($product = mysqli_fetch_assoc($result)):
                                                //print_r($product);
                                      ?>
                                    <div class="col-sm-auto--menu col-md-auto--menu"  >
                                      <form method="post" action="pos.php?action=add&id=<?php echo $product['PRODUCT_ID']; ?>">
                                          <div class="products" style="text-align: center;">
                                                                                 <?php
                                                if(($product['IMAGENES'] == null))
                                                {
                                                 echo ' <img src="img/lr-logo.jpg"  title="'.$product['DESCRIPTION'].'" width="50px" height="50px" />';

                                               }if(($product['IMAGENES'] != null))
                                                {
                                                 echo ' <img src="img/'.$product['IMAGENES'].'"  title="'.$product['DESCRIPTION'].'" width="50px" height="50px" />';
                                               } ?>
                                              <h6 class="text-info"><?php echo $product['NAME']; ?></h6>
                                              <h6>$ <?php echo $product['PRICE']; ?></h6>

                                                   <?php /* Stock  
                                              if(($product['QTY_STOCK'] <= "15")&&($product['QTY_STOCK'] > "0")){
                                                 echo '<h6 class="text-warning stock">'. $product['QTY_STOCK'].'</h6>';
                                               }if($product['QTY_STOCK'] > "15"){
                                                 echo '<h6 class="text-success stock">'. $product['QTY_STOCK'].'</h6>';
                                               } if($product['QTY_STOCK'] <= "0"){
                                                 echo '<h6 class="text-danger stock">'. $product['QTY_STOCK'].'</h6>';
                                               } 
                                                */?>
                                              <input type="number" name="quantity" class="form-control" style="width: 6.5rem;" value="1" />
                                              <input type="hidden" name="description" value="<?php echo $product['DESCRIPTION']; ?>" />

                                               <input type="hidden" name="category_id" value="<?php echo $product['CATEGORY_ID']; ?>" />
                                              <input type="hidden" name="name" value="<?php echo $product['NAME']; ?>" />
                                              <input type="hidden" name="price" value="<?php echo $product['PRICE']; ?>" />
                                              <input type="hidden" name="cant_cajas" value="<?php echo $product['CANT_CAJAS']; ?>" />
                                              <input type="hidden" name="intermediario" value="2" />
                                              <input type="submit" name="addpos" style="margin-top:5px;" class="btn btn-info"
                                                     value="Añadir" />
                                          </div>
                                      </form>
                                  </div>
                                      <?php endwhile;
                                        endif;
                                    endif;   
                                    ?>
                                    </div>
                                </div>      
                        <!-- /Espacio rappi  -->
                            </div>
                        </div>
                        <!-- /.panel-body -->
                      </div>
                    </div>
                  </div>



         