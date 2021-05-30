<?php  define("myshopheader",true);
 require_once "header.php"; 
  if(isset($_POST['usercoms']) && $_SERVER['REQUEST_METHOD']=='POST'){

  	$newscoms = $uobj->userComments($_POST);
  }

 ?>
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
                   		$nwsid= $row['newsID'];
				?>
				<h2><?php echo $row['newsheadline']; ?></h2>
				<small class="text-secondary"><?php echo $fmt->formatDate($row['date']); ?></small>
				<p class="text-justify"><?php echo $row['news']; ?></p>
				<p>
					
					<form action="" method="post" class="my-3">
						<input type="hidden" name="newsidc" value="<?php echo $row['newsID']; ?>">
						<input class="form-control" type="text" name="comments" placeholder="write comments">
                        <input class="btn btn-primary my-1" type="submit" name="usercoms" value="submit comment">
					</form>
				</p>
				<?php 
                    $cms = $uobj->commentshow();
                    if($cms):
                    	while ($comrow= $cms->fetch_assoc()): 
                    		if($nwsid == $comrow['newsid'] ):
				?>
				<div class="bg-secondary text-light mx-3 mt-1 p-2">
                   <p><small class="fw-bold"><?php echo $comrow['profinename']; ?></small> ::: <small class="fst-italic fw-lighter"><?php echo $comrow['commenttime']; ?></small></p>
                   <span  class="fw-lighter"><?php echo $comrow['comments']; ?></span>
				</div>

			<?php endif; endwhile; endif; ?>
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