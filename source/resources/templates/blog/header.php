<?php
session_start();
include("../../../path.php");
$dbc = connectDatabase();
$userID=$_SESSION['userID'];
$checkInfo = mysql_fetch_assoc(mysql_query("SELECT * FROM `userlist` WHERE `userID`='$userID'"));
$userName=$checkInfo['userName'];

$logmsg = ($_SESSION['userID']=="") ? "login" : "logout";
$filename = ($_SESSION['userID']=="") ? "index" : "logoff";
$register = ($_SESSION['userID']=="") ? "Register" : "Dashboard";
$filenamereg = ($register=="Register") ? "../../public_html/blog/index.php?view=register" : "../../resources/templates/blog/admin/index.php?page=posts";
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
	<link href="../../public_html/css/blogtheme/bootstrap-1.2.0.css" rel="stylesheet">
  <link href="../../public_html/css/blogtheme/style.css" rel="stylesheet" type="text/css" />
  <script src="../../public_html/js/lib/jquery-1.3.2.min.js"></script>
  <script src="../../public_html/js/blog/jquery-latest.js"></script>

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="images/favicon.ico">

  </head>

  <body>

    <div class="topbar-wrapper" style="z-index: 5;">
    <div class="topbar">
      <div class="topbar-inner">
        <div class="container">
        <div id="header">
        <div class="logpos-rel" >
            <div class="logo logopos-abs"><a href="index.php?view=blog"><img src="../../public_html/images/blogtheme/logo.png" border="0" alt="" /></a></div>
         </div>
         <div class="logo" >&nbsp;</div>
          <ul class="nav">
           <li class="display-username"><?php if($_SESSION['userID']!="") { ?>Welcome <?php echo $userName; ?><?php } ?></li>
           <li class="blog"><img src="../../public_html/images/blogtheme/blogimg.gif" border="0" alt=""  /></li>
            <li class="arial12px"><a href="index.php?view=blog">Blog posts</a></li>
          <!--  <li class="blog"><img src="../../public_html/images/blogtheme/blogimg.gif" border="0" alt=""  /></li>-->
            <li class="arial12px"><a href="../../resources/templates/blog/admin/index.php?page=posts"><?php echo $dashboard; ?></a></li>
            <li class="divderimg"><img src="../../public_html/images/blogtheme/divder.gif" border="0" alt=""  /></li>

            <li class="blog"><img src="../../public_html/images/blogtheme/register.png" border="0" alt=""  /></li>
            <li class="arial12px"><a href="<?php echo $filenamereg; ?>"><?php echo $register; ?></a></li>
            <li class="divderimg"><img src="../../public_html/images/blogtheme/divder.gif" border="0" alt=""  /></li>
            <li class="blog"><img src="../../public_html/images/blogtheme/avator-icon.gif" border="0" alt=""  /></li>
            <li class="arial12px"><a href="../../resources/templates/blog/admin/<?php echo $filename; ?>.php"><?php echo $logmsg; ?></a></li>
          </ul>
        </div>
        </div>
      </div>
      <div id="submitrow">
      <?php if($_GET['view']!="register") { ?>
      	<form name="search" id="search" method="get" action="index.php">
        <div class="emptydiv">&nbsp;</div>
        <div class="search">Search <input name="searchTerm" type="text" style="background-color:#FFFFFF" id="searchTerm" value="<?php echo $searchTerm;?>" ></div>
        <div class="input select"><select name="searchIn" id="searchIn" class="selectbox" >
			  <?php if($searchIn == 1 || $searchIn == NULL){$sel=' selected';}else{$sel = NULL;}?>
                <option value="1"<?php echo $sel;?>>Topic Title</option>
				<?php if($searchIn == 2){$sel=' selected';}else{$sel = NULL;}?>
                <option value="2"<?php echo $sel;?>>Topic Body</option>
				<?php if($searchIn == 3){$sel=' selected';}else{$sel = NULL;}?>
                <option value="3"<?php echo $sel;?>>Both</option>
              </select>
                <input type="hidden" name="view" value="blog">
              </div>
         <div class="input submit"><input type="submit" name="Submit" value="Submit"  class="btn primary"></div>
         </form>
         <?php } ?>
    	</div><!-- /topbar-inner -->
    </div><!-- /topbar -->
  </div><!-- /topbar-wrapper -->
