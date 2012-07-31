<script src="../../public_html/js/lib/jquery-1.3.2.min.js"></script>
<script src="../../public_html/js/blog/jquery-latest.js"></script>

	<style type="text/css">
		label { width: 10em; float: left; }
		label.error { float: none; color: red; padding-left: .5em; vertical-align: top; }
		p { clear: both; }
	</style>
	<script>
	  $(document).ready(function(){
		$("#posts").validate();
	  });
	</script>

<?php
session_start();
include("../../../../../path.php");
include("../../../../../config.php");
// topics listing
$getList = "SELECT * FROM `blogtopics`";

// Are we viewing a topic
if($_POST['topicID'] != NULL){$_GET['topicID'] = $_POST['topicID'];}
list($topicID) = cleanInputs($_GET['topicID']);
$doAdd = false;
if($topicID != NULL)
{
	$getList .= " WHERE `topicID`='$topicID'";
	$doAdd = true;
}

// Are we searching
list($searchTerm,$searchIn) = cleanInputs($_GET['searchTerm'],$_GET['searchIn']);

if($searchTerm != NULL)
{
	if($doAdd == true){ $getList .= " AND ";}else{$getList .= " WHERE ";}
	switch($searchIn)
	{
		case 1: $getList .= " `topicTitle` LIKE '%$searchTerm%'";break;
		case 2: $getList .= " `topicText` LIKE '%$searchTerm%'";break;
		case 3: $getList .= " `topicTitle` LIKE '%$searchTerm%' OR `topicText` LIKE '%$searchTerm%'";break;
	}
}

// Showing by category
settype($_GET['catID'],"integer");
if($_GET['catID'] > 0)
{
	if($doAdd == true || $searchTerm != NULL){
		$getList .= " AND `catID`='$_GET[catID]'";
	}else{
		$getList .= " WHERE `catID`='$_GET[catID]'";
	}
}

// Showing by date
list($date) = cleanInputs($_GET['date']);
if($date != NULL)
{
	if($doAdd == true || $searchTerm != NULL || $_GET['catID'] > 0){
		$getList .= " AND (`topicCreated` >= '$date' AND `topicCreated` <= '".str_replace('-00','-31',$date)."')";
	}else{
		$getList .= " WHERE (`topicCreated` >= '$date' AND `topicCreated` <= '".str_replace('-00','-31',$date)."')";
	}
}

$isCount = mysql_query($getList);
$displayLimit = '10';
echo $itemsCount = mysql_num_rows($isCount);
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
$getCats = mysql_query("SELECT `catID`,`catTitle` FROM `catlist`");
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
$pageOnLoad = false;
?>

 <div class="container-padding80px">
     <div id="container">
		<?php
        // System message from submits
        if($_GET['success'] =="success" ) { ?>
        <div align="center"><strong><font color="#FF0000" size="2"> &nbsp; <?php echo ""; ?> </font></strong></div>
        <div align="center"> &nbsp;</div>
        <?php } ?>
     	<div id="content">

