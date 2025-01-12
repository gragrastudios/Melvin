<?php include('include.php'); ?>
<?php if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sitealert2 = $_POST['sitealert2'];
    $sitealert2 = str_replace("'","\'",$sitealert2);
    $enabled2 = $_POST['enabled2'];
    $color2 = $_POST['sitealert2color'];
    $banq = mysqli_query($conn, "UPDATE `global` SET `ShowingSiteAlert2` = '".$enabled2."', `SiteAlert2Color` = '".$color2."', `SiteAlert2` = '".$sitealert2."' WHERE `global`.`id` = '1'; ") or die(mysqli_error($conn));
} ?>
<?php header('location: createsitealert.aspx'); ?>