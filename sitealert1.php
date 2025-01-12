<?php include('include.php'); ?>
<?php if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sitealert1 = $_POST['sitealert1'];
    $sitealert1 = str_replace("'","\'",$sitealert1);
    $enabled1 = $_POST['enabled1'];
    $color1 = htmlspecialchars($_POST['sitealert1color']);
    $banq = mysqli_query($conn, "UPDATE `global` SET `ShowingSiteAlert1` = '".$enabled1."', `SiteAlert1Color` = '".$color1."', `SiteAlert1` = '".$sitealert1."' WHERE `global`.`id` = '1'; ") or die(mysqli_error($conn));
} ?>
<?php header('location: createsitealert.aspx'); ?>