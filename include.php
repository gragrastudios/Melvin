<?php
  include ('functionsapi.php');
   $conn = mysqli_connect('mysql.ct8.pl','m30328_crimson4','Crimson4thegoat','m30328_melvin');
  
   $iphash = md5($_SERVER["REMOTE_ADDR"]);
  
   $_GLOBALQ = mysqli_query($conn, "SELECT * FROM global WHERE id='1'") or die(mysqli_error($conn));
   $_GLOBAL = mysqli_fetch_assoc($_GLOBALQ);
   
   if(!isset($_SESSION['user_name'])){
   echo "";
   }else {
   session_start();
   $_USERID = $_SESSION["id"];
   $_USERQ = mysqli_query($conn, "SELECT * FROM user_form WHERE id='$_USERID'") or die(mysqli_error($conn));
   $_USER = mysqli_fetch_assoc($_USERQ);
   $iphashq = mysqli_query($conn, "UPDATE `user_form` SET `ip` = '".$iphash."' WHERE `user_form`.`id` = '".$_SESSION['id']."';");
   };
  
  if($_GLOBAL['maintenanceEnabled'] == 'yes') {header('location: /work.aspx');};
  if($_GLOBAL['shutdownEnabled'] == 'yes') {header('location: /temp.aspx');};  
  
  
  $navbar = '<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Melvin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <nav style="background-color: #d60103;" class="navbar navbar-expand-lg navbar-dark">
      <div class="container">
        <a class="navbar-brand" href="/"><img src="/melvin.png" width="50" height="50"> Melvin</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#about">About Us</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Links
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="/support.aspx">Support</a></li>
                <li><a class="dropdown-item" href="/forum.aspx">Forum</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="/tos.aspx">Terms Of Service</a></li>
              </ul>
            </li>
          </ul>
          <a href="/login.aspx" class="btn btn-primary">Login</a>
          &ensp;
          <a href="/register.aspx" class="btn btn-success">Register</a>
        </div>
      </div>
    </nav>';
  
  $loggedinnavbar = '<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Melvin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <nav style="background-color: #d60103;" class="navbar navbar-expand-lg navbar-dark">
      <div class="container">
        <a class="navbar-brand" href="/default.aspx"><img src="/melvin.png" width="50" height="50"> Melvin</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/default.aspx">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/presentations.aspx">Presentations</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Links
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="/templates.aspx">Templates</a></li>
                <li><a class="dropdown-item" href="/help.aspx">Help</a></li>
                <li><a class="dropdown-item" href="/forum.aspx">Forum</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="/tos.aspx">Terms Of Service</a></li>
              </ul>
            </li>
          </ul>
          <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search" method="get">
          <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
        </form>

        <div class="dropdown text-end">
          <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="/pfp.jpg" alt="mdo" width="32" height="32" class="rounded-circle">
          </a>
          <ul class="dropdown-menu text-small">
            <li><a class="dropdown-item" href="/createpresentation.aspx">New presentation...</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="/logout.php">Sign out</a></li>
          </ul>
        </div>
        </div>
      </div>
    </nav>';
  
  $footer = '      <hr>
      <img src="/text.jpg" width="150">
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="main.js"></script>
  </body>
</html>';
  
   
  
?>
<?php //if($isloggedin == 'yes') { ?>
<?php //} ?>