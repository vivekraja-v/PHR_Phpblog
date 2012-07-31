<?php


// Check logged in
if($isAdmin == false) {die('Invalid access.');}

// If reposting, we need to get the site configurations again
if($_POST['submitName'] != NULL)
{
	// Get configurations
	$getConfigs = mysql_query("SELECT * FROM `siteconfig`");
	while($eachConfig = mysql_fetch_assoc($getConfigs)){${$eachConfig['configName']} = $eachConfig['configValue'];}
}
?>
</div>
<div id="post-content">
<form name="config" id="config" method="post" action="index.php?page=configurations" style="display:inline;">
         <div class="posttopic size16px">Site configurations</div>
         <div class="posttopic">
         	<div class="config-topic">Site name: &nbsp; &nbsp;</div>
            <div ><input name="siteName" type="text" class="log-txtbox" id="siteName" value="<?php echo $siteName;?>"></div>
         </div> 
        <div class="posttopic">
        	<div class="config-topic">Site URL: &nbsp; &nbsp;</div>
          	<div><input name="siteURL" type="text" class="log-txtbox" id="siteURL" value="<?php echo $siteURL;?>"></div>
        </div> 
         <div class="posttopic">
        	<div class="config-topic"> Site email: &nbsp; &nbsp;</div>
         	<div><input name="siteEmail" type="text" class="log-txtbox" id="siteEmail" value="<?php echo $siteEmail;?>"></div>
        </div>
        <div class="posttopic">
        	<div class="config-topic">Allow blog search: &nbsp; &nbsp;</div>
          	<div>
        <?php if($allowSearch == 1){$sel = ' checked';}else{$sel=NULL;} ?>
        <input name="allowSearch" type="radio" value="1"<?php echo $sel;?>>
        Yes
        <?php if($allowSearch == 0){$sel = ' checked';}else{$sel=NULL;} ?>
        <input name="allowSearch" type="radio" value="0"<?php echo $sel;?>>
        No
        </div>
       </div> 
        <div class="posttopic">
        	<div class="config-topic">Show category listings: &nbsp; &nbsp;</div> 
            <div>
			<?php if($showCats == 1){$sel = ' checked';}else{$sel=NULL;} ?>
            <input name="showCats" type="radio" value="1"<?php echo $sel;?>>
            Yes
            <?php if($showCats == 0){$sel = ' checked';}else{$sel=NULL;} ?>
            <input name="showCats" type="radio" value="0"<?php echo $sel;?>>
            No
           </div>
         </div> 

        <div class="posttopic">
        	<div class="config-topic"> Show listings by date: &nbsp; &nbsp;</div> 
         	<div>
				<?php if($showDates == 1){$sel = ' checked';}else{$sel=NULL;} ?>
                <input name="showDates" type="radio" value="1"<?php echo $sel;?>>
                Yes
                <?php if($showDates == 0){$sel = ' checked';}else{$sel=NULL;} ?>
                <input name="showDates" type="radio" value="0"<?php echo $sel;?>>
                No
            </div>
           </div> 
        <div class="posttopic">
        	<div class="config-topic"><img src="images/notice.jpg" border="0" alt=""></div>  
            <div>The site name and URL are used for the email templates.</div>
          </div>
          
          
          <div class="size14px"><strong>User management</strong></div>
        
        <div class="posttopic">
        	<div class="config-topic"> Allow user registration: &nbsp; &nbsp;</div>  
         	<div>
				<?php if($allowRegistration == 1){$sel = ' checked';}else{$sel=NULL;} ?>
                <input name="allowRegistration" type="radio" value="1"<?php echo $sel;?>>
                Yes
                <?php if($allowRegistration == 0){$sel = ' checked';}else{$sel=NULL;} ?>
                <input name="allowRegistration" type="radio" value="0"<?php echo $sel;?>> 
                No
            </div> 
           </div> 
          <div class="posttopic">
        	<div class="config-topic"> Require email verification for new accounts: &nbsp; &nbsp;</div>  
         	<div>
				<?php if($requireVerification == 1){$sel = ' checked';}else{$sel=NULL;} ?>
                <input name="requireVerification" type="radio" value="1"<?php echo $sel;?>>
                Yes
                <?php if($requireVerification == 0){$sel = ' checked';}else{$sel=NULL;} ?>
                <input name="requireVerification" type="radio" value="0"<?php echo $sel;?>>
                No
               </div>
           </div> 
        <div class="posttopic">
        	<div class="config-topic"> Allow anonymous (guest) replies:  &nbsp; &nbsp;</div>  
         	<div>
				<?php if($allowGuest == 1){$sel = ' checked';}else{$sel=NULL;} ?>
                <input name="allowGuest" type="radio" value="1"<?php echo $sel;?>>
                Yes
                <?php if($allowGuest == 0){$sel = ' checked';}else{$sel=NULL;} ?>
                <input name="allowGuest" type="radio" value="0"<?php echo $sel;?>>
                No
                </div>
            </div>
        <div class="posttopic">
        	<div class="config-topic"> Allow BBCode in replies: &nbsp; &nbsp;</div> 
          	<div>
        
			<?php if($allowBBCode == 1){$sel = ' checked';}else{$sel=NULL;} ?>
            <input name="allowBBCode" type="radio" value="1"<?php echo $sel;?>>
            Yes
            <?php if($allowBBCode == 0){$sel = ' checked';}else{$sel=NULL;} ?>
            <input name="allowBBCode" type="radio" value="0"<?php echo $sel;?>>
            No
            </div>
           </div> 
          <div class="posttopic">
        	<div class="config-topic"> Maximum word count: &nbsp; &nbsp;</div> 
          	<div><input name="maxWords" type="text" class="log-txtbox" id="maxWords" value="<?php echo $maxWords;?>"></div>
           </div>
           <div class="posttopic">
        	<div class="config-topic">  File upload directory for attachments:  &nbsp; &nbsp;</div>  
          	<div><input name="fileLocation" type="text" class="log-txtbox" id="fileLocation" value="<?php echo $fileLocation;?>"></div>
           </div>
            <div class="posttopic">
            <div class="config-topic"><img src="images/notice.jpg" border="0" alt=""></div> 
            <div>Disabling user registration and anonymous replies only gives administrator access to replies.</div>
          </div>
           <div class="size14px"><strong>Email template  management</strong></div>
        <div class="posttopic">
            <div class="config-topic">Account registration subject: &nbsp; &nbsp; </div> 
          	<div><input name="registerTemplateSubject" type="text" class="log-txtbox" id="registerTemplateSubject" value="<?php echo $registerTemplateSubject;?>"></div>
           </div> 
         <div class="posttextarea">
            <div class="config-topic">Account registration template: &nbsp; &nbsp; </div> 
          	<div><textarea name="registerTemplate"  rows="8" id="registerTemplate"><?php echo $registerTemplate;?></textarea></div>
        </div>
        <div class="posttextarea">
            <div class="config-topic"> Forgot password subject :  &nbsp; &nbsp;</div> 
          	<div><input name="forgotTemplateSubject" type="text" class="log-txtbox" id="forgotTemplateSubject" value="<?php echo $forgotTemplateSubject;?>"></div>
           </div> 
        <div class="posttextarea">
            <div class="config-topic"> Forgot password template : &nbsp; &nbsp; </div> 
         	<div><textarea name="forgotTemplate"  rows="8" id="forgotTemplate"><?php echo $forgotTemplate;?></textarea></div>
        </div> 
       <div class="posttopic">
            <div class="config-topic"><img src="images/notice.jpg" alt="" border="0"></div>
             <div>Available template variables [enclosed in percentage sign]: %userName%, %userPassword%, %userEmail, %siteName%, %siteURL%, %userStatus%.</div>
          </div>
           <div class="posttopic">
            <div class="config-topic">&nbsp;</div>
       		<div>
            <input name="submitName" type="hidden" id="submitName" value="configurations">
            <input type="submit" name="Submit" value="Submit" class="btn primary"> 
            </div>
            </div>
</form>
</div>