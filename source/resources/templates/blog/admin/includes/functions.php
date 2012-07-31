<?php


// function to clean vars
function cleanInputs()
{
	// Get argument count and list
	$argumentCount = func_num_args();
	
	for ($x = 0; $x < $argumentCount; $x++)
	{
		$curVar = func_get_arg($x);
		$finalInputs[] = @mysql_real_escape_string(strip_tags(str_replace(array('\\','/'),'',$curVar)));
	}
	return $finalInputs;
}

// Save session/cookie
function saveSession($name,$value)
{
	setcookie($name,$value,time+360000,'/','.'.$_SERVER['HTTP_HOST'],0);
	$_SESSION[$name] = $value;
}

// Generate a random string function
function generate($strlen)
{
	// Generate a string based on $strlen length
	return substr(md5(uniqid(rand(),1)),1,$strlen);
}

// Check email function
function checkEmail($string) 
{
    return preg_match('/^[.\w-]+@([\w-]+\.)+[a-zA-Z]{2,6}$/', $string);
} 

// Format date function
function formatDate($date)
{
	return date("M d, Y",strtotime($date));
}

// Format post function
function formatPost($text)
{
    /* Search For */
	$simple_search = array(
        '/\[b\](.*?)\[\/b\]/is', /* Bold */
        '/\[i\](.*?)\[\/i\]/is', /* Italic */
        '/\[u\](.*?)\[\/u\]/is', /* Underline */
        '/\[img\](.*?)\[\/img\]/is', /* Image */
        '/\[url\](.*?)\[\/url\]/is', /* Href link */
        '/\[url\=(.*?)\](.*?)\[\/url\]/is', /* Href link+title */
        '/\[align\=(left|center|right|justify)\](.*?)\[\/align\]/is', /* Alignment */
        '/\[mail\](.*?)\[\/mail\]/is', /* Mail link        */
        '/\[mail\=(.*?)\](.*?)\[\/mail\]/is', /* Mail link + title */
        '/\[font\=(.*?)\](.*?)\[\/font\]/is', /* Font color */
        '/\[size\=(.*?)\](.*?)\[\/size\]/is', /* Size font */
        '/\[color\=(.*?)\](.*?)\[\/color\]/is', /* Color font */
        '/\[code\](.*?)\[\/code\]/is', /* Code  */
        '/\[br\]/is', /* Line Break (hr)  */
        "/\n/is" /* LNew Linesine Break (hr)  */
	);
		
    /* Replace by */
	$simple_replace = array(
        '<strong>$1</strong>',
        '<em>$1</em>',
        '<u>$1</u>',
        '<a href="$1" target="_blank"><img src="$1" id="thisImage" onload="resize(\'thisImage\');" border="0"></a>',
        '<a href="$1">$1</a>',
        '<a href="$1" target="_blank">$2</a>',
        '<div style="text-align: $1;">$2</div>',
        '<a href="mailto:$1">$1</a>',  
        '<a href="mailto:$1">$2</a>',
        '<span style="font-family: $1;">$2</span>',  
        '<span style="font-size: $1;">$2</span>',  
        '<span style="color: $1;">$2</span>',  
        '<pre class="code">$1</pre>',  
        '<hr/>',
        '<br/>'
	); 
	
    /* Do BBCode's  */
    $text = preg_replace($simple_search, $simple_replace, $text);

    /* Do BlockQuotes */
    $text = formatQuotes($text);

    return $text;
}

/* BBCode for Quote Nesting */
function formatQuotes($str)
{
    $open = '<blockquote>';
    $close = '</blockquote>';

    /* How often is the open tag?  */
    preg_match_all ('/\[quote\]/i', $str, $matches);
    $opentags = count($matches['0']);

    /* How often is the close tag?  */
    preg_match_all ('/\[\/quote\]/i', $str, $matches);
    $closetags = count($matches['0']);

    /*  Check how many tags have been unclosed  */
    /*  And add the unclosing tag at the end of the message  */
    $unclosed = $opentags - $closetags;
    for ($i = 0; $i < $unclosed; $i++) {
        $str .= '</blockquote>';
    }

    /*  Do replacement  */
    $str = str_replace ('[quote]', $open, $str);
    $str = str_replace ('[/quote]', $close, $str);

    return $str;
}

// functin to send email verification
function sendVerification($userName,$userEmail,$userPassword,$userStatus,$registerDate,
	$siteName,$siteURL,$siteEmail,$registerTemplate,$registerTemplateSubject)
{
	$arrayFind = array('%userName%','%userEmail%','%userPassword%','%userStatus%',
	'%registerDate%','%siteName%','%siteURL%','%siteEmail%');
	$arrayReplace = array($userName,$userEmail,$userPassword,$userStatus,$registerDate,$siteName,$siteURL,$siteEmail);
	$emailMessage = nl2br(str_replace($arrayFind,$arrayReplace,$registerTemplate));
	$emailSubject = nl2br(str_replace($arrayFind,$arrayReplace,$registerTemplateSubject));
	
	$headers = "Return-Path: $siteName <$siteEmail>\r\n"; 
	$headers .= "From: $siteName <$siteEmail>\r\n"; 
	$headers .= "Content-Type: text/html; charset=utf-8;\n\n\r\n"; 
	return mail ($userEmail,$emailSubject,$emailMessage,$headers);
}

