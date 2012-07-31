<?php
include("../../../path.php");
include("../../../config.php");

/*if($_GET['status']=="fail")
{
	$message="Invalid login";
}*/
session_start();

$dbc = connectDatabase();
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$adminEmail=$_POST['adminEmail'];
	$adminPassword=$_POST['adminPassword'];
	if($adminEmail!="" && $adminPassword!="")
	{
		$sql="SELECT * FROM `userlist` WHERE `userEmail`='$adminEmail' AND `userPassword`='$adminPassword'";
		$result=mysql_query($sql);
		$resultset=mysql_fetch_assoc($result);
		if($resultset['userID'] != '')
		{
			$userID=$resultset['userID'];
			$_SESSION['userID']=$userID;
			header("location: ../../../public_html/blog/index.php");
		}
	}
	else
	{
		$message="Invalid login";
		//header("location: index.php?view=login & status=fail");
	}
}
else
{
	$message="Invalid login";
	// header("location: index.php?view=login & status=fail");
}

?>
<script src="../../../public_html/js/lib/jquery-1.3.2.min.js"></script>
<script src="../../../public_html/js/blog/jquery-latest.js"></script>
<style type="text/css">
* { font-family: Verdana;  }
label { width: 10em; float: left; }
label.error { float: none; color: red; padding-left: .5em; vertical-align: top; }
p { clear: both; }
.submit { margin-left: 12em; }
em { font-weight: bold; padding-right: 1em; vertical-align: top; }
</style>
  <script>
  $(document).ready(function(){
    $("#login").validate();
  });
  </script>

<table width="790"  border="1" align="center" cellpadding="5" cellspacing="0" bordercolor="#666666">
<tr>
    <td colspan="2" bgcolor="#666666"><div align="center"><a href="index.php?view=blog"><strong><font color="#FFFF00" size="5">Simple Blog</font></strong></a></div></td>
  </tr>
<tr>
	<td>
        <form name="login" id="login" method="post" action="index.php?view=login" style="display:inline;">
            <table width="100%"  border="1" cellpadding="10" cellspacing="0" bordercolor="#00B0B0">
                <tr bgcolor="#E1FFFF">
                  <td colspan="2"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td><font size="2"><strong>login </strong></font></td>
                      <td><div align="right">&nbsp;</div></td>
                    </tr>
                  </table>            </td>
              </tr>
                <tr>
                  <td width="50%"><font size="2">Email: </font></td>
                  <td width="50%"><font size="2"><input name="adminEmail" type="text" id="adminEmail" class="required email" ></font></td>
                </tr>
                <tr>
                  <td width="50%"><font size="2">Password: </font></td>
                  <td width="50%"><font size="2"><input name="adminPassword" type="password" id="adminPassword" class="required"></font></td>
                </tr>
                <tr>
                  <td colspan="2"><div align="center">
                    <input name="submitName" type="hidden" id="submitName" value="login">
                    <input type="submit" name="Submit" value="Submit">
                    </div></td>
                </tr>
          </table>
        </form>
       </td>
      </tr>
     </table>
