	
   <?php if($_SESSION['userID']!="") {
   	$userID=$_SESSION['userID'];
	$checkInfo = mysql_fetch_assoc(mysql_query("SELECT * FROM `userlist` WHERE `userID`='$userID'"));
	$userName=$checkInfo['userName'];
	$role=$checkInfo['role'];
	$userID=$checkInfo['userID'];
	$userID = ($role=="admin") ? "" : "&userID=$userID";  ?>
   
    <div class="admin-menu" > 
    	<div style="width:300px; float:left"><a href="../../../../public_html/blog/index.php?view=blog"><img src="../../../../public_html/images/blogtheme/logo.png" border="0" alt="" /></a></div>
    	<div class="menuitem"> 
            <div><img src="../../../../public_html/images/blogtheme/home.png" alt="" border="0"></div>
            <div><a href="../../../../public_html/blog/index.php">Home</a></div>
        </div>
        <div class="menuitem"> 
            <div><img src="../../../../public_html/images/blogtheme/posts.png"></div>
            <div><a href="?page=posts">Blog posts</a></div>
        </div>
        <div class="menuitem"> 
            <div><img src="../../../../public_html/images/blogtheme/categories.png"></div>
            <div><a href="?page=categories">Categories</a></div>
        </div>
        <div class="menuitem"> 
            <div><img src="../../../../public_html/images/blogtheme/users.png"></div>
            <?php $textmsg = ($role=="admin") ? "Users" : "Myaccount";  ?>
            <div><a href="?page=users<?php echo $userID; ?>"><?php echo $textmsg; ?></a></div>
        </div>
         <?php //if($role=="admin") { ?>
       <!-- <div class="menuitem"> 
            <div><img src="../../../../public_html/images/blogtheme/configuration.png"></div>
            <div><a href="?page=configurations">Configurations</a></div>
        </div>-->
         <?php //} ?>
         <?php if($_SESSION['userID']!="") { ?>
        <div class="menuitem"> 
            <div ><img src="../../../../public_html/images/blogtheme/logoff.png"></div>
            <div ><a href="logoff.php">Logoff</a></div>
        </div>
       
        <?php }
		}
		 else
		 { ?>
         <div class="admin-menu">
         <div style="width:300px; float:left"><a href="../../../../public_html/blog/index.php?view=blog"><img src="../../../../public_html/images/blogtheme/logo.png" border="0" alt="" /></a></div>
    	<div class="menuitem"> 
            <div>&nbsp;</div>
            <div>&nbsp;</div>
        </div>
        <div class="menuitem"> 
            <div>&nbsp;</div>
            <div>&nbsp;</div>
        </div>
        <div class="menuitem"> 
            <div>&nbsp;</div>
            <div>&nbsp;</div>
        </div> 
         <div class="menuitem"> 
            <div>&nbsp;</div>
            <div>&nbsp;</div>
        </div> 
         <div class="menuitem"> 
            <div>&nbsp;</div>
            <div>&nbsp;</div>
        </div> 
        
             <div class="menuitem"> 
            <div><img src="../../../../public_html/images/blogtheme/home.png" alt="" border="0"></div>
            <div><a href="../../../../public_html/blog/index.php">Home</a></div>
        </div>
        </div>
     <?php }?>  
      
    
