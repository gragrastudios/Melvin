<?php include "include.php";
  session_start();
  if(!isset($_SESSION['user_name'])){
   echo $navbar;
}else { include 'loggedinnavbar.php'; };
  
    if(!isset($_SESSION['id'])){
   die();
};
  
$id = (int)addslashes(htmlspecialchars($_GET['topicid']));
  //margin-left: 300px; margin-top: 100px;
  
  function FilterString($string) {
  $words = array_values(array_filter(file($_SERVER["DOCUMENT_ROOT"] . "/api/profanity_filter_v1", FILE_IGNORE_NEW_LINES)));
  foreach ($words as $word) {
    if (preg_match("/(".$word.")/i", $string)) {
        return $word;
      }
    }
    return "OK";
}
 ?>
<?php
session_start();
    $_USERID = $_SESSION["id"];
  $sql1 = "SELECT * FROM user_form WHERE id='$_USERID'";
  $_USERQ = mysqli_query($conn, $sql1) or die(mysqli_error($conn));
  $_USER = mysqli_fetch_assoc($_USERQ);
  $iphash = md5($_SERVER["REMOTE_ADDR"]);
  $sql2 = "UPDATE `user_form` SET `ip` = '".$iphash."' WHERE `user_form`.`id` = '".$_USER['id']."';";
  $iphashq = mysqli_query($conn, $sql2);
if(isset($_POST["submit"])) {
    $gamename = htmlspecialchars($_POST["name"]);
    $gamedesc = htmlspecialchars($_POST["description"]);
    $time = date("h:i:sa");
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
  
    // error handlers
      if (empty($gamename)) {
      echo "<center>Please fill in all fields. <a href='/createform.aspx'>Back?</a></center>";
      exit();
    }
  
          if (empty($gamedesc)) {
      echo "<center>Please fill in all fields. <a href='/createform.aspx'>Back?</a></center>";
      exit();
    }
  
              $content2 = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['description']));
          $captcha_completed=true;
          if (!$captcha_completed) {
            echo "reCAPTCHA failed, please try again.";
          } else {
              if (FilterString($content2) != "OK") {
                $p = FilterString($content2);
                echo "Your reply contains profanity, please remove \"$p\" and try again!";
                }else {
                //Post it
                 $sql3 = "INSERT INTO forum (id, Subject, Description, topic_id, creator_id) VALUES (NULL, '".$gamename."', '".$gamedesc."', '".$id."', '".$_USER['id']."')";
                 $query = mysqli_query($conn, $sql3);
                  header('Location: topic.aspx?id='.$id.'');
                  }
    if ($conn->query($sql) === TRUE) {
      echo "";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
                }
                
};
  
 
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

     <div class="container col-xl-10 col-xxl-8 px-4 py-5">
      <div class="col-md-10 mx-auto col-lg-5">
        <form action="" method="post" enctype="multipart/form-data" class="p-4 p-md-5 border rounded-3 bg-body-tertiary">
          <center><h3>CREATE FORUM POST</h3></center>
          <div class="form-floating mb-3">
            <input type="text" name="name" required class="form-control" placeholder="ermmmmm wut the sigma is wrong with this website">
            <label for="floatingInput">Subject</label>
          </div>
          <div class="form-floating mb-3">
            <textarea type="text" name="description" required class="form-control" style="width: 350px; height: 100px;" placeholder="bruv this website is BROKEB I AM GONNA LEAVE oh btw can i have admin"></textarea>
            <label for="floatingInput">Description</label>
          </div>
          <button type="submit" name="submit" class="w-100 btn btn-lg btn-primary">Post</button>
          <hr class="my-4">
          <small class="text-body-secondary">By clicking Post, you agree to the terms of use.</small>
        </form>
      </div>
    </div>
  </div>
 <div class="container my-5">
<?php echo $footer ?>