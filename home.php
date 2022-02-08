<?php

// echo $_COOKIE["idRegister"];
include "include/header.php";
include "include/sidebar.php";
include "include/connection.php";
//
?> 




<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
  <?php  include "productView.php";?>

  <?php
  // include "include/footer.php"
  ?>
  <?php
  include "include/footer.php" ;
  ?>