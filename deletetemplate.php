<?php

  include 'include.php';
  
  session_start();
    if(!isset($_SESSION['admin_name'])){
   header('location:login.aspx');
}
  
  $querytype = (int)htmlspecialchars($_GET["id"]);
  
  $sql = "DELETE FROM `templates` WHERE `templates`.`id` = '".$querytype."'";
  $query = mysqli_query($conn, $sql);
  
  header("Location: /templates.aspx");
  
?>