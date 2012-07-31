<?php 
$url= getcwd();
$urlsplit = explode("\\",$url);
$foldername=$urlsplit[3];
include($_SERVER['DOCUMENT_ROOT']."/".$foldername."/path.php");
?>
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
	<link href="<?php echo $csspath; ?>bootstrap-1.2.0.css" rel="stylesheet">
    <link href="<?php echo $csspath; ?>prettify.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo $csspath; ?>style.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo $csspath; ?>experiment.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $csspath_auto; ?>jquery.autocomplete.css" />

	
	<script src="http://code.jquery.com/jquery-1.5.2.min.js"></script>
    <script src="http://autobahn.tablesorter.com/jquery.tablesorter.min.js"></script>
    <style type="text/css">a#vlb{display:none}</style>
    <script type="text/javascript" src="<?php echo $js_pathlib;?>jquery.js"></script>
    <script type="text/javascript" src="<?php echo $js_pathlib;?>slider.js"></script>
    <script type="text/javascript" src="<?php echo $js_pathlib;?>jquery.validate.js"></script>
    <script type="text/javascript" src="<?php echo $js_pathlib;?>validate.js"></script>
    <script type="text/javascript" src="<?php echo $js_path;?>jquery.autocomplete.js"></script>

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="<?php echo $image_path; ?>/favicon.ico">
    <link rel="apple-touch-icon" href="<?php echo $image_path; ?>/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo $image_path; ?>/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo $image_path; ?>/apple-touch-icon-114x114.png">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  

  <style type="text/css">
  body {
	background-image: url(../../public_html/images/theme/body_bg.png);
	background-repeat: repeat-x;
	width:100%

}
  </style>
  <script type="text/javascript">
	$().ready(function() {
		$("#course").autocomplete("<?php echo $serverPath; ?>/resources/templates/autocomplete/get_course_list.php", {
			width: 260,
			matchContains: true,
			//mustMatch: true,
			//minChars: 0,
			//multiple: true,
			//highlight: false,
			//multipleSeparator: ",",
			selectFirst: false
		});
	});
	</script>

  </head>

<body>

    <div class="topbar-wrapper" style="z-index: 5;">
    <div class="topbar">
    <div class="header">
        <div class="logo">
         <a href="#"><img src="<?php echo $image_path; ?>/logo.png" alt="Phresco Framework" width="131px" height="65px"/></a>
        </div>
        </div>

      <div class="topbar-inner">
       <div class="container">
          <ul class="nav">
			<!--<li><a href="main.html"><img src="images/phresco.png" alt="Phresco Framework" height="20px"/></a></li>-->
            <li class="active"><a href="?page=home">Home</a></li>
            <li><a href="#">Application</a></li>
			<li><a href="#">Documentation</a></li>
            <li><a href="#">About Us</a></li>
          </ul>
          <form autocomplete="off" action="#">
            <input type="text" placeholder="Search" maxlength="50" id="course" />
            <a href="javascript:search();"><img src="<?php echo $image_path; ?>/search_icon.png" width="21" height="22"  /></a>
               <!--<a class="gobtn" href="#">GO</a>-->
          </form>
          <ul class="nav secondary-nav">
            <li class="dropdown">
			<div id="wrapper">
              <a href="#example" class="openModal">Login</a>
			<aside id="example" class="popup">
				<div>
					<div class="login">
						<p class="labeltag"><span>Username</span>
							<input type="text" id="username" name="username" size="15">
							<br></p>
							<p class="labeltag"> <span>Password</span>
							<input type="password" id="password" name="password" size="15">
							<br></p>
							<input type="button" value="Login" name="login" class="redbtn">
						<div class="loginlinks"><a href="#" class="spacing">Forgot password</a> | <a href="#" class="spacing"> Register </a></div>
				</div>
				<a title="Close" href="#close">&nbsp;</a></div>
			</aside>
			</div>
            </li>
          </ul>
        </div>
      </div><!-- /topbar-inner -->
    </div><!-- /topbar -->
  </div> <!-- /topbar-wrapper -->
