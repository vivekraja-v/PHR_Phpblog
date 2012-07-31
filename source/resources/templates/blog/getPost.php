<?php
include('admin/includes/functions.php');
include("../../../config.php");
$dbc = connectDatabase();

// Get site configurations
$getConfigs = mysql_fetch_assoc(mysql_query("SELECT `configValue` FROM `siteconfig` WHERE `configName`='allowBBCode'"));

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
	if($getConfigs['configValue'] == 1)
	{
		echo formatPost($getText['replyText']);
	} else {
		echo nl2br($getText['replyText']);
	}
}

disconnectDatabase($dbc);
?>
