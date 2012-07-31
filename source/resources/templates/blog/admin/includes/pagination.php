<table width="100%" border="0" align="center" cellpadding="5" cellspacing="0">
  <tr>
    <td><div align="center"><font size="2"><?php
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
	$add .= '&start='; 

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
      </font></div></td>
  </tr>
</table>