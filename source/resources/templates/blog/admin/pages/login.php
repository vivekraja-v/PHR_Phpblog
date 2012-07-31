  <script>
  $(document).ready(function(){
    $("#login").validate();
  });
  </script><?php
/*
If not logged in, display login form,
otherwise, display welcome message
*/

if($isAdmin == false) { ?>

    <div class=" padding80px">
    <div>&nbsp;</div>
     <div class=" padding80px">
		<?php if($_GET['success'] =="success" ) {
		$msg =  "Your registration was successful, Now you can login";
		?>
		<div align="center"><strong><font color="#FF0000" size="2"> &nbsp; <?php echo $msg; ?> </font></strong></div>
		<?php } ?>
     	<div class="minheight">
    	<div class="login">
            <div class="reg1" >If you are new user login  try to register first and participate in the grouped community 
            </div>
            <div class="reg2">
                <div><img src="../../../../public_html/images/blogtheme/login.jpg" /></div>
                <form name="login" id="login" method="post" action="index.php" style="display:inline;">
                <div class="text-reg">User email</div>
                <div class="text-reg"> <input name="adminEmail" type="text" id="adminEmail" class="required email log-txtbox" value="<?php echo $_POST['adminEmail'];?>"></div>
                <div class="text-reg">User password</div><div class="text-reg"> <input name="adminPassword" type="password" id="adminPassword" class="required log-txtbox"> </div>
                <div align="right" class="text-submit" ><input name="submitName" type="hidden" id="submitName" value="login"> 
                <input type="submit" name="Submit" value="Submit" class="btn primary"></div>
                </form>
            </div>
       </div> 
       <div class="reply-title">&nbsp;</div>
       </div>
       </div>
       </div>
<?php } else {
 ?>
 
 <div >
 <div class="welcome-text">
    Welcome to the user control panel. Please select your option from the left hand menu.
</div> 
</div>
<?php } ?>


 