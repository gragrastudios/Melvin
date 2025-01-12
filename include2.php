<?php
$conn = mysqli_connect('mysql.ct8.pl','m30328_crimson4','Crimson4thegoat','m30328_melvin');
$_GLOBALQ = mysqli_query($conn, "SELECT * FROM global WHERE id='1'") or die(mysqli_error($conn));
$_GLOBAL = mysqli_fetch_assoc($_GLOBALQ);
?>