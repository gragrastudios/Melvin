<?php
include 'include.php';
  include 'loggedinnavbar.php';
  
$querytype = htmlspecialchars($_GET["id"]);
$onslide = htmlspecialchars($_GET["slide"]);
  
session_start();
if(isset($_POST["submit"])) {
    //$file_name = htmlspecialchars($_FILES['image']['name']);
    $file_name = rand(1,99999999);
    $tempname = $_FILES['image']['tmp_name'];
    $folder = 'images/'.$file_name;
    //$gamethumb = $_POST["thumbnail"];
    //$gameslide1 = $_POST["slide1"];
    //$gameslide2 = $_POST["slide2"];
    //$gameslide3 = $_POST["slide3"];
    //$gameslide4 = $_POST["slide4"];
    //$gameslide5 = $_POST["slide5"];
    //$gameslide6 = $_POST["slide6"];
    //$gameslide7 = $_POST["slide7"];
    //$gameslide8 = $_POST["slide8"];
    //$gameslide9 = $_POST["slide9"];
    //$gameslide10 = $_POST["slide10"];
  
    // error handelers
    
    if (empty($file_name)) {
      echo "<center>Please fill in all fields. <a href='/presentations.aspx'>Back?</a></center>";
      exit();
    }
    
    $sql = "UPDATE `templates` SET `slide$onslide` = 'images/".$file_name."' WHERE `templates`.`id` = '".$querytype."'";
    $query = mysqli_query($conn, $sql);
    
    // upload
    if (move_uploaded_file($tempname, $folder)){
      echo "Successfully Updated!";
    } else {
      echo "Error: something went wrong.";
      exit();
    }
};
  
  $_USERID = $_SESSION["id"];
  $sql1 = "SELECT * FROM user_form WHERE id='$_USERID'";
  $_USERQ = mysqli_query($conn, $sql1) or die(mysqli_error($conn));
  $_USER = mysqli_fetch_assoc($_USERQ);
  $iphash = md5($_SERVER["REMOTE_ADDR"]);
  $sql2 = "UPDATE `user_form` SET `ip` = '".$iphash."' WHERE `user_form`.`id` = '".$_USER['id']."';";
  $iphashq = mysqli_query($conn, $sql2);
 
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
  
  $sql3 = "SELECT * FROM templates WHERE id='$querytype'";
  $gameitem = mysqli_query($conn, $sql3) or die(mysqli_error($conn));
  $game = mysqli_fetch_assoc($gameitem);
  
  if ($game["creator_id"] == $_SESSION["id"]) {echo "";} else {echo "<center>This template does not belong to you. <a href='templates.aspx'>Back?</a></center>"; die();};

  //if ($onslide == '10'){ echo ""; };
  //if ($onslide = '1'){ echo '2'; } if ($onslide = '2'){ echo '3'; } if ($onslide = '3'){ echo '4'; } if ($onslide = '4'){ echo '5'; } if ($onslide = '5'){ echo '6'; } if ($onslide = '6'){ echo '7'; } if ($onslide = '7'){ echo '8'; } if ($onslide = '8'){ echo '9'; } if ($onslide = '9'){ echo '10'; }
?>
<?php //echo $onslide; ?>
<?php //if ($onslide == '1'){ echo '2'; }; if ($onslide == '2'){ echo '3'; }; if ($onslide == '3'){ echo '4'; }; if ($onslide == '4'){ echo '5'; }; if ($onslide == '5'){ echo '6'; }; if ($onslide == '6'){ echo '7'; }; if ($onslide == '7'){ echo '8'; }; if ($onslide == '8'){ echo '9'; }; if ($onslide == '9'){ echo '10'; }; ?>
     <div class="container col-xl-10 col-xxl-8 px-4 py-5">
      <div class="col-md-10 mx-auto col-lg-5">
        <form action="" method="post" enctype="multipart/form-data" class="p-4 p-md-5 border rounded-3 bg-body-tertiary">
          <center><h3>Edit (slide <?php echo $onslide; ?> <a style="<?php if($onslide == '10'){ echo 'display: none;'; }; ?>" href="/edittemplate.aspx?id=<?php echo $querytype; ?>&slide=<?php if ($onslide == '1'){ echo '2'; }; if ($onslide == '2'){ echo '3'; }; if ($onslide == '3'){ echo '4'; }; if ($onslide == '4'){ echo '5'; }; if ($onslide == '5'){ echo '6'; }; if ($onslide == '6'){ echo '7'; }; if ($onslide == '7'){ echo '8'; }; if ($onslide == '8'){ echo '9'; }; if ($onslide == '9'){ echo '10'; }; ?>">next--></a>)</h3></center>
          <div class="mb-3">
              <label class="form-label" for="disabledCustomFile">Slide <?php echo $onslide; ?> *required*</label>
              <input type="file" required class="form-control" name="image">
          </div>
          <button type="submit" name="submit" class="w-100 btn btn-lg btn-primary">Update</button>
          <hr class="my-4">
          <small class="text-body-secondary">By clicking Update, you agree to the terms of use.</small>
        </form>
      </div>
    </div>
  </div>
<?php echo $footer; ?>