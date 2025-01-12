<?php

 include 'include.php';
  
  session_start();
  
$id = (int)addslashes($_GET['id']);
$gameitem = mysqli_query($conn, "SELECT * FROM templates WHERE id='$id'") or die(mysqli_error($conn));
$game = mysqli_fetch_assoc($gameitem);
if(!$game) {
  die("<script>
  alert('This template does not exist');
  document.location = '/templates.aspx';
  </script>");
  exit;
}
$creatorq = mysqli_query($conn, "SELECT * FROM user_form WHERE id='".(int)addslashes($game['creator_id'])."'");
$creator = mysqli_fetch_assoc($creatorq);
  
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
  
  if (empty($game['slide1'])) {   die("<script>
  alert('Something went wrong.');
  document.location = '/templates.aspx';
  </script>");
  exit;}
  
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <div id="myCarousel" class="carousel slide mb-6" >
    <div class="carousel-indicators">
      <button <?php if (empty($game['slide1'])) {echo "style='display: none;'";} else {echo "";}; ?> type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button <?php if (empty($game['slide2'])) {echo "style='display: none;'";} else {echo "";}; ?> type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button <?php if (empty($game['slide3'])) {echo "style='display: none;'";} else {echo "";}; ?> type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
      <button <?php if (empty($game['slide4'])) {echo "style='display: none;'";} else {echo "";}; ?> type="button" data-bs-target="#myCarousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
      <button <?php if (empty($game['slide5'])) {echo "style='display: none;'";} else {echo "";}; ?> type="button" data-bs-target="#myCarousel" data-bs-slide-to="4" aria-label="Slide 5"></button>
      <button <?php if (empty($game['slide6'])) {echo "style='display: none;'";} else {echo "";}; ?> type="button" data-bs-target="#myCarousel" data-bs-slide-to="5" aria-label="Slide 6"></button>
      <button <?php if (empty($game['slide7'])) {echo "style='display: none;'";} else {echo "";}; ?> type="button" data-bs-target="#myCarousel" data-bs-slide-to="6" aria-label="Slide 7"></button>
      <button <?php if (empty($game['slide8'])) {echo "style='display: none;'";} else {echo "";}; ?> type="button" data-bs-target="#myCarousel" data-bs-slide-to="7" aria-label="Slide 8"></button>
      <button <?php if (empty($game['slide9'])) {echo "style='display: none;'";} else {echo "";}; ?> type="button" data-bs-target="#myCarousel" data-bs-slide-to="8" aria-label="Slide 9"></button>
      <button <?php if (empty($game['slide10'])) {echo "style='display: none;'";} else {echo "";}; ?> type="button" data-bs-target="#myCarousel" data-bs-slide-to="9" aria-label="Slide 10"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="<?php echo $game['slide1']; ?>" style="margin: 0; height: 100%; width: 100%;">
      </div>
      <div class="carousel-item" style="<?php if (empty($game['slide2'])) { echo "display: none;";}?>">
        <img src="<?php echo $game['slide2']; ?>" style="margin: 0; height: 100%; width: 100%; <?php if (empty($game['slide2'])) {echo "style='display: none;'";} else {echo "";}; ?>">
      </div>
      <div class="carousel-item" style="<?php if (empty($game['slide3'])) { echo "display: none;";}?>">
        <img src="<?php echo $game['slide3']; ?>" style="margin: 0; height: 100%; width: 100%; <?php if (empty($game['slide3'])) {echo "style='display: none;'";} else {echo "";}; ?>">
      </div>
      <div class="carousel-item" style="<?php if (empty($game['slide4'])) { echo "display: none;";}?>">
        <img src="<?php echo $game['slide4']; ?>" style="margin: 0; height: 100%; width: 100%; <?php if (empty($game['slide4'])) {echo "style='display: none;'";} else {echo "";}; ?>">
      </div>
      <div class="carousel-item" style="<?php if (empty($game['slide5'])) { echo "display: none;";}?>">
        <img src="<?php echo $game['slide5']; ?>" style="margin: 0; height: 100%; width: 100%; <?php if (empty($game['slide5'])) {echo "style='display: none;'";} else {echo "";}; ?>">
      </div>
      <div class="carousel-item" style="<?php if (empty($game['slide6'])) { echo "display: none;";}?>">
        <img src="<?php echo $game['slide6']; ?>" style="margin: 0; height: 100%; width: 100%; <?php if (empty($game['slide6'])) {echo "style='display: none;'";} else {echo "";}; ?>">
      </div>
      <div class="carousel-item" style="<?php if (empty($game['slide7'])) { echo "display: none;";}?>">
        <img src="<?php echo $game['slide7']; ?>" style="margin: 0; height: 100%; width: 100%; <?php if (empty($game['slide7'])) {echo "style='display: none;'";} else {echo "";}; ?>">
      </div>
      <div class="carousel-item" style="<?php if (empty($game['slide8'])) { echo "display: none;";}?>">
        <img src="<?php echo $game['slide8']; ?>" style="margin: 0; height: 100%; width: 100%; <?php if (empty($game['slide8'])) {echo "style='display: none;'";} else {echo "";}; ?>">
      </div>
      <div class="carousel-item" style="<?php if (empty($game['slide9'])) { echo "display: none;";}?>">
        <img src="<?php echo $game['slide9']; ?>" style="margin: 0; height: 100%; width: 100%; <?php if (empty($game['slide9'])) {echo "style='display: none;'";} else {echo "";}; ?>">
      </div>
      <div class="carousel-item" style="<?php if (empty($game['slide10'])) { echo "display: none;";}?>">
        <img src="<?php echo $game['slide10']; ?>" style="margin: 0; height: 100%; width: 100%; <?php if (empty($game['slide10'])) {echo "style='display: none;'";} else {echo "";}; ?>">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>