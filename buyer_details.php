<?php

$con = new mysqli('localhost','root','','auction');
if (!$con) 
{
  die("Connection failed: " . mysqli_connect_error());
}
$pro_name = $_GET['pro'];
$seller = $_GET['seller'];
$buyer = $_GET['buyer'];
$sql2 = "SELECT `seller`, `buyer`, `mobile`, `adrs`, `payment`, `product` FROM `details` WHERE buyer = '$buyer'";
$rsul = mysqli_query($con,$sql2);
$count = mysqli_num_rows($rsul);
if($count>0){
    header("location:seller_details.php?seller=$seller&product=$pro_name");
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
<link rel="stylesheet" href="home.css">
<link rel="stylesheet" href="stepper.css">
    <title>Details</title>
</head>
<body>

<?php include "nav.php" ?>
<center><h2><b class="text-danger">Add <span class="text-dark">Details</span></b></h2></center>


<center>
  <p style="color: grey;">You can share your contact informations to the buyer.</p>
<div class="container mx-5 px-5" style="margin-left: 300px; width:700px">
<form method="post" action="details_p.php?name=<?php echo $pro_name ?>&seller=<?php echo $seller ?>&buyer=<?php echo $buyer ?>">
  <!-- Name input -->
  <div class="form-outline mb-4">
    <input name="mobile" type="number" id="form4Example1" class="form-control" />
    <label class="form-label" for="form4Example1">Phone Number</label>
  </div>

  <!-- Email input -->
  <div class="form-outline mb-4">
    <input name="addr" type="text" id="form4Example2" class="form-control" />
    <label class="form-label" for="form4Example2">Address</label>
  </div>

  <!-- Message input -->
  <div class="form-outline mb-4">
    <textarea name="msg" class="form-control" id="form4Example3" rows="4"></textarea>
    <label class="form-label" for="form4Example3">Message to buyer</label>
  </div>

            <div class="form-outline mb-4">
   <select required class="form-select" name="pay" aria-label="Default select example">
             <option selected>Payment By</option>
             <option value="upi">UPI</option>
             <option value="cod">Cash On Delivery</option>
            <option value="bank transfer">Bank Transfer</option>
            <option value="card">Card Payment</option>
            <option value="others">Others</option>
            
            </select>
  </div>

  <!-- Checkbox -->
  <div class="form-check d-flex justify-content-center mb-4">
    <input class="form-check-input me-2" type="checkbox" value="" id="form4Example4" checked />
    <label class="form-check-label" for="form4Example4">
      Accept terms and condition
    </label>
  </div>


  <!-- Submit button -->
  <button type="submit" name="submit" class="btn btn-danger btn-block mb-4">Send</button>
</form>
</div>
</center>



<br>


<?php include "footer.php"?>


<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.js"
></script>
<script src="scripts/stepper.js"></script>
</body>
</html>