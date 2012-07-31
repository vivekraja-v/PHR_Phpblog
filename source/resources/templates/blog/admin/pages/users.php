<?php


// Check logged in
if($isAdmin == false) {die('Invalid access.');}

// Check for user update
$showTitle = 'Add new';
if($_GET['userID'] != NULL)
{
	list($userID) = cleanInputs($_GET['userID']);
	$getUser = mysql_fetch_assoc(mysql_query("SELECT * FROM `userlist` WHERE `userID`='$userID'"));
	$_POST = $getUser;
	if($_POST['userID'] == $_GET['userID']){ $showTitle = 'Edit';}
}

// User listing
$userID=$_SESSION['userID'];
$checkInfo = mysql_fetch_assoc(mysql_query("SELECT * FROM `userlist` WHERE `userID`='$userID'"));
$userName=$checkInfo['userName'];
$role=$checkInfo['role'];
if($role=="admin")
{
	$query="";
}
else
{
	$query="where userID=$userID";
}


$getList = "SELECT * FROM `userlist` $query";
$isCount = mysql_query($getList);
$displayLimit = '50'; 
$itemsCount = @mysql_num_rows($isCount); 
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
$getUsers = mysql_query($getList . " ORDER BY `userID` DESC LIMIT $start,$displayLimit");
?>
</div>

<div id="post-content">
<form name="users" id="users" method="post" action="index.php?page=users&userID=<?php echo $_POST['userID'];?>" style="display:inline;">
<div class="topic"> <?php if($_POST['userID'] == 1) { ?> Users[<a href="index.php?page=users#add">Add</a>] <?php } else { echo "My Account"; } ?></div>
	  <?php
	if($itemsCount > $displayLimit){
	?>
   <div align="center"><?php include('includes/pagination.php');?></div>
	<?php } ?>
             <div align="left" class="user-desc desctext"><ul>
			 <?php while($eachUser = mysql_fetch_assoc($getUsers)){?>
              <li>
                <font size="2"><strong><?php echo $eachUser['userName'];?><font color="#999999">, registered on</font> <?php echo formatDate($eachUser['registerDate']);?></strong>
<?php if($role=="admin") { ?><a href="index.php?page=users&userID=<?php echo $eachUser['userID'];?>"><img src="../../../../public_html/images/blog/edit.png" border="0"> Edit </a>  - <a style="cursor:pointer;"onClick="if(window.confirm('Are you sure you want to delete user: <?php echo $eachUser['userName'];?>?')){this.href='index.php?page=users&submitName=users&do=remove&userID=<?php echo $eachUser['userID'];?>';}"><img src="../../../../public_html/images/blog/delete.gif"> Delete </a></font><?php } ?></li>
 			<?php } ?>
            </ul></div>
		<?php
	if($itemsCount > $displayLimit){
	?>
<div align="center"><?php include('includes/pagination.php');?></div>
	<?php } ?>	
<div class="posttopic size16px"><?php echo $showTitle;?> user: <a name="add"></a></div>
        <div class="user">
        	<div class="newtopic">User name:&nbsp; &nbsp; </div>
            <div><input name="userName" type="text" id="userName" class="log-txtbox" value="<?php echo $_POST['userName'];?>"></div>
        </div> 
        <div class="user">
        	<div class="newtopic">User email:&nbsp; &nbsp; </div>
            <div><input name="userEmail" type="text" id="userEmail" class="log-txtbox" value="<?php echo $_POST['userEmail'];?>"></div>
         </div> 
        <div class="user">
        	<div class="newtopic">User password:&nbsp; &nbsp; </div>
            <div><input name="userPassword" type="text" class="log-txtbox" id="userPassword" value="<?php echo $_POST['userPassword'];?>"></div>
         </div>
             
  		 <div class="user">
         	<div class="newtopic">User status:&nbsp; &nbsp;</div>
            <div style="padding-top:8px">
             <?php if($_POST['userStatus'] == '1' || $_POST['userStatus'] == NULL){ $sel= ' checked';}else{$sel=NULL;}?>
                <input name="userStatus" type="radio" value="1"<?php echo $sel;?>> Enabled
				<?php if($_POST['userStatus'] == '0'){ $sel= ' checked';}else{$sel=NULL;}?>
                <input name="userStatus" type="radio" value="0"<?php echo $sel;?>>
                Disabled 
                <?php
                $valueRandom = generate(10);
                 if($_POST['userStatus'] != '1' && $_POST['userStatus'] != '0'){ $sel= ' checked';}else{$sel=NULL;}?>
                <input name="userStatus" type="radio" value="<?php echo $valueRandom;?>"<?php echo $sel;?>>
                Requires email verification 
           </div>
          </div> 
           <div class="user">
                <input name="oldUserEmail" type="hidden" id="oldUserEmail" value="<?php echo $_POST['userEmail'];?>">
                <input name="userID" type="hidden" id="userID" value="<?php echo $_POST['userID'];?>">
                <input name="submitName" type="hidden" id="submitName" value="users">
               
         </div>
        <div class="posttopic"> <div class="newtopic">&nbsp;</div><div><input type="submit" name="Submit" value="Submit" class="btn primary"></div></div>
        
</form>
<div class="user-minheight">&nbsp;</div>
</div>

