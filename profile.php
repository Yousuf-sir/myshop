<?php 
 define("myshopheader",true);
require_once "header.php";
if($_SERVER['REQUEST_METHOD']=='POST'){
    $heading = $_POST['subjectopinion'];
    $opinion = $_POST['opiniondetails'];

    $news 	 = $data->newsinsert($heading,$opinion);
}
?>
	<section class="container">
		<div class="row">
			<div class="col-md-4 pt-5">
			 	<div class="card-group">
					<div class="card">
					  	<img src="assets/images/product/n.jpg" class="card-img-top" alt="...">
					  	<?php if(session::get('status')==1):?>
					  	<span class="text-danger"> Unveryfied</span>
					  	<?php else: ?>
					  	<span class="text-primary">veryfied <?php echo session::get('status');?></span>
					  <?php endif; ?>
					</div>
			<div class="card">
			<div class="card-header">
				<?php echo session::get('userName');?>
			</div>
			<ul class="list-group list-group-flush">
				<?php if(session::get('logintime')): ?>
				<li class="list-group-item">Last time login :<?php echo session::get('logintime'); ?></li>
			<?php endif; ?>
				<li class="list-group-item"><?php echo $_SERVER['HTTP_USER_AGENT']; ?></li>
				<li class="list-group-item">Balance:<?php echo $log->businessAcademyUserBalance();?></li>
			</ul>
			</div>

			</div>
<p class="border border-dark border-top-0 border-start-0 border-end-0 my-3 text-center">
	<table class="table table-light">
					<thead class="table-dark">
						<tr>
							<th class="text-center">Name</th>
							<th class="text-center">Describtion</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="text-left">Website</td>
							<td class="text-center">Business Academy</td>
					    </tr>
					    <tr>
							<td class="text-left">Total Order</td>
							<td class="text-center">501</td>
					    </tr>
					    <tr>
							<td class="text-left">Order cancel</td>
							<td class="text-center">102</td>
					    </tr>
					    <tr>
							<td class="text-left" >Order Success</td>
							<td class="text-center">302</td>
					    </tr>
					    <tr>
							<td class="text-left">Balance</td>
							<td class="text-center">501</td>
					    </tr>
					    <tr>
							<td class="text-left">Withdraw</td>
							<td class="text-center">520</td>
					    </tr>
					</tbody>
				</table>
				<p class="border border-dark border-top-0 border-start-0 border-end-0 my-3 text-center">
			</div>
			<!-- form section start -->
			<div class="col-md-8 p-5">
				<form action="#" action="#" method="post">
					 <fieldset class="text-dark border border-secondary p-3">
					  <legend><?php if(isset($news)){echo $news;}else{echo "Your Opinons:";} ?> </legend>
					  <label for="subjectopinion">Subject:</label>
					  <input class="form-control" type="text" id="subjectopinion" name="subjectopinion">
					  <label for="opinion">Details</label>
					  <textarea class="form-control" placeholder="Write opinons" id="opinion" name="opiniondetails"></textarea>
					  <input type="submit" name="opinion" class="mt-2 btn-block btn btn-outline-success text-light" value="Publish Now">
					  <!-- <input  type="submit" value="Order Now"> -->
					 </fieldset>
				</form>
				<?php 
				
                   $news = $data->selectnewsprofiledata();
                   if($news):
                   	while($row = $news->fetch_assoc()):
				?>
					<div class="mt-3">
						<h1><?php echo $row['newsheadline']; ?></h1>
						<small class="text-secondary"><?php echo $fmt->formatDate($row['date']); ?></small>
					   <p class="text-justify"><?php echo $row['news']; ?></p>
					</div>
					<p class="border border-dark border-top-0 border-start-0 border-end-0 my-3">
				<?php endwhile; ?>
				<?php endif; ?>
		   </div>
			<!-- form section end -->
		</div>
		
	</section>
	<?php echo $allfile->get_footer("order-footer"); ?>