<?php 
 
 include "connection.php";
 $seller = $_GET['seller'];
 $pro_name = $_GET['pro'];
 $qurey = "SELECT * FROM `details` WHERE buyer='$seller' and product = '$pro_name'";
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
                    <div class="conatiner mx-5" style="width: 700px;">
                      <table class="table table-striped table-hover">
                        <tbody>
                          <tr>
                            <td scope="row"><b>Product :</b></td>
                            <td><?php echo $details['product']; ?></td>
                          </tr>
                          <tr>
                            <td scope="row"><b>Mobile :</b></td>
                            <td><?php echo $details['mobile']; ?></td>
                          </tr>
                          <tr>
                            <td scope="row"><b>Address :</b></td>
                            <td><?php echo $details['adrs']; ?></td>
                          </tr>
                          <tr>
                            <td scope="row"><b>Payment :</b></td>
                            <td><?php echo $details['payment']; ?></td>
                          </tr>
                          <tr>
                            <td scope="row"><b>Buyer :</b></td>
                            <td><?php echo $details['buyer']; ?></td>
                          </tr>
                          
                        </tbody>
                      </table>
                    </center>
                     <?php
                
                    endwhile;
                endif;
                if(mysqli_num_rows($result_products)<1):
                  ?>
                  <div><center>
                    <img width="400px" src="assets/notfound.png" alt="">
                    <h5>User have not updated the details..!</h5>
                  </center></div>
                  
                  <?php
                  
                endif;
            endif;
            ?>

</div>





<br><br><br>
<?php include "footer.php"?>


<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.js"
></script>
<script src="scripts/stepper.js"></script>
</body>
</html>