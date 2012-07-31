<?php
// Start session
session_start();
include("../../../../path.php");

include("../../../../config.php");

$dbc = connectDatabase();
$userID=$_SESSION['userID'];
// Remove admin session
$remove = mysql_query("DELETE FROM `usersessions` WHERE `userID`='$userID'");

disconnectDatabase($dbc);

unset($_SESSION['adminSession'],$_COOKIE['adminSession']);
unset($_SESSION['userID']);

	header("location: ../../../../public_html/blog/index.php?view=blog");

//header('Location: index.php');
exit();
?>
