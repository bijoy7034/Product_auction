 <?php 
 
 include "connection.php";
 $seller = $_GET['seller'];
 $pro_name = $_GET['product'];
 $qurey = "SELECT * FROM `details` WHERE seller='$seller' and product = '$pro_name'";
 $result_products = mysqli_query($conn,$qurey);


 
 
 ?>
 
 <!DOCTYPE html>
<html lang="en">
<head>
    <style>
        span{
            font-size: 20px;
            text-align: justify;
            font-family
            :Arial, Helvetica, sans-serif;
            font-weight: bold;
        }
    </style>
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
<link rel="stylesheet" href="home.css">
<link rel="stylesheet" href="stepper.css">
    <title>Details</title>
</head>
<body>

<?php include "nav.php" ?>
<center><h2><b class="text-danger">Details <span class="text-dark">Added</span></b></h2></center>
<div class="container">
    <?php
     if($result_products):
        if(mysqli_num_rows($result_products)>0):
            while($details = mysqli_fetch_assoc($result_products)):
                    ?>
                    <center>
                    <div class="conatiner">
                    <span><b class="text-danger">Product : </b><?php echo $details['product']; ?></span><br><br>
                        <span><b class="text-danger">Mobile : </b><?php echo $details['mobile']; ?></span><br><br>
                        <span><b class="text-danger">Address : </b><?php echo $details['adrs']; ?></span><br><br>
                        <span><b class="text-danger">Payment : </b><?php echo $details['payment']; ?></span> <br><br>
                        <span><b class="text-danger">Seller : </b><?php echo $details['seller']; ?></span><br><br>
                    </div>
                    </center>
                     <?php
                
                    endwhile;
                endif;
            endif;

        

                
     ?>
</div>






<?php include "footer.php"?>


<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.js"
></script>
<script src="scripts/stepper.js"></script>
</body>
</html>