// function to send password reminder
function sendPassword($userName,$userEmail,$userPassword,$userStatus,$registerDate,
	$siteName,$siteURL,$siteEmail,$forgotTemplate,$forgotTemplateSubject)
{
	$arrayFind = array('%userName%','%userEmail%','%userPassword%','%userStatus%',
	'%registerDate%','%siteName%','%siteURL%','%siteEmail%');
	$arrayReplace = array($userName,$userEmail,$userPassword,$userStatus,$registerDate,$siteName,$siteURL,$siteEmail);
	$emailMessage = nl2br(str_replace($arrayFind,$arrayReplace,$forgotTemplate));
	$emailSubject = nl2br(str_replace($arrayFind,$arrayReplace,$forgotTemplateSubject));
	
	$headers = "Return-Path: $siteName <$siteEmail>\r\n"; 
	$headers .= "From: $siteName <$siteEmail>\r\n"; 
	$headers .= "Content-Type: text/html; charset=utf-8;\n\n\r\n"; 
	return mail ($userEmail,$emailSubject,$emailMessage,$headers);
}

// File download
function downloadFile($fileLocation,$fileName){
    if (connection_status()!=0) return(false);
    $extension = strtolower(end(explode('.',$fileName)));

    /* List of File Types */
    $fileTypes['swf'] = 'application/x-shockwave-flash';
    $fileTypes['pdf'] = 'application/pdf';
    $fileTypes['exe'] = 'application/octet-stream';
    $fileTypes['zip'] = 'application/zip';
    $fileTypes['doc'] = 'application/msword';
    $fileTypes['xls'] = 'application/vnd.ms-excel';
    $fileTypes['ppt'] = 'application/vnd.ms-powerpoint';
    $fileTypes['gif'] = 'image/gif';
    $fileTypes['png'] = 'image/png';
    $fileTypes['jpeg'] = 'image/jpg';
    $fileTypes['jpg'] = 'image/jpg';
    $fileTypes['rar'] = 'application/rar';    
    
    $fileTypes['ra'] = 'audio/x-pn-realaudio';
    $fileTypes['ram'] = 'audio/x-pn-realaudio';
    $fileTypes['ogg'] = 'audio/x-pn-realaudio';
    
    $fileTypes['wav'] = 'video/x-msvideo';
    $fileTypes['wmv'] = 'video/x-msvideo';
    $fileTypes['avi'] = 'video/x-msvideo';
    $fileTypes['asf'] = 'video/x-msvideo';
    $fileTypes['divx'] = 'video/x-msvideo';

    $fileTypes['mp3'] = 'audio/mpeg';
    $fileTypes['mp4'] = 'audio/mpeg';
    $fileTypes['mpeg'] = 'video/mpeg';
    $fileTypes['mpg'] = 'video/mpeg';
    $fileTypes['mpe'] = 'video/mpeg';
    $fileTypes['mov'] = 'video/quicktime';
    $fileTypes['swf'] = 'video/quicktime';
    $fileTypes['3gp'] = 'video/quicktime';
    $fileTypes['m4a'] = 'video/quicktime';
    $fileTypes['aac'] = 'video/quicktime';
    $fileTypes['m3u'] = 'video/quicktime';

    $contentType = $fileTypes[$extension];
    
    
    header("Cache-Control: public");
    header("Content-Transfer-Encoding: binary\n");
    header('Content-Type: $contentType');

    $contentDisposition = 'attachment';
    
    if($doStream == true){
        /* extensions to stream */
        $array_listen = array('mp3','m3u','m4a','mid','ogg','ra','ram','wm',
        'wav','wma','aac','3gp','avi','mov','mp4','mpeg','mpg','swf','wmv','divx','asf');
        if(in_array($extension,$array_listen)){
            $contentDisposition = 'inline';
        }
    }

    if (strstr($_SERVER['HTTP_USER_AGENT'], "MSIE")) {
        $fileName= preg_replace('/\./', '%2e', $fileName,substr_count($fileName, '.') - 1);
        header("Content-Disposition: attachment;filename=\"$fileName\"");
    } else {
        header("Content-Disposition: attachment;filename=\"$fileName\"");
    }
    
    header("Accept-Ranges: bytes");   
    $range = 0;
    $size = filesize($fileLocation);
    
    if(isset($_SERVER['HTTP_RANGE'])) {
        list($a, $range)=explode("=",$_SERVER['HTTP_RANGE']);
        str_replace($range, "-", $range);
        $size2=$size-1;
        $new_length=$size-$range;
        header("HTTP/1.1 206 Partial Content");
        header("Content-Length: $new_length");
        header("Content-Range: bytes $range$size2/$size");
    } else {
        $size2=$size-1;
        header("Content-Range: bytes 0-$size2/$size");
        header("Content-Length: ".$size);
    }
        
    if ($size == 0 ) { die('Zero byte file! Aborting download');}
    set_magic_quotes_runtime(0);
    $fp=fopen("$fileLocation","rb");
    
    fseek($fp,$range);
  
    while(!feof($fp) and (connection_status()==0))
    {
        set_time_limit(0);
        print(fread($fp,1024*500));
        flush();
        ob_flush();
        sleep(1);
    }
    fclose($fp);
           
    return((connection_status()==0) and !connection_aborted());
} 
?>