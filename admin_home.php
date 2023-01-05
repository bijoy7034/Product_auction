<?php 

$con = new mysqli('localhost','root','','auction');
if (!$con) 
{
  die("Connection failed: " . mysqli_connect_error());
}
$sql ="SELECT count(*) as total from users";
$result=mysqli_query($con,$sql);
$data= mysqli_fetch_assoc($result);

$sql2 ="SELECT count(*) as total1 from products";
$result2=mysqli_query($con,$sql2);
$data2= mysqli_fetch_assoc($result2);

?>

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
           href="#"
           class="list-group-item list-group-item-action py-2 ripple active"
           >
          <i class="fas fa-chart-area fa-fw me-3"></i
            ><span>Dashboard</span>
        </a>
       
        <a
           href="admin_users.php"
           class="list-group-item list-group-item-action py-2 ripple"
           ><i class="fas fa-users fa-fw me-3"></i><span>Users</span></a
          >
        <a
           href="admin_bids.php"
           class="list-group-item list-group-item-action py-2 ripple"
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
  <h5 class="mx-4"><b>Admin's Dashboard</b></h5>
  <div class="container d-sm-flex justify-content-around">
<div style="min-width: 300px; min-height:170px; box-shadow: rgb(200, 200, 200) 10px 10px 50px; border-radius:10px" class="p-5 m-3 bg-light">
<h1><b><?php if($data){
  $sql2 ="SELECT count(*) as total1 from products";
  $result2=mysqli_query($con,$sql2);
  $data2= mysqli_fetch_assoc($result2);
  echo $data2['total1'];
} ?></b></h1>
<span>Products On Auction</span>
</div>
<div style="min-width: 300px; min-height:170px; box-shadow: rgb(200, 200, 200) 10px 10px 50px; border-radius:10px" class="p-5 m-3 bg-primary bg-light">
<h1><b><?php echo $data['total']; ?></b></h1>
<span>Total Users</span>
</div>
<div style="min-width: 300px; min-height:170px;  box-shadow: rgb(200, 200, 200) 10px 10px 50px; border-radius:10px" class="p-5 m-3 bg-primary bg-light">
<h1><b><?php if($data){
  $sql3 ="SELECT count(*) as total1 from bids";
  $result3=mysqli_query($con,$sql3);
  $data3= mysqli_fetch_assoc($result3);
  echo $data3['total1'];
} ?></b></h1>
<span>Total Bids</span>
</div>
  </div>

  <center><img src="assets/99.svg" class="img-fluid w-50 p-5"  alt=""> <br>
Convert your Store to an Online Auction Site. Add unlimited auctions <br> and attract more visitors.</center>
  

  </div>
</main>


<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.js"
></script>
</body>
</html>