<?php  define("myshopheader",true);
require_once "header.php"; 
if(session::get('useid')){
  echo "<script>window.location = 'profile.php';</script>";
}
if(isset($_POST['userlogin']) && $_SERVER['REQUEST_METHOD']=='POST'){
  
      $loged 	 = $log->userlogin($_POST);
      
}
?>
	<section class="container">
		<div class="row py-3">
			<div class="col-md-2">
				
				<?php 
                  //  echo $loged;
				?>
			</div>
			<div class="col-md-8">
				<form action="" method="post">
					 <fieldset class="text-dark border border-secondary p-3">
					  <legend>Login 
					  		<?php 
					  	 foreach($log->errorMgs as $key => $value)
					  	  {
					  	      if(is_array($log->errorMgs))
					  	      {
    								if($key==='passmatchnot')
    								{
    									echo $log->errorMgs['passmatchnot'];
    								}
    							} 
    						}; 
					    ?>
					  </legend>
					  <label for="profileemail"> Email			
					  	<?php 
					  	 foreach($log->errorMgs as $key => $value)
					  	  {
					  	      if(is_array($log->errorMgs))
					  	      {
    								if($key==='emailerr')
    								{
    									echo $log->errorMgs['emailerr'];
    								}
    							} 
    						}; 
					    ?>
					  	
					  </label>
					  <input class="form-control" type="email" id="profileemail" name="profileemail">
					  <label for="profilepassword">Password 
 						<?php 
					  	 foreach($log->errorMgs as $key => $value)
					  	  {
					  	      if(is_array($log->errorMgs))
					  	      {
    								if($key==='passerr')
    								{
    									echo $log->errorMgs['passerr'];
    								}
    							} 
    						}; 
					    ?>
					  </label>
					  <input class="form-control" type="text" id="profilepassword" name="profilepassword">
					  <input class="mt-2 form-control btn btn-outline-success" type="submit" name="userlogin" value="Login">
					 </fieldset>
				</form>
			</div>
			<div class="col-md-2"><a class="btn-outline-success btn form-control text-dark" href="registration.php">Create an account</a></div>
		</div>
	</section>
	<?php echo $allfile->get_footer("order-footer"); ?>