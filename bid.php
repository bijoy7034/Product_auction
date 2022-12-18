<?php
$con = mysqli_connect('localhost','root','','auction');
if(isset($_POST['submit12'])){
  $book_name = $_GET['item'];
  $seller = $_GET['seller'];
  $user = $_GET['user'];
  $bid_price = $_POST['bid_price'];
  echo $bid_price;
  echo "dskn";
  $sql = "INSERT INTO bids(`seller`, `bidder`, `book`, `price`) VALUES ('$seller','$user','$book_name','$bid_price')";
$result = mysqli_query($con,$sql);
if($result){
    header("location:home.php");
}
}

?>