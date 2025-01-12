  <?php
    include 'include.php';
    session_start(); 
    $sql1 = "SELECT * FROM user_form;";
    $result2 = mysqli_query($conn, $sql1);
    $row = mysqli_fetch_assoc($result2);
    ?>
<?php
include 'include.php';
     session_start();
if($_SERVER["REQUEST_METHOD"] == 'POST') {
    $gamename = $_POST["name"];
    $gamedesc = $_POST["map"];
    //$file_name = $_FILES['thumbnail']['name'];
    $file_name = rand(1,99999999);
    $tempname = $_FILES['thumbnail']['tmp_name'];
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
    $gameip = $_POST["ip"];
    $gameport = $_POST["port"];
    $gametype = $_POST["type"];
    $gamecopy = $_POST["copy"];
    $sql = "INSERT INTO games (id, name, description, thumbnail, creator_id) VALUES (NULL, '".$gamename."', '".$gamedesc."', '".$file_name."', '".$_SESSION['id']."')";
    move_uploaded_file($tempname, $folder);
    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
//header("Location : /presentations.aspx")
?>