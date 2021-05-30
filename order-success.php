<?php require_once "header.php"; ?>
	<section class="container">
		<div class="row">
			<div class="col-md-4 pt-5">
			 	<div class="card-group">
					<div class="card">
					  	<img src="assets/images/product/n.jpg" class="card-img-top" alt="...">
					</div>
			<div class="card">
			<div class="card-header">
				<?php echo $log->businessAcademyUserName();?>
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
				<h2>The order has been succesfully complited</h2>
				<p>Thank You for the order.</p>
			</div>
			<!-- form section end -->
		</div>
		
	</section>
	<?php echo $allfile->get_footer("order-footer"); ?>