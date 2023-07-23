<?php
  require('session.php');
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

  <title>Sistema de Ventas e Inventario</title>
  <!--<link rel="icon" href="https://www.freeiconspng.com/uploads/sales-icon-7.png">-->

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body id="page-top">
          
  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar_encargado">

      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon">
          <img src="../img/logo-lrp.png"style="width: 120px;">
        </div>
      </a>

      <hr class="sidebar-divider my-0">

      <li class="nav-item">
        <a class="nav-link" href="index.php" style="display: -webkit-inline-box;">
          <i class="fas fa-fw fa-home"></i>
          <h4>Admin sucursal</h4></a>
      </li>
      <hr class="sidebar-divider">

      <div class="sidebar-heading">
        Tablas
      </div>
      <li class="nav-item">
        <a class="nav-link" href="customer-encargado.php" style="display: -webkit-inline-box;">
          <i class="fas fa-fw fa-user"></i>
          <h4>Clientes</h4></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="employee-encargado.php" style="display: -webkit-inline-box;">
          <i class="fas fa-fw fa-user"></i>
          <h4>Empleados</h4></a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="product-encargado.php" style="display: -webkit-inline-box;">
          <i class="fas fa-fw fa-table"></i>
          <h4>Menú</h4></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="transaction-encargado.php" style="display: -webkit-inline-box;">
        <i class="fas fa-chart-line"></i>
        <h4>Ventas</h4></a>
      </li>

        <li class="nav-item">
        <a class="nav-link" href="inventario-encargado.php" style="display: -webkit-inline-box;">
        <i class="fas fa-clipboard-list"></i>
        <h4> Inventario</h4></a>
      </li>


      
      <li class="nav-item">
        <a class="nav-link" href="user-encargado.php" style="display: -webkit-inline-box;">
          <i class="fas fa-fw fa-users"></i>
          <h4>Cuentas</h4></a>
      </li>

            <li class="nav-item">
        <a class="nav-link" href="blog.php" style="display: -webkit-inline-box;">
          <i class="fas fa-fw fa-blog"></i></i>
          <h4>Blog</h4></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="novedades.php" style="display: -webkit-inline-box;">
          <i class="fas fa-star"></i>
          <h4>Novedades</h4></a>
      </li>

      <hr class="sidebar-divider d-none d-md-block">

      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->
    <?php include_once 'topbar.php'; ?>
