<?php
include($_SERVER['DOCUMENT_ROOT']."/include.php");
session_start();
$_USERID = $_SESSION["id"];
$_USERQ = mysqli_query($conn, "SELECT * FROM user_form WHERE id='$_USERID'") or die(mysqli_error($conn));
$_USER = mysqli_fetch_assoc($_USERQ);
$iphash = md5($_SERVER["REMOTE_ADDR"]);
$iphashq = mysqli_query($conn, "UPDATE `user_form` SET `ip` = '".$iphash."' WHERE `user_form`.`id` = '".$_USER['id']."';");
if($_USER['bantype'] == 'Ban' or $_USER['unbantime'] >= time()) {header('location: /banned.aspx'); die();}
$unbanq = mysqli_query($conn, "UPDATE `user_form` SET `bantype` = 'None', `banreason` = '' WHERE `user_form`.`name` = '".$_USER["name"]."'; ") or die(mysqli_error($conn));
header('location:default.aspx');
?>