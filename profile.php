<?php include "include.php";
  session_start();
  include 'loggedinnavbar.php';
  $userid = htmlspecialchars($_SESSION['id']);
  $useritem = mysqli_query($conn, "SELECT * FROM user_form WHERE id='".$userid."'") or die(mysqli_error($conn));
  $user = mysqli_fetch_assoc($useritem);
    if(!isset($_SESSION['id'])){
   header('location:logout.aspx');
  }
?>
<br><br>
<main class="container">
  <div class="bg-body-tertiary p-5 rounded">
    <h1><?php echo $user['name']; ?></h1>
    <br>
    <img width="300" height="300" src="/pfp.jpg">
    
  </div>
  <h2 style="margin-left: 600px; margin-right: 20px; margin-top: -200px;">Your profile! Go to settings for settings.</h2>
  <a href="/settings.aspx" type="submit" class="btn btn-primary" style="margin-left: 600px; margin-top: -450px;">Settings</a>
</main><br><br><br><br>
<?php echo $footer; ?>