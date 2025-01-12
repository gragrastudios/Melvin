<?php include('include.php'); ?>
<?php if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sitealert5 = $_POST['sitealert5'];
    $sitealert5 = str_replace("'","\'",$sitealert5);
    $enabled5 = $_POST['enabled5'];
    $color5 = $_POST['sitealert5color'];
    $banq = mysqli_query($conn, "UPDATE `global` SET `ShowingSiteAlert5` = '".$enabled5."', `SiteAlert5Color` = '".$color5."', `SiteAlert5` = '".$sitealert5."' WHERE `global`.`id` = '1'; ") or die(mysqli_error($conn));
} ?>
<?php header('location: createsitealert.aspx'); ?>