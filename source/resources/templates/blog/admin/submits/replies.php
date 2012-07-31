<?php


// If already logged in
if($isAdmin != true){ die('Invalid Access');}

// Add Reply
if($_POST['replyID'] == NULL && $_GET['do'] == NULL)
{
	// Check new Reply values
	if($_POST['userID'] == NULL){ $message = 'Please select a user.';return;}
	if($_POST['topicID'] == NULL){ $message = 'Please select a topic.';return;}
	if($_POST['replyTitle'] == NULL){ $message = 'Please enter a title.';return;}
	if($_POST['replyText'] == NULL){ $message = 'Please enter reply text.';return;}
	$userID=$_SESSION['userID'];
	$addReply = mysql_query("INSERT INTO `blogreplies` (`topicID`,`userID`,`replyTitle`,`replyText`,`replyDate`)
		VALUES ('$_POST[topicID]','$userID','$_POST[replyTitle]','$_POST[replyText]',NOW())");
	if($addReply)
	{
		$message = 'Reply has been  added successfully.';
		$_GET['replyID'] = mysql_insert_id();
	} else {
		$message = 'Unable to add reply.';
	}
}

// Edit Reply
if($_POST['replyID'] != NULL)
{
	// Check new Reply values
	if($_POST['userID'] == NULL){ $message = 'Please select a user.';return;}
	if($_POST['topicID'] == NULL){ $message = 'Please select a topic.';return;}
	if($_POST['replyTitle'] == NULL){ $message = 'Please enter a title.';return;}
	if($_POST['replyText'] == NULL){ $message = 'Please enter reply text.';return;}
		
	// If everything OK, Update
	$update = mysql_query("UPDATE `blogreplies` SET `topicID`='$_POST[topicID]',`userID`='$_POST[userID]',
	`replyTitle`='$_POST[replyTitle]',`replyText`='$_POST[replyText]' WHERE `replyID`='$_POST[replyID]' LIMIT 1");
	if($update)
	{
		$message .= 'Reply has been  updated successfully.';
	} else {
		$message .= 'Unable to update reply.';
	}
	return;
}


?>