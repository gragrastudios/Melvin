<?php include 'include.php'; 
  session_start();
  
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
<?php include 'loggedinnavbar.php'; ?>
<div class="container my-5">
  <div class="navbar" style="margin-right: -800px;">
  <h1>Templates You Can Use</h1>
  <a class="btn btn-outline-primary d-inline-flex align-items-center" href="/uploadatemplate.aspx"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>
</svg></a><br><br>
  </div>     
  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
  <?php
            $sql = "SELECT * FROM templates;";
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
                  <a class="btn btn-sm btn-outline-secondary" href="/template.aspx?id=<?php echo htmlspecialchars($row['id']); ?>">View</a>
                  <a class="btn btn-sm btn-outline-secondary" href="/<?php if ($creatorid == $id) {echo "edittemplate";} else {echo "download";} ?>.aspx?id=<?php echo htmlspecialchars($row['id']); ?>&&slide=1"><?php if ($creatorid == $id) {echo "Edit";} else {echo "Download";} ?></a>
                 <?php if(isset($_SESSION['admin_name'])){ echo '<a class="btn btn-sm btn-outline-secondary" href="/deletetemplate.aspx?id='.htmlspecialchars($row['id']).'">Delete</a>';} ?>
                </div>
                <small class="text-body-secondary">Created: <?php echo htmlspecialchars($row['datecreated']); ?></small>
              </div>
            </div>
            </div></div>
    <?php }} ?>
</div>
<?php echo $footer; ?>