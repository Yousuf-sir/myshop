<?php 
/**
 * User Class 
 */
require_once "core/Database.php";
require_once "App/Format.php";
require_once "App/Session.php";
class User
{
	public $User;
	public $userID;
	public $userErn;
	public $UserBalance;
	public $userPassword; 
	public $userRoll;
	public $errorMgs     =array();
	protected $dbc;
	protected $fm;
	private $profinename;
	private $profilephone;
	private $profileemail;
	private $website;
	private $profilepassword;
	private $cpwd;
	private $joiningdate;
	private $logintime;
	private $profilestatus;

	public function __construct()
	{
		$this->dbc = new Database();
		$this->fm  = new Format();
		

	}
	/**
	* user Password Check Method
	*/
	public function MyshopUserPasswordCheck($pass){
        if(empty($pass)){
        	$this->userPassword = "12345678";
        }elseif(strlen($pass)<7){
        	$this->errorMgs[]="Password Must be 8 charecters";
        }else{
        	return $this->userPassword;
        }
	}
/**
* User Registration Method
*/
	public function userRegistration($data){
        $this->profinename     =	$this->fm->validation($data['profinename']);
        $this->profilephone    =	$this->fm->validation($data['profilephone']);
        $this->profileemail    =	$this->fm->validation($data['profileemail']);
        $this->website         =	$this->fm->validation($data['website']);
        $this->profilepassword =	$this->fm->validation($data['profilepassword']);
        $this->cpwd            =	$this->fm->validation($data['cpassword']);

        $this->profinename     =	mysqli_real_escape_string($this->dbc->link,$this->profinename);
        $this->profilephone    =	mysqli_real_escape_string($this->dbc->link,$this->profilephone);
        $this->profileemail    =	mysqli_real_escape_string($this->dbc->link,$this->profileemail);
        $this->website         =	mysqli_real_escape_string($this->dbc->link,$this->website);
        $this->profilepassword =	mysqli_real_escape_string($this->dbc->link,$this->profilepassword);
        $this->cpwd            =	mysqli_real_escape_string($this->dbc->link,$this->cpwd);

        $exemail   			   = $this->exitingemailcheck($this->profileemail);
        $joindate 			   = date("F j, Y, g:i a");
        
        
        if(empty($this->profinename) || empty($this->profilephone) || empty($this->profileemail) || empty($this->website) || empty($this->profilepassword)){
        	 $msg ='<small class="text-light"> Empty field must be fill up.</small>';
             return $msg;
        }elseif($this->profilepassword !== $this->cpwd){
        	 $msg ='<small class="text-light"> Password and Confirm password must be same.</small>';
             return $msg;
        }elseif($exemail===true){
           return 'This email is already being used';
        }else{
        	$option = ['cost'=>12];
        	$this->profilepassword = password_hash($this->profilepassword, PASSWORD_BCRYPT,$option);
        		$newuser = "INSERT INTO profile(profinename,profilephone,profileemail,website,profilepassword,joiningdate) VALUES('$this->profinename','$this->profilephone','$this->profileemail','$this->website','$this->profilepassword','$joindate')";
       		        $newuser = $this->dbc->insert($newuser);

       		    if($newuser){
            	 echo "<script>window.location = 'login.php';</script>";	
       		}else{
       			$msg ='<small class="text-light"> Account not created.</small>';
             	return $msg;
       		}
        }
	}
	// =====

	public function exitingemailcheck($emaile){
            $data   = "SELECT profileemail FROM profile WHERE profileemail = '$emaile'";
		    $result = $this->dbc->select($data);
		   
		    if($result){
		    	$row = $result->fetch_assoc();
		    	if($row){
		    		 return true;
		    	}else{
		    		return false;
		    	}
		    }
	}
	// =======
 public function userComments(){
 	//====
 }

// ======
}