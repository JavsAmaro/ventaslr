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


          
  <!-- Page Wrapper -->
  <div id="wrapper" style="display: contents;">

    <!-- Content Wrapper -->
    <div id="content-wrapper" class=" flex-column">

      <!-- Main Content -->
      <div id="content">

     
        

     


        <!-- Topbar -->
        <span>
        <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color:#500D76!important;display: flex;flex-direction: inherit; align-items:end "  >

<div class="sidebar-brand-icon" style="flex-direction: column;">
      
      <a class="sidebar-brand d-flex align-items-center justify-content-center"  style="text-decoration: none; font-size: 18px; font-weight: bold;" href="index.php">
          <img class="m-4" src="../img/logo-lrp.png"style="width: 120px;">
      </a>
    </div>
    <ul></ul>
    

  
 
 
  <button  style="background-color: burlywood;" class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon " style="color: #fff;"></span>&nbsp;  Sucursal <?php echo  $_SESSION['CITY'];?>
  </button> <!-- Expansivo -->
  

  <div class="collapse navbar-collapse" id="navbarSupportedContent" style="align-items: center">
    
    <ul class="navbar-nav mr-auto"  >
      <li class="nav-item" style="text-align: right;">
        <a class="nav-link"  href="corte_caja.php"><button class="btn btn-warning " style="font-size: larger;">Corte</button></a>
      </li>
    </ul>
    <ul class="navbar-nav mr-auto" >
      <li class="nav-item">
        <a class="nav-link " href="ventasdias.php"><button class="btn btn-warning " style="font-size: larger;">Ventas del Día</button></a>
      </li>
    </ul>
    <ul class="navbar-nav mr-auto" >
      <li class="nav-item">
        <a class="nav-link " href="pedidos.php"><button class="btn btn-warning " style="font-size: larger;">Ventas Anteriores</button></a>
      </li>
    </ul>
    <ul class="navbar-nav mr-auto" >
      <li class="nav-item">
      <a class="nav-link" href="cortes.php"><button class="btn btn-warning " style="font-size: larger;">Movimientos de Caja</button></a>
      </li>
    </ul>
    <ul class="navbar-nav mr-auto" >
      <li class="nav-item">
        <a class="nav-link " href="cupones.php"><button class="btn btn-secondary " style="font-size: larger;">Cupones</button></a>
      </li>
    </ul>
    <ul class="navbar-nav mr-auto" >
      <li class="nav-item">
        <a class="nav-link " href="pos.php" ><button class="btn btn-secondary  " style="font-size: larger;">Caja</button></a>
      </li>
    </ul>
    <ul class="navbar-nav mr-auto" >
      <div class="nav-item dropdown" >

    
<a class="nav-link btn btn-danger"  style="text-align: center;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<h6 style="text-align: center; color:#fff">&nbsp;<?php echo  $_SESSION['FIRST_NAME']. ' '.$_SESSION['LAST_NAME'] ;?></h6>
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

      </li>
    </ul>
   
   

    


      

      
 


  
    
    <!-- <form  class=" my-2 my-lg-0"> CHECAR --> 

 
  </div>
</nav>



      </span>
      
        <!-- End of Topbar -->




          
        <!-- Begin Page Content -->
        <div class="container-fluid">
      </div>
        