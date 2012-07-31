<?php


// Check logged in
if($isAdmin == false) {die('Invalid access.');}

// Check for reply update
$showTitle = 'Add new';
if($_GET['replyID'] != NULL)
{
	list($replyID) = cleanInputs($_GET['replyID']);
	$getReply = mysql_fetch_assoc(mysql_query("SELECT * FROM `blogreplies` WHERE `replyID`='$replyID'"));
	$_POST = $getReply;
	if($_POST['replyID'] == $_GET['replyID']){ $showTitle = 'Edit';}
}

// Get users
$getUsers = mysql_query("SELECT `userID`,`userName` FROM `userlist`");
while($eachUser = @mysql_fetch_assoc($getUsers))
{
	$userList[$eachUser['userID']] = $eachUser['userName'];
}
$userID=$_SESSION['userID'];

?>
</div>
<div id="post-content"> 
<form name="replies" id="replies" method="post" action="index.php?page=replies&replyID=<?php echo $_POST['replyID'];?>" style="display:inline;">
  
<div class="topic"><?php echo $showTitle;?> reply: [<a href="?page=replies">Add</a>]</div>
    <div  class="posttopic"> 
        <div class="newtopic">User name: &nbsp;</div>
         <div>
        <?php
        $checkInfo = mysql_fetch_assoc(mysql_query("SELECT * FROM `userlist` WHERE `userID`='$userID'"));
        $userName=$checkInfo['userName'];
        $role=$checkInfo['role'];
        if($role=="admin")
        {
        ?>
       
         <select name="userID" id="userID"  class="log-txtbox">
        <?php
            foreach($userList as $userID => $userName)
            {
                if($userID == $_POST['userID']){ $sel = ' selected';}else{$sel=NULL;}
                echo '<option value="'.$userID.'"'.$sel.'>'.$userName.'</option>';
            }
            ?>
           </select>   
        <?php   
        }
        else
        {
        ?>
        <input name="userID" id="userID"  type="text"  value="<?php echo $userName;?>" readonly="readonly"  class="log-txtbox">
        <?php } ?>
        </div>
       </div> 
    <div  class="posttopic">
    <div class="newtopic"> Reply topic: &nbsp;</div>
    <div>
      <select name="topicID" id="topicID"  class="log-txtbox">
        <?php
        $getTopics = mysql_query("SELECT `topicID`,`topicTitle` FROM `blogtopics` where userID!=$userID");
        while($eachTopic = @mysql_fetch_assoc($getTopics))
        {
            if($eachTopic['topicID'] == $_POST['userID']){ $sel = ' selected';}else{$sel=NULL;}
            echo '<option value="'.$eachTopic['topicID'].'"'.$sel.'>'.$eachTopic['topicTitle'].'</option>';
        }
        ?>
      </select>
      </div>
     </div> 
    <div  class="posttopic">
        <div  class="newtopic">Reply title: &nbsp; &nbsp;</div>
        <div><input name="replyTitle" type="text" id="replyTitle"  class="log-txtbox" value="<?php echo $_POST['replyTitle'];?>"></div>
     </div> 
    <div class="posttextarea">
        <div class="newtopic">Reply text: &nbsp; &nbsp;</div>
        <div> <textarea name="replyText"  rows="10"   class="log-txtbox" id="replyText"><?php echo $_POST['replyText'];?></textarea></div>
    </div>
    <div class="posttopic input ">
        <div class="newtopic"> &nbsp;</div>
        <div><strong>Allowed BBCode: b,i,u,img,url,align,mail,font,size,color,code,br.</strong></div>
      </div>
    <input name="replyID" type="hidden" id="replyID" value="<?php echo $_POST['replyID'];?>">                
    <input name="submitName" type="hidden" id="submitName" value="replies">
    <input type="submit" name="Submit" value="Submit" class="btn primary">
</form>
<script language="javascript">

// Increase or decrease rows for text box
function changeRows(changeBy,inputID)
{
	document.getElementById(inputID).rows = document.getElementById(inputID).rows+parseInt(changeBy);
}

</script>