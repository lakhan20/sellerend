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
  </h1>
    </section>

  <?php  include "productView.php";?>

  <?php
  include "include/footer.php" ;
  ?>