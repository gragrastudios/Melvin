<?php include 'include.php';
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
<?php //echo $_SESSION["id"]; ?>
<div class="container my-5">
  <div class="navbar" style="margin-right: -800px;">
  <h1>All Presentations</h1>
  <br><br>
  </div>     
  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
  <?php
            $sql = "SELECT * FROM games;";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
              
            if ($resultCheck > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                  $creatorq = mysqli_query($conn, "SELECT * FROM user_form WHERE id='".$row['creator_id']."'") or die(mysqli_error($conn));
                  $creator = mysqli_fetch_assoc($creatorq);
                  $id = $_SESSION["id"];
                  $creatorid = $row["creator_id"];?>
                      
    <div class="col">
          <div class="card shadow-sm">
            <img src="<?php echo htmlspecialchars($row['thumbnail']); ?>" width="100%" height="225">
            <div class="card-body">
              <p class="card-text"><?php echo htmlspecialchars($row['name']); ?></p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a class="btn btn-sm btn-outline-secondary" href="/presentation.aspx?id=<?php echo htmlspecialchars($row['id']); ?>">View</a>
                  <a class="btn btn-sm btn-outline-secondary" href="/deleteslide.aspx?id=<?php echo htmlspecialchars($row['id']); ?>">Delete</a>
                </div>
                <small class="text-body-secondary">Created: <?php echo htmlspecialchars($row['datecreated']); ?></small>
              </div>
            </div>
            </div></div>
    <?php }} ?>
</div>
<?php echo $footer; ?>