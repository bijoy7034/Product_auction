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
    <title>Document</title>
    <link rel="stylesheet" href="home.css">
</head>
<body>
    <?php include "nav.php" ?>
    <br>
    <center ><h2 class="text-danger"><b>PRODUCTS</b></h2></center>
  


  <div  class="container ml-5 d-flex align-content-start flex-wrap">  
        <?php

            $item_cat = $_REQUEST['item'];
            $query_products = "SELECT * FROM products WHERE status = 'sell' and cat = '$item_cat';";
            $result_products = mysqli_query($con,$query_products);
            
            if($result_products):
                if(mysqli_num_rows($result_products)>0):
                    while($products = mysqli_fetch_assoc($result_products)):
                        
           ?>
           <div class="card mx-3 my-4 " style="width: 18rem;">
  <img class="card-img-top" style="width: 18rem; 
height: 15rem; 
overflow: hidden;" src="<?php echo $products['img'] ?>" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title"><?php echo $products['product_name'] ?></h5>
    <p style="font-size: 12px; height:80px;" class="card-text"><?php echo $products['description'] ?></p>
    <button type="button" class="btn btn-danger" data-mdb-toggle="moda" data-mdb-target="#exampleModal">
    <a class="text-light" href="bid_p.php?item=<?php echo $products['product_name']; ?>&user=<?php echo $row['username'];?>&seller=<?php echo $products['seller_name'] ?>&img=<?php echo $products['img']; ?>&desc=<?php echo $products['description']?>&price=<?php echo $products['start_prize'] ?>" style="text-decoration: none; color:#c4d8d5">Buy</a>
</button>
    <span class="h5" style="margin-left: 40px;">&#8377 <?php echo $products['start_prize'] ?>.0/-</span><br>
  </div>
</div>
           <?php
                    endwhile;
                endif;
            endif;

            ?>
                </div> 
                <br><br>


    <?php include "footer.php" ?>



<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.js"
></script>
</body>
</html>