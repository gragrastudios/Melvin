<?php include('include.php'); 
  
    session_start();
  echo $loggedinnavbar;
  if(!isset($_SESSION['admin_name'])){
   header('location:logout.aspx');
}
  
  $_USERID = $_SESSION["id"];
  $_USERQ = mysqli_query($conn, "SELECT * FROM user_form WHERE id='$_USERID'") or die(mysqli_error($conn));
  $_USER = mysqli_fetch_assoc($_USERQ);
  $iphash = md5($_SERVER["REMOTE_ADDR"]);
  $iphashq = mysqli_query($conn, "UPDATE `user_form` SET `ip` = '".$iphash."' WHERE `user_form`.`id` = '".$_USER['id']."';");
 
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
<?php if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $maintenance = htmlspecialchars($_POST['maintenance']);
    $maintenance = str_replace("'","\'",$maintenance);
    $enabled3 = htmlspecialchars($_POST['enabled3']);
    $banq = mysqli_query($conn, "UPDATE `global` SET `maintenanceEnabled` = '".$enabled3."', `maintenance` = '".$maintenance."' WHERE `global`.`id` = '1'; ") or die(mysqli_error($conn));
} ?>
<center>
    <a href="adminhome.aspx"><h1 style="color: black;">< Back</h1></a>
    <form method="POST" action="">
    <h1>Maintenance Mode</h1>
    <input id="enabled3" type="radio" name="enabled3"<?php if($_GLOBAL['maintenanceEnabled'] == 'yes') {echo ' checked="checked"';} ?> value="yes" tabindex="6"><label>Enable</label><br>
    <input id="enabled3" type="radio" name="enabled3"<?php if($_GLOBAL['maintenanceEnabled'] == 'no') {echo ' checked="checked"';} ?> value="no" tabindex="6"><label>Disable</label><br>
    <input type="submit" value="Execute" tabindex="4" class="Button" name="submit">
    </form>
</center>
<?php echo $footer; ?>