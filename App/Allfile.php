<?php
/**
 * all file class
 */
class Allfile
{
	
	public function __construct()
	{
		# code...
	}
	public function get_header(){
	require_once "header.php";	
	}
	public function get_footer($footer){
     require_once $footer.".php";
	}
	
}