<?php
include('admin/includes/functions.php');
session_start();
include("../../../path.php");
include("../../../config.php");

$dbc = connectDatabase();

	if(isset($_POST['userName']) && isset($_POST['userEmail']) && isset($_POST['userPassword']))
	{
		$userName=$_POST['userName'];
		$userEmail=$_POST['userEmail'];
		$userPassword=$_POST['userPassword'];
		$is_existed = isRegistered($userEmail);
		if($is_existed == 'no')
			{
				$userStatus = generate(10);
				$sql = "INSERT INTO `userlist` (`userName`,`userEmail`,`userPassword`,`userStatus`,`registerDate`)
				VALUES ('$userName','$userEmail','$userPassword','$userStatus',NOW())";
				$result=mysql_query($sql);
				$send = sendVerification($userName,$userEmail,$userPassword,$userStatus,
				$registerDate,$siteName,$siteURL,$siteEmail,$registerTemplate,$registerTemplateSubject);
				header("location: ../../resources/templates/blog/admin/index.php?success=success&username=".$userName);
				

			}
			else
			{
				  $message = "User Name ".$userName."  Already Exists ";
				// header("location: index.php?view=register&fail=fail");
			}
	}

function isRegistered($mail)
{
	$query_select = 'SELECT userID FROM userlist WHERE userEmail= "'.mysql_escape_string($mail).'"';
	$query_result = mysql_query($query_select);
	$query_count = mysql_num_rows($query_result);
	if ($query_count == 0)
	{
		return 'no';
	}
	else
	{
		return 'yes';
	}
}

?>
<script src="../../../../public_html/js/lib/jquery-1.3.2.min.js"></script>
<script src="../../../../public_html/js/blog/jquery-latest.js"></script>

  <script>
  $(document).ready(function(){
    $("#login").validate();
  });
  </script>

 <div class="container">
     <div id="container" class="minheight">

     	<div id="reg-content">
         <?php if($message !="" ) { ?>
         <div align="center" class="message-text"> <strong><font color="#FF0000" size="2">&nbsp; <?php echo $message;?> </font></strong></div>
         <div align="center"> &nbsp;</div>
  		<?php } ?>
    	<div class="register">
            <div class="reg1">If you are  existing user login and participate in the grouped community
            </div>
            <div class="reg2">
                <div><img src="../../public_html/images/blogtheme/register-logo.jpg" /></div>
            	<form name="login" id="login" method="post" action="index.php?view=register" style="display:inline;">
                <div class="text-reg">User name</div>
                <div class="text-reg input"><input name="userName" type="text" id="userName" class="required reg-txtbox" maxlength="30" style="width:243px;" ></div>
                <div class="text-reg">User email</div><div class="text-reg"><input name="userEmail" type="text" id="userEmail" maxlength="250" class="required email reg-txtbox" ></div>
                <div class="text-reg">User password</div><div class="text-reg"><input name="userPassword" type="password" id="userPassword" maxlength="20" class="required reg-txtbox" > </div>
                <div align="right" class="text-submit" > <input type="submit" name="Submit" value="Submit" class="btn primary"></div>
                </form>
            </div>
       </div>
       <div class="reply-title">&nbsp;</div>
       </div>

