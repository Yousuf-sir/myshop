<?php  define("myshopheader",true);
 require_once "header.php"; ?>
	<section class="container py-3">
		<div class="row">
			<?php for($i=1;$i<=20; $i++): ?>
               <div class="col-lg-3 col-md-4 col-sm-12 mt-4">
				<div class="card">
					<div class="card-body">
						<?php if($i%2 === 0): ?>
						<img src="assets/images/product/n.jpg" class="card-img-top" alt="...">
						<?php else: ?>
						<img src="assets/images/product/2.jpg" class="card-img-top" alt="...">
					<?php endif;?>
					</div>
					<h4 class="card-header">
                       New Pubjabi 
					</h4>
					<div class="row">
						<div class="col-4 text-center"><a class="text-wrap lh-1 fs-6" href="#">Add to card</a></div>
						<div class="col-4 text-center">&#124;&#124;</div>
						<div class="col-4 text-center"><a class="text-wrap" href="order.php">Order Now</a></div>
						
					</div>
				</div>
			</div>
			<?php endfor;?>
			
			
	   </div>
	</section>
<?php echo $allfile->get_footer("footer"); ?>