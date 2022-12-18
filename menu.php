


<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/shop4.png" alt="">
							</div>
							<div class="shop-body">
								<h3>Electronics <br>Collection</h3>
								<a href="shop.php?filter=electronics&low=100&high=1000000" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->

					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/22.png" alt="">
							</div>
							<div class="shop-body">
								<h3>Mobile<br>Collection</h3>
								<a href="shop.php?filter=mobile&low=100&high=1000000" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->

					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/123.png" alt="">
							</div>
							<div class="shop-body">
								<h3>Music<br>Collection</h3>
								<a href="shop.php?filter=music&low=100&high=1000000" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
    <article>
   <div>
   <span>"Start an Online Auction Store using the Product Auction App. <br>
         As the app comes with numerous features that will help you create online auctions and manage them with ease"</span> <br><br>
          <button type="button" class="btn btn-outline-light" data-mdb-toggle="modal" data-mdb-target="#exampleModal2">
  Learn more..
</button>
   </div>
          <img src="assets/22.svg" width="400px" alt="">
</article>
<!-- <section class="menu py-4">
<div class="container px-2">
    <center><h2><b class="text-danger">CATAGORIES</b></h2></center>
    
    <p style="font-family:Arial, Helvetica, sans-serif; color:gray; text-align:right;" class="mx-5 px-5">Select a category to customize your browsing experience!!</p>

    <button type="button" class="m-4 btn btn-outline-danger btn-lg btn-rounded">
        <a href="catagory.php?item=electronics" class="text-danger">Electronics</a> <i style="margin-left: 5px;" class="far fa-lightbulb"></i></button>
    <button type="button" class="btn m-4 btn-danger btn-lg btn-rounded">
    <a href="catagory.php?item=books" class="text-light">Books</a> <i style="margin-left: 5px;" class="fas fa-book"></i></button>
    <button type="button" class="btn m-4 btn-outline-danger btn-lg btn-rounded">
    <a href="catagory.php?item=sports" class="text-danger">Sports</a>
     <i style="margin-left: 5px;" class="fas fa-football-ball"></i></button>
    <button type="button" class="btn m-4 btn-danger btn-lg btn-rounded"><a href="catagory.php?item=music" class="text-light">Music</a> <i style="margin-left: 5px;" class="fas fa-guitar"></i></button>
    <button type="button" class="btn m-4 btn-outline-danger btn-lg btn-rounded"><a href="catagory.php?item=mobile" class="text-danger">Mobile Phones</a> <i style="margin-left: 5px;" class="fas fa-mobile-alt"></i></button>
    <button type="button" class="btn m-4 btn-danger btn-lg btn-rounded"><a href="catagory.php?item=applications" class="text-light">Applications</a> <i style="margin-left: 5px;" class="fab fa-google-play"></i></button>
    <button type="button" class="btn m-4 btn-outline-danger btn-lg btn-rounded"><a href="catagory.php?item=others" class="text-danger">Others</a><i style="margin-left: 5px;" class="fas fa-football-ball"></i></button>
</div><br>

</section> -->

<br> 

<style>
    .menu{
        background-color: rgb(239, 239, 239);
    }
    article{
        padding: 40px;
        background:#332D2D ;
        color: rgb(239, 239, 239);
        display: flex;
        align-items: center;
        justify-content: space-around;
    }

</style>
<br><br><br>
<!-- Button trigger modal -->

<div class="container col-md-12">
						<div class="row">
            <div class="col-md-12">
						<div class="section-title">
							<h3 class="title">New Products</h3>
							
						</div>
					</div>
							<div class="products-tabs">

               

								<!-- tab -->
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1">
										<!-- product -->
                    <?php

            $query_products = "SELECT * FROM products WHERE status = 'sell' and seller_name <> '$loggedin_session' ;";
            $result_products = mysqli_query($con,$query_products);
            
            if($result_products):
                if(mysqli_num_rows($result_products)>0):
                    while($products = mysqli_fetch_assoc($result_products)):
                        $price2 = $products['start_prize']+190;
           ?>
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
										<!-- /product -->
                    <?php
                    endwhile;
                endif;
            endif;

            ?>
										
										<!-- /product -->
									</div>
									<div style="padding:5px;border-radius:10px;background-color:rgb(160, 160, 160); width:fit-content;" id="slick-nav-1" class="mx-5 products-slick-nav">
                  </div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><span class="text-danger">Auction</span> Zone</h5>
        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      Start an Online Auction Store using the Product Auction App. As the app comes with numerous features that will help you create online auctions and manage them with ease. The Product Auction app will allow the auction on the product in some simple steps and not only this you can easily monitor the auctions and the bidding details. The simple interface will surely be of help in getting started. <br><br>
      The simple interface will surely be of help in getting started.
      <ul style="list-style-type:disc" class="list-group list-group-light">
  <li class="list-group-item" aria-disabled="true">Admin can create and manage auction for any product.</li>
  <li class="list-group-item">Set increment rules and the increment gaps while creating Auctions.</li>
  <li class="list-group-item">Add Bulk Auctions via CSV file & Delete auction as and when required.</li>
  <li class="list-group-item">Joining Fee-Check the authenticity of the visitor by keeping a small joining fee</li>
  <li class="list-group-item">Declare Multiple Winner for an Auction & can even restart unsuccessful auctions.</li>
</ul>

      








      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-mdb-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>