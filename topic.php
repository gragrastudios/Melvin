<?php include "include.php";
  session_start();
  if(!isset($_SESSION['loggedin'])){
   echo $navbar;
}elseif ($_SESSION['loggedin'] = '1'){ include 'loggedinnavbar.php'; }
  
$id = (int)addslashes(htmlspecialchars($_GET['id']));
$topicitem = mysqli_query($conn, "SELECT * FROM forum_topics WHERE id='$id'") or die(mysqli_error($conn));
$topic = mysqli_fetch_assoc($topicitem);
?>
<main class="container">
  <br>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-chevron p-3 bg-body-tertiary rounded-3">
      <li class="breadcrumb-item">
        <a class="link-body-emphasis fw-semibold text-decoration-none" href="forum.aspx">Forum</a>
      </li>
      <li class="breadcrumb-item active" aria-current="page">
        <?php echo $topic['name']; ?>
      </li>
    </ol>
  </nav>
<?php     if(!isset($_SESSION['id'])){ ?>
<?php }else { ?>
    <div class="my-3 p-3 bg-body rounded shadow-sm">
    <a style="color: blue;" href="createforum.aspx?topicid=<?php echo $topic['id']; ?>">Create Post +</a>
      <?php }; ?>
          <h6 class="border-bottom pb-2 mb-0">Posts</h6>
  <?php
            $sql = "SELECT * FROM forum WHERE topic_id = '".$id."';";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
              
            if ($resultCheck > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                  $visitq = mysqli_query($conn, "SELECT * FROM `gamesvisits` WHERE gameid = '".$row['id']."'");
                  $visits = mysqli_num_rows($visitq);
                  $creatorq = mysqli_query($conn, "SELECT * FROM user_form WHERE id='".$row['creator_id']."'") or die(mysqli_error($conn));
                  $creator = mysqli_fetch_assoc($creatorq);
                  $creatorid = $row["creator_id"];?>
                      
<div class="d-flex text-body-secondary pt-3">
  <a href="post.aspx?id=<?php echo htmlspecialchars($row['id']); ?>" style="text-decoration:none; color: #585c5e;">
      <img src="https://melvin.ct8.pl/pfp.jpg" class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32">
   <div class="border-bottom">
      <p style="margin-left: 40px; margin-top: -35px;" class="pb-3 mb-0 small lh-sm">
        <strong class="d-block text-gray-dark"><?php echo htmlspecialchars($creator['name']); ?></strong>
        <?php echo htmlspecialchars($row['Subject']); ?>
      </p>
      </div>
     </a>
    </div>
    <?php }}; ?>
 </div>
<?php echo $footer; ?>