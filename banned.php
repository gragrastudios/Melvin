<?php
  include "include.php";
    echo $loggedinnavbar;
  session_start();
  $_USERID = $_SESSION["id"];
  $_USERQ = mysqli_query($conn, "SELECT * FROM user_form WHERE id='$_USERID'") or die(mysqli_error($conn));
  $_USER = mysqli_fetch_assoc($_USERQ);
  $iphash = md5($_SERVER["REMOTE_ADDR"]);
  $iphashq = mysqli_query($conn, "UPDATE `user_form` SET `ip` = '".$iphash."' WHERE `user_form`.`id` = '".$_USER['id']."';");
  
    //if(!isset($_USER['user_name'])){
   //header('location:logout.aspx');
//}
  
  if($_USER['bantype'] == 'None'){
   header('location:default.aspx');
}
  
  ?>
<?php if($_USER['bantype'] !== 'None') { ?>
<main class="container">
  <div class="bg-body-tertiary p-5 rounded mt-3">
    <h1><?php if($_USER['bantype'] == 'Reminder') {echo 'Reminder';} elseif($_USER['bantype'] == 'Warning') {echo 'Warning';} elseif($_USER['bantype'] == '3daysban') {echo 'Banned for 3 days';} elseif($_USER['bantype'] == '7daysban') {echo 'Banned for 7 days';} elseif($_USER['bantype'] == 'Ban') {echo 'Account Terminated';} elseif($_USER['bantype'] == '1daysban') {echo 'Banned for 1 day';} ?></h1>
    <br>
    <p class="lead">Our moderators have come to the conclusion that your behaviour on Melvin has been in violation of our guidelines. We will terminate your account if you do not abide by our rules.</p>
    <p class="lead">Date Reviewed: <strong><?php echo $_USER['bandate']; ?></strong></p>
    <p class="lead">Note By Reviewer: <strong><?php echo $_USER['banreason']; ?></strong></p>
    <div style="<?php if($_USER['off'] == '') {echo 'display: none;';} ?> width: 450px;border: black thin solid; padding: 22px; color: black; background-color:white;">
    <p>
    Reason: <strong><?php echo $_USER['reason']; ?></strong></p>
    </p>
    <p>Offensive Item: <br><br><strong><?php echo $_USER['off']; ?></strong></p>
    </div>
    <br>
    <p>
    Please abide by the <a href="/rules">Melvin Rules</a> so that Melvin can be safe for users of all ages.
    </p>
    <?php if($_USER['bantype'] == 'Ban'){ ?>
    <p>Your account has been terminated. If you wish to appeal, please send an email to <a href="mailto:gragrastudios@gmail.com">gragrastudios@gmail.com</a><!--<a href='/logout.aspx'>Log out</a>-->
      </p>
    <?php } ?>
    <?php if($_USER['bantype'] == 'Warning') { ?>
    <a class="btn btn-lg btn-primary" href="/logout.aspx" role="button">Logout &raquo;</a>
    <?php } ?>
    <?php if($_USER['bantype'] == 'Reminder') { ?>
    <a class="btn btn-lg btn-primary" href="/logout.aspx" role="button">Logout &raquo;</a>
    <?php } ?>
    <?php if($_USER['bantype'] == '1daysban'){ ?>
    <a class="btn btn-lg btn-primary" href="/logout.aspx" role="button">Logout &raquo;</a>
    <?php } ?>
    <?php if($_USER['bantype'] == '3daysban'){ ?>
    <a class="btn btn-lg btn-primary" href="/logout.aspx" role="button">Logout &raquo;</a>
    <?php } ?>
    <?php if($_USER['bantype'] == '7daysban'){ ?>
    <a class="btn btn-lg btn-primary" href="/logout.aspx" role="button">Logout &raquo;</a>
    <?php } ?>
        <?php
    if (($_USER['unbantime'] <= time()) && ($_USER['bantype'] != 'Ban')) {
      echo " | <a class='btn btn-lg btn-success' href='/reactivate_account.aspx'>Reactivate account</a>";
    }
    ?>
  </div>
</main>
<?php echo $footer; die(); } ?>