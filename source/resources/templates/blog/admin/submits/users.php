<?php


// If already logged in
if($isAdmin != true){ die('Invalid Access');}

// Add user
if($_POST['userID'] == 1 && $_GET['do'] == NULL)
{
	// Check new user values
	if($_POST['userName'] == NULL){ $message = 'Please enter a username.';return;}
	if(checkEmail($_POST['userEmail']) == false){$message = 'Invalid email.';return;}
	if($_POST['userPassword'] == NULL){ $message = 'Please enter a password.';return;}
	
	// Check if email is associated with another account
	$checkNew = @mysql_fetch_row(mysql_query("SELECT COUNT(*) FROM 
		`userlist` WHERE `userEmail`='$_POST[userEmail]'"));
	if($checkNew[0] > 0)
	{
		$message = 'This email is already associated with another account.';
		return;
	}
	
	$addUser = mysql_query("INSERT INTO `userlist` (`userName`,`userEmail`,`userPassword`,`userStatus`,`registerDate`)
		VALUES ('$_POST[userName]','$_POST[userEmail]','$_POST[userPassword]','$_POST[userStatus]',NOW())");
	if($addUser)
	{
		$message = 'User added.';
		$_GET['userID'] = mysql_insert_id();
	} else {
		$message = 'Unable to add user.';
	}
}

// Edit user
if($_POST['userID'] != NULL)
{

	// Check new user values
	if($_POST['userName'] == NULL){ $message = 'Please enter a username.';return;}
	if(checkEmail($_POST['userEmail']) == false){$message = 'Invalid email.';return;}
	
	// Check if email is associated with another account
	if($_POST['oldUserEmail'] != $_POST['userEmail'])
	{
		$checkNew = mysql_fetch_row(mysql_query("SELECT COUNT (*) FROM 
			`userlist` WHERE `userEmail`='$_POST[userEmail]'"));
		if($checkNew[0] > 0)
		{
			$message = 'This email is already associated with another account.';
			return;
		}
	}
	
	// Check if we are changing password
	if($_POST['userPassword'] == NULL){
		$message = 'Password is not changing.<br />';
	} else {
		$addQuery = ",`userPassword`='$_POST[userPassword]'";
		$message = '<br />';
	}
	
	// If everything OK, Update
	$update = mysql_query("UPDATE `userlist` SET `userName`='$_POST[userName]',`userEmail`='$_POST[userEmail]',
		`userStatus`='$_POST[userStatus]'
		$addQuery WHERE `userID`='$_POST[userID]' LIMIT 1");
	if($update)
	{
		$message .= 'Account has been  updated successfully.';
	} else {
		$message .= 'Unable to update account.';
	}
	return;
}

// If removing user
if($_GET['do'] == 'remove')
{
	// Is it the admin
	if($_GET['userID'] == 1 || $_GET['userID'] == 2){
		$message = 'Admin/Guest accounts can not be remove.';
	} else {
		// Remove user
		$remove = mysql_query("DELETE FROM `userlist` WHERE `userID`='$_GET[userID]' LIMIT 1");
		// Remove sessions
		$removeSessions = mysql_query("DELETE FROM `usersessions` WHERE `userID`='$_GET[userID]'");
		// Set replies to guest
		$updateReplies = mysql_query("UPDATE `blogreplies` SET `userID`='2' WHERE `userID`='$_GET[userID]'");
		
		if($remove)
		{
			$message = 'User has been removed successfully';
		} else {
			$message = 'Unable to remove user.';
		}
	}	
}

?>