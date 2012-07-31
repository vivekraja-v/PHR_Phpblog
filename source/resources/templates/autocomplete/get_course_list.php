<?php
$url= getcwd();
$urlsplit = explode("\\",$url);
$foldername=$urlsplit[3];
include($_SERVER['DOCUMENT_ROOT']."/".$foldername."/config.php");

$q = strtolower($_GET["q"]);
if (!$q) return;

$sql = "select DISTINCT course_name as course_name from course where course_name LIKE '%$q%'";
$rsd = mysql_query($sql);
while($rs = mysql_fetch_array($rsd)) {
	$cname = $rs['course_name'];
	echo "$cname\n";
}
?>
