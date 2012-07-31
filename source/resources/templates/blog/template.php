<script language="javascript">

function resize(which, maxsize) {
	var elem = document.getElementById(which);
	if (elem == undefined || elem == null) return false;
	if (maxsize == undefined) maxsize = 500;
	if (elem.width > elem.height) {
	if (elem.width > maxsize) elem.width = maxsize;
	} else {
	if (elem.height > maxsize) elem.height = maxsize;
	}
}
</script>
 	<?php
	echo $MAINBODY
	?>
	
 <div id="leftcontent">
  <?php
  
		include('pages/showcats.php');	
	
		include('pages/showdates.php');	
	
  ?>