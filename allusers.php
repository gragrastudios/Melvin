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
  <div class="my-3 p-3 bg-body rounded shadow-sm">
    <h6 class="border-bottom pb-2 mb-0">Accounts</h6>
  <?php
            $sql = "SELECT * FROM user_form;";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
              
            if ($resultCheck > 0) {
                while ($row = mysqli_fetch_assoc($result)) { ?>
                      
<div class="d-flex text-body-secondary pt-3">
  <a style="text-decoration:none; color: #585c5e;" href="user.aspx?id=<?php echo htmlspecialchars($row['id']); ?>">
      <img src="https://melvin.ct8.pl/pfp.jpg" class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32">
   <div class="border-bottom">
      <p style="margin-left: 40px; margin-top: -35px;" class="pb-3 mb-0 small lh-sm">
        <strong class="d-block text-gray-dark"><?php echo htmlspecialchars($row['name']); ?></strong>
        <?php echo htmlspecialchars($row['email']); ?>
      </p>
      </div>
     </a>
    </div>
    <?php }}; ?>
 </div>
<?php echo $footer; ?>