<?php


// Are we connected to database?
if(!$getList){ die('Invalid access.');}

?>
  <div class="topic">Categories</div>
  <div class="topiccat-item">
   <ul>
<?php
	if($searchIn != NULL){ $addURL = '&searchTerm='.$searchTerm.'&searchIn='.$searchIn;}
	if(count($catList) > 0)
	{
		foreach($catList as $catID => $catName)
		{
			$getCount = mysql_fetch_row(mysql_query("SELECT COUNT(*) FROM `blogtopics` WHERE `catID`='$catID'"));
			echo '<li class="cateitem"><a href="?catID='.$catID.$addURL.'& view=blog">'.$catName.'</a> ('.$getCount[0].') </li>';
		}
	}
	?>
    </ul>
</div>     	
                
               