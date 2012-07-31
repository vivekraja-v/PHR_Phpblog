<?php
    function single_comment($id){
    	$query = mysql_query("SELECT c.*,user.username,user.email FROM `comments` c LEFT JOIN `users` user ON c.user_id = user.id where c.id = '{$id}'");
            $row = mysql_fetch_array( $query );
            $row['comment'] = htmlspecialchars($row['comment']);
        return $row;
    }    

    function comments($page_id){
        $query = mysql_query("SELECT c.*,user.username,user.email FROM `comments` c
                                LEFT JOIN `users` user ON c.user_id = user.id
                                    where c.page_id = '{$page_id}' ORDER BY `id` ASC");
            while( $row = mysql_fetch_array( $query ) ){ 
                $row['comment'] = htmlspecialchars($row['comment']);
                $list[ ] = $row;
            }
        return (isset($list)) ? $list : null;	
    }	

    function get_gravatar( $email, $s = 80, $d = 'identicon', $r = 'g', $img = false, $atts = array() ) {
    	$url = 'http://www.gravatar.com/avatar/';
    	$url .= md5( strtolower( trim( $email ) ) );
    	$url .= "?s=$s&d=$d&r=$r";
    	if ( $img ) {
    		$url = '<img src="' . $url . '"';
    		foreach ( $atts as $key => $val )
    			$url .= ' ' . $key . '="' . $val . '"';
    		$url .= ' />';
    	}
    	return $url;
    }    

    /**
     * timeBetween()
     * @link http://awcore.com/php/snippets/24/date-in-hours-days-months-format_en
     * @param mixed $start
     * @param mixed $end
     */
    function timeBetween($start,$end){
    	$time = $end - $start;
    
    	if($time <= 60){
    		return 'one monent ago';
    	}
    	if(60 < $time && $time <= 3600){
    		return round($time/60,0).' minutes ago';
    	}
    	if(3600 < $time && $time <= 86400){
    		return round($time/3600,0).' hours ago';
    	}
    	if(86400 < $time && $time <= 604800){
    		return round($time/86400,0).' days ago';
    	}
    	if(604800 < $time && $time <= 2592000){
    		return round($time/604800,0).' weeks ago';
    	}
    	if(2592000 < $time && $time <= 29030400){
    		return round($time/2592000,0).' months ago';
    	}
    	if($time > 29030400){
    		return date('M d y at h:i A',$start);
    	}
    }   
?>