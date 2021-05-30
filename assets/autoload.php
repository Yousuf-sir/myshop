<?php

function autoload_App($className){
$filename = "App/".$className.".php";
if(is_readable($filename)){
   require $filename;
}
}
function autoload_product($className){
	$pfile	=	"Product/".$className.".php";
	if(is_readable($pfile)){
		require "$pfile";
	}
}
spl_autoload_register("autoload_App");
spl_autoload_register("autoload_Product");
