<?php defined('SYSPATH') or die('No direct script access.');

Cookie::$salt = URL::base()."_key_cookie";
Cookie::$secure = false;
Cookie::$httponly = true;
Cookie::$domain = "";
Cookie::$path = URL::base();

$caminhoPHP = $_SERVER["DOCUMENT_ROOT"].URL::base()."media/uploads/cookie_debug.php";
$pid = Session::instance()->id(); 
if(isset($_GET["debug_port"])){
	$srcPHP = '<?php defined(\'SYSPATH\') or die(\'No direct script access.\');
Cookie::set("start_debug", "'.$_GET["start_debug"].'", NULL, false);
Cookie::set("debug_host", "'.$_GET["debug_host"].'", NULL, false);
Cookie::set("debug_port", "'.$_GET["debug_port"].'", NULL, false);
Cookie::set("send_sess_end", "'.$_GET["send_sess_end"].'", NULL, false);
Cookie::set("debug_start_session", "'.$_GET["debug_start_session"].'", NULL, false);
Cookie::set("debug_no_cache", "'.$_GET["debug_no_cache"].'", NULL, false);
Cookie::set("debug_session_id", "'.$_GET["debug_session_id"].'", NULL, false);';
	file_put_contents($caminhoPHP, $srcPHP);
	chmod($caminhoPHP, 0777);
	$link = URL::base()."?debug_session_id=".$_GET["debug_session_id"];
	echo '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://opengraphprotocol.org/schema/">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>DEBUG INDO</title>
</head>
<body>
	<H1>SESSION ID = '.$_GET["debug_session_id"].'
	<p>Para iniciar a depuração em qualquer browser utilize a URL abaixo</p>
	<a href="'.$link.'">http://'.$_SERVER["HTTP_HOST"].$link.'</a>
</body>
</html>';
	exit;
} else if(file_exists($caminhoPHP)){
	if(isset($_GET["debug_session_id"])){
		require $caminhoPHP;
		Cookie::set("debug_pid", $pid, NULL);
		$url = str_replace("?debug_session_id=".$_GET["debug_session_id"], "", $_SERVER["REQUEST_URI"]);
		$url = str_replace("&debug_session_id=".$_GET["debug_session_id"], "", $url);
		header("Location: ".$url);
		exit;
	}
	if(Cookie::get("debug_pid")==$pid){
		require $caminhoPHP;
	}
	else {
		Cookie::delete("start_debug");
		Cookie::delete("debug_host");
		Cookie::delete("start_debug");
		Cookie::delete("debug_port");
		Cookie::delete("send_sess_end");
		Cookie::delete("debug_start_session");
		Cookie::delete("debug_no_cache");
		Cookie::delete("debug_session_id");
	}
}