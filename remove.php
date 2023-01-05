<?php

$con = new mysqli('localhost','root','','auction');
if (!$con) 
{
  die("Connection failed: " . mysqli_connect_error());
}

$user = $_GET['user'];
$query_products = "DELETE FROM `users` WHERE id = $user;";
$result_products = mysqli_query($con,$query_products);
if($result_products){
    header("location:admin_users.php");
}
?>