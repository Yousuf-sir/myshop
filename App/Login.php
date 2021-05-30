<?php
require_once "core/Database.php";
require_once "App/Format.php";
require_once "App/Session.php";
/**
 * Login Class
 */

class Login extends User
{
    private $usermail;
    private $userpwd;
	public function __construct()
	{
		parent::__construct();
    session::init();
    
	}
  public function userlogin($data){
        $this->profileemail    =  $this->fm->validation($data['profileemail']);
        $this->profilepassword =  $this->fm->validation($data['profilepassword']);


        $this->profileemail    =  mysqli_real_escape_string($this->dbc->link,$this->profileemail);
        $this->profilepassword =  mysqli_real_escape_string($this->dbc->link,$this->profilepassword);
            
        if(empty($this->profileemail))
        {
           
           $this->errorMgs['emailerr']= "Must not be empty";
      
        }

        if(empty($this->profilepassword)){
            $this->errorMgs['passerr']= "Must not be empty";    
        }
          $data   = "SELECT * FROM profile WHERE profileemail = '$this->profileemail'";
          $result = $this->dbc->select($data);

          $logindate          = date("F j, Y, g:i a");

           if($result !==false){
            
              $value = $result->fetch_assoc();
              session::set('userpass',$value['profilepassword']);
              if(password_verify($this->profilepassword,session::get('userpass'))){
              session::set('userlogin', true);
              session::set('userName',$value['profinename']);
              session::set('useid',$value['profileID']);
              session::set('status',$value['profilestatus']);
              session::set('logintime',$value['logintime']);

              $id = session::get('useid');

              $update = "UPDATE profile SET logintime = '$logindate' WHERE profileID = '$id'";
              
              $this->dbc->update($update);

              echo "<script>window.location = 'profile.php';</script>";
              }else{
                $this->errorMgs['passmatchnot']= "Password or user name does not match.";  
              }
           }
         
        
          
        
          
  }
 
  // =======
    public function userlogout($data){
			$data    =  $this->fm->validation($data);
      $data    =  mysqli_real_escape_string($this->dbc->link,$data);
      if(is_numeric($data)){
        session::destroy();
      }
    }
    public function businessAcademyUserID(){
    	return $this->userID=152;
    }
    public function businessAcademyUserErn(){
    	return $this->userErn=50000;
    }
    public function businessAcademyUserBalance(){
    	return $this->UserBalance=1500;
    }
	public function myshopUserLoginCheck($password=null){
      $pass  = $this->MyshopUserPasswordCheck($password);

      if(empty($pass)){
      	return $this->userPassword;
      }else{
      	// $hash = password_hash($pass, PASSWORD_BCRYPT, array("cost" => 10));
       // $this->userPassword = $hash ;
       return $this->userPassword;
      }
       
	}

	public function myshopErrorMgs(){
		 if(is_array($this->errorMgs)){
		 	foreach ($this->errorMgs as $key => $value) {
		 		return $value;
		 	}
		 }
	}
}