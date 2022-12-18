<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
<link type="text/css" rel="stylesheet" href="css/style.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <?php include "nav.php" ?>

  <?php 

  include "connection.php";?> <br>
  <div class="container">




  <div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- Product main img -->
					<div class="col-md-5 col-md-push-2">
						<div id="product-main-img">
							<div class="product-preview">
								<img src="<?php echo $_REQUEST['img'] ?>" alt="">
							</div>
						</div>
					</div>
					<!-- /Product main img -->

				
					<!-- /Product thumb imgs -->

					<!-- Product details -->
					<div class="col-md-5">
						<div class="product-details">
							<h2 class="product-name"><?php echo $_REQUEST['item'] ?></h2>
							<div>
								<div class="product-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o"></i>
								</div>
								<a class="review-link" href="#">10 Review(s) | Add your review</a>
							</div>
              <?php $price =  $_REQUEST['price'] +190; ?>
							<div>
								<h3 class="product-price">&#8377 <?php echo $_REQUEST['price'] ?> <del class="product-old-price"><?php echo $price ?></del></h3>
								<span class="product-available">In Stock</span>
							</div>
							<p><?php echo $_REQUEST['desc'] ?></p>
							<small><b class="text-danger">Seller : </b><?php echo $_REQUEST['seller'] ?></small><br>

							
							<form action="bid.php?item=<?php echo $_REQUEST['item']; ?>&user=<?php echo $_REQUEST['user'];?>&seller=<?php echo $_REQUEST['seller'] ?>&price=<?php echo $_REQUEST['price'] ?>" style="text-decoration: none; color:#c4d8d5" method="post">
 
							<div class="add-to-cart my-3">
								<div class="qty-label">
									<span class="text-dark">Amount :</span> 
									<div class="input-number">
										<input width="200px" name="bid_price" type="number">
										
									</div>
								</div>
								<button name="submit12" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Place A Bid</button>
							</div>
							</form>


							<ul class="product-links">
								<li>Category:</li>
								<li><a href="#"><?php echo $_REQUEST['cat'] ?></a></li>
							</ul>

							<ul class="product-links">
								<li>Share:</li>
								<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
								<li><a href="#"><i class="fab fa-twitter"></i></a></li>
								<li><a href="#"><i class="fab fa-google-plus"></i></a></li>
								<li><a href="#"><i class="fa fa-envelope"></i></a></li>
							</ul>

						</div>
					</div>
				
				</div>
				<!-- /row -->
			</div>
      







      




			<!-- /container -->
		</div>



  <!-- <table>
    <tr>
      <td>
      <img src="<?php echo $_REQUEST['img'] ?>" width="500px" alt="">
      </td>
      <td>
        <div class="container mx-5">
        <h1><?php echo $_REQUEST['item'] ?></h1>
        
        <p><?php echo $_REQUEST['desc'] ?></p>
        <p><b>Seller : </b><?php echo $_REQUEST['seller'] ?></p>
        <h5>Starting Price : &#8377 <?php echo $_REQUEST['price'] ?>/-</h5> <br>
        <form action="bid.php?item=<?php echo $_REQUEST['item']; ?>&user=<?php echo $_REQUEST['user'];?>&seller=<?php echo $_REQUEST['seller'] ?>&price=<?php echo $_REQUEST['price'] ?>" style="text-decoration: none; color:#c4d8d5" method="post">
      <div class="form-outline">
  <input type="text" id="form12" required name="bid_price" class="form-control" />
  <label class="form-label" for="form12">Enter Amount</label> 
</div> <br>
      
        <button type="submit" name="submit12" class="btn btn-danger" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
        Place a Bid

</button></form> -->



        </div><br><br><br>
      </td>
    </tr>
  </table><br><br>
  </div>

  <?php include "footer.php" ?>
    


<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.js"
></script>
<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/slick.min.js"></script>
		<script src="js/nouislider.min.js"></script>

		<script src="js/main.js"></script>
</body>
</html>