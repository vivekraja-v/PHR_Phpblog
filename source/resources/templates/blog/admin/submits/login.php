<?php
session_start();
include("../../../../../path.php");
include("../../../../../config.php");

// If already logged in
if($isAdmin == true){ $message = 'You are logged in.'; return;}

// Check that the username and password are not blank
if(checkEmail($_POST['adminEmail']) == false){ $message = 'Please enter a valid email.';return;}
if($_POST['adminPassword'] == NULL){ $message = 'Please enter password.';return;}

list($adminEmail,$adminPassword) = cleanInputs($_POST['adminEmail'],$_POST['adminPassword']);

// If password and username are correct, login
$checkInfo = mysql_fetch_assoc(mysql_query("SELECT * FROM `userlist` WHERE `userEmail`='$adminEmail'
	AND `userPassword`='$adminPassword'"));
	
if($checkInfo['userID'] != '')
{	
	// Create random admin session
	
	$usersession = generate(10);
	$checkInfo = mysql_fetch_assoc(mysql_query("SELECT * FROM `userlist` WHERE `userEmail`='$adminEmail'
	AND `userPassword`='$adminPassword'"));
	$userID=$checkInfo['userID'];
	$_SESSION['userID']=$userID;
	// Insert session to database
	$insert = mysql_query("INSERT INTO `usersessions` (`sessionID`,`userID`,`sessionTime`) VALUES ('$usersession','$userID',NOW())");
	
	
	// Store admin session
	saveSession('usersession',$usersession);
	$message = 'Login successful.';
	$isAdmin = true;	
	header("location: ../../../../public_html/blog/index.php?view=blog");

}else {
	$message = 'username  or password is in correct.';
}
?>