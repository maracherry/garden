<?php

function redirect($page)
{
	$host = $_SERVER['HTTP_HOST'];
	$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
	$url = "http://".$host."".$uri."/".$page;
	echo '<meta http-equiv="refresh" content="0; URL='.$url.'" />';
	//return ($url);
}

?>
