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
            header("Location: login1.php");
}

$sql="SELECT * FROM `users` where username = '$loggedin_session'";
                                $result=mysqli_query($con,$sql);                                                                
                                while($rows=mysqli_fetch_array($result)){
                                    $user_id = $rows['username']; }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <title>Account</title>
</head>
<body>

    <?php include "nav.php" ?>





    <div class="container m-5">
    <div class="row">
  <div class="col-3">
    <!-- Tab navs -->
    <div
      class="nav flex-column nav-pills text-center"
      id="v-pills-tab"
      role="tablist"
      aria-orientation="vertical"
    >
      <a
        class="nav-link active"
        id="v-pills-home-tab"
        data-mdb-toggle="pill"
        href="#v-pills-home"
        role="tab"
        aria-controls="v-pills-home"
        aria-selected="true"
        >Auction Items</a
      >
      <a
        class="nav-link"
        id="v-pills-profile-tab"
        data-mdb-toggle="pill"
        href="#v-pills-profile"
        role="tab"
        aria-controls="v-pills-profile"
        aria-selected="false"
        >View My Bids</a
      >
      <a
        class="nav-link"
        id="v-pills-messages-tab"
        data-mdb-toggle="pill"
        href="#v-pills-messages"
        role="tab"
        aria-controls="v-pills-messages"
        aria-selected="false"
        >Profile</a
      >
    </div>
    <!-- Tab navs -->
  </div>

  <div class="col-9">
    <!-- Tab content -->
    <div  class="tab-content" id="v-pills-tabContent">
      <div
        class="tab-pane fade show active"
        id="v-pills-home"
        role="tabpanel"
        aria-labelledby="v-pills-home-tab"
      >
        <p>Here you can see all your items under auction.</p>


        <table class="table align-middle mb-0 bg-white">
  <thead class="bg-light">
    <tr>
      <th>Name</th>
      <th>Start Price</th>
      <th>Status</th>
      <th>Highest Bidder</th>
      <th>Highest Bid</th>
      <th>Actions</th>
      <th></th>
    </tr>
  </thead>
  <tbody>

  <?php
   $id =1;

      
   $query_products = "SELECT * FROM products where seller_name = '$user_id';";
         $result = mysqli_query($con,$query_products);
   
   if ($result){
   
    
     while($row = mysqli_fetch_assoc($result)) {

     

      $pro_name = $row['product_name'];
       $start = $row['start_prize'];
       $img = $row['img'];
       $sql = "SELECT * FROM bids WHERE price = (SELECT MAX(price) FROM bids WHERE book ='$pro_name')";
      $result1 = mysqli_query($con,$sql);
       $row1 = mysqli_fetch_assoc($result1); 
       
       $price = $row1['price'];
       $id = $row['pro_id'];
       $seller = $row1['bidder'];

           echo '<tr>

           <td><div class="d-flex align-items-center">
           <img style="" width = 100px src='.$img.'>
           <div class="ms-3">
            <p class="fw-bold mb-1">'.$pro_name.'</p>
            <p class="text-muted mb-0">Product ID : '.$id.'</p>
          </div>
           </td>
           <td>'.$start.'</td>
           <td><span class="badge badge-success rounded-pill d-inline">Active</span></td>
           <td>'.$row1['bidder'].'</td>
           <td>'.$row1['price'].'</td>'
          ;
         if($row1['bidder']&& $row['status']== 'sell') {
          echo "<form action='sel_bid.php?name=$id&seller=$user_id&buyer=$seller&bookname=$pro_name' method = 'post'> <td><button type='submit' name= 'submit' class='btn btn-success'>SELL</button</td></form></tr>";
         }else if($row['status']== 'sold') {
          echo "<td><b style='color:red;'>SOLD</b></td><td><button class='btn btn-outline-primary mx-5 btn-sm'><a href='details.php?pro=$pro_name&buyer=$user_id&seller=$seller' class='text-primary'>Details</a></button></td></tr>";
         }
         else{
          echo "</tr>";
         }
         $id++;
         
       }
       
       
   }
   
   ?>

   
  </tbody>
</table>



      </div>
      <div
        class="tab-pane fade"
        id="v-pills-profile"
        role="tabpanel"
        aria-labelledby="v-pills-profile-tab"
      >
    

      <p>Here you can see all your items under auction.</p>


        <table class="table align-middle mb-0 bg-white">
  <thead class="bg-light">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">SELLER</th>
      <th scope="col">PRODUCT NAME</th>
      <th scope="col">BID PRICE</th>
      <th scope="col">STATUS</th>
    </tr>
  </thead>
  <tbody>

  <?php
   $id =1;
      
   $query_products = "SELECT * FROM bids where bidder = '$user_id';";
         $result = mysqli_query($con,$query_products);
    

          
   
   if ($result){
    
     while($row = mysqli_fetch_assoc($result)) {
      $book_name = $row['book'];
      $query2 = "SELECT `id`, `seller`, `buyer`, `book_name` FROM `seller_details` WHERE buyer = '$user_id' and book_name = '$book_name';";
  
      $result2= mysqli_query($con,$query2);
      $row1 = mysqli_fetch_assoc($result2);
           echo '<tr>
           <th scope="row">'.$id.'</th>
           <td>'.$row['seller'].'</td>
           <td>'.$row['book'].'</td>
           <td>'.$row['price'].'</td>';
 
           $sel =$row['seller'];
           $pro = $row['book'];
           if($result2){
            if($user_id == $row1['buyer']){
              echo "<td><b style='color:green;'>BID ACCEPTED</b>
              <button class='btn btn-outline-primary mx-5 btn-sm'><a href='buyer_details.php?pro=$pro&buyer=$user_id&seller=$sel' class='text-primary'>Details</a></button></td></tr>";
             }
            else{
              echo '<td><b style="color:red;">BID NOT ACCEPTED</b></td></tr>';
            }
           }
           else{
            '</tr>';
           }
         $id++;
       }
       if(mysqli_fetch_assoc($result)!=0){
        ?>
        <tr><td colspan="7"><center><img width="300px" src="assets/notfound.png" alt=""><p class="text-danger">No items yet!!</p></center><br>
      </td></tr>
        
        <?php
       }
       
   }
   
   ?>
       
   
  </tbody>
</table>




      </div>
      <div
        class="tab-pane fade"
        id="v-pills-messages"
        role="tabpanel"
        aria-labelledby="v-pills-messages-tab"
      >
      <?php
                                $sql="SELECT * FROM `users` where username = '$loggedin_session'";
                                $result=mysqli_query($con,$sql);                                                                
                                while($rows=mysqli_fetch_array($result)){
                                ?>
    <div class="container rounded bg-white">
        <!-- form start -->

            <div class="d-flex flex-column align-items-center text-center"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold">
            <?php echo $rows['name']; ?>
            
            </span><span class="text-black-50"><?php echo $rows['email']; ?></span>
            
        </div>
        <?php 
                                // close 
                                }
                ?>
      </div>
    </div>
  </div>
</div>
    </div>
 <br><br><br><br>
</div>


    <?php include "footer.php" ?>

    

    <script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.js"
></script>
</body>
</html>