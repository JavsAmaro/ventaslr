
<style>
  .texto--color{
    color: #fff!important;
    background-color: #e9aa0b!important;
  }



</style>
    <!-- Content Wrapper -->
    <div id="content-wrapper" class=" flex-column d-flex">

      <!-- Main Content -->
      <div id="content">
        

        <!-- Topbar  style="font-size:small;"-->

      <nav class="bg-gradient-primary--top  navbar navbar-expand-lg navbar-light bg-light" style="background-color:#500D76!important"   >
        
       
       
        <button  style="background-color: burlywood;" class="navbar-toggler texto--color" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon " style="color: #fff;"></span>&nbsp;  Sucursal <?php echo  $_SESSION['CITY'];?>
        </button> <!-- Expansivo -->
        

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          
          <ul class="navbar-nav mr-auto" >
            <li class="nav-item">
              <a class="nav-link--topbar"  href="corte_caja.php"><button class="btn--topbar btn-warning " style="font-size: 1rem;">Corte</button></a>
            </li>
         
            <li class="nav-item">
              <a class="nav-link--topbar " href="ventasdias.php"><button class="btn--topbar btn-warning " style="font-size: 1rem;">Ventas del Día</button></a>
            </li>
            
           
            <li class="nav-item">
              <a class="nav-link--topbar " href="pedidos.php"><button class="btn--topbar btn-warning " style="font-size: 1rem;">Ventas Anteriores</button></a>
            </li>

            
            <li class="nav-item">
            <a class="nav-link--topbar" href="cortes.php"><button class="btn--topbar btn-warning " style="font-size: 1rem;">Movimientos de Caja</button></a>
            </li>
            <li class="nav-item">
              <a class="nav-link--topbar " href="cupones.php"><button class="btn--topbar btn-secondary " style="font-size: 1rem;">Cupones</button></a>
            </li>
            <li class="nav-item">
              <a class="nav-link--topbar " href="pos.php" ><button class="btn--topbar btn-secondary  " style="font-size: 1rem;">Caja</button></a>
            </li>
            <li>

            </li>

            
          </ul>


        
          
          <!-- <form  class=" my-2 my-lg-0"> CHECAR --> 

          <div class="nav-item dropdown ">

          
              <a class="nav-link"  style="display: flex;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <h6 class="btn btn-danger " style="align-items: center;"><?php echo  $_SESSION['FIRST_NAME']. ' '.$_SESSION['LAST_NAME'] ;?></h6>&nbsp;
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
        </div>
      </nav>



          
        <!-- Begin Page Content -->
        <div class="container-fluid--index" style="font-size:small;">