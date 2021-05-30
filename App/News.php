<?php 
/**
 * Select class 
 */
require_once "core/Database.php";
require_once "App/Format.php";
class News extends Database
{
	private $dbc;
	private $fm;
	/**
	* news error message
	*/
	public  $usernewsErr=array();

	function __construct()
	{
		$this->dbc = new Database();
		$this->fm  = new Format();
		Session::init();
	}
/**
 * Select data from news table 
 */
	public function selectnewsdata(){
		$data   = "SELECT * FROM news ORDER BY newsID DESC";
		$result = $this->dbc->select($data);
		return $result;
	}
	/**
 * Select profile data from news table 
 */
	public function selectnewsprofiledata(){
		$userid  =   session::get('useid');
		$data   = "SELECT * FROM news WHERE profileid = $userid ORDER BY newsID DESC";
		$result = $this->dbc->select($data);
		return $result;
	}
/**
 * Insert data into news table 
 */
	public function newsinsert($heading,$opinion){
       $heading	=	$this->fm->validation($heading);
       $opinion	=	$this->fm->validation($opinion);


       $heading	=	mysqli_real_escape_string($this->dbc->link,$heading);
       $opinion	=	mysqli_real_escape_string($this->dbc->link,$opinion);

       $userid  =   session::get('useid');

       if(empty($heading) || empty($opinion)){
         $msg ='<small class="text-light"> Empty field must be fill up.</small>';
         return $msg;
       }else{
       		$newsin = "INSERT INTO news SET
       		newsheadline='$heading',
       		news        ='$opinion',
            profileid   = '$userid'
       		";
       		$newsin = $this->dbc->insert($newsin);

       		if($newsin){
       		 $msg ='<small class="text-light"> Your opinion published.</small>';
             return $msg;	
       		}else{
       		$msg ='<small class="text-light"> Your opinion did not publish.</small>';
             return $msg;
       		}

       }
 // check mesage
	}
	// =====
    
}