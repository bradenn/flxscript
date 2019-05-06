<?php
include "database.php";
$logged = logstatus();
$pro = "";

if(isset($_COOKIE["user"])){
if(querys("SELECT account FROM users WHERE id=".$userid, "account") == 0){
    $pro = '<span class="text-info">BASIC</span>';
}
if(querys("SELECT account FROM users WHERE id=".$userid, "account") == 1){
    $pro = '<span class="text-info">STUDENT</span>';
}
if(querys("SELECT account FROM users WHERE id=".$userid, "account") == 2){
    $pro = '<span class="text-info">PRO</span>';
}
if(querys("SELECT account FROM users WHERE id=".$userid, "account") == 3){
    $pro = '<span class="text-info">TEACHER</span>';
}
    $tc = "";

    if(querys("SELECT account FROM users WHERE id=".$userid, "account") == 3){ $tc = ' <li class="nav-item">
        <a class="nav-link" href="classes.php">Class</a>
      </li>'; }

}
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <meta name="description" content="">
    <meta name="author" content="">
 <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <title>FlixScript</title>

    <!-- Bootstrap core CSS -->
  <link href="https://bootswatch.com/4/cosmo/bootstrap.css" rel="stylesheet">
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <!-- Custom styles for this template -->
    <style>
        body {
        background-color: #dddddd;
          background-color: rgb(34, 37, 43);
      }
      @media (min-width: 992px) {
        body {
          padding-top: 56px;
        }
      }
      .navbar{
        box-shadow: 0 0 4px 0 rgba(0,0,0,0.3);
      }
      .list-group-item{
        color: rgb(215, 218, 223) !important;
      background-color: rgb(41, 44, 52) !important;
      }
      .modal-content{
        color: rgb(215, 218, 223) !important;
      background-color: rgb(41, 44, 52) !important;

      }
      .modal-header{
        border-color:rgba(41, 44, 52, 0.3) !important;
      }
      .modal-footer{
        border-color:rgba(41, 44, 52, 0.3) !important;
      }
      .close{
      color:rgb(215, 218, 223) !important;
      }
      .btn-info{
        background-color:rgb(96, 139, 235) !important;
        border-color:rgba(96, 139, 235, 0.3) !important;
      }
      .text-info{
        color:rgb(96, 139, 235) !important;
      }
      .bg-primary{
        color: rgb(215, 218, 223) !important;
      background-color: rgb(41, 44, 52) !important;
      }
      .bg-dark{
        color: rgb(215, 218, 223) !important;
        background-color: rgb(41, 44, 52) !important;
      }
      .jumbotron{
          color: rgb(215, 218, 223) !important;
        background-color: rgb(41, 44, 52) !important;
      }


    </style>
<link rel="shortcut icon" href="favicon.ico">
  </head>

  <body>

    <!-- Navigation -->
 <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
     <div class="container">
  <a class="navbar-brand" href="index.php">FlixScript<?php echo '&nbsp'.$pro; ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
       <?php

      if($logged){
          echo '
    <ul class="navbar-nav mr-auto">

      <li class="nav-item active">
        <a class="nav-link" href="index.php">Projects</a>
      </li>'.$tc.'

    </ul>
      <ul class="navbar-nav pull-right">
           <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="$" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          '.querys("SELECT username FROM users WHERE id=".$userid, "username").'
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="logout.php">Logout</a>

        </div>
      </li>
    </ul>';
      }else{
          echo '<ul class="navbar-nav mr-auto">
     <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>


    </ul>
      <ul class="navbar-nav pull-right">
          <li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="signup.php">Sign Up</a>
      </li>
    </ul>';
      }

      ?>

  </div>
         </div>
</nav>
      <br>
