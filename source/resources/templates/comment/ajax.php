<?php
	include_once ('functions.php');
	$url= getcwd();
	$urlsplit = explode("\\",$url);
	$foldername=$urlsplit[3];
	include($_SERVER['DOCUMENT_ROOT']."/".$foldername."/config.php");

    if(isset($_POST['remove'])){
        $id = intval($_POST['remove']);
            if(mysql_query("DELETE FROM `comments` WHERE `id` = $id")){
                exit(json_encode(array('status' => 'done')));
            }
    }
    
    if(isset($_POST['page_id']) and isset($_POST['comment'])){
        $user_id = 1;
        $page_id = intval($_POST['page_id']);
        $comment = mysql_escape_string($_POST['comment']);
        $time = time();
        
        if(mysql_query("INSERT INTO `comments` (`user_id`, `page_id`, `comment`, `time`) VALUES ($user_id, '{$page_id}', '{$comment}', '{$time}')")){
            $id = mysql_insert_id();
            $row = single_comment($id);
            
            exit(json_encode(array(
                'id' => $id,
                'avatar' => ($row['user_id']) ? get_gravatar($row['email'],40) : '#',
                'time' => timeBetween($row['time'],time()),
                'comment' => $row['comment'],
            )));
        }
    }
    	
?>