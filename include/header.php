<?php
// session_start();
include "connection.php";

// if (empty($_SESSION["u_id"])) 
// {
//   //  header("Location: index.php");
// }
  // else
// {

// //           $u_id = $_SESSION["u_id"];
// //           $u_name =  $_SESSION["u_name"];
// //           $u_email =  $_SESSION["u_email"];
// //           $u_address =  $_SESSION["u_address"];
// //           $u_contact =  $_SESSION["u_contact"];
// //           $u_image =  $_SESSION["u_image"];
// //           $isadmin =  $_SESSION["isadmin"];
// //            $isadmin =  $_SESSION["isadmin"];

if(empty( $_COOKIE["idRegister"] )){
  header("Location: index.php");
}
else{
  $id=$_COOKIE["idRegister"];

  // $id=1;
  // include 'admin/partial/db_connect.php';
  $sql = "Select * from user where idRegister='$id'";
  $result = mysqli_query($conn,$sql);
  $num = mysqli_num_rows($result);
   
  if($num==1){
    $row=mysqli_fetch_assoc($result);  
// ?> 

<!DOCTYPE html>
<html>
<head>
<style>
  .a{
   
    margin-left: 20px;
    float:right;
    
  }
  
</style>
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="home.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Seller</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Seller</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- <img src="dist/img" class="user-image" alt="User Image"> -->
              <span class="hidden-xs"><?php echo "Welcome " .  $row['name'] . "..!!"; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <!-- <li class="user-header"> -->
                <!-- <img src="dist/img/<?php #echo $u_image; ?>" class="img-circle" alt="User Image"> -->

                <!-- <p>
                  <?php# echo $u_name; ?>
                  <small>Member since Nov. 2012</small>
                </p> -->
              <!-- </li> -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="a">
                  <a href="profile.php" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="a">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- <?php }} ?> -->