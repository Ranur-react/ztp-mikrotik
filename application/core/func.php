<?php 
error_reporting(0);
forbPHP();

// Route
function route($m_user,$page,$s_page){

    if (!array_key_exists($page,$s_page)){
        e404();

    }else if ($GLOBALS['n_uri_path'] > $GLOBALS['max_path']){
        e404();

    }else if ($GLOBALS['n_uri_path'] == $GLOBALS['max_path'] &&  $GLOBALS['act'] !== ""){
        e404();

    }else if (array_key_exists($page,$s_page)){
    
        include_once($s_page[$page]);

    }else{
        e404();
    }

}


// Forbidden 502
function forbPHP(){
    $get_self = explode("/",$_SERVER['PHP_SELF']);
    $self[] = $get_self[count($get_self)-1];

    if($self[0] !== "index.php"  && $self[0] !==""){
        e502();

    }
}


//err page

function e502(){
    header('HTTP/1.0 502 Connection refused', true, 502);

    echo '<html>
<head>
<title>502 Connection refused</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../../assets/css/font-awesome/css/font-awesome.min.css" />
<link rel="icon" href="../../assets/img/favicon.png" />
<style>   
    body {
        font-family: -apple-system, BlinkMacSystemFont, "segoe ui", Roboto, "helvetica neue", Arial, sans-serif, "apple color emoji", "segoe ui emoji", "segoe ui symbol";
    }
</style>
</head>
<body>
<div style="margin-top:50px; text-align:center;">
<i style="font-size:50px; color:#f86c6b; margin-bottom:10px;" class="fa fa-exclamation-circle" aria-hidden="true"></i>
<div>
    <span style="font-size:50px;font-weight:bold">502</span> 
    <span style="font-size:20px;">Connection refused</span>
</div>
<hr>
<span>mikhmon v4</span>
<!-- default "Connection refused" response (502) -->
</div>
</body>
</html>';
    die();
}

function e404(){
  

    header('HTTP/1.0 404 Not Found', true, 404);
    echo '<html>
<head>
<title>404 Not Found</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="assets/css/font-awesome/css/font-awesome.min.css" />
<link rel="icon" href="assets/img/favicon.png" />
<style>   
    body {
        font-family: -apple-system, BlinkMacSystemFont, "segoe ui", Roboto, "helvetica neue", Arial, sans-serif, "apple color emoji", "segoe ui emoji", "segoe ui symbol";
    }
</style>
</head>
<body>
<div style="margin-top:50px; text-align:center;">
<i style="font-size:50px; color:#63c2de; margin-bottom:10px;" class="fa fa-info-circle" aria-hidden="true"></i>
<div>
    <span style="font-size:50px;font-weight:bold">404</span> 
    <span style="font-size:20px;">Page Not Found</span>
</div>
<hr>
<span>mikhmon v4</span>
<!-- default "Connection refused" response (404) -->
</div>
</body>
</html>';

    die();
}

// encrypt decript

function enc_rypt($string, $key=5) {
	$result = '';
	for($i=0, $k= strlen($string); $i<$k; $i++) {
		$char = substr($string, $i, 1);
		$keychar = substr($key, ($i % strlen($key))-1, 1);
		$char = chr(ord($char)+ord($keychar));
		$result .= $char;
	}
	return base64_encode($result);
}
function dec_rypt($string, $key=128) {
	$result = '';
	$string = base64_decode($string);
	for($i=0, $k=strlen($string); $i< $k ; $i++) {
		$char = substr($string, $i, 1);
		$keychar = substr($key, ($i % strlen($key))-1, 1);
		$char = chr(ord($char)-ord($keychar));
		$result .= $char;
	}
	return $result;
}




function randN($length) {
	$chars = "23456789";
	$charArray = str_split($chars);
	$charCount = strlen($chars);
	$result = "";
	for($i=1;$i<=$length;$i++)
	{
		$randChar = rand(0,$charCount-1);
		$result .= $charArray[$randChar];
	}
	return $result;
}

