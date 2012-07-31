<?php
session_start();
include("../../../../../path.php");
include("../../../../../config.php");

// Check logged in
if($isAdmin == false) {die('Invalid access.');}

// Check for category update
$showTitle = 'Add new';
if($_GET['catID'] != NULL)
{
	list($catID) = cleanInputs($_GET['catID']);
	$getUser = mysql_fetch_assoc(mysql_query("SELECT * FROM `catlist` WHERE `catID`='$catID'"));
	$_POST = $getUser;
	if($_POST['catID'] == $_GET['catID']){ $showTitle = 'Edit';}
}

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

// Category listing
$getList = "SELECT * FROM `catlist` $query";
$isCount = mysql_query($getList);
$displayLimit = '10'; 
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
$getFinalList = mysql_query($getList . " ORDER BY `catID` DESC LIMIT $start,$displayLimit");
?>
</div>
<div id="post-content">
<form name="cats" id="cats" method="post" action="index.php?page=categories&catID=<?php echo $_POST['catID'];?>" style="display:inline;">
          <div class="topic">Categories [<a href="index.php?page=categories#add">Add</a>] </strong></div>
     
	  <?php
	if($itemsCount > $displayLimit){
	?>
    <div align="center"><?php include('includes/pagination.php');?></div>
	<?php } ?>
			 <?php while($eachCat = mysql_fetch_assoc($getFinalList)){?>
			<div class="posttopic-desc"><?php echo $eachCat['catTitle'];?></div>
			<div class="desctext" > <?php echo $eachCat['catDesc'];?></div>
			<div class="desctext size14px" align="right"><a href="index.php?page=categories&catID=<?php echo $eachCat['catID'];?>"><img src="<?php echo  $admin_workimage; ?>edit.png" border="0"> Edit &nbsp; </a> - <a style="cursor:pointer;"onClick="if(window.confirm('Are you sure you want to delete category: <?php echo $eachCat['catTitle'];?>?')){this.href='index.php?page=categories&submitName=categories&do=remove&catID=<?php echo $eachCat['catID'];?>';}"><img src="../../../../public_html/images/blog/delete.gif"> Delete &nbsp; </a></div>
			<?php } ?>
			
		
		<?php
	if($itemsCount > $displayLimit){
	?>
      <div align="center"><?php include('includes/pagination.php');?></div>

	<?php } ?>	
       <div class="posttopic size16px"><?php echo $showTitle;?> category: <a name="add"></a></div>
         <div class="posttopic">
        	<div class="newtopic">Category name: &nbsp; &nbsp;</div>
            <div ><input name="catTitle" type="text" id="catTitle" maxlength="50" class="log-txtbox" value="<?php echo $_POST['catTitle'];?>"></div>
          </div> 
          <div class="posttopic">
          	<div class="newtopic">Category description: &nbsp; &nbsp; </div>
            <div><textarea name="catDesc" id="catDesc"><?php echo $_POST['catDesc'];?></textarea></div>
           </div> 
           <div class="posttopic" style="padding:100px 0 0 0">
                <input name="catID" type="hidden" id="catID" value="<?php echo $_POST['catID'];?>">
                <input name="submitName" type="hidden" id="submitName" value="categories">
                <div class="newtopic">&nbsp;</div>
                <div><input type="submit" name="Submit" value="Submit" class="btn primary"></div>
           </div>
</form>
</div>
