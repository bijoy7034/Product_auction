<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home</title>
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
<style>
@import url('https://fonts.googleapis.com/css2?family=Indie+Flower&family=Nunito:ital,wght@0,200;0,300;1,400;1,500&family=Quicksand:wght@400;600&family=Roboto:wght@500&display=swap');
body {
  font-family: Quicksand !important;
}
</style>
<link rel="stylesheet" href="css/sideNav.css">
</head>
<body>
<nav
       id="sidebarMenu"
       class="collapse navbar-danger d-lg-block sidebar collapse bg-white"
       >
    <div class="position-sticky">
      <div class="list-group list-group-flush mx-3 mt-4">
        <a
           href="admin_home.php"
           class="list-group-item list-group-item-action py-2 ripple "
           >
          <i class="fas fa-chart-area fa-fw me-3"></i
            ><span>Dashboard</span>
        </a>
       
        <a
           href="admin_users.php"
           class="list-group-item list-group-item-action py-2 ripple "
           ><i class="fas fa-users fa-fw me-3"></i><span>Users</span></a>
        <a
           href="#"
           class="list-group-item list-group-item-action py-2 ripple active"
           ><i class="fas fa-building fa-fw me-3"></i
          ><span>All Bids</span></a
          >
        
        <a
           href="#"
           class="list-group-item list-group-item-action py-2 ripple"
           ><i class="fas fa-money-bill fa-fw me-3"></i><span>Page Control</span></a
          >
      </div>
    </div>
  </nav>
  <!-- Sidebar -->

  <!-- Navbar -->
  <nav
       id="main-navbar"
       class="navbar navbar-expand-lg navbar-dark bg-danger fixed-top"
       >
    <!-- Container wrapper -->
    <div class="container">
      <!-- Toggle button -->
      <button
              class="navbar-toggler"
              type="button"
              data-mdb-toggle="collapse"
              data-mdb-target="#sidebarMenu"
              aria-controls="sidebarMenu"
              aria-expanded="false"
              aria-label="Toggle navigation"
              >
        <i class="fas fa-bars"></i>
      </button>

      <!-- Brand -->
      <a class="navbar-brand" href="#">
      <b>AUCTION ZONE</b>
      </a>
      <!-- Search form -->

      <!-- Right links -->
      <div class="navbar-nav ms-auto">
            
                  <button class="btn btn-outline-light" style="margin-left: 10px;"><a style="color: white;" href="index.php">Logout</a></button>
</div>
    </div>
    <!-- Container wrapper -->
  </nav>
  <!-- Navbar -->
</header>
<!--Main Navigation-->

<!--Main layout-->
<main style="margin-top: 58px">
  
  <div class="container pt-4">

    <h5 class="mx-4"><b>All Bids of auctionzone are listed</b></h5>
  


    <table class="table align-middle mb-0 bg-white">
  <thead class="bg-light">
    <tr>
      <th>Seller</th>
      <th>Bidder</th>
      <th>Product</th>
      <th>Price</th>
    </tr>
  </thead>
  <tbody>
  <?php
$con = new mysqli('localhost','root','','auction');
if (!$con) 
{
  die("Connection failed: " . mysqli_connect_error());
}
$query_products = "SELECT * FROM bids;";
$result_products = mysqli_query($con,$query_products);

if($result_products):
    if(mysqli_num_rows($result_products)>0):
        while($products = mysqli_fetch_assoc($result_products)):
?>
    <tr>
      <td>
        <div class="d-flex align-items-center">
        <i class="fas fa-user" style="width: 20px;"></i>
          <div class="ms-3">
            <p class="fw-bold mb-1"><?php echo $products['seller'] ?></p>
          </div>
        </div>
      </td>
      <td>
      <p class="text-muted mb-0"><?php echo $products['bidder'] ?></p>
      </td>
      <td>
      <p class="text-muted mb-0"><?php echo $products['book'] ?></p>
      </td>
      <td>
      <p class="text-muted mb-0"><?php echo $products['price'] ?></p>
      </td>
    </tr>
  
              <?php
                    endwhile;
                endif;
            endif;

            ?>
  </tbody>
</table>



<br><br><br><br>
<section class="p-5"></section>
<section class="p-5"></section>
<section class="p-5"></section><section class="p-5"></section>
<section class="p-5"></section>
<section class="p-5"></section>
<section class="p-5"></section><section class="p-5"></section>
<footer class="bg-danger text-center text-light text-lg-start">

<div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
  © 2023 Copyright:
  <a class="text-light" href="https://mdbootstrap.com/">bijoyanil74@gmail.com</a>
</div>

</footer>
  </div>
</main>


<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.js"
></script>
</body>
</html>