<?php
session_start();
include("../../../../../path.php");
include("../../../../../config.php");
// Check logged in
if($isAdmin == false) {die('Invalid access.');}

$session_userID=$_SESSION['userID'];
$checkInfo = mysql_fetch_assoc(mysql_query("SELECT * FROM `userlist` WHERE `userID`='$session_userID'"));
$userName=$checkInfo['userName'];
$role=$checkInfo['role'];
if($role=="admin")
{
	$query="";
}
else
{
	$query="where userID=$session_userID";
}
$getList = "SELECT * FROM `blogtopics` $query ";

// Check for topic update
$showTitle = 'Add new';
if($_GET['topicID'] != NULL)
{
	list($topicID) = cleanInputs($_GET['topicID']);
	$getTopic = mysql_fetch_assoc(mysql_query("SELECT * FROM `blogtopics` WHERE `topicID`='$topicID'"));
	$_POST = $getTopic;
	if($_POST['topicID'] == $_GET['topicID']){ $showTitle = 'Edit';}
	$txt = ($role=="admin") ? "WHERE" : "and"; 
	$getList .= " $txt `topicID`='$topicID'";
}

// topic listing
$isCount = mysql_query($getList);
$displayLimit = '10'; 
$itemsCount = mysql_num_rows($isCount); 
if($itemsCount > $display) { 
	$pageCount = ceil ($itemsCount/$displayLimit); 
} else { 
	$pageCount = 1; 
}
if(is_numeric($_GET['start'])){ 
    $start = $_GET['start']; 
} else { 
    $start = 0; 
} 
$getFinalList = mysql_query($getList . " ORDER BY `topicID` DESC LIMIT $start,$displayLimit");

// Get Categories
$getCats = mysql_query("SELECT `catID`,`catTitle` FROM `catlist` $query");
while($eachCat = @mysql_fetch_assoc($getCats))
{
	$catList[$eachCat['catID']] = $eachCat['catTitle'];
}

// Get users
$getUsers = mysql_query("SELECT `userID`,`userName` FROM `userlist`");
while($eachUser = @mysql_fetch_assoc($getUsers))
{
	$userList[$eachUser['userID']] = $eachUser['userName'];
}

?>
</div>
<div id="post-content">
<form action="index.php?page=posts&topicID=<?php echo $_POST['topicID'];?>" method="post" enctype="multipart/form-data" name="posts" id="posts" style="display:inline;">
<div class="topic">Topics [<a href="index.php?page=posts#add">Add</a>] </strong></div>
	  <?php
	if($itemsCount > $displayLimit){
	?>
      <?php include('includes/pagination.php');?>
    
	<?php } ?>
			 <?php while($eachTopic = mysql_fetch_assoc($getFinalList)){
			 		
					 $countWords = number_format(count(explode(' ',$eachTopic['topicText'])));
					 $getFiles = mysql_query("SELECT * FROM `blogattachments` WHERE `topicID`='$eachTopic[topicID]'");
			  		 $countFiles = mysql_num_rows($getFiles);
					 $javaScript[] = "doChange('$eachTopic[topicID]','$countWords','1')";
			 ?>
			<div class="posttopic-desc"> <img onClick="doChange('<?php echo $eachTopic['topicID'];?>','<?php echo $countWords;?>',1);" style="cursor:pointer;" src="../../../../public_html/images/blog/iconExpand.gif" id="doChanger1<?php echo $eachTopic['topicID'];?>">
			 <a href="index.php?page=posts&topicID=<?php echo $eachTopic['topicID'];?>"><?php echo $eachTopic['topicTitle'];?></a> [<?php echo $catList[$eachTopic['catID']];?>]</div>
   			 <div class="desctext" > <span id="doShow1<?php echo $eachTopic['topicID'];?>"><?php echo $countWords;?> words</span></div>
			 <?php
			 if($countFiles > 0){
			 ?>
   			 <img src="../../../../public_html/images/blogtheme/download.jpg">
			 <?php } ?>
			
			 
			 <div class="desctext size14px" align="right"><a href="index.php?page=posts&topicID=<?php echo $eachTopic['topicID'];?>"><img src="../../../../public_html/images/blog/edit.png" border="0"> Edit </a> - <a style="cursor:pointer;"onClick="if(window.confirm('Are you sure you want to delete topic: <?php echo $eachTopic['topicTitle'];?>?')){this.href='index.php?page=posts&submitName=posts&do=remove&topicID=<?php echo $eachTopic['topicID'];?>';}"><img src="../../../../public_html/images/blog/delete.gif"> Delete&nbsp; </a></div>
		     
			  <?php
			  // topic replies
			  $getReplies = mysql_query("SELECT * FROM `blogreplies` WHERE `topicID`='$eachTopic[topicID]' ORDER BY `replyDate` DESC");
			  $replyCount = mysql_num_rows($getReplies);
			  if($replyCount > 0 && $_GET['topicID'] == $eachTopic['topicID'])
			  {
			  	echo '</fieldset><br />';
			  while($eachReply = mysql_fetch_assoc($getReplies))
			  {
			  	$countWordsReply = number_format(count(explode(' ',$eachReply['replyText'])));
				$javaScript[] = "doChange('$eachReply[replyID]','$countWords','2')";
			  ?>
			 <div class="posttopic-desc">  
			 <img onClick="doChange('<?php echo $eachReply['replyID'];?>','<?php echo $countWords;?>',2);" style="cursor:pointer;" src="../../../../public_html/images/blog/iconExpand.gif" id="doChanger2<?php echo $eachReply['replyID'];?>">
			 <?php echo $eachReply['replyTitle'];?> [By: <?php echo $userList[$eachReply['userID']];?>] on <?php echo formatDate($eachReply['replyDate']);?></div>
			 <div class="topic-admintxt" ><span id="doShow2<?php echo $eachReply['replyID'];?>"><font color="#FF00FF"><?php echo $countWordsReply;?> words</font></span></div>
			 
			   <div class="desctext size14px" align="right"><a href="index.php?page=replies&replyID=<?php echo $eachReply['replyID'];?>"><img src="<?php echo $admin_workimage ?>edit.png" border="0"> Edit </a> - <a style="cursor:pointer;"onClick="if(window.confirm('Are you sure you want to delete reply: <?php echo $eachReply['replyTitle'];?>?')){this.href='index.php?page=posts&submitName=posts&do=remove2&replyID=<?php echo $eachReply['replyID'];?>';}"><img src="<?php echo $admin_workimage ?>delete.gif"> Delete</a></div>
		     			  
			   <?php 
			   } 
			    }
				
				else
				  {
				  ?>
                <div class="replytext"><?php echo $replyCount; ?>&nbsp;replies</div>
                <?php
			   }
			   
			   // end replies loop
			   }  // end topics loop
			   
			   ?>
               
		<?php
	if($itemsCount > $displayLimit){
	?>
    
      <?php include('includes/pagination.php');?>
    
	<?php } ?>	
        
        <div class="posttopic size16px"> <strong><?php echo $showTitle;?> topics: <a name="add"></a></strong></font></div>
            
             	<div  class="posttopic">
                		<div class="newtopic">Category name: &nbsp; </div>
             			<div >
                      
                        <select name="catID" id="catID" class="log-txtbox">
                        <?php
                        foreach($catList as $catID => $catTitle)
                        {
                            if($catID == $_POST['catID']){ $sel = ' selected';}else{$sel=NULL;}
                            echo '<option value="'.$catID.'"'.$sel.'>'.$catTitle.'</option>';
                        }
                        ?>
                      </select>
                     </div>
              </div> 
              <div class="posttopic">
              	<div class="newtopic"> User name: &nbsp; </div>
                <div>
				 <?php
                    if($role=="admin")
                    {
                    ?>
                     <select name="userID" id="userID" class="log-txtbox">
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
                    <input name="userID" id="userID"  type="text" class="log-txtbox"  value="<?php echo $userName;?>" readonly="readonly">
                    <?php } ?>
          		</div>
          </div>
          <div class="posttopic input ">
          	<div class="newtopic"> Topic title: &nbsp; </div>
            <div><input name="topicTitle" type="text" class="log-txtbox" id="topicTitle" maxlength="50" value="<?php echo $_POST['topicTitle'];?>"></div>
          </div>
           <div class="posttextarea"> 
           	<div class="newtopic">Topic text: &nbsp; </div>
            <div>
                  <textarea name="topicText"  rows="10" id="topicText"><?php echo $_POST['topicText'];?></textarea>
                  
            </div>
            <div class="posttopic input ">
                <div class="newtopic"> &nbsp;</div>
                <div><strong>Allowed BBCode: b,i,u,img,url,align,mail,font,size,color,code,br.</strong></div>
              </div>
          </div>  
                <input name="topicID" type="hidden" id="topicID" value="<?php echo $_POST['topicID'];?>">
                <input name="submitName" type="hidden" id="submitName" value="posts" >
                <input type="submit" name="Submit" value="Submit" class="btn primary">
  </form>
