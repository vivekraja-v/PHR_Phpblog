<?php

// Get file
$fileID = $_GET['fileID'];
settype($fileID,"integer");
session_start();

$dbc = connectDatabase();

$getConfigs = mysql_fetch_assoc(mysql_query("SELECT `configValue` FROM `siteconfig` WHERE `configName`='fileLocation'"));
$checkFile = mysql_fetch_assoc(mysql_query("SELECT `fileID`,`fileName`,`fileNameIs` FROM `blogattachments` WHERE `fileID`='$fileID'"));


if($checkFile['fileID'] != $fileID || !is_file($getConfigs['configValue'].$checkFile['fileNameIs']))
{
	disconnectDatabase($dbc);
	die('Invalid access.');
}

$update = mysql_query("UPDATE `blogattachments` SET `fileHits`=fileHits+1 WHERE `fileID`='$fileID'");
disconnectDatabase($dbc);

downloadFile($getConfigs['configValue'].$checkFile['fileNameIs'],$checkFile['fileName']);

?>