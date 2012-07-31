<?php


// If already logged in
if($isAdmin != true){ die('Invalid Access');}

// Go through every post field
foreach($_POST as $item => $value)
{
	// If not hidden value or submit button, update config
	if($item != 'submitName' && $item != 'Submit')
	{
		$check = mysql_fetch_row(mysql_query("SELECT COUNT(*) FROM `siteconfig` WHERE `configName`='$item'"));
		if($check[0] > 0)
		{
			$update = mysql_query("UPDATE `siteconfig` SET `configValue`='$value' WHERE `configName`='$item'");
		} else {
			$update = mysql_query("INSERT INTO `siteconfig` (`configName`,`configValue`) VALUES ('$item','$value')");
		}
		if($update)
		{
			$message .= 'Config value for <font color="#0000FF">'.$item.'</font> has been changed.<br/ >';
		} else {
			$message .= 'Unable to change value for <font color="#0000FF">'.$item.'</font>.<br/ >';
		}
	}
}

?>