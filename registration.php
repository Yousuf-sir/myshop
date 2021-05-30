<?php 
 define("myshopheader",true);
require_once "header.php"; 

if(session::get('useid')){
  echo "<script>window.location = 'profile.php';</script>";
}
if($_SERVER['REQUEST_METHOD']=='POST'){
    
    $usr 	 = $uobj->userRegistration($_POST);
}
?>
	<section class="container">
		<div class="row">
			<div class="col-md-2 pt-5">
			 	
			</div>
			<!-- form section start -->
			<div class="col-md-8 p-5">
				<form action="#" method="post">
					 <fieldset class="text-dark border border-secondary p-3">
					  <legend><?php if(isset($usr)){echo $usr;}else{echo "Registration Now:";}?> </legend>
					  <label for="profinename">Name:</label>
					  <input class="form-control" type="text" id="profinename" name="profinename">
					  <label for="profilephone">Contact Number:</label>
					  <input class="form-control" type="text" id="profilephone" name="profilephone">
					  <label for="profileemail">Email:</label>
					  <input class="form-control" type="email" id="profileemail" name="profileemail">
					  <label for="website">Website/facebook page Url:</label>
					  <input class="form-control" type="url" id="website" name="website">

					  <div class="row">
					  	<div class="col-6">
					  		<label for="profilepassword">Password:</label>
					  <input class="form-control" type="password" id="profilepassword" name="profilepassword">
					  	</div>
					  	<div class="col-6">
					  		<label for="cpassword">Confirm Password:</label>
					  <input class="form-control" type="password" id="cpassword" name="cpassword">
					  	</div>
					  </div>
					  
					 <input type="submit" name="registration" class="mt-2 btn-block btn btn-outline-success text-light" value="Create An Account">
					 </fieldset>
				</form>
			</div>
			<!-- form section end -->
			<div class="col-md-2 pt-5">
			 	<a class="btn-outline-success btn form-control text-dark" href="login.php">Login here</a>
			</div>
		</div>
		
	</section>
	<?php echo $allfile->get_footer("order-footer"); ?>