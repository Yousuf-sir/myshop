<?php  define("myshopheader",true);
 require_once "header.php"; ?>
	<section class="container">
		<div class="row">
			<div class="col-md-2 pt-5">
			 	<h3>Advertising Area</h3>
			 	<img src="assets/images/product/n.jpg" class="card-img-top my-1" alt="...">
			</div>
			<!-- form section start -->
			<div class="col-md-8 p-5">
				<?php 
				
                   $news = $data->selectnewsdata();
                   if($news):
                   	while($row = $news->fetch_assoc()):
				?>
				<h2><?php echo $row['newsheadline']; ?></h2>
				<small class="text-secondary"><?php echo $fmt->formatDate($row['date']); ?></small>
				<p class="text-justify"><?php echo $row['news']; ?></p>
				<p>
					<form action="" method="post" class="my-3">
						<input class="form-control" type="text" name="comments" placeholder="write comments">
                        <input class="btn btn-primary my-1" type="submit" name="comment" value="submit comment">
					</form>
				</p>
			<?php endwhile; ?>
			<?php endif; ?>
			</div>
			<!-- form section end -->
			<div class="col-md-2 pt-5">
			 	<h3>Advertising Area</h3>
			 	<img src="assets/images/product/n.jpg" class="card-img-top my-1" alt="...">
			</div>
		</div>
		
	</section>
	<?php echo $allfile->get_footer("order-footer"); ?>