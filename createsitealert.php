<?php include('include.php');
    session_start();
    if(!isset($_SESSION['admin_name'])){
   header('location:login.aspx');
}
   include 'loggedinnavbar.php';
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
<center>
    <a href="adminhome.aspx"><h1 style="color: black;">< Back</h1></a>
    <form method="POST" action="sitealert1.php">
    <h1>Site Alert 1</h1>
    <input name="sitealert1" type="text" tabindex="1" class="Text" placeholder="Text" value="<?php echo $_GLOBAL['SiteAlert1']; ?>"><br>
    <input name="sitealert1color" type="text" tabindex="1" class="Text" placeholder="Color HEX or NAME" value=""><br>
    <input id="enabled1" type="radio" name="enabled1"<?php if($_GLOBAL['ShowingSiteAlert1'] == 'yes') {echo ' checked="checked"';} ?> value="yes" tabindex="6"><label>Enable</label><br>
    <input id="enabled1" type="radio" name="enabled1"<?php if($_GLOBAL['ShowingSiteAlert1'] == 'no') {echo ' checked="checked"';} ?> value="no" tabindex="6"><label>Disable</label><br>
    <input type="submit" value="Execute" tabindex="4" class="Button" name="submit">
    </form>
    <form method="POST" action="sitealert2.php">
    <h1>Site Alert 2</h1>
    <input name="sitealert2" type="text" tabindex="1" class="Text" placeholder="Text" value="<?php echo $_GLOBAL['SiteAlert2']; ?>"><br>
    <input name="sitealert2color" type="text" tabindex="1" class="Text" placeholder="Color HEX or NAME" value=""><br>
    <input id="enabled2" type="radio" name="enabled2"<?php if($_GLOBAL['ShowingSiteAlert2'] == 'yes') {echo ' checked="checked"';} ?> value="yes" tabindex="6"><label>Enable</label><br>
    <input id="enabled2" type="radio" name="enabled2"<?php if($_GLOBAL['ShowingSiteAlert2'] == 'no') {echo ' checked="checked"';} ?> value="no" tabindex="6"><label>Disable</label><br>
    <input type="submit" value="Execute" tabindex="4" class="Button" name="submit">
    </form>
    <form method="POST" action="sitealert3.php">
    <h1>Site Alert 3</h1>
    <input name="sitealert3" type="text" tabindex="1" class="Text" placeholder="Text" value="<?php echo $_GLOBAL['SiteAlert3']; ?>"><br>
    <input name="sitealert3color" type="text" tabindex="1" class="Text" placeholder="Color HEX or NAME" value=""><br>
    <input id="enabled3" type="radio" name="enabled3"<?php if($_GLOBAL['ShowingSiteAlert3'] == 'yes') {echo ' checked="checked"';} ?> value="yes" tabindex="6"><label>Enable</label><br>
    <input id="enabled3" type="radio" name="enabled3"<?php if($_GLOBAL['ShowingSiteAlert3'] == 'no') {echo ' checked="checked"';} ?> value="no" tabindex="6"><label>Disable</label><br>
    <input type="submit" value="Execute" tabindex="4" class="Button" name="submit">
    </form>
    <form method="POST" action="sitealert4.php">
    <h1>Site Alert 4</h1>
    <input name="sitealert4" type="text" tabindex="1" class="Text" placeholder="Text" value="<?php echo $_GLOBAL['SiteAlert4']; ?>"><br>
    <input name="sitealert4color" type="text" tabindex="1" class="Text" placeholder="Color HEX or NAME" value=""><br>
    <input id="enabled4" type="radio" name="enabled4"<?php if($_GLOBAL['ShowingSiteAlert4'] == 'yes') {echo ' checked="checked"';} ?> value="yes" tabindex="6"><label>Enable</label><br>
    <input id="enabled4" type="radio" name="enabled4"<?php if($_GLOBAL['ShowingSiteAlert4'] == 'no') {echo ' checked="checked"';} ?> value="no" tabindex="6"><label>Disable</label><br>
    <input type="submit" value="Execute" tabindex="4" class="Button" name="submit">
    </form>
    <form method="POST" action="sitealert5.php">
    <h1>Site Alert 5</h1>
    <input name="sitealert5" type="text" tabindex="1" class="Text" placeholder="Text" value="<?php echo $_GLOBAL['SiteAlert5']; ?>"><br>
    <input name="sitealert5color" type="text" tabindex="1" class="Text" placeholder="Color HEX or NAME" value=""><br>
    <input id="enabled4" type="radio" name="enabled5"<?php if($_GLOBAL['ShowingSiteAlert5'] == 'yes') {echo ' checked="checked"';} ?> value="yes" tabindex="6"><label>Enable</label><br>
    <input id="enabled4" type="radio" name="enabled5"<?php if($_GLOBAL['ShowingSiteAlert5'] == 'no') {echo ' checked="checked"';} ?> value="no" tabindex="6"><label>Disable</label><br>
    <input type="submit" value="Execute" tabindex="4" class="Button" name="submit">
    </form>
</center>
<?php echo $footer; ?>