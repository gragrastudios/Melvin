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
<div>
  <center>
    <h1>Settings</h1>
    <br>
    <h3>Change Password</h3>
    <form action="" method="POST">
    <input type="submit" class="btn btn-warning" value="Change">
    </form>
    <br><br>
  <h3>Change profile picture</h3>
  <form method="POST">
  <input type="submit" class="btn btn-success" value="Change">
  </center>
  </div>
<br><br><br><br>
<?php echo $footer; ?>