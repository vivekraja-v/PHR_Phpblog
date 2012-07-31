<?php


// Are we connected to database?
if(!$getList){ die('Invalid access.');}

?>
<div style="height:17px">&nbsp;</div>
 <div class="topic">Date</div>   
 <div class="topiccat-item">
 	 <ul>

<?php
	if($searchIn != NULL){ $addURL = '&searchTerm='.$searchTerm.'&searchIn='.$searchIn;}
	
	// Get minimum year/month
	$startDates = mysql_fetch_assoc(mysql_query("SELECT MONTH(topicCreated) AS `startMonth`,YEAR(topicCreated) AS `startYear`
		FROM `blogtopics` ORDER BY `topicCreated` ASC LIMIT 1"));
	// Get maximum year/month
	$endDates = mysql_fetch_assoc(mysql_query("SELECT MONTH(topicCreated) AS `endMonth`,YEAR(topicCreated) AS `endYear`
		FROM `blogtopics` ORDER BY `topicCreated` DESC LIMIT 1"));
	
	$startMonth = $startDates['startMonth'];	$startYear = $startDates['startYear'];
	$endMonth = $endDates['endMonth'];	$endYear = $endDates['endYear'];
	$newYear = true;
	
	if($startMonth != NULL)
	{
	
		// Loop all dates
		while($startYear <= $endYear)
		{
			// echo year
			if($newYear == true)
			{
				echo '<br />['.$startYear.']<br/>';
				$newYear = false;
			}
			echo '<li class="dateitem"><a href="?view=blog&date='.$startYear.'-'.$startMonth.'-00'.$addURL.'">'.date("F",mktime(0, 0, 0, $startMonth, 1, $startYear)).'</a></li>';
			$startMonth++;
			if($startMonth > 12)
			{
				$startMonth = 1;
				$startYear++;
				$newYear = true;
			}
			if($startMonth > $endMonth && $startYear == $endYear){ break;}		
		}
	}
?>             
   </ul>
	   </div>
      </div> 