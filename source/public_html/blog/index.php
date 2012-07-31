<?php
	require_once("../../path.php");

	require_once("../../config.php");

	function renderLayoutWithContentFile($contentFile, $variables = array())
	{
		// making sure passed in variables are in scope of the template
		// each key in the $variables array will become a variable
		if (count($variables) > 0) {
			foreach ($variables as $key => $value) {
				if (strlen($key) > 0) {
					${$key} = $value;
				}
			}
		}

		require_once("../../resources/templates/blog/header.php");

		echo "<div id=\"container\">\n"
		   . "\t<div id=\"content\">\n";

		if (true) {
			require_once("../../resources/templates/blog/$contentFile");
		} else {
			/*
				If the file isn't found the error can be handled in lots of ways.
				In this case we will just include an error template.
			*/
			require_once("../../resources/templates/blog/error.php");
		}

		// close content div
		echo "\t</div>\n";

		//rightPanel

		// close container div
		echo "</div>\n";

		require_once("../../resources/templates/blog/footer.php");
	}

	//require_once("../../library/templateFunctions.php");

	$variables = array();

	if($_GET)
		$view = $_GET['view'];
	else
		$view = 'blog';

	renderLayoutWithContentFile($view.".php", $variables);

?>
