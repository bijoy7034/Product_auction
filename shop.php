
<?php


$con = new mysqli('localhost','root','','auction');
if (!$con) 
{
  die("Connection failed: " . mysqli_connect_error());
}

session_start();
$user_check=$_SESSION['username'];
$ses_sql  = mysqli_query($con,"select username from users where username='$user_check'");
$row  = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

$loggedin_session = $row['username'];

if($loggedin_session==NULL) {
            echo "Go back";
            header("Location: index.php");
}

?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<title>Store</title>

 		
     <link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"
/>
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.css"
  rel="stylesheet"
/>
<link rel="stylesheet" href="carousel.css">

 		<link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>


 		<link type="text/css" rel="stylesheet" href="css/style.css"/>
     <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>
     <style>
      *{
        font-family:Arial, Helvetica, sans-serif;
      }
    </style>
    </head>
	<body>
	

  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-danger">
  <div class="container">
    <a class="navbar-brand" href="#"><b>AUCTION ZONE</b></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mb-2 ml-5 mb-lg-0 ms-auto">
        <li class="nav-item mx-4">
          <a class="nav-link text-light" aria-current="page" href="home.php">Home</a>
        </li>
        <li class="nav-item  mx-4">
          <a class="nav-link text-light" href="sell.php">Add Product</a>
        </li>
        <li class="nav-item  mx-4">
          <a class="nav-link text-light " href="account.php">Account</a>
        </li>

      </ul>

    </div>
  </div>
</nav>

		<div class="section">

			<div class="container">
			
				<div class="row">
				
					<div id="aside" class="col-md-3">
					<form action="shopfilter.php" method="post">
						<div class="aside">
							<h3 class="aside-title">Categories</h3>
							<div class="checkbox-filter">

							<?php $fil = $_GET['filter']; ?>
							<div class="input-checkbox">
									<input type="radio" <?php
									if($fil == 'none'){
										echo "checked";
									}
									?> value="none" id="category-1" name="cat">
									<label for="category-1">
										<span></span>
										All
									
									</label>
								</div>
								<div class="input-checkbox">
									<input type="radio" 
									<?php 
									if($fil == 'electronics'){
										echo "checked";
									}
									?> value="electronics" id="category-1" name="cat">
									<label for="category-1">
										<span></span>
										Electronics
									
									</label>
								</div>

								<div class="input-checkbox">
									<input type="radio" <?php
									if($fil == 'books'){
										echo "checked";
									}
									?>  value="books" id="category-2" name="cat">
									<label for="category-2">
										<span></span>
										Books
							
									</label>
								</div>

								<div class="input-checkbox">
									<input type="radio"<?php
									if($fil == 'music'){
										echo "checked";
									}
									?> 
									 value="music" id="category-3" name="cat">
									<label for="category-3">
										<span></span>
										Music
								
									</label>
								</div>

								<div class="input-checkbox">
									<input type="radio"<?php
									if($fil == 'sports'){
										echo "checked";
									}
									?>  value="sports" id="category-4" name="cat">
									<label for="category-4">
										<span></span>
										Sports
								
									</label>
								</div>

								<div class="input-checkbox">
									<input type="radio" <?php
									if($fil == 'mobile'){
										echo "checked";
									}
									?>  value="mobile" id="category-5" name="cat">
									<label for="category-5">
										<span></span>
										Mobiles
									
									</label>
								</div>

								<div class="input-checkbox">
									<input type="radio" <?php
									if($fil == 'others'){
										echo "checked";
									}
									?>  value="others" id="category-6" name="cat">
									<label for="category-6">
										<span></span>
										Others
									
									</label>
								</div>
							</div>
						</div>
						<?php $low = $_GET['low'];
							$high = $_GET['high']; ?>
						
						<div class="aside">
							<h3 class="aside-title">Price</h3>
							<div class="price-filter">
						
								<!-- <div id="price-slider"></div> -->
								<div class="input-number price-min">
									<input id="price-min" value="<?php echo $low ?>" name="low" type="number">
									<span class="qty-up">+</span>
									<span class="qty-down">-</span>
								</div>
								<span>-</span>
								<div class="input-number price-max">
									<input id="price-max" value="<?php echo $high ?>" name="high" type="number">
									<span class="qty-up">+</span>
									<span class="qty-down">-</span>
								</div>
							</div>
						</div>

            <br>
            <button type="submit" name="submit" class="btn btn-outline-danger btn-sm">Filter</button>
					
				
					</div>
					</form>

					<div id="store" class="col-md-9">


						<h3><b class="text-danger">Products</b></h3>
		

		
						<div class="row">
				
              <?php
