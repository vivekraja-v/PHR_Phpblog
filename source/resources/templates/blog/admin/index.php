<?php
// Load functions & database
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

include('includes/functions.php');
session_start();
include("../../../../path.php");

include("../../../../config.php");

$dbc = connectDatabase();
// Check user login - starts session as well
include('includes/loginCheck.php');

// List of allowed pages/submits
$allowedList = array('login','configurations','users','categories','posts','replies');

// Get configurations
$getConfigs = mysql_query("SELECT * FROM `siteconfig`");
while($eachConfig = mysql_fetch_assoc($getConfigs)){${$eachConfig['configName']} = $eachConfig['configValue'];}

// Pass submitName from GET
if($_GET['submitName'] != NULL){$_POST['submitName'] = $_GET['submitName'];}

list($_POST['submitName']) = cleanInputs($_POST['submitName']);

// Check for any submitions we have
if($_POST['submitName'])
{
	if(in_array($_POST['submitName'],$allowedList))
	{
		// Only allow pages on list and that exist
		$fileName = 'submits/'.$_POST['submitName'].'.php';
		if(is_file($fileName)){ include($fileName);}
	}
}
$userID=$_SESSION['userID'];
$checkInfo = mysql_fetch_assoc(mysql_query("SELECT * FROM `userlist` WHERE `userID`='$userID'"));
$userName=$checkInfo['userName'];
$role=$checkInfo['role'];
?>
<script language="javascript">

function resize(which, maxsize) {
	var elem = document.getElementById(which);
	alert(elem);
	if (elem == undefined || elem == null) return false;
	if (maxsize == undefined) maxsize = 500;
	if (elem.width > elem.height) {
	if (elem.width > maxsize) elem.width = maxsize;
	} else {
	if (elem.height > maxsize) elem.height = maxsize;
	}
}
</script>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Phresco Framework</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le styles -->
	<link href="../../../../public_html/css/blogtheme/bootstrap-1.2.0.css" rel="stylesheet">
    <link href="../../../../public_html/css/blogtheme/style.css" rel="stylesheet" type="text/css" />


    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="images/favicon.ico">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
  </head>

  <body>
	<?php include("menu.php");?>
   </div> 
  <?php  
  // System message from submits
  if($message != NULL ) { ?>
  
    <div class="message-text"><?php echo $message;?> </div>
    
  <?php } ?>

	<?php
	// Check page to include
	if($isAdmin == false || $_GET['page'] == NULL)
	{
		// Default page
		include('pages/login.php');
	} else {
		if(in_array($_GET['page'],$allowedList))
		{
			// Only include if on list and does exist
			$fileName = 'pages/'.$_GET['page'].'.php';
			if(is_file($fileName)){ include($fileName);}
		} else {
			// Default page
			include('pages/login.php');
		}
	}
	?>
   
    <?php include("../footer.php");?>
<?php
disconnectDatabase($dbc);
?>