<form name="posts" id="posts" method="post" action="?view=blog&page=main&topicID=<?php echo $_GET['topicID'];?>" style="display:inline;">
<?php if($_GET['topicID']!="") {  $addreply = "[<a href='#add'>Add reply</a>]"; } ?>
<div class="topic">Topics <?php echo $addreply; ?> </div>
		<?php
			  if($_GET['topicID'] != NULL){?>
             <strong><a href="index.php"><font size="2">Back to topic list</font></a> </strong>
			  <?php } ?>

	    <?php
	if($itemsCount <= 0){
	?>
    <div align="center">There are no blog posts here<?php if($searchTerm != NULL){ echo ' Matching <strong>'.$searchTerm.'</strong>'; } ?>.</div>
	<?php } ?>
	  <?php
	if($itemsCount > $displayLimit){
	?>
   <div align="center"><font size="2"><?php
	if($_GET['page'] != NULL)
	{
		$add = '?page='.$_GET['page'];
	} else {
		$add = '?p=t';
	}

	$doNotListArray = array('start','page');

	foreach($_GET as $is => $what){
	    if(!in_array($is,$doNotListArray)){        $add .= "&$is=$what"; }
	}
	$add .= '&view=blog&start=';

	//To display the numbering anywhere under the page use this code//
	if($itemsCount > $displayLimit){
    $currentPage = ($start/$displayLimit)+1;

	$startPage = $currentPage - 3;
	if($startPage <=0 ){$startPage=1;}
	$endPage = $startPage + 7;
	if($endPage > $pageCount){$endPage = $pageCount;}
    //Do we need to print <<
	if($start > 1){
		$firstStart = $start - ($displayLimit*8);
		if($firstStart <=0 ){$firstStart=0;}
		$thisAdd = "$add";
		echo "<strong>&nbsp;<a href=\"".$thisAdd. '" title="Rewind">&lt;&lt;</a>&nbsp;</strong>';
	}
	//Do we need to print previous?
    if($currentPage != 1) {
		$thisAdd = $add.($start-$displayLimit);
        echo "<strong>&nbsp;<a href=\"".$thisAdd. '" title="Previous">&lt;</a>&nbsp;</strong>';
    }
    //Print out the numbers
    for ($i = $startPage; $i <= $endPage ; $i++) {
        if($i != $currentPage){
			$thisAdd = $add.(($displayLimit * ($i - 1)));
            echo " [<a href=\"".$thisAdd.  '" title="Page Number: '.$i.'">' . $i . '</a>] ';
			$last_start  = (($displayLimit * ($i - 1)));
        } else {
            echo '<font color="gray"> [' . $i . '] </font>';
        }
    }
    //Print out Next
    if($currentPage != $pageCount){
		$thisAdd = $add.($start+$displayLimit);
        echo  "<strong>&nbsp;<a href=\"".$thisAdd.'" title="Next">&gt;</a>&nbsp;</strong>';
    }
	//Print out >>
	if(($last_start+($displayLimit*8)) > $pageCount*$displayLimit){$showEnd = ($pageCount*$displayLimit)-$displayLimit;}else{$showEnd = ($last_start+($displayLimit*8));}
	if( ($start+$displayLimit)  < $itemsCount){
		$thisAdd = "$add$showEnd";
		echo  "<strong>&nbsp;<a href=\"".$thisAdd."\" title=\"Fast Forward\">&gt;&gt;</a>&nbsp;</strong>";
	}
}
?>
      </font></div>
	<?php } ?>
			 <?php while($eachTopic = @mysql_fetch_assoc($getFinalList)){
					 $countWords = number_format(count(explode(' ',$eachTopic['topicText'])));
					 $javaScript [] = "doChange('$eachTopic[topicID]','$countWords','1')";
					 $pageOnLoad = true;
					 $getFiles = mysql_query("SELECT * FROM `blogattachments` WHERE `topicID`='$eachTopic[topicID]'");
			  		 $countFiles = mysql_num_rows($getFiles);
			 ?>
             <div class="title"><div class="txttitle">
			 <img onClick="doChange('<?php echo $eachTopic['topicID'];?>','<?php echo $countWords;?>',1);" style="cursor:pointer;" src="../../public_html/images/blog/iconExpand.gif" id="doChanger1<?php echo $eachTopic['topicID'];?>">
			 <a href="?view=blog&topicID=<?php echo $eachTopic['topicID'];?>"><?php echo $eachTopic['topicTitle'];?> [<?php echo $catList[$eachTopic['catID']];?>]</a>
             </div></div>
   			 <div class="desc">
             <div class="desctext"><span id="doShow1<?php echo $eachTopic['topicID'];?>"><font color="#FF00FF"><?php echo $countWords;?> words</font></span></div>
			 <?php
			 if($countFiles > 0){
			 ?>
   			 <div align="right"><img src="../../public_html/images/blogtheme/download.jpg"></div>
			 <?php } ?>

			  <?php
			  // topic replies
			  $getReplies = mysql_query("SELECT * FROM `blogreplies` WHERE `topicID`='$eachTopic[topicID]' ORDER BY `replyDate` DESC");
			  $replyCount = mysql_num_rows($getReplies);
			  $Replies = ($replyCount >=2) ? "Replies" : "Reply";

			  $div = ($_GET['topicID']=="") ? "</div>" : "</div>";
			  if($replyCount > 0 && $_GET['topicID'] == $eachTopic['topicID'])
			  {
			  while($eachReply = mysql_fetch_assoc($getReplies))
			  {
			  	$countWordsReply = number_format(count(explode(' ',$eachReply['replyText'])));
				$javaScript[] = "doChange('$eachReply[replyID]','$countWordsReply','2')";
				$pageOnLoad = true;
			  ?>
			 <div class="desc-reply">
             <strong>Reply</strong><br /><br />
			 <img onClick="doChange('<?php echo $eachReply['replyID'];?>','<?php echo $countWords;?>',2);" style="cursor:pointer;" src="../../public_html/images/blog/iconExpand.gif" id="doChanger2<?php echo $eachReply['replyID'];?>">
			 <?php echo $eachReply['replyTitle'];?> [By: <?php echo $userList[$eachReply['userID']];?>] on <?php echo formatDate($eachReply['replyDate']);?><br /><br />
			 <span id="doShow2<?php echo $eachReply['replyID'];?>"><font color="#FF00FF"><?php echo $countWordsReply;?> words</font></span>
             </div>
			   <?php
			   }
			   }
			    else
				{
				?> <div class="padd8px"><div class="replytext"><a href="?view=blog&topicID=<?php echo $eachTopic['topicID'];?>"><?php echo $replyCount; ?>&nbsp;<?php echo $Replies; ?></a></div></div></div>

				<?php
			   }

			   // end replies loop
			   }  // end topics loop

			   // show files
			   if($countFiles > 0 && $_GET['topicID'] != NULL)
			   {
			   ?>
			       <fieldset>
			       <legend>Attachments:</legend>
				   <ul>
				   <?php
				   while($eachFile = mysql_fetch_assoc($getFiles)) {?>
                <li><font size="2">File: <font color="#0000FF"><?php echo $eachFile['fileTitle'];?></font> Filename: <a href="admin/download.php?fileID=<?php echo $eachFile['fileID'];?>"><?php echo $eachFile['fileName'];?></a> - <strong><?php echo number_format(filesize('admin/'.$fileLocation.$eachFile['fileNameIs']));?> Bytes</strong> [<?php echo number_format($eachFile['fileHits']);?> downloads] </font></li>
				<?php } ?>
		     		 </ul>
			       </fieldset>
			   <?php }
		if($itemsCount > $displayLimit){
	?>
    <div align="center"><?php include('admin/includes/pagination.php');?></div>
	<?php }
		if($doAdd == true)
		{
		?>
          <div class="reply-caption" >Add reply <a name="add"></a></div>
          <div class="reply-info">
          	<img src="../../public_html/images/blogtheme/notice.jpg">Registration is require to add reply
          </div>
              <?php
					if($_SESSION['userID']=="")
					{
						$showButton = '<div class="reply-title"><input type="submit" class="btn primary" name="Submit2" value="Reply"></div><div class="new-user"><strong><a href="index.php?view=register">New user? Register for an account then Reply</a></strong></div>';
					}
				?>
              <div class="reply-title">Reply title: <span class="star">*</span> &nbsp;<input name="replyTitle" type="text" id="replyTitle" class="required" value="<?php echo $_POST['replyTitle'];?>"></div>
              <div class="reply-text">Reply text:  <span class="star">*</span> &nbsp;<textarea name="replyText"  rows="10" id="replyText"><?php echo $_POST['replyText'];?></textarea></div>
              <div class="reply-note"><img src="../../public_html/images/blogtheme/notice.jpg">
                        <?php
					   if($allowBBCode == 1){
							echo 'Allowed BBCode: b,i,u,img,url,align,mail,font,size,color,code,br.';
						 } else {
							echo 'BBCode is not allowed.';
						}
						echo ' Maximum words: '.$maxWords;
						?>
                  </div>
           <div style="width:100%">
           	<div style="width:12%; float:left">&nbsp;</div>
            <div style="width:88%; float:left"><input name="topicID" type="hidden" id="topicID" value="<?php echo $_GET['topicID'];?>">
                  <input name="submitName" type="hidden" id="submitName" value="main">
                  <?php if($_SESSION['userID']!="") { ?><input type="submit" name="Submit" value="Submit" class="btn primary"><?php } ?>
				  <!--<br /><br />
				  <input type="submit" name="Submit3" value="Forgot password? Click here to get your password.">-->
              <?php echo $showButton;?>
             </div>
              </div>
		<?php
		}
	?>
</form>
</div>
</div>
<div class="space">&nbsp;</div>
<script language="javascript">
// Javascript show topic text changer

function doChange(topicID,numberWords,isTopic)
{
	// Get image name - basename
	var currentState = document.getElementById('doChanger'+isTopic+topicID).src;
	currentState = currentState.replace( /.*\//, "" );

	// Are we collapsing or expanding
	if(currentState == 'iconExpand.gif')
	{
		document.getElementById('doChanger'+isTopic+topicID).src = '../../public_html/images/blog/iconCollapse.gif';
		xmlhttpPost(topicID,isTopic);
	} else {
		document.getElementById('doChanger'+isTopic+topicID).src = '../../public_html/images/blog/iconExpand.gif';
		// remove Text
		document.getElementById('doShow'+isTopic+topicID).innerHTML = '<font color="#FF00FF">'+numberWords+' words</font>';
	}
}

// Ajax method to return post topic
function xmlhttpPost(topicID,isTopic) {
	var strURL = '../../resources/templates/blog/getPost.php';
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

<?php
// Display posts/replies each every 1 second
	foreach($javaScript as $sub => $curStatement)
	{
		echo 'setTimeout("'.$curStatement.'",'.($sub+1).'000);'.PHP_EOL;
	}
?>
</script>