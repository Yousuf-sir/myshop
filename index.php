
<?php
  define("myshopheader",true);
 require_once "header.php"; 
 ?>
	<section class="container">
		<div class="row">
			<div class="col-md-4 pt-5">
				<div class="card-group">
					<div class="card">
						<img src="assets/images/product/n.jpg" class="card-img-top" alt="...">
					</div>
						<div class="card">
						  <div class="card-header">
						   <?php echo session::get('userName');?>
						  </div>
						  <ul class="list-group list-group-flush">
						    <li class="list-group-item">ID:<?php echo $log->businessAcademyUserID(); ?></li>
						    <li class="list-group-item">Earn:<?php echo $log->businessAcademyUserErn(); ?></li>
						    <li class="list-group-item">Balance:<?php echo $log->businessAcademyUserBalance();?></li>
						  </ul>
					   </div>
					
				</div>
				<p class="border border-dark border-top-0 border-start-0 border-end-0 my-3 text-center">
			</div>
			<!-- form section start -->
			<div class="col-md-8 p-5">
				<form action="#">
					 <fieldset class="text-dark border border-secondary p-3">
					  <legend> Order Shipping Addres Details:</legend>
					  <label for="fname">Customer Name:</label>
					  <input class="form-control" type="text" id="fname" name="fname">
					  <label for="lname">Contact Number:</label>
					  <input class="form-control" type="text" id="lname" name="lname">
					  <label for="address">Address</label>
					  <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
					  <p class="border border-dark border-top-0 border-start-0 border-end-0 my-3 text-center">Product Section</p>
					  <div class="row ">
  						 <div class="col">
  						 	<label for="address">SP Code</label>
   						 <input type="text" class="form-control" placeholder="Product code">
 						 </div>
 						 <div class="col">
  						 	<label for="address">Product Url</label>
   						 <input type="text" class="form-control" placeholder="Product url">
 						 </div>
 						 <div class="col">
 						 	<label for="address">Price</label>
   						 <input type="text" class="form-control" placeholder="Price">
  						</div>
						</div>
						<label for="address">Product Atribute</label>
					  <textarea class="form-control" placeholder="Product Description"></textarea>
					  <input class="mt-2 form-control btn btn-outline-success" type="submit" value="Order Now">
					 </fieldset>
				</form>
			</div>
			<!-- form section end -->
		</div>
		
	</section>
	<?php echo $allfile->get_footer("footer"); ?>