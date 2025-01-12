<?php include('include.php'); ?>
<?php if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sitealert3 = $_POST['sitealert3'];
    $sitealert3 = str_replace("'","\'",$sitealert3);
    $enabled3 = $_POST['enabled3'];
    $color3 = $_POST['sitealert3color'];
    $banq = mysqli_query($conn, "UPDATE `global` SET `ShowingSiteAlert3` = '".$enabled3."', `SiteAlert3Color` = '".$color3."', `SiteAlert3` = '".$sitealert3."' WHERE `global`.`id` = '1'; ") or die(mysqli_error($conn));
} ?>
<?php header('location: createsitealert.aspx'); ?>