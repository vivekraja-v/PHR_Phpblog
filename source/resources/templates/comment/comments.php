<?php
	include_once ('functions.php');
    $page_id = 1;
?>
    <script type="text/javascript">
        $(function() {
        	$('.tip').tipsy({ gravity: 'e' }); 
        });     
    </script>    
<style>
  body {
	background-image: none;
	width:100%
}
</style>
<div class="banner_wrapper">
    <div class="banner">
        <div id="inner_banner">
            <div class="ws_images"></div>
        </div>
        <div class="ws_shadow"></div>
    </div>
    <div id="page">
	<h2>Comments</h2>
    <div class="box shadow"></div>
        <div class="comments">
        <?php
        foreach ((array) comments($page_id) as $comment) {
        ?>
        <div class="comment shadow effect">
        <p class="left tip" title="<?php echo $comment['username'];?> Said">
        <img class="avatar" src="<?php echo get_gravatar($comment['email'],40);?>" />
        </p>
        <p class="body right">
        <?php echo nl2br($comment['comment']);?>
        <div class="details small">
        <span class="blue"><?php echo timeBetween($comment['time'],time());?></span> · <a class="red" href="#" onclick="$(this).delete_comment(<?php echo $comment['id'];?>); return false;">Remove</a>
        </div>
        </p>
        
        </div>
        <?php
        }
        ?>
        </div>
        <div class="add_comment">
        <div class="write shadow comment">
        <p class="left">
        <img class="avatar" src="#" />
        </p>
        <p class="textarea right">
        <textarea class="left" cols="40" rows="5"></textarea>
        <input class="left" value="SEND" type="submit" />
        </p>
        </div>
        <a onclick="$(this).add_comment(<?php echo $page_id;?>);return false;" class="right effect shadow" href="#">Add Comment</a>
        </div>
    </div>
</div>
<div style="clear:both"></div>


