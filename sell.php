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

if(isset($_POST['submit'])){

    $filename =  $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "products/" .$filename;
    move_uploaded_file($tempname, $folder);

    $pro_name = $_POST['pro_name'];
    $desc = $_POST['description'];
    $date = $_POST['date'];
    $cat = $_POST['cat'];
    $start_prize = $_POST['start_prize'];
    $max_limit = $_POST['max_limit'];
    $cat = $_POST['cat'];

    $query = "INSERT into products (product_name,status,description,start_prize,max_limit,end_date,seller_name,img,cat)
    VALUES ('".$pro_name."','sell','".$desc."','$start_prize','$max_limit','$date','$loggedin_session','$folder','$cat');";
    $result = mysqli_query($con,$query);

      if($result)
      {
           header("location:account.php");
       }
       else
       {
        echo "fail";
       }

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
<link rel="stylesheet" href="index.css">
    <title>Shop</title>
</head>
<body>
    <?php include "nav.php" ?>
                       <?php
                                $sql="SELECT * FROM `users` where username = '$loggedin_session'";
                                $result=mysqli_query($con,$sql);                                                                
                                while($rows=mysqli_fetch_array($result)){
                                ?>
    <div class="container rounded bg-white mt-5 mb-5">
        <!-- form start -->
    <form action="sell.php" method="POST" enctype="multipart/form-data" class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold">
            <?php echo $rows['name']; ?>
          
            </span><span class="text-black-50"><?php echo $rows['email']; ?></span>
            <div class="mt-5 text-center"><button class="btn btn-danger profile-button" onclick="loadfunct()" type="button">Dashbord</button></div><span> </span>
        
        </div>
            
        </div>
        <?php 
                                // close 
                                }
                ?>
  
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right text-danger">Add a product</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Name of product</label><input required name="pro_name" type="text" class="form-control" value=""></div>
                    
                </div>
                
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Mobile Number</label><input required type="text" class="form-control" value=""></div>
                    <div class="col-md-12"><label class="labels">Description of product</label><textarea name="description" class="form-control" id=""  rows="5"></textarea></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6"><label class="labels">End Date</label><input name="date" type="date" class="form-control" placeholder="country" value=""></div>
                    <div class="col-md-6"><label class="labels">Catogory</label><select required class="form-select" name="cat" aria-label="Default select example">
             <option selected>Select any one</option>
             <option value="electronics">Electronics</option>
             <option value="books">Books</option>
            <option value="sports">Sports</option>
            <option value="music">Musical</option>
            <option value="mobile">Mobile Phones</option>
            <option value="applications">Applications</option>
            <option value="others">Others</option>
            
            </select></div>
                </div>
                <br>
                <label class="form-label" for="customFile">Add image</label>
             <input required type="file" class="form-control" name="uploadfile">
<div class="mt-5 text-center"><button type="submit" name="submit" class="btn btn-danger profile-button" type="button">Upload Product</button></div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center experience"><span><b>Price Details</b></span></div><br>
                <div class="col-md-12"><label class="labels">Starting Prize</label><input name="start_prize" type="text" class="form-control"  value=""></div> <br>
                <div class="col-md-12"><label class="labels">Maximum Prize</label><input type="text" name="max_limit" class="form-control"  value=""></div>
            </div>
            <img src="assets/7.png" width="300px" alt="">
        </div>
        
     </form>
</div>
</div>

</div>
<?php include "footer.php" ?>
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.js"
></script>
<script>
    function loadfunct(){
        window.open('account.php','_self');
    }
</script>
</body>
</html>