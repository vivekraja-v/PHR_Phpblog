<?php
session_start();
// Load functions & database
include('admin/includes/functions.php');

$dbc = connectDatabase();
// List of allowed pages/submits
$allowedList = array('main');

// Get page name
if($_POST['page'] != NULL){$_GET['page'] = $_POST['page'];}

$_GET['page'] = cleanInputs($_GET['page']);
ob_start();

// Get site configurations
$getConfigs = mysql_query("SELECT * FROM `siteconfig`");
while($eachConfig = mysql_fetch_assoc($getConfigs)){${$eachConfig['configName']} = $eachConfig['configValue'];}
	
if(!in_array($_GET['page'],$allowedList))
{
	$_GET['page'] = 'main';
}

// Check account verification
if($_GET['verificationCode'] != NULL)
{
	list($userStatus) = cleanInputs($_GET['verificationCode']);
	$update = mysql_query("UPDATE `userlist` SET `userStatus`='1' WHERE `userStatus`='$userStatus' LIMIT 1");
	if($update)
	{
		$message = 'Your account has been verified.';
	} else {
		$message = 'Internal error.';
	}
}

// Only allow pages on list and that exist
$fileNameSubmit = 'submits/'.$_GET['page'].'.php';
$fileNamePage = 'pages/'.$_GET['page'].'.php';	
	
include($fileNameSubmit);
include($fileNamePage);

$MAINBODY = ob_get_contents();
ob_end_clean();

// Get template
include('template.php');

// Diconnect from database
disconnectDatabase($dbc);
?>