$filter = $_GET['filter'];
$low = $_GET['low'];
$high = $_GET['high'];
if($filter=='none'){
	$query_products = "SELECT * FROM products WHERE status = 'sell' and seller_name <> '$loggedin_session' and start_prize BETWEEN $low and $high ;";
}else{
	$query_products = "SELECT * FROM products WHERE status = 'sell' and seller_name <> '$loggedin_session' and cat = '$filter' and start_prize BETWEEN $low and $high;";
}
$result_products = mysqli_query($con,$query_products);

if($result_products):
    if(mysqli_num_rows($result_products)>0){
        while($products = mysqli_fetch_assoc($result_products)):
            $price2 = $products['start_prize']+290;
?>
							<div class="col-md-4 col-xs-6">
              
								<div class="product">
									<div class="product-img">
										<img src="<?php echo $products['img'] ?>" alt="">
										<div class="product-label">
											<span class="sale">-30%</span>
											<span class="new">NEW</span>
										</div>
									</div>
									<div class="product-body">
										<p class="product-category"><?php echo $products['cat'] ?></p>
										<h3 class="product-name"><a href="#"><?php echo $products['product_name'] ?></a></h3>
										<h4 class="product-price">&#8377 <?php echo $products['start_prize'] ?>   <del class="product-old-price"><?php echo $price2 ?></del></h4>
										<div class="product-rating">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
										</div>
										<div class="product-btns">
													<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp"> <a class="text-light" href="bid_p.php?item=<?php echo $products['product_name']; ?>&cat=<?php echo $products['cat'] ?>&user=<?php echo $row['username'];?>&seller=<?php echo $products['seller_name'] ?>&img=<?php echo $products['img']; ?>&desc=<?php echo $products['description']?>&price=<?php echo $products['start_prize'] ?>" style="text-decoration: none; color:#c4d8d5">View Product</a></span></button>
												</div>
									</div>
									<div class="add-to-cart">
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> <a href="bid_p.php?item=<?php echo $products['product_name']; ?>&cat=<?php echo $products['cat'] ?>&user=<?php echo $row['username'];?>&seller=<?php echo $products['seller_name'] ?>&img=<?php echo $products['img']; ?>&desc=<?php echo $products['description']?>&price=<?php echo $products['start_prize'] ?>" style="text-decoration: none; color:#c4d8d5">Buy</a></button>
											</div>
								</div>
                
              

							</div>
              <?php
                    endwhile;
                }else{
					?> <center>
						<img src="assets/notfound.png" style="width: 500px;" alt="">
						<p class="text-danger">No results found!!!</p>
					</center> <?php
				}
            endif;

            ?>
            <br><br>
              
							
						
						</div>
						
					</div>
					<!-- /STORE -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div> <br><br><br>
    <?php include "footer.php" ?>
		<!-- /SECTION -->
		<script>

			ran = document.querySelector('#ran_price').value;
			ran.addEventListner('oninput',function(){
				alert(ran);
			})
		</script>
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/slick.min.js"></script>
		<script src="js/nouislider.min.js"></script>
		<script src="js/jquery.zoom.min.js"></script>
		<script src="js/main.js"></script>

	</body>
</html>
