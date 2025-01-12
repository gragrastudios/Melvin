<?php
include 'include.php';
  include 'loggedinnavbar.php';
  
$querytype = (int)htmlspecialchars($_GET["id"]);
$onslide = (int)htmlspecialchars($_GET["slide"]);
  
session_start();
    
  
  $_USERID = $_SESSION["id"];
  $sql2 = "SELECT * FROM user_form WHERE id='$_USERID'";
  $_USERQ = mysqli_query($conn, $sql2) or die(mysqli_error($conn));
  $_USER = mysqli_fetch_assoc($_USERQ);
  $iphash = md5($_SERVER["REMOTE_ADDR"]);
  $sql = "UPDATE `user_form` SET `ip` = '".$iphash."' WHERE `user_form`.`id` = '".$_USER['id']."';";
  $iphashq = mysqli_query($conn, $sql);
 
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
  
  $sql1 = "SELECT * FROM templates WHERE id='$querytype'";
  $gameitem = mysqli_query($conn, $sql1) or die(mysqli_error($conn));
  $game = mysqli_fetch_assoc($gameitem);
  
  if(empty($onslide)){ echo "<script>
  alert('This slide does not exist');
  document.location = '/templates.aspx';
  </script>"; };
  
?>
     <div class="container col-xl-10 col-xxl-8 px-4 py-5">
      <div class="col-md-10 mx-auto col-lg-5">
        <div class="p-4 p-md-5 border rounded-3 bg-body-tertiary">
          <center><h3>Download (slide <?php echo $onslide; ?> <a href="download.aspx?id=<?php echo $querytype; ?>&&slide=<?php if ($onslide == '1'){ echo '2'; }; if ($onslide == '2'){ echo '3'; }; if ($onslide == '3'){ echo '4'; }; if ($onslide == '4'){ echo '5'; }; if ($onslide == '5'){ echo '6'; }; if ($onslide == '6'){ echo '7'; }; if ($onslide == '7'){ echo '8'; }; if ($onslide == '8'){ echo '9'; }; if ($onslide == '9'){ echo '10'; }; ?>">next--></a>)</h3></center>
          <br>
          <a class="w-100 btn btn-lg btn-primary" href="https://melvin.ct8.pl/<?php if ($onslide == '1'){ echo htmlspecialchars($game['slide1']); }; if ($onslide == '2'){ echo htmlspecialchars($game['slide2']); }; if ($onslide == '3'){ echo htmlspecialchars($game['slide3']); }; if ($onslide == '4'){ echo htmlspecialchars($game['slide4']); }; if ($onslide == '5'){ echo htmlspecialchars($game['slide5']); }; if ($onslide == '6'){ echo htmlspecialchars($game['slide6']); }; if ($onslide == '7'){ echo htmlspecialchars($game['slide7']); }; if ($onslide == '8'){ echo htmlspecialchars($game['slide8']); }; if ($onslide == '9'){ echo htmlspecialchars($game['slide9']); }; if ($onslide == '10'){ echo htmlspecialchars($game['slide10']); }; ?>" download="templateslide<?php echo htmlspecialchars($_GET["slide"]); ?>.png">Download</a>
        </div>
      </div>
    </div>
  </div>
<?php echo $footer; ?>