<?php include 'include.php';
  
  session_start();
  $_USERID = $_SESSION["id"];
  $_USERQ = mysqli_query($conn, "SELECT * FROM user_form WHERE id='$_USERID'") or die(mysqli_error($conn));
  $_USER = mysqli_fetch_assoc($_USERQ);
  $iphash = md5($_SERVER["REMOTE_ADDR"]);
  $iphashq = mysqli_query($conn, "UPDATE `user_form` SET `ip` = '".$iphash."' WHERE `user_form`.`id` = '".$_USER['id']."';");
  
  if(!isset($_SESSION['user_name'])){
   header('location:login.aspx');
}
      if($_USER['bantype'] == 'Reminder'){
   header('location:banned.aspx');
  }
  
        if($_USER['bantype'] == 'Warning'){
   header('location:banned.aspx');
  }
        if($_USER['bantype'] == 'Ban'){
   header('location:banned.aspx');
  }  
        if($_USER['bantype'] == '1daysban'){
   header('location:banned.aspx');
  }
        if($_USER['bantype'] == '3daysban'){
   header('location:banned.aspx');
  }
        if($_USER['bantype'] == '7daysban'){
   header('location:banned.aspx');
  }
  
  ?>
<?php   include 'loggedinnavbar.php'; ?>
<div class="container my-5">
  <center>
  <h1>Hello, <?php echo $_SESSION['user_name']; ?>.</h1>
  <h3>What would you like to do?</h3><br>
  <a class="btn btn-primary d-inline-flex align-items-center" href="/presentations.aspx">Create A Presentation</a><br><br>
  <a class="btn btn-success d-inline-flex align-items-center" href="/uploadatemplate.aspx">Upload A Template</a><br><br>
  <a class="btn btn-warning d-inline-flex align-items-center" href="/templates.aspx">Download A Template</a><br><br>
  </center>
<?php echo $footer; ?>