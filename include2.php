<?php
$conn = mysqli_connect('dbhost','dbusername','dbpass','dbname');
$_GLOBALQ = mysqli_query($conn, "SELECT * FROM global WHERE id='1'") or die(mysqli_error($conn));
$_GLOBAL = mysqli_fetch_assoc($_GLOBALQ);
?>
