<?php

// Load functions & database
include('includes/functions.php');
include("../../../../path.php");
include("../../../../config.php");
$dbc = connectDatabase();

// Check user login - starts session as well
include('includes/loginCheck.php');

// Check logged in
if($isAdmin == false) {die('Invalid access.');}

if($_POST['topicID'] != NULL)
{
	// Get topic ID
	list($topicID) = cleanInputs($_POST['topicID']);
	$getText = mysql_fetch_assoc(mysql_query("SELECT `topicText` FROM `blogtopics` WHERE `topicID`='$topicID'"));
	echo formatPost($getText['topicText']);
} else {
	// Get reply ID
	list($replyID) = cleanInputs($_POST['replyID']);
	$getText = mysql_fetch_assoc(mysql_query("SELECT `replyText` FROM `blogreplies` WHERE `replyID`='$replyID'"));
	echo formatPost($getText['replyText']);
}

disconnectDatabase($dbc);
?>