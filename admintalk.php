<?php include 'include.php';
  
  session_start();
    if(!isset($_SESSION['admin_name'])){
   header('location:login.aspx');
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
  include 'loggedinnavbar.php';
    function FilterString($string) {
  $words = array_values(array_filter(file($_SERVER["DOCUMENT_ROOT"] . "/api/profanity_filter_v1", FILE_IGNORE_NEW_LINES)));
  foreach ($words as $word) {
    if (preg_match("/(".$word.")/i", $string)) {
        return $word;
      }
    }
    return "OK";
}
  
$urid = $_SESSION['id'];
if($_SERVER["REQUEST_METHOD"] == 'POST') {
    $gamename = htmlspecialchars($_POST["message"]);
    if(empty($gamename)){
      echo '<h1 style="color: red;">Your comment is empty!</h1>';
      die();
      }

          $content = htmlspecialchars(mysqli_real_escape_string($conn,$gamename));
          $captcha_completed=true;
          if (!$captcha_completed) {
            echo "reCAPTCHA failed, please try again.";
          } else {
              if (FilterString($content) != "OK") {
                $p = FilterString($content);
                echo "Your reply contains profanity, please remove \"$p\" and try again!";
              } else {
                //Post it

                    $sql = "INSERT INTO admingc (id, Message, creatorid) VALUES (NULL, '".$gamename."', '".$urid."')";
    if ($conn->query($sql) === TRUE) {
      echo "";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
              }
            }
};
?>
<main class="container">
  <br>
  <h1>Admin Group Chat</h1>
  <center>
      <?php
            $sql = "SELECT * FROM admingc;";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
              
            if ($resultCheck > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                  $creatorq = mysqli_query($conn, "SELECT * FROM user_form WHERE id='".$row['creatorid']."'") or die(mysqli_error($conn));
                  $creator = mysqli_fetch_assoc($creatorq);
                  $id = $_SESSION["id"];
                  $creatorid = $row["creatorid"];?>
                      
  <div class="bg-body-tertiary p-2 rounded" style="width: 200px;">
    <h5><?php echo htmlspecialchars($row['Message']); ?></h5><p>posted by: <?php echo htmlspecialchars($creator['name']); ?></p>
  </div>
    <br>
    <?php }} ?>
    <form method="post">
        <textarea name="message" rows="5" cols="20" id="reply" class="MultilineTextBox" style="width: 300px; height: 50px;"></textarea>
        <br>
        <input type="submit" value="Post">
      </form>
    </center>
</main>
<?php echo $footer; ?>