<?php
require_once '../controller/typeC.php';
$typeC = new typeC();
$type = $typeC->affichertype();
if (isset($_POST['Id'])&& isset($_POST['search'])){
    $list = $typeC->affichertype($_POST['Idt']);
}
?>
<!DOCTYPE HTML>
<!--
    Spectral by HTML5 UP
    html5up.net | @ajlkn
    Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<?php
    include_once '../model/abonnement.php';
    include_once '../controller/abonnementC.php';

    $error = "";
    $success = 0;
   
    // create user
    $abonnement = null;

   
    // create an instance of the controller  $rendez_vousC = new Rendez_vousC();
    $abonnementC = new abonnementC() ;
    if ( isset($_POST["Id"]) && isset($_POST["DateDebut"]) &&   isset($_POST["DateFin"]))
    
    {
        if ( !empty($_POST["Id"]) && !empty($_POST["DateDebut"])   && !empty($_POST["DateFin"]))
         {
            $abonnement = new abonnement(
             
                $_POST['Id'],
                $_POST['DateDebut'],
                $_POST['DateFin']
               
               

            );
            $abonnementC->ajouterabonnement($abonnement); 
            $success = 1;
        } else {
            $error = "Missing information";
        }
    }
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Liste des voyages</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div