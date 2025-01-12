<?php

  include 'include.php';
  
  session_start();
    if(!isset(htmlspecialchars($_SESSION['admin_name']))){
   header('location:login.aspx');
}
  
  $querytype = (int)htmlspecialchars($_GET["id"]);
  
  $sql = "DELETE FROM `games` WHERE `games`.`id` = '".$querytype."'";
  $query = mysqli_query($conn, $sql);
  
  header("Location: /allslides.aspx");
  
?>