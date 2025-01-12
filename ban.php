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
<?php if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usertoban = htmlspecialchars($_POST['usertoban']);
    $usertoban = str_replace("'","\'",$usertoban);
    $banreason = htmlspecialchars($_POST['banreason']);
    $banreason = str_replace("'","\'",$banreason);
    $reason = htmlspecialchars($_POST['reason']);
    $reason = str_replace("'","\'",$reason);
    $off = htmlspecialchars($_POST['off']);
    $off = str_replace("'","\'",$off);
    $unbantime = time();
    $oneday = 86400;
    $threeday = 259200;
    $sevenday = 604800;
    $date=date("Y-m-d H-m-s");
    if($_POST['bantype'] == 'reminder') {$bantype = 'Reminder'; $unbantime = time();} elseif($_POST['bantype'] == 'warning') {$bantype = 'Warning'; $unbantime = time();} elseif($_POST['bantype'] == '1days') {$bantype = '1daysban'; $unbantime = time(); $unbantime = time() + ($oneday);} elseif($_POST['bantype'] == '3days') {$bantype = '3daysban'; $unbantime = time(); $unbantime = time() + ($threeday);} elseif($_POST['bantype'] == '7days') {$bantype = '7daysban'; $unbantime = time(); $unbantime = time() + ($sevenday);} elseif($_POST['bantype'] == 'delete') {$bantype = 'Ban'; $unbantime = time() + (9999999999999999999999999999999999999999999);} else {$bantype = 'None';}
    $banq = mysqli_query($conn, "UPDATE `user_form` SET `bandate` = '".$date."', `bantype` = '".$bantype."', `unbantime` = '".$unbantime."', `reason` = '".$reason."', `off` = '".$off."', `banreason` = '".$banreason."' WHERE `user_form`.`name` = '".$usertoban."'; ") or die(mysqli_error($conn));
} ?>
<center>
    <br>
    <a href="/adminhome.aspx"><h3 style="color: black;">< Back</h3></a>
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
    <input name="usertoban" type="text" tabindex="1" class="Text" placeholder="User to ban"><br>
    <input id="bantype" type="radio" name="bantype" value="unban" checked="checked" tabindex="6"><label>Unban</label><br>
    <input id="bantype" type="radio" name="bantype" value="reminder" tabindex="6"><label>Reminder</label><br>
    <input id="bantype" type="radio" name="bantype" value="warning" tabindex="6"><label>Warning</label><br>
    <input id="bantype" type="radio" name="bantype" value="1days" tabindex="6"><label>1 day ban</label><br>
    <input id="bantype" type="radio" name="bantype" value="3days" tabindex="6"><label>3 day ban</label><br>
    <input id="bantype" type="radio" name="bantype" value="7days" tabindex="6"><label>7 day ban</label><br>
    <input id="bantype" type="radio" name="bantype" value="delete" tabindex="6"><label>Delete</label><br><br>
    <input name="banreason" type="text" tabindex="1" class="Text" placeholder="Mod Note"><br><br>
                        <select name='reason' class="Text">
                      <option value='Other'>Other</option>
                      <option
value='Sexual Content'>Sexual Content</option>
                      <option
value='Alt Donating'>Alt Donating</option>
                      <option
value='Bribery'>Bribery</option>
                      <option value='Exploiting'>Hacking</option>
                      <option value='Copying Items'>Copying Items</option>
                      <option value='Personal Attacking'>Personal Attacking</option>
                      <option value='Online Dating'>Online Dating</option>
                      <option value='Profanity'>Profanity</option>
                      <option value='Offsite link(s)'>Offsite link(s)</option>
                      <option value='Threatening'>Threatening</option>
                      <option value='Spamming'>Spamming</option>
                    </select>
      <br>
      <br>
    <input name="off" type="text" tabindex="1" class="Text" placeholder="Offensive Item"><br><br>
    <input type="submit" value="(Un)ban" tabindex="4" class="Button" name="submit">
    </form>
</center>
<?php echo $footer; ?>