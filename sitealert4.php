<?php include('include.php'); ?>
<?php if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sitealert4 = $_POST['sitealert4'];
    $sitealert4 = str_replace("'","\'",$sitealert4);
    $enabled4 = $_POST['enabled4'];
    $color4 = $_POST['sitealert4color'];
    $banq = mysqli_query($conn, "UPDATE `global` SET `ShowingSiteAlert4` = '".$enabled4."', `SiteAlert4Color` = '".$color4."', `SiteAlert4` = '".$sitealert4."' WHERE `global`.`id` = '1'; ") or die(mysqli_error($conn));
} ?>
<?php header('location: createsitealert.aspx'); ?>