function randUC($length) {
	$chars = "ABCDEFGHJKLMNPRSTUVWXYZ";
	$charArray = str_split($chars);
	$charCount = strlen($chars);
	$result = "";
	for($i=1;$i<=$length;$i++)
	{
		$randChar = rand(0,$charCount-1);
		$result .= $charArray[$randChar];
	}
	return $result;
}
function randLC($length) {
	$chars = "abcdefghijkmnprstuvwxyz";
	$charArray = str_split($chars);
	$charCount = strlen($chars);
	$result = "";
	for($i=1;$i<=$length;$i++)
	{
		$randChar = rand(0,$charCount-1);
		$result .= $charArray[$randChar];
	}
	return $result;
}

function randULC($length) {
	$chars = "ABCDEFGHJKLMNPRSTUVWXYZabcdefghijkmnprstuvwxyz";
	$charArray = str_split($chars);
	$charCount = strlen($chars);
	$result = "";
	for($i=1;$i<=$length;$i++)
	{
		$randChar = rand(0,$charCount-1);
		$result .= $charArray[$randChar];
	}
	return $result;
}

function randNLC($length) {
	$chars = "23456789abcdefghijkmnprstuvwxyz";
	$charArray = str_split($chars);
	$charCount = strlen($chars);
	$result = "";
	for($i=1;$i<=$length;$i++)
	{
		$randChar = rand(0,$charCount-1);
		$result .= $charArray[$randChar];
	}
	return $result;
}

function randNUC($length) {
	$chars = "23456789ABCDEFGHJKLMNPRSTUVWXYZ";
	$charArray = str_split($chars);
	$charCount = strlen($chars);
	$result = "";
	for($i=1;$i<=$length;$i++)
	{
		$randChar = rand(0,$charCount-1);
		$result .= $charArray[$randChar];
	}
	return $result;
}

function randNULC($length) {
	$chars = "23456789ABCDEFGHJKLMNPRSTUVWXYZabcdefghijkmnprstuvwxyz";
	$charArray = str_split($chars);
	$charCount = strlen($chars);
	$result = "";
	for($i=1;$i<=$length;$i++)
	{
		$randChar = rand(0,$charCount-1);
		$result .= $charArray[$randChar];
	}
	return $result;
}


// function  format bytes
function formatBytes($size, $decimals = 0){
    $unit = array(
    '0' => 'Byte',
    '1' => 'KiB',
    '2' => 'MiB',
    '3' => 'GiB',
    '4' => 'TiB',
    '5' => 'PiB',
    '6' => 'EiB',
    '7' => 'ZiB',
    '8' => 'YiB'
    );

    for($i = 0; $size >= 1024 && $i <= count($unit); $i++){
    $size = $size/1024;
    }

    return round($size, $decimals).' '.$unit[$i];
}

// function  format bytes2
function formatBytes2($size, $decimals = 0){
    $unit = array(
    '0' => 'Byte',
    '1' => 'KB',
    '2' => 'MB',
    '3' => 'GB',
    '4' => 'TB',
    '5' => 'PB',
    '6' => 'EB',
    '7' => 'ZB',
    '8' => 'YB'
    );

    for($i = 0; $size >= 1000 && $i <= count($unit); $i++){
    $size = $size/1000;
    }

    return round($size, $decimals).''.$unit[$i];
}


// function  format bites
function formatBites($size, $decimals = 0){
    $unit = array(
    '0' => 'bps',
    '1' => 'kbps',
    '2' => 'Mbps',
    '3' => 'Gbps',
    '4' => 'Tbps',
    '5' => 'Pbps',
    '6' => 'Ebps',
    '7' => 'Zbps',
    '8' => 'Ybps'
    );

    for($i = 0; $size >= 1000 && $i <= count($unit); $i++){
    $size = $size/1000;
    }

    return round($size, $decimals).' '.$unit[$i];
}


function ping($host,$port){
    $fsock = fsockopen($host,$port,$errno,$errstr,5);
    if (! $fsock ){
         

            $p->host = $host;
            $p->port = $port;
            $p->errno = $errno;
            $p->errstr = $errstr;
            $p->mess = "Connection timeout";

           echo json_encode($p);
            
    }else{
        
            $p->host = $host;
            $p->port = $port;
            $p->errno = 0;
            $p->errstr = 0;
            $p->mess = "Ping ok";

           echo json_encode($p);
            
    }
    fclose($fsock);
}