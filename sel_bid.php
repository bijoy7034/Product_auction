<?php

$con = new mysqli('localhost','root','','auction');
if (!$con) 
{
  die("Connection failed: " . mysqli_connect_error());
}
$pro_name = $_GET['name'];
$seller = $_GET['seller'];
$buyer = $_GET['buyer'];
$book = $_GET['bookname'];

$query= "UPDATE `products` SET `status` = 'sold' WHERE `products`.`pro_id` = $pro_name;";
if($result = mysqli_query($con,$query)){

    $query2 = "INSERT INTO `seller_details`(`id`, `seller`, `buyer`, `book_name`) VALUES ($pro_name,'$seller','$buyer','$book')";
    $result2 = mysqli_query($con,$query2);
    header("location:account.php");
}else{
    echo "error occured";
}

?>
