<?php

$conn = mysqli_connect('localhost','root','','auction');
if(!$conn){
    die("error in connection".mysqli_connect_error($conn));
}

?>