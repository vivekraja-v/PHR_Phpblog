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
    <link href="<?php echo $csspath_contact; ?>style.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $csspath_contact; ?>page.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $csspath_contact; ?>tipsy.css" rel="stylesheet" type="text/css" />

	
	<script src="http://code.jquery.com/jquery-1.5.2.min.js"></script>
    <script src="http://autobahn.tablesorter.com/jquery.tablesorter.min.js"></script>
    <style type="text/css">a#vlb{display:none}</style>
    <script type="text/javascript" src="<?php echo $js_pathlib;?>jquery.js"></script>
    <script type="text/javascript" src="<?php echo $js_pathlib;?>slider.js"></script>
    <script type="text/javascript" src="<?php echo $js_pathlib;?>jquery.validate.js"></script>
    <script type="text/javascript" src="<?php echo $js_pathlib;?>validate.js"></script>
    <script src="<?php echo $js_path;?>tipsy.js" type="text/javascript"></script>
    <script src="<?php echo $js_path;?>count_down.js" type="text/javascript"></script>
    <script src="<?php echo $js_path;?>comments.js" type="text/javascript"></script>

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="<?php echo $image_path; ?>/favicon.ico">
    <link rel="apple-touch-icon" href="<?php echo $image_path; ?>/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo $image_path; ?>/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo $image_path; ?>/apple-touch-icon-114x114.png">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  
  <style type="text/css">
  body 
  {
	background-image: url(../../public_html/images/theme/body_bg.png);
	background-repeat: repeat-x;
	width:100%
	}
</style>
<script>
  $(document).ready(function(){
    $("#login").validate();
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
           <li><a href="index.php?page=comments">Comments</a></li>
            
          </ul>
               <!--<a class="gobtn" href="#">GO</a>-->
          <ul class="nav secondary-nav">
            <li class="dropdown">
			<div id="wrapper">
            <a href="#example" class="openModal">Login</a>
              <form action="index.php?page=checklogin" method="post" name="login" id="login">
                <aside id="example" class="popup">
				<div>
					<!--<div class="login">-->
						<p class="login_label"><span>Username</span>&nbsp;&nbsp;
							<input type="text" id="username" name="username" size="15" class="login_input required email"></p><br>
							
							<p class="login_label"> <span>Password</span>
							<input type="password" id="password" name="password" size="15" class="login_input required"></p><br>
							
							 <input type="submit" value="Login" name="login" class="redbtn">
						<div class="loginlinks"><a href="index.php?page=forgotpassword" class="spacing">Forgot password</a> | <a href="index.php?page=register" class="spacing"> Register </a></div>
				<!--</div>-->
					<a title="Close" href="#close"></a>				</div>
			</aside>
            </form>
			</div>
            </li>
          </ul>
        </div>
      </div><!-- /topbar-inner -->
    </div><!-- /topbar -->
  </div> <!-- /topbar-wrapper -->
