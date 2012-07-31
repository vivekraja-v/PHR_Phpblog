<?php
	require_once("../../path.php");
	
	require_once("$baseurl"."config.php");
	
	require_once("$baseurl"."library/templateFunctions.php");
	
	$variables = array();
	

	if($_GET)
		$page = $_GET['page'];
	else
		$page = 'home';
		
	renderLayoutWithContentFile($page.".php", $variables);

?>