</div>
<script language="javascript">
// Javascript show topic text changer
<?php
// Display posts/replies each every 1 second
	foreach($javaScript as $sub => $curStatement)
	{
		echo 'setTimeout("'.$curStatement.'",'.($sub+1).'000);'.PHP_EOL;
	}
?>	
function doChange(topicID,numberWords,isTopic)
{
	// Get image name - basename
	var currentState = document.getElementById('doChanger'+isTopic+topicID).src;
	currentState = currentState.replace( /.*\//, "" );
	
	// Are we collapsing or expanding
	if(currentState == 'iconExpand.gif')
	{
		document.getElementById('doChanger'+isTopic+topicID).src = '../../../../public_html/images/blog/iconCollapse.gif';
		xmlhttpPost(topicID,isTopic);
	} else {
		document.getElementById('doChanger'+isTopic+topicID).src = '../../../../public_html/images/blog/iconExpand.gif';
		// remove Text
		document.getElementById('doShow'+isTopic+topicID).innerHTML = '<font color="#FF00FF">'+numberWords+' words</font>';
	}
}

// Ajax method to return post topic
function xmlhttpPost(topicID,isTopic) {
	var strURL = 'getPost.php';
    var xmlHttpReq = false;
    var self = this;
    // Mozilla/Safari
    if (window.XMLHttpRequest) {
        self.xmlHttpReq = new XMLHttpRequest();
    }
    // IE
    else if (window.ActiveXObject) {
        self.xmlHttpReq = new ActiveXObject("Microsoft.XMLHTTP");
    }
    self.xmlHttpReq.open('POST', strURL, true);
    self.xmlHttpReq.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    self.xmlHttpReq.onreadystatechange = function() {
        if (self.xmlHttpReq.readyState == 4) {
            document.getElementById('doShow'+isTopic+topicID).innerHTML = self.xmlHttpReq.responseText;
        }
    }
	if(isTopic == 1)
	{
	    var doSend = 'topicID='+escape(topicID);
	} else {
		var doSend = 'replyID='+escape(topicID);
	}
	self.xmlHttpReq.send(doSend);
}

// Increase or decrease rows for text box
function changeRows(changeBy,inputID)
{
	document.getElementById(inputID).rows = document.getElementById(inputID).rows+parseInt(changeBy);
}

</script>