<?php
if(! defined("myshopheader")){
 exit('stop');
}
require "core/Database.php";
require "assets/autoload.php";
Session::init();

$dbc     = new Database();
$log     = new Login();
$allfile = new Allfile();
$data    = new News();
$fmt     = new Format();
$uobj    = new User();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Myshop</title>
	<link rel="stylesheet" type="text/css" href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<header class="container bg-info text-center p-2">
		 <h1>Business Academy</h1>
  <p>Business Solution</p> 
	</header>
	<nav class="navbar navbar-expand-lg navbar-light bg-danger container">
     <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand text-light" href="#">Business Academy</a>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active text-light" aria-current="page" href="Product.php">Product</a>
        </li>
        <?php if(! session::get('useid')):?>
        <li class="nav-item">
          <a class="nav-link text-light" href="registration.php">Registration</a>
        </li>
    <?php endif; ?>
        <li class="nav-item">
        	 <?php if(! session::get('useid')):?>
          <a class="nav-link text-light" href="login.php">Login</a>
          <?php else : ?>
          <?php  if(isset($_GET['logout']))
            {
              $usrid = $_GET['logout']; 
               //session::destroy();
              $log->userlogout($usrid);
      
            }
           ?>
          <a class="nav-link text-light" href="?logout=<?php echo session::get('useid'); ?>">Log out</a>
      <?php endif; ?>
        </li>
         <?php if(session::get('useid')):?>
        <li class="nav-item">
          <a class="nav-link text-light" href="news.php">News</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="profile.php"><?php echo session::get('userName');?></a>
        </li>
    <?php endif; ?>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
 
</nav>
