<?php
  require_once('session.php');
  confirm_logged_in();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <style type="text/css">
#overlay {
  position: fixed;
  display: none;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: rgba(0,0,0,0.5);
  z-index: 2;
  cursor: pointer;
}
#text{
  position: absolute;
  top: 50%;
  left: 50%;
  font-size: 50px;
  color: white;
  transform: translate(-50%,-50%);
  -ms-transform: translate(-50%,-50%);
}

</style>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Sistema de ventas e inventario</title>
  <!--<link rel="icon" href="https://www.freeiconspng.com/uploads/sales-icon-7.png">-->

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/style.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

  <link rel="stylesheet" href="cart.css" />
</head>

<body id="page-top">

  <div class="show-grid">
    <div class="card  mb-2">
      <div class="card-header shadow " style="margin-top: -1rem;">
        <div class="row bg-gradient-primary--top" style="justify-content: center; ">


                <div class="col-12 bg-gradient-primary--top" style="text-align: center;"> 

                    <span class="  bg-gradient-primary--top  " style="text-align: center;"    >

                      <a class="sidebar-brand d-flex align-items-center justify-content-center"  style="text-decoration: none; font-size: 18px; font-weight: bold;" href="index.php">
                        <img class="m-4" src="../img/logo-lrp.png"style="width: 120px;">
                      </a>
                    </span> 
                </div>

                  <?php 										$arrayNoVentas = array('Adelitas','La Loma','Hombres Ilustres');
                  #echo $_SESSION['CITY'].'<br />';
                  # echo $_SESSION['TYPE'].'<br />';
                    # Solo Adelitas
                    if(!in_array($_SESSION['CITY'], $arrayNoVentas)){
                        # echo 'Diferente<br />';
                        # User no puede ver
                        #if($_SESSION['TYPE'] != 'User'){
                  ?>
                    <span class="m-2  ">
                      <a class="nav-link" href="corte_caja.php" role="button">
                        <button class="btn btn-warning ">Corte</button>
                      </a>
                    </span>
                
                    <span class="m-2 ">
                      <a class="nav-link" href="ventasdias.php" role="button">
                        <button class="btn btn-warning ">Ventas del Día</button>
                      </a>
                    </span> 

                    <span class="m-2">
                      <a class="nav-link" href="pedidos.php" role="button">
                        <button class="btn btn-warning ">Ventas Anteriores</button>
                      </a>
                    </span>

                    <span class="m-2">
                      <a class="nav-link" href="cortes.php" role="button">
                        <button class="btn btn-warning ">Movimientos de Caja</button>
                      </a>
                    </span>
                    <?php
                        }
                      #}
                    ?>
                    <span class="m-2">
                      <a class="nav-link" href="cupones.php" role="button">
                        <button class="btn btn-secondary">Cupones</button>
                      </a>
                    </span>

                    <span class="m-2">
                      <a class="nav-link" href="pos.php" role="button">
                        <button class="btn btn-secondary ">Caja</button>
                      </a>
                    </span>

                    <span class="m-2">
                      <div class="nav-item dropdown ">
                      <a class="nav-link"  style="display: flex;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <h6 class="btn btn-danger " style="align-items: center;margin-top: auto;"><?php echo  $_SESSION['FIRST_NAME']. ' '.$_SESSION['LAST_NAME'] ;?></h6>&nbsp;
                      </a>
                      
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#settingsModal" data-href="settings.php?action=edit & id='<?php echo $a; ?>'">
                          <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                          Opciones
                        </a>
                        
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                          <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                          Logout
                        </a>
                      </div>
                      </div>
                    </span>
        </div>
      </div>
    </div>
  </div>



          
 

     
        

     
<?php /*

        <!-- Topbar -->
        <span class="bg-gradient-primary--top  navbar navbar-expand-lg navbar-light bg-light" style="text-align: center;"    >

              <a class="sidebar-brand d-flex align-items-center justify-content-center"  style="text-decoration: none; font-size: 18px; font-weight: bold;" href="index.php">
                  <img class="m-4" src="../img/logo-lrp.png"style="width: 120px;">
              </a>
              
  <div class="ml-auto">


            <ul class="navbar-nav ml-sm-0">
              <li class="nav-item dropdown no-arrow">
                <a class="nav-link" href="corte_caja.php" role="button">
                  <button class="btn btn-warning ">Corte</button>
                </a>
              </li>
            

           
              <li class="nav-item dropdown no-arrow">
                <a class="nav-link" href="ventasdias.php" role="button">
                  <button class="btn btn-warning ">Ventas del Día</button>
                </a>
              </li>
         

           
              <li class="nav-item dropdown no-arrow">
                <a class="nav-link" href="pedidos.php" role="button">
                  <button class="btn btn-warning ">Ventas Anteriores</button>
                </a>
              </li>
            

            
              <li class="nav-item dropdown no-arrow">
                <a class="nav-link" href="cortes.php" role="button">
                  <button class="btn btn-warning ">Movimientos de Caja</button>
                </a>
              </li>
          

              <li class="nav-item dropdown no-arrow">
                <a class="nav-link" href="cupones.php" role="button">
                  <button class="btn btn-secondary  ">Cupones</button>
                </a>
              </li>
            

              <li class="nav-item dropdown no-arrow">
                <a class="nav-link" href="pos.php" role="button">
                  <button class="btn btn-secondary ">Caja</button>
                </a>
              </li>
            

        
      
              <!-- Nav Item - User Information -->
              <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <h6><?php echo  $_SESSION['FIRST_NAME']. ' '.$_SESSION['LAST_NAME'] ;?></h6>&nbsp;
                 

                </a>

                <?php 

                  $query = 'SELECT ID, FIRST_NAME,LAST_NAME,USERNAME,PASSWORD, t.TYPE
                            FROM users u
                            JOIN employee e ON e.EMPLOYEE_ID=u.EMPLOYEE_ID
                            JOIN type t ON t.TYPE_ID=u.TYPE_ID';
                  $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
                  while ($row = mysqli_fetch_assoc($result)) {
                            $a = $_SESSION['MEMBER_ID'];
                            $bbb = $_SESSION['TYPE'];
                  }
                            
              ?>

                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                  
                  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#settingsModal" data-href="settings.php?action=edit & id='<?php echo $a; ?>'">
                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                    Opciones
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                  </a>
                </div>
              </li>

            </ul>
            </div>



        
      </span>
      
        <!-- End of Topbar -->
        */?>

 <!-- Page Wrapper -->
 <div id="wrapper" style="display: contents;">

<!-- Content Wrapper -->
<div id="content-wrapper" class=" flex-column">

  <!-- Main Content -->
  <div id="content">



          
        <!-- Begin Page Content -->
        <div class="container-fluid">
      </div>
        