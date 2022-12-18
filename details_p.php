<?php
 include "connection.php";

$seller = $_GET['seller'];
$buyer = $_GET['buyer'];
$book = $_GET['name'];
$mobile = $_POST['mobile'];
$addr = $_POST['addr'];
$msg = $_POST['msg'];
$pay = $_POST['pay'];
echo $book;

$sql = "INSERT INTO `details`(`seller`, `buyer`, `mobile`, `adrs`, `payment`, `product`) VALUES ('$seller','$buyer',$mobile,'$addr','$pay','$book');";
$result = mysqli_query($conn,$sql); 
if($result){
    header("location:seller_details.php?seller=$seller&product=$book");
}else{
    echo "<script> alert('Some error occured')</script>";
}

?>