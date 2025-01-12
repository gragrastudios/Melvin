<?php include "include.php";
  session_start();
  if(!isset($_SESSION['loggedin'])){
   echo $navbar;
}elseif ($_SESSION['loggedin'] = '1'){ include 'loggedinnavbar.php'; }
  
$id = (int)addslashes($_GET['id']);
$postitem = mysqli_query($conn, "SELECT * FROM forum WHERE id='$id'") or die(mysqli_error($conn));
$post = mysqli_fetch_assoc($postitem);
$creatorid = $post['creator_id'];
$creatoritem = mysqli_query($conn, "SELECT * FROM user_form WHERE id='".$creatorid."'") or die(mysqli_error($conn));
$creator = mysqli_fetch_assoc($creatoritem);
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
  
$postid = $id;
$urid = $_SESSION['id'];
if($_SERVER["REQUEST_METHOD"] == 'POST') {
    $gamename = $_POST["reply"];
    if(empty($_POST["reply"])){
      echo '<h1 style="color: red;">Your comment is empty!</h1>';
      die();
      }

          $content = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['reply']));
          $captcha_completed=true;
          if (!$captcha_completed) {
            echo "reCAPTCHA failed, please try again.";
          } else {
              if (FilterString($content) != "OK") {
                $p = FilterString($content);
                echo "Your reply contains profanity, please remove \"$p\" and try again!";
              } else {
                //Post it

                    $sql = "INSERT INTO replies (id, reply, creator_id, post_id) VALUES (NULL, '".$gamename."', '".$urid."', '".$postid."')";
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
<nav aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-chevron p-3 bg-body-tertiary rounded-3">
      <li class="breadcrumb-item">
        <a class="link-body-emphasis fw-semibold text-decoration-none" href="forum.aspx">Forum</a>
      </li>
      <li class="breadcrumb-item">
        <a class="link-body-emphasis fw-semibold text-decoration-none" href="topic.aspx?id=<?php echo $post['topic_id']; ?>">Topic</a>
      </li>
      <li class="breadcrumb-item active" aria-current="page">
        Post
      </li>
    </ol>
  </nav>
        
  <div class="my-3 p-3 bg-body rounded shadow-sm">
    <h3 class="border-bottom pb-2 mb-0"><?php echo $post['Subject']; ?></h3>
    <br>
    <img src="https://melvin.ct8.pl/pfp.jpg" class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="250" height="250">
    <div style="position: relative; top: -250px; left: 280px;">
    <h5><?php echo $post['Description']; ?></h5>
    </div>
    <h5 style="position: relative; top: -50px; right: -880px;">Posted by: <?php echo $creator['name']; ?></h5>
    <div id="">
    <h4 class="border-bottom pb-2 mb-0">Replies</h4>
      <?php if(!isset($_SESSION['user_name'])){ ?>
      <?php }else { ?>
      <br>
      <form method="post">
        <textarea name="reply" rows="5" cols="20" id="reply" class="MultilineTextBox" style="width: 300px; height: 50px;"></textarea>
        <br>
        <input type="submit">
      </form>
      <?php }; ?>
            <?php if(isset($_SESSION['admin_name'])){ ?>
      <br>
      <form method="post">
        <textarea name="reply" rows="5" cols="20" id="reply" class="MultilineTextBox" style="width: 300px; height: 50px;"></textarea>
        <br>
        <input type="submit">
      </form>
      <?php }; ?>
            <?php
            $sql = "SELECT * FROM replies WHERE post_id = '".$id."';";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
              
            if ($resultCheck > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                  $creatorq2 = mysqli_query($conn, "SELECT * FROM user_form WHERE id='".$row['creator_id']."'") or die(mysqli_error($conn));
                  $creator2 = mysqli_fetch_assoc($creatorq2);
                  $id1 = $_SESSION["id"];
                  $creatorid2 = $row["creator_id"]; {?>
                      
<div class="d-flex text-body-secondary pt-3">
  <a style="text-decoration:none; color: #585c5e;">
      <img src="https://melvin.ct8.pl/pfp.jpg" class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32">
   <div class="border-bottom">
      <p style="margin-left: 40px; margin-top: -35px;" class="pb-3 mb-0 small lh-sm">
        <strong class="d-block text-gray-dark"><?php echo htmlspecialchars($creator2['name']); ?></strong>
        <?php echo htmlspecialchars($row['reply']); ?>
      </p>
      <?php if(isset($_SESSION['admin_name'])){?>
     <form action="https://example.com/redirected-page" method="post" style="margin-left: 1020px; margin-top: -50px;">
     <button class="btn btn-outline-danger d-inline-flex align-items-center" type="submit">Delete</button>
     </form>
     <?php }; ?>
      </div>
     </a>
    </div>
    <?php };};}; ?>
    </div>
 </div>
<?php echo $footer; ?>